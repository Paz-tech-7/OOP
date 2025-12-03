<?php
class Person
{
    protected $name;
    protected $city;
    protected $age;
    public function __construct($name, $city, $age)
    {
        $this->name = $name;
        $this->city = $city;
        $this->age = $age;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_city()
    {
        return $this->city;
    }

    public function get_age()
    {
        return $this->age;
    }

    public function introduction()
    {
        return "Hola mi nombre es {$this->get_name()}, tengo {$this->get_age()} vivo en {$this->get_city()}";
    }
}

?>