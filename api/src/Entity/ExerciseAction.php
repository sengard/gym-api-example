<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Enum\ActionStatusType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @var ExercisePlan|null A sub property of instrument. The exercise plan used on this action.
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\ExercisePlan")
     * @ApiProperty(iri="http://schema.org/exercisePlan")
     */
    private $exercisePlan;

    /**
     * @var string[]|null type(s) of exercise or activity, such as strength training, flexibility training, aerobics, cardiac rehabilitation, etc
     *
     * @ORM\Column(type="simple_array", nullable=true)
     * @ApiProperty(iri="http://schema.org/exerciseType")
     */
    private $exerciseTypes;

    /**
     * @var string|null indicates the current disposition of the Action
     *
     * @ORM\Column(nullable=true)
     * @ApiProperty(iri="http://schema.org/actionStatus")
     * @Assert\Choice(callback={"ActionStatusType", "toArray"})
     */
    private $actionStatus;

    /**
     * @var Person|null The direct performer or driver of the action (animate or inanimate). e.g. *John* wrote a book.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Person")
     * @ApiProperty(iri="http://schema.org/agent")
     */
    private $agent;

    /**
     * @var \DateTimeInterface|null The endTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to end. For actions that span a period of time, when the action was performed. e.g. John wrote a book from January to *December*. For media, including audio and video, it's the time offset of the end of a clip within a larger file.
     *
     *    Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @ApiProperty(iri="http://schema.org/endTime")
     * @Assert\DateTime
     */
    private $endTime;

    /**
     * @var \DateTimeInterface|null The startTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to start. For actions that span a period of time, when the action was performed. e.g. John wrote a book from *January* to December. For media, including audio and video, it's the time offset of the start of a clip within a larger file.
     *
     *    Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @ApiProperty(iri="http://schema.org/startTime")
     * @Assert\DateTime
     */
    private $startTime;

    /**
     * @var Thing|null for failed actions, more information on the cause of the failure
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Thing")
     * @ApiProperty(iri="http://schema.org/error")
     */
    private $error;

    /**
     * @var Thing|null The object that helped the agent perform the action. e.g. John wrote a book with *a pen*.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Thing")
     * @ApiProperty(iri="http://schema.org/instrument")
     */
    private $instrument;

    /**
     * @var Thing|null The object upon which the action is carried out, whose state is kept intact or changed. Also known as the semantic roles patient, affected or undergoer (which change their state) or theme (which doesn't). e.g. John read *a book*.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Thing")
     * @ApiProperty(iri="http://schema.org/object")
     */
    private $object;

    /**
     * @var Thing|null The result produced in the action. e.g. John wrote *a book*.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Thing")
     * @ApiProperty(iri="http://schema.org/result")
     */
    private $result;

    public function __construct()
    {
        $this->exerciseTypes = new ArrayCollection();
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setExercisePlan(?ExercisePlan $exercisePlan): void
    {
        $this->exercisePlan = $exercisePlan;
    }

    public function getExercisePlan(): ?ExercisePlan
    {
        return $this->exercisePlan;
    }

    public function addExerciseType(string $exerciseType): void
    {
        $this->exerciseTypes[] = $exerciseType;
    }

    public function removeExerciseType(string $exerciseType): void
    {
        $this->exerciseTypes->removeElement($exerciseType);
    }

    public function getExerciseTypes(): Collection
    {
        return $this->exerciseTypes;
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

    public function setError(?Thing $error): void
    {
        $this->error = $error;
    }

    public function getError(): ?Thing
    {
        return $this->error;
    }

    public function setInstrument(?Thing $instrument): void
    {
        $this->instrument = $instrument;
    }

    public function getInstrument(): ?Thing
    {
        return $this->instrument;
    }

    public function setObject(?Thing $object): void
    {
        $this->object = $object;
    }

    public function getObject(): ?Thing
    {
        return $this->object;
    }

    public function setResult(?Thing $result): void
    {
        $this->result = $result;
    }

    public function getResult(): ?Thing
    {
        return $this->result;
    }
}
