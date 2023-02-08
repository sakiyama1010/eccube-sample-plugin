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
use Plugin\Management\Entity\Management;
use Doctrine\Persistence\ManagerRegistry as RegistryInterface;
use Eccube\Doctrine\Query\Queries;

/**
 * リポジトリ
 */
class ManagementRepository extends AbstractRepository
{

    /**
     * @var Queries
     */
    protected $queries;

    /**
     * @param RegistryInterface $registry
     * @param Queries $queries
     */
    public function __construct(RegistryInterface $registry,Queries $queries)
    {
        parent::__construct($registry, Management::class);
        $this->queries = $queries;
    }
}
