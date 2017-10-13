<?php

class Student{

public $Sid;
public $name;
public $gender;

public function __construct($Sid, $name, $gender)
{
    $this->Sid = $Sid;
    $this->name = $name;
    $this->gender = $gender;
}
}
?>