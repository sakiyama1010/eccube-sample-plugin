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

namespace Plugin\management\Entity\Master;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\Master\AbstractMasterEntity;
use Symfony\Component\Validator\Constraints as Assert;

if (!class_exists(SampleStatus::class, false)) {
    // NOTE:
    // https://www.doctrine-project.org/projects/doctrine-orm/en/2.14/reference/inheritance-mapping.html
    // InheritanceTypeの設定について
    // SINGLE_TABLE:そのまま、単一テーブルとして使う場合に定義する
    // DiscriminatorColumn
    // 特定のデータベース行に適用される階層の型に関する情報を保持する、テーブル内の追加の列
    // 言われてみると確かにテーブルの末列にdiscriminator_typeが大体いる
    // HasLifecycleCallbacks
    // 利用可能なライフサイクル イベントのいずれかでメソッドを実行するよう Doctrine に指示できる
    // 例：https://symfony.com/doc/4.1/doctrine/lifecycle_callbacks.html
    //   createdAtエンティティが最初に永続化された (挿入された) ときにのみ、日付列を現在の日付に設定する
    // https://www.doctrine-project.org/projects/doctrine-orm/en/2.14/reference/attributes-reference.html#attrref_haslifecyclecallbacks
    // cache
    //  READ_ONLY（デフォルト）
    // https://www.doctrine-project.org/projects/doctrine-orm/en/2.14/reference/second-level-cache.html
    /**
     * SampleStatus
     * 自己学習用マスタエンティティ
     *
     * @ORM\Table(name="plg_sample_status")
     * @ORM\InheritanceType("SINGLE_TABLE")
     * @ORM\DiscriminatorColumn(name="discriminator_type", type="string", length=255)
     * @ORM\HasLifecycleCallbacks()
     * @ORM\Entity(repositoryClass="Plugin\management\Repository\Master\SampleStatusRepository")
     */
    class SampleStatus extends AbstractMasterEntity
    {
        // masterテーブルとして必要なid,name,sort_noはAbstractMasterEntityで定義しているため、
        //↑以外に定義したいものを用意するイメージ
        /**
         * @var int
         *
         * @ORM\Column(type="smallint", precision=5, options={"unsigned" = true})
         */
        private $del_flg;

        /**
         * Get delFlg.
         *
         * @return int
         */
        public function getDelFlg()
        {
            return $this->del_flg;
        }

        /**
         * Set delFlg.
         *
         * @param int $delFlg
         *
         * @return $this
         */
        public function setDelFlg($delFlg)
        {
            $this->del_flg = $delFlg;

            return $this;
        }
    }
}
