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

namespace SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseResource\AnnotatedText;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class AnnotatedTextAnnotationResource
 *

 */
class AnnotatedTextAnnotationResource
{
    /**
     * @var string $part
     * @Serializer\Type("string")
     * @Serializer\Groups({"details", "resource_storage"})
     * @Assert\NotBlank(groups={"create"})
     */
    private $part;

    /**
     * @var string $type
     * @Serializer\Type("string")
     * @Serializer\Groups({"details", "resource_storage"})
     * @Assert\NotBlank(groups={"create"})
     */
    private $type;

    /**
     * @return string
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * @param string $part
     */
    public function setPart($part)
    {
        $this->part = $part;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }




}
