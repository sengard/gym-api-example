<?php

declare(strict_types=1);

namespace App\Enum;

use App\Entity\ExerciseAction;
use MyCLabs\Enum\Enum;

/**
 * The status of an Action.
 *
 * @see http://schema.org/ActionStatusType Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 * @ApiResource(iri="http://schema.org/ActionStatusType")
 */
class ActionStatusType extends Enum
{
    /**
     * @var string An in-progress action (e.g, while watching the movie, or driving to a location).
     */
    const ACTIVE_ACTION_STATUS = 'http://schema.org/ActiveActionStatus';

    /**
     * @var string a description of an action that is supported
     */
    const POTENTIAL_ACTION_STATUS = 'http://schema.org/PotentialActionStatus';

    /**
     * @var string An action that failed to complete. The action's error property and the HTTP return code contain more information about the failure.
     */
    const FAILED_ACTION_STATUS = 'http://schema.org/FailedActionStatus';

    /**
     * @var string an action that has already taken place
     */
    const COMPLETED_ACTION_STATUS = 'http://schema.org/CompletedActionStatus';

    /**
     * @var ExerciseAction|null Relates a term (i.e. a property, class or enumeration) to one that supersedes it.
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\ExerciseAction")
     * @ApiProperty(iri="http://schema.org/supersededBy")
     */
    private $supersededBy;

    public function setSupersededBy(?ExerciseAction $supersededBy): void
    {
        $this->supersededBy = $supersededBy;
    }

    public function getSupersededBy(): ?ExerciseAction
    {
        return $this->supersededBy;
    }
}
