<?php

namespace Plugin\management\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * エンティティ
 *
 * @ORM\Table(name="plg_management")
 * @ORM\Entity(repositoryClass="Plugin\management\Repository\ManagementRepository")
 */
class Management extends AbstractEntity
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
     * @var string 概要
     *
     * @ORM\Column(name="summary", type="string", length=100)
     * @Assert\NotBlank
     * @Assert\Length(max=100)
     */
    private $summary;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary)
    {
        $this->summary = $summary;
    }
}