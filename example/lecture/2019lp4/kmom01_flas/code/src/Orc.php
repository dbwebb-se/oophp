<?php

class Orc
{
    private $age = 42;
    //private $living "Somehwere";
    private $name = "Orb";

    public function setName(string $name) : string
    {
        $this->name = $name;

        return $this->name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }
}
