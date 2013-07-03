<?php

namespace Kpacha\PhpGag\Enforcers;
use DMS\Filter\Rules\Rule;

/**
 * Description of AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything
 *
 * @author Kpacha <kpacha666@gmail.com>
 * 
 * @Annotation
 */
class AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything extends Rule
{
    /**
     * {@inheritDoc}
     */
    public function applyFilter($value)
    {
        return 42;
    }
}
