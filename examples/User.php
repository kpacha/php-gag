<?php

namespace Example;

//Import Annotations
use DMS\Filter\Rules as Filter;
use Kpacha\PhpGag\Filter\AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything;
use Kpacha\PhpGag\Filter\ThisHadBetterBe;
use Kpacha\PhpGag\Filter\ThisHadBetterNotBe;

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
