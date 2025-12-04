<?php
require_once "../jpgraph/jpgraph.php";
require_once "../jpgraph/jpgraph_pie.php";
require_once "../jpgraph/jpgraph_pie3d.php";

$file_name = "Galicia_population.txt";


// Some data
$data = array(50, 36, 21, 33);

// Create the Pie Graph. 
$graph = new PieGraph(350, 250);

$theme_class = new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("A Simple 3D Pie Plot");

// Create
$p1 = new PiePlot3D($data);

$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(0);
$graph->Stroke();
