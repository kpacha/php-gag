<?php

namespace Example;

//Import Annotations
use DMS\Filter\Rules as Filter;
use Kpacha\PhpGag\Enforcers\AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything;
use Kpacha\PhpGag\Enforcers\ThisHadBetterBe;
use Kpacha\PhpGag\Enforcers\ThisHadBetterNotBe;

class User
{

    /**
     * @Filter\StripTags()
     * @Filter\Trim()
     * @Filter\StripNewlines()
     *
     * @var string
     */
    public $name;

    /**
     * @Filter\StripTags()
     * @Filter\Trim()
     * @Filter\StripNewlines()
     *
     * @var string
     */
    public $email;

    /**
     * @AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything
     *
     * @var int
     */
    public $age;

    /**
     * @ThisHadBetterNotBe(ThisHadBetterNotBe::NULL)
     * @ThisHadBetterNotBe(ThisHadBetterNotBe::NEGATIVE)
     *
     * @var int
     */
    public $detentions;

}
