<?php

namespace Plugin\management\Entity\Customer;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;
use Symfony\Component\Validator\Constraints as Assert;

if (!class_exists('\Plugin\management\Entity\Customer\CustomerEvent')) {
    /**
     * 顧客イベント
     *
     * @ORM\Table(name="plg_customer_event")
     * @ORM\Entity(repositoryClass="Plugin\management\Repository\Customer\CustomerEventRepository")
     */
    class CustomerEvent extends AbstractEntity
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
         * @var string 顧客コード
         *
         * @ORM\Column(name="customer_code", type="string", length=100)
         * @Assert\NotBlank
         */
        private $customerCode;

        /**
         * @var \DateTime イベント開始日時
         *
         * @ORM\Column(name="event_start_date", type="datetimetz")
         */
        private $eventStartDate;


        /**
         * @var \DateTime イベント終了日時
         *
         * @ORM\Column(name="event_end_date", type="datetimetz")
         */
        private $eventEndDate;

        /**
         * @var string 概要
         *
         * @ORM\Column(name="event_summary", type="string", length=255)
         * @Assert\NotBlank
         */
        private $eventSummary;

        public function getId(): ?int
        {
            return $this->id;
        }

        public function getCustomerCode(): ?string
        {
            return $this->customerCode;
        }

        public function setCustomerCode(string $customerCode): self
        {
            $this->customerCode = $customerCode;

            return $this;
        }

        public function getEventStartDate(): ?\DateTimeInterface
        {
            return $this->eventStartDate;
        }

        public function setEventStartDate(\DateTimeInterface $eventStartDate): self
        {
            $this->eventStartDate = $eventStartDate;

            return $this;
        }

        public function getEventEndDate(): ?\DateTimeInterface
        {
            return $this->eventEndDate;
        }

        public function setEventEndDate(\DateTimeInterface $eventEndDate): self
        {
            $this->eventEndDate = $eventEndDate;

            return $this;
        }

        public function getEventSummary(): ?string
        {
            return $this->eventSummary;
        }

        public function setEventSummary(string $eventSummary): self
        {
            $this->eventSummary = $eventSummary;

            return $this;
        }
    }
}