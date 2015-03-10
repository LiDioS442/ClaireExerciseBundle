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

namespace SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\AnnotatedText;

use JMS\Serializer\Annotation as Serializer;
use SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\Common\CommonItem;

/**
 * Class Exercise
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
class Item extends CommonItem
{
    /**
     * @var string $text
     * @Serializer\Type("string")

     */
    private $text;

    /**
     * @var string $textWA
     * @Serializer\Type("string")

     */
    private $textWA;

    /**
     * Solutions: array which keys are the keys from fixParts and mobileParts
     * Array of array :
     * array(
     *      0 => array(0, 1),
     *      1 => array(0, 1),
     *      2 => array(2),
     *      3 => array()
     *      )
     * In this example, fixPart 0 can be linked with mobilePart 0 or 1
     *                  fixPart 1 can be linked with mobilePart 0 or 1
     *                  fixPart 2 can be linked only with mobilePart 2
     *                  fixPart 3 is a fake
     *
     * @var array $solutions
     * @Serializer\Type("array")
     * @Serializer\Groups({"details", "corrected", "not_corrected", "item_storage"})
     */


    private $solutions = array();

    /**
     * The learner's answers.
     *
     * @var array
     * @Serializer\Type("array")
     * @Serializer\Groups({"details", "corrected"})
     */
    private $answers = array();



    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

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
     * Get solution
     *
     * @return array
     */
    public function getSolutions()
    {
        return $this->solutions;
    }

    /**
     * Set answers
     *
     * @param array $answers
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;
    }

    /**
     * Get answers
     *
     * @return array
     */
    public function getAnswers()
    {
        return $this->answers;
    }



    /**
     * Set solutions
     *
     * @param array $solutions
     */
    public function setSolutions($solutions)
    {
        $this->solutions = $solutions;
    }
}
