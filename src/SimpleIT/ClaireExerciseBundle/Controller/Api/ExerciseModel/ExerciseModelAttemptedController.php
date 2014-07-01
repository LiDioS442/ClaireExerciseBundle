<?php
namespace SimpleIT\ClaireExerciseBundle\Controller\Api\ExerciseModel;

use Doctrine\DBAL\DBALException;
use SimpleIT\ClaireExerciseBundle\Controller\Api\ApiController;
use SimpleIT\ClaireExerciseBundle\Entity\ExerciseModel\ExerciseModel;
use SimpleIT\ClaireExerciseBundle\Exception\Api\ApiBadRequestException;
use SimpleIT\ClaireExerciseBundle\Exception\Api\ApiNotFoundException;
use SimpleIT\ClaireExerciseBundle\Exception\FilterException;
use SimpleIT\ClaireExerciseBundle\Exception\NonExistingObjectException;
use SimpleIT\ClaireExerciseBundle\Model\Api\ApiGotResponse;
use SimpleIT\ClaireExerciseBundle\Model\Api\ApiResponse;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModelResource;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModelResourceFactory;
use Symfony\Component\HttpFoundation\Request;

/**
 * API Exercise Model controller
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
class ExerciseModelAttemptedController extends ApiController
{
    /**
     * Get a specific exerciseModel resource
     *
     * @param int $exerciseModelId Exercise Model id
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     * @throws \SimpleIT\ClaireExerciseBundle\Exception\Api\ApiNotFoundException
     * @return ApiGotResponse
     */
    public function viewAction($exerciseModelId)
    {
        try {
            /** @var ExerciseModel $exerciseModel */
            $exerciseModel = $this->get('simple_it.exercise.exercise_model')
                ->getAllByUserWhoAttemptedByModel($this->getUserId(), $exerciseModelId);

            $exerciseModelResource = ExerciseModelResourceFactory::create($exerciseModel, true);

            return new ApiGotResponse($exerciseModelResource, array("details", 'Default'));

        } catch (NonExistingObjectException $neoe) {
            throw new ApiNotFoundException(ExerciseModelResource::RESOURCE_NAME);
        }
    }

    /**
     * Get the list of exercise models that the user answered
     *
     * @throws \SimpleIT\ClaireExerciseBundle\Exception\Api\ApiBadRequestException
     * @return ApiGotResponse
     */
    public function listAction()
    {
        try {
            $exerciseModels = $this->get('simple_it.exercise.exercise_model')
                ->getAllByUserWhoAttempted($this->getUserId());

            $exerciseModelResources = ExerciseModelResourceFactory::createCollection
                (
                    $exerciseModels,
                    true
                );

            return new ApiGotResponse($exerciseModelResources, array(
                'details',
                'Default'
            ));
        } catch (FilterException $fe) {
            throw new ApiBadRequestException($fe->getMessage());
        }
    }
}
