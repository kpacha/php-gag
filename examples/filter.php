<?php

require_once '../vendor/autoload.php';

use DMS\Filter\Mapping\ClassMetadataFactory,
    DMS\Filter\Filter,
    Doctrine\Common\Annotations\AnnotationReader,
    Kpacha\PhpGag\Mapping\Loader\AnnotationLoader;

//Get Doctrine Reader
$reader = new AnnotationReader();

//Load AnnotationLoader
$filterLoader = new AnnotationLoader($reader);

//Get a Filter
$filter = new Filter(new ClassMetadataFactory($filterLoader));

//Get your Entity
require 'User.php';
$user = new Example\User();
$user->name = "My <b>name</b>";
$user->email = " email@mail.com";
$user->detentions = 3;
//$user->detentions = -4; // throws an exception!!!

//Filter you entity
$filter->filterEntity($user);

var_dump($user);