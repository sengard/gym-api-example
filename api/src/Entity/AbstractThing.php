<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/Thing Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\MappedSuperclass
 */
abstract class AbstractThing extends AbstractDate
{
    /**
     * @var string|null the name of the item
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/name")
     * @Groups({"thing"})
     */
    protected $name;

    /**
     * @var string|null a description of the item
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/description")
     * @Groups({"thing"})
     */
    protected $description;

    /**
     * @var MediaObject|null An image of the item. This can be a [URL](http://schema.org/URL) or a fully described [ImageObject](http://schema.org/ImageObject).
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\MediaObject")
     * @ApiProperty(iri="http://schema.org/image")
     * @Groups({"thing"})
     */
    protected $image;

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setImage(?MediaObject $image): void
    {
        $this->image = $image;
    }

    public function getImage(): ?MediaObject
    {
        return $this->image;
    }
}
