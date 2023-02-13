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

namespace Plugin\management\Repository;

use Eccube\Repository\AbstractRepository;
use Plugin\management\Entity\Sample;
use Doctrine\Persistence\ManagerRegistry as RegistryInterface;
use Eccube\Doctrine\Query\Queries;
use Doctrine\ORM\QueryBuilder;

/**
 * 自己学習用リポジトリ
 * @extends AbstractRepository
 */
class SampleRepository extends AbstractRepository
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
        parent::__construct($registry, Sample::class);
        $this->queries = $queries;
    }

    /**
     * @param array $searchData
     * @return QueryBuilder
     */
    public function getQueryBuilderBySearchData($searchData)
    {
        $qb = $this->createQueryBuilder('s')
            ->select('s');

        if (isset($searchData['multi']) && StringUtil::isNotBlank($searchData['multi'])) {
            // スペース除去
            $clean_key_multi = preg_replace('/\s+|[　]+/u', '', $searchData['multi']);
            $id = preg_match('/^\d{0,10}$/', $clean_key_multi) ? $clean_key_multi : null;
            if ($id && $id > '2147483647' && $this->isPostgreSQL()) {
                $id = null;
            }
            //$qb
            //    ->andWhere("s.id = :id")
            //    ->setParameter('id', $id);
        }

        return $qb;
    }
}