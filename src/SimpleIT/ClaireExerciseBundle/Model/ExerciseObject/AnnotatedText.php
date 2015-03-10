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

use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseObject\ExerciseObject;

/**
 * A MultipleChoiceQuestion is the representation of a multiple choice question
 * retrieved from a resource. The question is not under a final form that can be
 * presented in an exercise.
 * A MultipleChoiceQuestion can contain more propositions that will be used in the
 * exercise. The maximum number of (right) propositions to be used is specified in
 * the parameters of the MultipleChoiceQuestion.
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */

class AnnotatedText extends ExerciseObject
{
    const OBJECT_TYPE = "annotated-text";

    /**
     * @var string $textWA The wording of the question (text)
     */
    private $textWA;


    /**
     * @var string $text The wording of the question (text)
     */
    private $text;

    /**
     * @return string
     */
    public function getTextWA()
    {
        return $this->textWA;
    }

    /**
     * @param string $textWA
     */
    public function setTextWA($textWA)
    {
        $this->textWA = $textWA;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

}

