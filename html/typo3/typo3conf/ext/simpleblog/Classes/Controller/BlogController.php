<?php

namespace Blog\Simpleblog\Controller;

/***
 *
 * This file is part of the "Sample Blog" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Uros
 *
 ***/

/**
 * BlogController
 */
class BlogController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * blogRepository
     *
     * @var \Blog\Simpleblog\Domain\Repository\BlogRepository
     * @inject
     */
    protected $blogRepository = null;

    /**
     * @param \Blog\Simpleblog\Domain\Repository\BlogRepository $setblogRepository
     */
    public function injectBlogRepository(\Blog\Simpleblog\Domain\Repository\BlogRepository $setblogRepository)
    {
        $this->blogRepository = $setblogRepository;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        //kaze da izbacuje sve podatke, zar to ne radi i findAll()??
        $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager')->persistAll();
        // dodaje rezlutat upital findAll() => blogs
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->blogRepository->findAll());die;
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->blogRepository->findAll());die;
        $this->view->assign('blogs', $this->blogRepository->findAll());
        //$this->view->assign('blogs', $this->blogRepository->getByTitle("Blog"));
        //$this->view->assign('blogs', $this->blogRepository->limitShow(6));
    }

    /**
     * action add
     * @param \Blog\Simpleblog\Domain\Model\Blog $blog
     *
     */
    public function addAction(\Blog\Simpleblog\Domain\Model\Blog $blog)
    {
        $this->blogRepository->add($blog);
        $this->redirect('list');
    }
    /**
     * @param \Blog\Simpleblog\Domain\Model\Blog $blog
     */
    // Ovim pozivas view da se prikaze forma
    public function addFormAction(\Blog\Simpleblog\Domain\Model\Blog $blog = NULL)
    {
        $this->view->assign('blog', $blog);
    }

    /**
     * @param \Blog\Simpleblog\Domain\Model\Blog $blog
     */
    public function showAction(\Blog\Simpleblog\Domain\Model\Blog $blog)
    {
        //dodeli $blogu da bi ga on prosledio u view
        $this->view->assign('blog', $blog);
    }

    public function deleteAction(\Blog\Simpleblog\Domain\Model\Blog $blog)
    {
        // repozitorijum remove i prosledis objekat
        $this->blogRepository->remove($blog);
        $this->redirect('list');
    }

    /**
     * @param \Blog\Simpleblog\Domain\Model\Blog $blog
     */
    public function updateAction(\Blog\Simpleblog\Domain\Model\Blog $blog)
    {
        $this->blogRepository->update($blog);
        $this->redirect('list');
    }

    /**
     * @param \Blog\Simpleblog\Domain\Model\Blog $blog
     */
    public function updateFormAction(\Blog\Simpleblog\Domain\Model\Blog $blog)
    {
        $this->view->assign('blog', $blog);
    }

    public function searchAction()
    {
        //$return = $_POST['tx_simpleblog_bloglisting']['title'];
        $return1 = $this->request->getArgument('title');
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($return1);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings['blog']['max']);die;
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->blogRepository->getByTitle($return1, $this->settings['blog']['max']));
        die;
        return $this->blogRepository->getByTitle($return1, $this->settings['blog']['max']);
    }
}
