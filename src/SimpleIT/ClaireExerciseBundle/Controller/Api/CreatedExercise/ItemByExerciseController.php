<?php
namespace SimpleIT\ClaireExerciseBundle\Controller\Api\CreatedExercise;

use SimpleIT\ClaireExerciseBundle\Controller\BaseController;
use SimpleIT\ClaireExerciseBundle\Exception\Api\ApiNotFoundException;
use SimpleIT\ClaireExerciseBundle\Model\Api\ApiGotResponse;
use SimpleIT\ClaireExerciseBundle\Exception\NonExistingObjectException;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ItemResource;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ItemResourceFactory;

/**
 * API ItemByExercise controller
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
class ItemByExerciseController extends BaseController
{
    /**
     * Get all items
     *
     * @param int $exerciseId    Exercise id
     *
     * @throws ApiNotFoundException
     * @return ApiGotResponse
     */
    public function listAction($exerciseId)
    {
        try {
            $items = $this->get('simple_it.exercise.item')->getAll($exerciseId);

            $itemResources = ItemResourceFactory::createCollection($items);

            return new ApiGotResponse($itemResources, array('list', 'Default'));
        } catch (NonExistingObjectException $neoe) {
            throw new ApiNotFoundException(ItemResource::RESOURCE_NAME);
        }
    }
}
