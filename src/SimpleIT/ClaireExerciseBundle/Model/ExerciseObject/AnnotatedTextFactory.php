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

namespace SimpleIT\ClaireExerciseBundle\Model\ExerciseObject;

use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseObject\ExerciseTextObject;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseResource\AnnotatedTextResource;

/**
 * Factory to create a text object for an exercise.
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
abstract class AnnotatedTextFactory
{
    /**
     * Create a text object for exercise from an exercise resource.
     *
     * @param AnnotatedTextResource $res The resource
     *
     * @return AnnotatedText
     */
    public static function createFromCommonResource(AnnotatedTextResource $res)
    {
        $textObj = new AnnotatedText();
        $textObj->setText($res->getText());
        $textObj->setTextWA($res->getTextWA());

        return $textObj;
    }

    /**
     * Create a text object from a string
     *
     * @param string $text
     * @param int $resourceId
     *
     * @return ExerciseTextObject
     */
    public static function createFromText($text, $resourceId = null)
    {
        $textObj = new ExerciseTextObject();
        $textObj->setText($text);
        $textObj->setOriginResource($resourceId);

        return $textObj;
    }
}


