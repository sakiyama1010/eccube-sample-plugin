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

namespace Plugin\management\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * 自己学習用エンティティ
 *
 * @ORM\Table(name="plg_sample")
 * @ORM\Entity(repositoryClass="Plugin\management\Repository\SampleRepository")
 */
class Sample extends AbstractEntity
{
    /**
     * @var int ID項目のサンプル
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string 必須文字列サンプル
     *
     * @ORM\Column(name="title", type="string", length=100)
     * @Assert\Length(max=100)
     */
    private $title;

    /**
     * @var string|null NULL許容文字列サンプル
     *
     * @ORM\Column(name="detail", type="string", length=255, nullable=true)
     */
    private $detail;

    /**
     * @var string|null 数値サンプル
     *
     * @ORM\Column(name="count", type="decimal", precision=12, scale=2, nullable=true, options={"unsigned":true,"default":0})
     */
    private $count = 0;

    /**
     * @var \DateTime 日付サンプル
     *
     * @ORM\Column(name="create_date", type="datetimetz")
     */
    private $create_date;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return Sample
     */
    public function setTitle(string $title = null)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @param string|null $detail
     * @return Sample
     */
    public function setDetail(string $detail = null)
    {
        $this->detail = $detail;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTime|null $create_date
     * @return Sample
     */
    public function setCreateDate(\DateTime $create_date = null)
    {
        $this->create_date = $create_date;
        return $this;
    }


}