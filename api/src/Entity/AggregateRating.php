<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The average rating based on multiple ratings or reviews.
 *
 * @see http://schema.org/AggregateRating Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/AggregateRating")
 */
class AggregateRating
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(type="guid")
     * @Assert\Uuid
     */
    private $id;

    /**
     * @var Thing|null the item that is being reviewed/rated
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Thing")
     * @ApiProperty(iri="http://schema.org/itemReviewed")
     */
    private $itemReviewed;

    /**
     * @var float|null the count of total number of ratings
     *
     * @ORM\Column(type="float", nullable=true)
     * @ApiProperty(iri="http://schema.org/ratingCount")
     */
    private $ratingCount;

    /**
     * @var float|null the count of total number of reviews
     *
     * @ORM\Column(type="float", nullable=true)
     * @ApiProperty(iri="http://schema.org/reviewCount")
     */
    private $reviewCount;

    /**
     * @var float|null the rating for the content
     *
     * @ORM\Column(type="float", nullable=true)
     * @ApiProperty(iri="http://schema.org/ratingValue")
     */
    private $ratingValue;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setItemReviewed(?Thing $itemReviewed): void
    {
        $this->itemReviewed = $itemReviewed;
    }

    public function getItemReviewed(): ?Thing
    {
        return $this->itemReviewed;
    }

    /**
     * @param float|null $ratingCount
     */
    public function setRatingCount($ratingCount): void
    {
        $this->ratingCount = $ratingCount;
    }

    /**
     * @return float|null
     */
    public function getRatingCount()
    {
        return $this->ratingCount;
    }

    /**
     * @param float|null $reviewCount
     */
    public function setReviewCount($reviewCount): void
    {
        $this->reviewCount = $reviewCount;
    }

    /**
     * @return float|null
     */
    public function getReviewCount()
    {
        return $this->reviewCount;
    }

    /**
     * @param float|null $ratingValue
     */
    public function setRatingValue($ratingValue): void
    {
        $this->ratingValue = $ratingValue;
    }

    /**
     * @return float|null
     */
    public function getRatingValue()
    {
        return $this->ratingValue;
    }
}
