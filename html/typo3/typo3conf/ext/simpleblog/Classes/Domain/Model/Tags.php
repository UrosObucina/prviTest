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
 * Tags
 */
class Tags extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * tagvalue
     *
     * @var string
     */
    protected $tagvalue = '';

    /**
     * Returns the tagvalue
     *
     * @return string $tagvalue
     */
    public function getTagvalue()
    {
        return $this->tagvalue;
    }

    /**
     * Sets the tagvalue
     *
     * @param string $tagvalue
     * @return void
     */
    public function setTagvalue($tagvalue)
    {
        $this->tagvalue = $tagvalue;
    }
}
