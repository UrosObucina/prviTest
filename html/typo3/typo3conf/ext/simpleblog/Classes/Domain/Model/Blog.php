<?php
namespace Blog\Simpleblog\Domain\Model;

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
 * Blog
 */
class Blog extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     * @validate NotEmpty, StringLength(maximum=5)
     */
    protected $title = '';

    /**
     * description
     *
     * @var string
     * @validate NotEmpty
     */
    protected $description = '';

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $image = null;

    /**
     * post
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Simpleblog\Domain\Model\Post>
     * @cascade remove
     */
    protected $post = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->post = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Adds a Post
     *
     * @param \Blog\Simpleblog\Domain\Model\Post $post
     * @return void
     */
    public function addPost(\Blog\Simpleblog\Domain\Model\Post $post)
    {
        $this->post->attach($post);
    }

    /**
     * Removes a Post
     *
     * @param \Blog\Simpleblog\Domain\Model\Post $postToRemove The Post to be removed
     * @return void
     */
    public function removePost(\Blog\Simpleblog\Domain\Model\Post $postToRemove)
    {
        $this->post->detach($postToRemove);
    }

    /**
     * Returns the post
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Simpleblog\Domain\Model\Post> $post
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Sets the post
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Simpleblog\Domain\Model\Post> $post
     * @return void
     */
    public function setPost(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $post)
    {
        $this->post = $post;
    }
}
