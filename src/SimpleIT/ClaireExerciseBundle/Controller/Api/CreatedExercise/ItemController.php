<?php
namespace SimpleIT\ClaireExerciseBundle\Controller\Api\CreatedExercise;

use SimpleIT\ApiBundle\Controller\ApiController;
use SimpleIT\ApiBundle\Exception\ApiNotFoundException;
use SimpleIT\ApiBundle\Model\ApiGotResponse;
use SimpleIT\ApiBundle\Model\ApiResponse;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ItemResource;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ItemResourceFactory;
use SimpleIT\CoreBundle\Exception\NonExistingObjectException;
use Symfony\Component\HttpFoundation\Request;

/**
 * API Item controller
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
class ItemController extends ApiController
{
    /**
     * View action. View an item with its solution. User's answer (is exists) is added inside to
     * make the correction possible.
     *
     * @param int $itemId
     *
     * @throws ApiNotFoundException
     * @return ApiGotResponse
     */
    public function viewAction($itemId)
    {
        try {
            // Call to the item service to get the item and its correction if there is one
            $item = $this->get('simple_it.exercise.item')->get($itemId);

            $itemResource = ItemResourceFactory::create($item, false);

            return new ApiGotResponse($itemResource, array("not_corrected", 'Default'));

        } catch (NonExistingObjectException $neoe) {
            throw new ApiNotFoundException(ItemResource::RESOURCE_NAME);
        }
    }

    /**
     * Get all items
     *
     * @throws ApiNotFoundException
     * @return ApiGotResponse
     */
    public function listAction()
    {
        try {
            $items = $this->get('simple_it.exercise.item')->getAll();

            $itemResources = ItemResourceFactory::createCollection($items);

            return new ApiGotResponse($itemResources, array('list'));
        } catch (NonExistingObjectException $neoe) {
            throw new ApiNotFoundException(ItemResource::RESOURCE_NAME);
        }
    }
}
