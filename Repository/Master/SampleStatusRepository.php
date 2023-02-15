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

namespace Plugin\management\Repository\Master;

use Plugin\management\Entity\Master\SampleStatus;
use Doctrine\Persistence\ManagerRegistry as RegistryInterface;
use Eccube\Repository\AbstractRepository;

/*
 * サンプルステータスマスタのリポジトリを定義する
 */
class SampleStatusRepository extends AbstractRepository
{
    public function __construct(
        RegistryInterface $registry
    ) {
        parent::__construct($registry, SampleStatus::class);
    }
}
