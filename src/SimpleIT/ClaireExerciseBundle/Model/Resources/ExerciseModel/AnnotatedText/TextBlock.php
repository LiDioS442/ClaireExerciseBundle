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

namespace SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModel\AnnotatedText;

use JMS\Serializer\Annotation as Serializer;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModel\Common\ResourceBlock;

/**
 * Class TextBlock
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
class TextBlock extends ResourceBlock
{
    /**
     * @var int $maxNumberOfAnnotations The max number of annotation in each text
     * @Serializer\Type("integer")
     * @Serializer\Groups({"details", "exercise_model_storage"})
     */
    private $maxNumberOfAnnotations;

    /**
     * @var int $textWA The text without annotations
     * @Serializer\Type("string")
     * @Serializer\Groups({"details", "exercise_model_storage"})
     */
    private $textWA;

    /**
     * @return int
     */
    public function getMaxNumberOfAnnotations()
    {
        return $this->maxNumberOfAnnotations;
    }

    /**
     * @param int $maxNumberOfAnnotations
     */
    public function setMaxNumberOfAnnotations($maxNumberOfAnnotations)
    {
        $this->maxNumberOfAnnotations = $maxNumberOfAnnotations;
    }

    /**
     * @return int
     */
    public function getTextWA()
    {
        return $this->textWA;
    }

    /**
     * @param int $textWA
     */
    public function setTextWA($textWA)
    {
        $this->textWA = $textWA;
    }



}
