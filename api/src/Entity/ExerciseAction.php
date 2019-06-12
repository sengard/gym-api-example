<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Enum\ActionStatusType;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The act of participating in exertive activity for the purposes of improving health and fitness.
 *
 * @see http://schema.org/ExerciseAction Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/ExerciseAction")
 */
class ExerciseAction
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
     * @var ExercisePlan
     *
     * @ORM\OneToOne(targetEntity="App\Entity\ExercisePlan")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $exercisePlan;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Assert\NotNull
     */
    private $exerciseType;

    /**
     * @var string|null indicates the current disposition of the Action
     *
     * @ORM\Column(nullable=true)
     * @ApiProperty(iri="http://schema.org/actionStatus")
     * @Assert\Choice(callback={"ActionStatusType", "toArray"})
     */
    private $actionStatus;

    /**
     * @var Person|null The direct performer or driver of the action (animate or inanimate). e.g. \*John\* wrote a book.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Person")
     * @ApiProperty(iri="http://schema.org/agent")
     */
    private $agent;

    /**
     * @var \DateTimeInterface|null The endTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to end. For actions that span a period of time, when the action was performed. e.g. John wrote a book from January to \*December\*.\\n\\nNote that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @ApiProperty(iri="http://schema.org/endTime")
     * @Assert\DateTime
     */
    private $endTime;

    /**
     * @var \DateTimeInterface|null The startTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to start. For actions that span a period of time, when the action was performed. e.g. John wrote a book from \*January\* to December.\\n\\nNote that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @ApiProperty(iri="http://schema.org/startTime")
     * @Assert\DateTime
     */
    private $startTime;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setExercisePlan(ExercisePlan $exercisePlan): void
    {
        $this->exercisePlan = $exercisePlan;
    }

    public function getExercisePlan(): ExercisePlan
    {
        return $this->exercisePlan;
    }

    public function setExerciseType(string $exerciseType): void
    {
        $this->exerciseType = $exerciseType;
    }

    public function getExerciseType(): string
    {
        return $this->exerciseType;
    }

    public function setActionStatus(?string $actionStatus): void
    {
        $this->actionStatus = $actionStatus;
    }

    public function getActionStatus(): ?string
    {
        return $this->actionStatus;
    }

    public function setAgent(?Person $agent): void
    {
        $this->agent = $agent;
    }

    public function getAgent(): ?Person
    {
        return $this->agent;
    }

    public function setEndTime(?\DateTimeInterface $endTime): void
    {
        $this->endTime = $endTime;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setStartTime(?\DateTimeInterface $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }
}
