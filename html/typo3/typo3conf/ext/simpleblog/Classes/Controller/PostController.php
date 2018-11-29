<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 28.11.2018
 * Time: 9:59
 */

namespace Blog\Simpleblog\Controller;


class PostController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * @var \Pluswerk\Simpleblog\Domain\Repository\PostRepository
     */
    protected $postRepostitory;

    /**
     * @param \Pluswerk\Simpleblog\Domain\Repository\PostRepository $postRepository
     */
    public function injectPostRepository(\Pluswerk\Simpleblog\Domain\Repository\PostRepository $postRepository)
    {
    $this->postRepository = $postRepository;
    }
    /**
     * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
     * @param \Pluswerk\Simpleblog\Domain\Model\Post $post
     */
    public function addFormAction (\Pluswerk\Simpleblog\Domain\Model\Blog $blog, \Pluswerk\Simpleblog\Domain\Model\Post $post = NULL)
    {
        $this->view->assign('blog',$blog);
        $this->view->assign('post',$post);
        $this->view->assign('tags', $this->objectManager->get('Pluswerk\\Simpleblog\\Domain\\Repository\\TagRepository')->findAll());
        $this->view->assign('authors', $this->objectManager->get('Pluswerk\\Simpleblog\\Domain\\Repository\\AuthorRepository')->findAll());
    }
    /**
     * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
     * @param \Pluswerk\Simpleblog\Domain\Model\Post $post
     *
     */
    public function addAction(\Pluswerk\Simpleblog\Domain\Model\Blog $blog, \Pluswerk\Simpleblog\Domain\Model\Post $post = NULL)
    {
        $post->setPostdate(new \DateTime());
        $blog->addPost($post);
        $this->objectManager->get('\\Pluswerk\\Simpleblog\\Domain\\RepositoryBlogRepository')->update($blog);
        $this->reditect('show','Blog',NULL,array('blog'=>$blog));
    }
    /**
     * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
     * @param \Pluswerk\Simpleblog\Domain\Model\Post $post
     */
    public function deleteAction (\Pluswerk\Simpleblog\Domain\Model\Blog $blog, \Pluswerk\Simpleblog\Domain\Model\Post $post = NULL)
    {
        $blog->remove($post);
        $this->objectManager->get("\\Pluswerk\\Simpleblog\\Domain\\RepositoryBlogRepository")->updade($blog);

        $post->remove($post);
        $this->reditect('show','Blog',NULL,array('blog'=>$blog));
    }

    /**
     * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
     * @param \Pluswerk\Simpleblog\Domain\Model\Post $post
     */
    public function deleteFormAction (\Pluswerk\Simpleblog\Domain\Model\Blog $blog, \Pluswerk\Simpleblog\Domain\Model\Post $post)
    {
        $this->view->assign('blog',$blog);
        $this->view->assign('post',$post);
    }
    /**
     * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
     * @param \Pluswerk\Simpleblog\Domain\Model\Post $post
     */
    public function updateFormAction (\Pluswerk\Simpleblog\Domain\Model\Blog $blog, \Pluswerk\Simpleblog\Domain\Model\Post $post)
    {
        $this->view->assign('blog',$blog);
        $this->view->assign('post',$post);
        $this->view->assign('tags', $this->objectManager->get('Pluswerk\\Simpleblog\\Domain\\Repository\\TagRepository')->findAll());
        $this->view->assign('authors', $this->objectManager->get('Pluswerk\\Simpleblog\\Domain\\Repository\\AuthorRepository')->findAll());
    }/**
     * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
     * @param \Pluswerk\Simpleblog\Domain\Model\Post $post
     */
    public function updateAction (\Pluswerk\Simpleblog\Domain\Model\Blog $blog, \Pluswerk\Simpleblog\Domain\Model\Post $post)
    {
        $post->postRepository->update($post);
        $this->reditect('show','Blog',NULL,array('blog'=>$blog));
    }
}