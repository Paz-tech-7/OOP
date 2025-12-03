<?php
require_once "Person.php";
require_once "Teacher.php";

class Student extends Person
{
    protected $group;
    protected $modules;
    public function __construct($name, $city, $age, $group)
    {
        parent::__construct($name, $city, $age);
        $this->group = $group;
        $this->modules = [];
    }

    public function get_group()
    {
        return $this->group;
    }

    public function add_module($nameModule, $teachers)
    {
        $is_taught = false;

        foreach($teachers as $teacher){
            if($teacher instanceof Teacher && $teacher -> get_module() === $nameModule){
                $is_taught = true;
                break;
            }
        }
        if(!$is_taught){
            echo "El modulo {$nameModule} no puede ser matriculado por el alumno, puesto no hay un profesor que lo imparta<br>";
            return;
        }



        if (in_array($nameModule, $this->modules) && !$is_taught) {
            echo "El modulo $nameModule ya existe para el alumno {$this->get_name()}";
        } else {
            $this->modules[] = $nameModule;
            echo "Modulo $nameModule agregado correctamente<br>";
        }
    }
    
    public function show_modules(){
        if(empty($this->modules)){
            echo "El alumno {$this->get_name()} no ha matriculado ningun modulo<br>";
            return null;
        }
        echo "Modulos Matriculados por: {$this->get_name()}";
        echo "<ul>";
        foreach($this->modules as $module){
            echo "<li>$module</li>";
        }
        echo "</ul>";
        return $this->modules;
    }
    public function introduction(){
        echo parent::introduction() . " y estudio {$this->group}<br>";
    }

}