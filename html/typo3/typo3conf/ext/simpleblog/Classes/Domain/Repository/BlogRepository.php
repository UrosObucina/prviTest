<?php
namespace Blog\Simpleblog\Domain\Repository;

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
 * The repository for Blogs
 */
class BlogRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function getByTitle($serach,$limit)
    {
        //pravljenje samostalnog upita
        $query = $this->createQuery();
        $query->matching(
            $query->like('title', '%' . $serach . '%'));
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($query);die;
//        $query->setOrderings(array('title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
//        $limit = (int)$limit;
//        if ($limit > 0) {
//            $query->setLimit(2);
//        }
        return $query->execute();
    }
}
