<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace CoreBundle\Form\DataTransformer;


use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class TextToArrayTransformer implements  DataTransformerInterface
{

    public function transform($value)
    {
        return (is_array($value))?implode(PHP_EOL, $value):$value;
    }

    public function reverseTransform($value)
    {
        return (!is_array($value) && strpos($value, PHP_EOL)>=0)?explode(PHP_EOL, $value):(!is_array($value))?array($value):$value;
    }
}
