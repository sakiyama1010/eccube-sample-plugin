<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * https://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\management\Repository\Customer;

use Eccube\Repository\AbstractRepository;
use Plugin\management\Entity\Customer\CustomerEvent;
use Doctrine\Persistence\ManagerRegistry as RegistryInterface;
use Eccube\Doctrine\Query\Queries;

/**
 * 顧客イベントリポジトリ
 * @extends AbstractRepository
 */
class CustomerEventRepository extends AbstractRepository
{
    /**
     * @var Queries
     */
    protected $queries;

    /**
     * @param RegistryInterface $registry
     * @param Queries $queries
     */
    public function __construct(RegistryInterface $registry, Queries $queries)
    {
        parent::__construct($registry, CustomerEvent::class);
        $this->queries = $queries;
    }


    /**
     * @param array $searchData
     * @return QueryBuilder
     */
    public function getQueryBuilderBySearchData($searchData)
    {
        $qb = $this->createQueryBuilder('ce')
                // 会員テーブルjoin TODO  
                //->innerJoin('Eccube\Entity\Customer', 'c', 'WITH', 'c.customer_code = ce.customer_code')
            ->select('ce');

        if (isset($searchData['customerCode'])) {
            $qb
                ->andWhere("ce.customer_code = :customer_code")
                ->setParameter('customer_code', $searchData['customerCode']);
        }

        return $qb;
    }
}