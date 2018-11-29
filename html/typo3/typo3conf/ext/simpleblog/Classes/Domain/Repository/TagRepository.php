<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 28.11.2018
 * Time: 12:16
 */

namespace Blog\Simpleblog\Domain\Repository;


class TagRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    protected $defaultOrderings = array('tagvalue' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
}