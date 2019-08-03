<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Model\HasOwner;
use Doctrine\ORM\Mapping as ORM;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/Thing Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Thing")
 */
class AbstractHasUser extends AbstractThing implements HasOwner
{


    /**
     * @var User|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
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
