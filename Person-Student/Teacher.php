<?php
require_once "Person.php";

class Teacher extends Person
{
    protected $module;
    private $salary;

    public function __construct($name, $city, $age, $module)
    {
        parent::__construct($name, $city, $age);
        $this->module = $module;
    }

    public function get_module()
    {
        return $this->module;
    }

    public function set_salary($salary)
    {
        if (!$salary > 0) {
            return;
        } else {
            $this->salary = $salary;
        }
    }

    public function introduction()
    {
        echo parent::introduction() . ", Soy maestro y doy el modulo de {$this->get_module()}<br>";
    }
}