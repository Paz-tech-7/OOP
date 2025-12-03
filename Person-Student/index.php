<?php
require_once "Student.php";
require_once "Teacher.php";


$teacherDeser = new Teacher("Luis", "Ourense", 50, "Desarrollo Web en Entorno Servidor");
$teacherDeser -> set_salary(1500);

$teacherDiw = new Teacher("Jorge", "Ourense", 50, "Diseño de Interfaces");
$teacherDiw -> set_salary(1500);


$teachers = [
    $teacherDeser,
    $teacherDiw
];


$estudiante1 = new Student("Johan", "Ourense", 19, "DAW");

echo $estudiante1->introduction();

echo "<hr>";

$estudiante1 ->add_module("Desarrollo Web en Entorno Servidor", $teachers);
$estudiante1 ->add_module("Diseño de Interfaces",$teachers);
$estudiante1 ->add_module("Programacion", $teachers);

echo "<hr>";

$estudiante1 -> show_modules();

echo "<hr>";


echo $teacherDeser->introduction();
echo $teacherDiw->introduction();

echo "<hr>";