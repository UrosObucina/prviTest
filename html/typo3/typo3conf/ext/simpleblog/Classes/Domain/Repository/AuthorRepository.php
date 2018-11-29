<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 29.11.2018
 * Time: 15:28
 */

namespace Blog\Simpleblog\Domain\Repository;


class AuthorRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    protected $defaultOrderings = array('fullname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
}