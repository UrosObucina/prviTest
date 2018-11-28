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
 * Comment
 */
class Comment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * comment
     *
     * @var string
     */
    protected $comment = '';

    /**
     * commentdata
     *
     * @var \DateTime
     */
    protected $commentdata = null;

    /**
     * Returns the comment
     *
     * @return string $comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets the comment
     *
     * @param string $comment
     * @return void
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Returns the commentdata
     *
     * @return \DateTime $commentdata
     */
    public function getCommentdata()
    {
        return $this->commentdata;
    }

    /**
     * Sets the commentdata
     *
     * @param \DateTime $commentdata
     * @return void
     */
    public function setCommentdata(\DateTime $commentdata)
    {
        $this->commentdata = $commentdata;
    }
}
