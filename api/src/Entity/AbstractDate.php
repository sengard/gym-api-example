<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * created at updated at parent class
 *
 * @see http://schema.org/DateTime Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\HasLifecycleCallbacks
 * @ORM\MappedSuperclass
 */
abstract class AbstractDate
{
    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     * @Assert\DateTime
     * @ApiProperty(iri="http://schema.org/DateTime")
     * @Groups({"date"})
     */
    protected $createdAt;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="datetime",nullable=true, options={"default": "CURRENT_TIMESTAMP"} )
     * @Assert\DateTime
     * @ApiProperty(iri="http://schema.org/DateTime")
     * @Groups({"date"})
     */
    protected $updatedAt;

    public function setCreatedAt(? \DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt():? \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setUpdatedAt(? \DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getUpdatedAt():? \DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {
        $this->setUpdatedAt(new \DateTime(date('Y-m-d H:i:s')));

        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new \DateTime(date('Y-m-d H:i:s')));
        }
    }
}
