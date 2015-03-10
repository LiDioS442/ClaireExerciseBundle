<?php
/*
 * This file is part of CLAIRE.
 *
 * CLAIRE is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * CLAIRE is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with CLAIRE. If not, see <http://www.gnu.org/licenses/>
 */

namespace SimpleIT\ClaireExerciseBundle\Service\Exercise\ExerciseCreation;

use Claroline\CoreBundle\Entity\User;
use SimpleIT\ClaireExerciseBundle\Entity\CreatedExercise\Answer;
use SimpleIT\ClaireExerciseBundle\Entity\CreatedExercise\Item;
use SimpleIT\ClaireExerciseBundle\Entity\ExerciseModel\ExerciseModel;
use SimpleIT\ClaireExerciseBundle\Exception\InvalidAnswerException;
use SimpleIT\ClaireExerciseBundle\Exception\InvalidTypeException;
use SimpleIT\ClaireExerciseBundle\Model\ExerciseObject\ExerciseTextFactory;
use SimpleIT\ClaireExerciseBundle\Model\ModelObject\ObjectIdFactory;
use SimpleIT\ClaireExerciseBundle\Model\Resources\AnswerResourceFactory;
use SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\AnnotatedText\Exercise;
use SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\AnnotatedText\Item as ResItem;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModel\Common\CommonModel;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModel\AnnotatedText\Model;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModel\AnnotatedText\TextBlock;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseObject\ExerciseObject;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseObject\ExercisePictureObject;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseObject\ExerciseTextObject;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseResource\CommonResource;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ItemResource;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ItemResourceFactory;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ResourceResource;

/**
 * Service which manages Annotated Text Exercises.
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
class AnnotatedTextService extends ExerciseCreationService
{
    /**
     * @inheritdoc
     */
    public function generateExerciseFromExerciseModel(
        ExerciseModel $exerciseModel,
        CommonModel $commonModel,
        User $owner
    )
    {
        /** @var Model $commonModel */
        // Generation of the exercise with the model
        $exercise = $this->generatePIExercise($commonModel, $owner);

        // Transformation of the exercise into entities (StoredExercise and Items)
        return $this->toStoredExercise(
            $exercise,
            $exerciseModel,
            "annotated-text",
            array($exercise->getItem())
        );
    }

    /**
     * Correct the pair items. Modify the solution to keep only one of the
     * possible solutions, which must be the closest to the learner's answer.
     *
     * @param Item   $entityItem
     * @param Answer $answer
     *
     * @return ItemResource
     */
    public function correct(Item $entityItem, Answer $answer)
    {
        $itemResource = ItemResourceFactory::create($entityItem);
        /** @var ResItem $item */
        $item = $itemResource->getContent();

        $la = AnswerResourceFactory::create($answer);
        $learnerAnswers = $la->getContent();

        $item->setAnswers($learnerAnswers);

        // check the answers
        $sol = $item->getSolutions();


        // new loop for the wrong answers


        $item->setSolutions($sol);

        $this->mark($item);

        $itemResource->setContent($item);

        return $itemResource;
    }

    /**
     * Compute and add the mark to the item according to the answer and the solution
     *
     * @param ResItem $item
     */
    public function mark(ResItem &$item)
    {

    }

    /**
     * @param Model $model the model
     * @param User  $owner
     *
     * @throws InvalidTypeException
     * @return Exercise The exercise
     */
    private function generatePIExercise(Model $model, User $owner)
    {
        // Wording and documents
        $exercise = new Exercise($model->getWording());



        return $exercise;
    }

    /**
     * Complete a ExercisePair list with the pairs from a PairBlock
     *
     * @param TextBlock $pb
     * @throws \LogicException
     */
    private function addTextFromBlock(
        TextBlock $pb

    )
    {

    }

    /**
     * Retrieve objects from a PairBlock
     *
     * @param TextBlock $pb
     * @param User      $owner
     *
     * @return array An array of ExerciseObject
     */
    private function exerciseObjectsFromBlock(TextBlock $pb, User $owner)
    {
        $blockObjects = array();
        $numOfPairs = $pb->getNumberOfOccurrences();

        /*
         * if the block is a list
         */
        if ($pb->isList()) {
            $this->getObjectsFromList($pb, $numOfPairs, $blockObjects, $owner);
        }
        /*
         * if the block is object constraints
         */
        /*else {
            // get the resource constraint
            $oc = $pb->getResourceConstraint();

            // add the existence of the link meta key
            $oc->addExists($pb->getPairMetaKey());

            // add the existence of the fix meta to display, if there is one
            $lmtd = $pb->getFixMetaToDisplay();
            if (!is_null($lmtd)) {
                $oc->addExists($lmtd);
            }

            $blockObjects = $this->exerciseResourceService
                ->getExerciseObjectsFromConstraints(
                    $oc,
                    $numOfPairs,
                    $owner
                );
        }

        // If the value of a metadata field must be displayed instead of the object
        if (!is_null($pb->getFixMetaToDisplay())) {
            $blockObjects = $this->objectsToMetaStrings(
                $blockObjects,
                $pb->getFixMetaToDisplay()
            );
        }
*/
        return $blockObjects;
    }

    /**
     * Remove a value from a recursive array
     *
     * @param array $array
     * @param mixed $val
     */
    private function removeFromArray(&$array, $val)
    {
        foreach ($array as $k1 => $sList) {
            if (is_array($sList)) {
                foreach ($sList as $k2 => $s) {
                    if ($s == $val) {
                        unset ($array[$k1][$k2]);
                    }
                }
            }
        }
    }

    /**
     * Validate the answer to an item
     *
     * @param Item  $itemEntity
     * @param array $answer
     *
     * @throws InvalidAnswerException
     */
    public function validateAnswer(Item $itemEntity, array $answer)
    {

        }


    /**
     * Return an item without solution
     *
     * @param ItemResource $itemResource
     *
     * @return ItemResource
     */
    public function noSolutionItem($itemResource)
    {
        /** @var \SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\PairItems\Item $content */
        $content = $itemResource->getContent();
        $content->setSolutions(null);

        return $itemResource;
    }
}
