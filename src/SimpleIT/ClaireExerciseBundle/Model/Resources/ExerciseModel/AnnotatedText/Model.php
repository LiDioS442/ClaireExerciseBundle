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
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModel\Common\CommonModel;

/**

/**
 * Class Model
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
class Model extends CommonModel
{
    /**
     * @var array $textBlocks An array of TextBlock
     * @Serializer\Type("array<SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModel\AnnotatedText\TextBlock>")
     * @Serializer\Groups({"details", "exercise_model_storage"})
     */
    private $textBlocks = array();

    /**
     * Get text blocks
     *
     * @return array
     */
    public function getTextBlocks()
    {
        return $this->textBlocks;
    }

    /**
     * Add a TextBlock to the model
     *
     * @param TextBlock $textBlocks
     */
    public function addTextBlock(TextBlock $textBlocks)
    {
        $this->textBlocks[] = $textBlocks;
    }

    /**
     * Set textBlocks
     *
     * @param array $textBlocks
     */
    public function setTextBlocks($textBlocks)
    {
        $this->textBlocks = $textBlocks;
    }
}
