<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use App\Model\HasOwner;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/Thing Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 * @ApiFilter(SearchFilter::class, properties={"user": "exact"})
 *
 * @ORM\MappedSuperclass
 */
abstract class AbstractHasUser extends AbstractThing implements HasOwner
{
    /**
     * @var User|null
     * @ApiProperty(iri="http://schema.org/user")
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"hasUser"})
     */
    private $user;

    /**
     * @param User|null $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return User|null
     */
    public function getUser()
    {
        return $this->user;
    }
}
