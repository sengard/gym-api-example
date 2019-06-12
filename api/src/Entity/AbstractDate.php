<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/Thing Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\MappedSuperclass
 * @ApiResource(iri="http://schema.org/Thing")
 */
abstract class AbstractDate
{
    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="date")
     * @Assert\Date
     * @Assert\NotNull
     */
    private $CreatedAt;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="date")
     * @Assert\Date
     * @Assert\NotNull
     */
    private $UpdatedAt;

    public function setCreatedAt(\DateTimeInterface $CreatedAt): void
    {
        $this->CreatedAt = $CreatedAt;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $UpdatedAt): void
    {
        $this->UpdatedAt = $UpdatedAt;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->UpdatedAt;
    }
}
