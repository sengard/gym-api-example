<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A review of an item - for example, of a restaurant, movie, or store.
 *
 * @see http://schema.org/Review Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Review")
 */
class Review extends AbstractDate
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
     * @var Person|null The author of this content or rating. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Person")
     * @ApiProperty(iri="http://schema.org/author")
     */
    private $author;

    /**
     * @var Person|null the item that is being reviewed/rated
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Person")
     * @ApiProperty(iri="http://schema.org/itemReviewed")
     */
    private $itemReviewed;

    /**
     * @var string|null the name of the item
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/name")
     */
    private $name;

    /**
     * @var string|null the actual body of the review
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/reviewBody")
     */
    private $reviewBody;

    /**
     * @var Rating|null The rating given in this review. Note that reviews can themselves be rated. The `reviewRating` applies to rating given by the review. The [aggregateRating](http://schema.org/aggregateRating) property applies to the review itself, as a creative work.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Rating")
     * @ApiProperty(iri="http://schema.org/reviewRating")
     */
    private $reviewRating;

    /**
     * @var Person|null the publisher of the creative work
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Person")
     * @ApiProperty(iri="http://schema.org/publisher")
     */
    private $publisher;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setAuthor(?Person $author): void
    {
        $this->author = $author;
    }

    public function getAuthor(): ?Person
    {
        return $this->author;
    }

    public function setItemReviewed(?Person $itemReviewed): void
    {
        $this->itemReviewed = $itemReviewed;
    }

    public function getItemReviewed(): ?Person
    {
        return $this->itemReviewed;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setReviewBody(?string $reviewBody): void
    {
        $this->reviewBody = $reviewBody;
    }

    public function getReviewBody(): ?string
    {
        return $this->reviewBody;
    }

    public function setReviewRating(?Rating $reviewRating): void
    {
        $this->reviewRating = $reviewRating;
    }

    public function getReviewRating(): ?Rating
    {
        return $this->reviewRating;
    }

    public function setPublisher(?Person $publisher): void
    {
        $this->publisher = $publisher;
    }

    public function getPublisher(): ?Person
    {
        return $this->publisher;
    }
}
