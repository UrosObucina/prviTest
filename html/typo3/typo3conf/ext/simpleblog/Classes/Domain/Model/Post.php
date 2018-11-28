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
 * Post
 */
class Post extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * content
     *
     * @var string
     */
    protected $content = '';

    /**
     * postdate
     *
     * @var \DateTime
     */
    protected $postdate = null;

    /**
     * comment
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Simpleblog\Domain\Model\Comment>
     * @cascade remove
     */
    protected $comment = null;

    /**
     * tags
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Simpleblog\Domain\Model\Tags>
     */
    protected $tags = null;

    /**
     * author
     *
     * @var \Blog\Simpleblog\Domain\Model\Author
     */
    protected $author = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
        $this->setPostdate(new \DateTime());
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
        $this->comment = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->tags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the content
     *
     * @return string $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the content
     *
     * @param string $content
     * @return void
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Returns the postdate
     *
     * @return \DateTime $postdate
     */
    public function getPostdate()
    {
        return $this->postdate;
    }

    /**
     * Sets the postdate
     *
     * @param \DateTime $postdate
     * @return void
     */
    public function setPostdate(\DateTime $postdate)
    {
        $this->postdate = $postdate;
    }

    /**
     * Adds a Comment
     *
     * @param \Blog\Simpleblog\Domain\Model\Comment $comment
     * @return void
     */
    public function addComment(\Blog\Simpleblog\Domain\Model\Comment $comment)
    {
        $this->comment->attach($comment);
    }

    /**
     * Removes a Comment
     *
     * @param \Blog\Simpleblog\Domain\Model\Comment $commentToRemove The Comment to be removed
     * @return void
     */
    public function removeComment(\Blog\Simpleblog\Domain\Model\Comment $commentToRemove)
    {
        $this->comment->detach($commentToRemove);
    }

    /**
     * Returns the comment
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Simpleblog\Domain\Model\Comment> $comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets the comment
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Simpleblog\Domain\Model\Comment> $comment
     * @return void
     */
    public function setComment(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Adds a Tags
     *
     * @param \Blog\Simpleblog\Domain\Model\Tags $tag
     * @return void
     */
    public function addTag(\Blog\Simpleblog\Domain\Model\Tags $tag)
    {
        $this->tags->attach($tag);
    }

    /**
     * Removes a Tags
     *
     * @param \Blog\Simpleblog\Domain\Model\Tags $tagToRemove The Tags to be removed
     * @return void
     */
    public function removeTag(\Blog\Simpleblog\Domain\Model\Tags $tagToRemove)
    {
        $this->tags->detach($tagToRemove);
    }

    /**
     * Returns the tags
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Simpleblog\Domain\Model\Tags> $tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Sets the tags
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Simpleblog\Domain\Model\Tags> $tags
     * @return void
     */
    public function setTags(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Returns the author
     *
     * @return \Blog\Simpleblog\Domain\Model\Author $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the author
     *
     * @param \Blog\Simpleblog\Domain\Model\Author $author
     * @return void
     */
    public function setAuthor(\Blog\Simpleblog\Domain\Model\Author $author)
    {
        $this->author = $author;
    }
}
