<?php

namespace Snappminds\Security\Bundle\UserBundle\DataSource;

use Snappminds\Utils\Bridge\Doctrine\DataSource\DoctrineDataSource;

/**
 *
 * @author ldelia
 */
class UserDataSource extends DoctrineDataSource {
    
    protected function getQueryBuilder() {
        $criteria = $this->getCriteria();

        $qb = $this->getEm()->createQueryBuilder('a');
        $qb->select('a')
                ->from($this->getRepositoryName(), 'a');

        if (isset($criteria['username'])) {
            $qb->where('a.username like :username')
                ->setParameter('username', '%' . $criteria['username'] . '%');
        }
        
        return $qb;
    }        
}
