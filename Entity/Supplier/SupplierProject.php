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

namespace Plugin\Management42\Entity\Supplier;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;
use Eccube\Entity\Member;
use Symfony\Component\Validator\Constraints as Assert;

if (!class_exists('\Plugin\Management42\Entity\Supplier\SupplierProject')) {
    /**
     * 取引先イベント
     *
     * @ORM\Table(name="plg_supplier_project")
     * @ORM\Entity(repositoryClass="Plugin\Management42\Repository\Supplier\SupplierProjectRepository")
     */
    class SupplierProject extends AbstractEntity
    {
        /**
         * @var int id
         *
         * @ORM\Column(name="id", type="integer", options={"unsigned":true})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="IDENTITY")
         */
        private $id;

        /**
         * @var \Plugin\Management42\Entity\Supplier\Supplier 取引先
         * 
         * @ORM\ManyToOne(targetEntity="\Plugin\Management42\Entity\Supplier\Supplier")
         * @ORM\JoinColumns({
         *   @ORM\JoinColumn(name="supplier_code", referencedColumnName="supplier_code")
         * })
         */
        private $Supplier;

        /**
         * @var string|null 見積コード
         *
         * @ORM\Column(name="estimate_code", type="string", length=20)
         */
        private $estimate_code;

        /**
         * 見積コードが振られない可能性があるので
         * @var string 案件コード
         *
         * @ORM\Column(name="project_code", type="string", length=20)
         * @Assert\NotBlank
         */
        private $project_code;

        /**
         * @var string|null 案件名
         *
         * @ORM\Column(name="project_name", type="string", length=50)
         */
        private $project_name;

        /**
         * @var \Eccube\Entity\Member PMのメンバーID
         * 
         * @ORM\ManyToOne(targetEntity="Eccube\Entity\Member")
         * @ORM\JoinColumns({
         *   @ORM\JoinColumn(name="pm_member_id", referencedColumnName="id")
         * })
         */
        private $PmMember;

        /**
         * @var \Eccube\Entity\Member PLのメンバーID
         * 
         * @ORM\ManyToOne(targetEntity="Eccube\Entity\Member")
         * @ORM\JoinColumns({
         *   @ORM\JoinColumn(name="pl_member_id", referencedColumnName="id")
         * })
         */
        private $PlMember;

        /**
         * @var \Eccube\Entity\Member 営業のメンバーID
         * 
         * @ORM\ManyToOne(targetEntity="Eccube\Entity\Member")
         * @ORM\JoinColumns({
         *   @ORM\JoinColumn(name="sales_member_id", referencedColumnName="id")
         * })
         */
        private $SalesMember;

        /**
         * 
         * @var string 見積金額(円)
         *
         * @ORM\Column(name="estimate_amount_yen", type="decimal", precision=12, scale=2, options={"unsigned":true,"default":0})
         * @Assert\NotBlank
         */
        private $estimate_amount_yen;

        /**
         * 
         * @var \DateTime 見積提示日
         *
         * @ORM\Column(name="estimate_submission_date", type="datetimetz")
         */
        private $estimate_submission_date;

        /**
         * 
         * @var \DateTime 見積有効期限日
         *
         * @ORM\Column(name="estimate_expire_date", type="datetimetz")
         */
        private $estimate_expire_date;

        /**
         * 
         * @var \DateTime 発注日
         *
         * @ORM\Column(name="order_date", type="datetimetz")
         */
        private $order_date;

        /**
         * 
         * @var \DateTime 出荷判定予定日
         *
         * @ORM\Column(name="ship_check_plan_date", type="datetimetz")
         */
        private $ship_check_plan_date;

        /**
         * 
         * @var \DateTime 納品日
         *
         * @ORM\Column(name="delivery_date", type="datetimetz")
         */
        private $delivery_date;

        /**
         * 
         * @var \DateTime 請求日
         *
         * @ORM\Column(name="belling_date", type="datetimetz")
         */
        private $belling_date;

        /**
         * TODO:マスタ化
         * @var string 案件ステータス
         *
         * @ORM\Column(name="project_status", type="string", length=50")
         */
        //private $project_status;

        /**
         * TODO:マスタ化
         * @var bool QMS対象
         *
         * @ORM\Column(name="qms_flg", type="string", length=50")
         */
        //private $qms_flg;

        public function getId(): ?int
        {
            return $this->id;
        }

        public function getEstimateCode(): ?string
        {
            return $this->estimate_code;
        }

        public function setEstimateCode(string $estimate_code): self
        {
            $this->estimate_code = $estimate_code;

            return $this;
        }

        public function getProjectCode(): ?string
        {
            return $this->project_code;
        }

        public function setProjectCode(string $project_code): self
        {
            $this->project_code = $project_code;

            return $this;
        }

        public function getProjectName(): ?string
        {
            return $this->project_name;
        }

        public function setProjectName(string $project_name): self
        {
            $this->project_name = $project_name;

            return $this;
        }

        public function getEstimateAmountYen(): ?string
        {
            return $this->estimate_amount_yen;
        }

        public function setEstimateAmountYen(string $estimate_amount_yen): self
        {
            $this->estimate_amount_yen = $estimate_amount_yen;

            return $this;
        }

        public function getEstimateSubmissionDate(): ?\DateTimeInterface
        {
            return $this->estimate_submission_date;
        }

        public function setEstimateSubmissionDate(\DateTimeInterface $estimate_submission_date): self
        {
            $this->estimate_submission_date = $estimate_submission_date;

            return $this;
        }

        public function getEstimateExpireDate(): ?\DateTimeInterface
        {
            return $this->estimate_expire_date;
        }

        public function setEstimateExpireDate(\DateTimeInterface $estimate_expire_date): self
        {
            $this->estimate_expire_date = $estimate_expire_date;

            return $this;
        }

        public function getOrderDate(): ?\DateTimeInterface
        {
            return $this->order_date;
        }

        public function setOrderDate(\DateTimeInterface $order_date): self
        {
            $this->order_date = $order_date;

            return $this;
        }

        public function getShipCheckPlanDate(): ?\DateTimeInterface
        {
            return $this->ship_check_plan_date;
        }

        public function setShipCheckPlanDate(\DateTimeInterface $ship_check_plan_date): self
        {
            $this->ship_check_plan_date = $ship_check_plan_date;

            return $this;
        }

        public function getDeliveryDate(): ?\DateTimeInterface
        {
            return $this->delivery_date;
        }

        public function setDeliveryDate(\DateTimeInterface $delivery_date): self
        {
            $this->delivery_date = $delivery_date;

            return $this;
        }

        public function getBellingDate(): ?\DateTimeInterface
        {
            return $this->belling_date;
        }

        public function setBellingDate(\DateTimeInterface $belling_date): self
        {
            $this->belling_date = $belling_date;

            return $this;
        }

        public function getSupplier(): ?Supplier
        {
            return $this->Supplier;
        }

        public function setSupplier(?Supplier $Supplier): self
        {
            $this->Supplier = $Supplier;

            return $this;
        }

        public function getPmMember(): ?Member
        {
            return $this->PmMember;
        }

        public function setPmMember(?Member $PmMember): self
        {
            $this->PmMember = $PmMember;

            return $this;
        }

        public function getPlMember(): ?Member
        {
            return $this->PlMember;
        }

        public function setPlMember(?Member $PlMember): self
        {
            $this->PlMember = $PlMember;

            return $this;
        }

        public function getSalesMember(): ?Member
        {
            return $this->SalesMember;
        }

        public function setSalesMember(?Member $SalesMember): self
        {
            $this->SalesMember = $SalesMember;

            return $this;
        }
    }
}