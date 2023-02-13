<?php

namespace Plugin\CustomerEvent\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * 顧客イベント
 *
 * @ORM\Table(name="plg_customer_event")
 * @ORM\Entity(repositoryClass="Plugin\CustomerEvent\Repository\CustomerEventRepository")
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
}