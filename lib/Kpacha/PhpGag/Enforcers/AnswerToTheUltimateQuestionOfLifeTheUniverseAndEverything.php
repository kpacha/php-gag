<?php

namespace Kpacha\PhpGag\Enforcers;
use DMS\Filter\Rules\Rule;

/**
 * Causes the annnotated numeric parameter to evaluate to the Answer to
 * the Ultimate Question of Life, the Universe and Everything.
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
