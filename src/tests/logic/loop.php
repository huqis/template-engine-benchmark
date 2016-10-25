<?php

class Data {

    public $id;

    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

$scalarValues = [];
for ($i = 0; $i < $number; $i++) {
    $scalarValues[] = 'scalar value';
}

$arrayValues = [];
for ($i = 0; $i < $number; $i++) {
    $arrayValues[] = [
        'id' => $i,
        'name' => 'name',
    ];
}

$objectValues = [];
for ($i = 0; $i < $number; $i++) {
    $object = new Data('name');
    $object->id = $i;

    $objectValues[] = $object;
}

$combinedValues = [];
for ($i = 0; $i < $number; $i++) {
    $name = 'name';

    $object = new Data($name);
    $object->id = $i;

    $combinedValues[] = [
        'id' => $i,
        'name' => $name,
        'object' => $object,
    ];
}

$variables = [
    'scalarValues' => $scalarValues,
    'arrayValues' => $arrayValues,
    'objectValues' => $objectValues,
    'combinedValues' => $combinedValues,
];
