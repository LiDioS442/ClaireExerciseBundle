<?php

namespace SimpleIT\ClaireExerciseBundle\Service\Exercise\CreatedExercise;

use SimpleIT\CoreBundle\Exception\NonExistingObjectException;
use SimpleIT\ClaireExerciseBundle\Entity\CreatedExercise\Attempt;
use SimpleIT\Utils\Collection\CollectionInformation;


/**
 * Interface for service which manages the attempt
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
interface AttemptServiceInterface
{
    /**
     * Find an attempt by its id
     *
     * @param int $attemptId
     *
     * @throws NonExistingObjectException
     * @return Attempt
     */
    public function get($attemptId);

    /**
     * Add a new attempt to the database
     *
     * @param int $exerciseId
     * @param int $userId
     * @param int $testAttemptId
     *
     * @return Attempt
     */
    public function add($exerciseId, $userId, $testAttemptId = null);

    /**
     * Get all the attempts
     *
     * @param CollectionInformation $collectionInformation
     * @param null                  $userId
     * @param int                   $exerciseId
     * @param int                   $testAttemptId
     *
     * @return array
     */
    public function getAll(
        $collectionInformation = null,
        $userId = null,
        $exerciseId = null,
        $testAttemptId = null
    );
}
