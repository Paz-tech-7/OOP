<?php
require_once "../jpgraph/jpgraph.php";
require_once "../jpgraph/jpgraph_pie.php";
require_once "../jpgraph/jpgraph_pie3d.php";


$fileName = "Galicia_population.txt";
$data = array();
$labels = array();
$t_colors = array("#FF0000", "#0000FF", "#FFFF00", "#008000");

if (($FileReader = fopen($fileName, "r")) !== false) {
    while (($line = fgets($FileReader)) !== false) {
        $fieldsData = array_map('trim', explode(',', $line));

        if (count($fieldsData) >= 2) {
            $provinceName = $fieldsData[0];

            $populationValue = (int) $fieldsData[1];

            $data[] = $populationValue;
            $labels[] = $provinceName;
        }
    }
    fclose($FileReader);
}


// Create the Pie Graph. 
$graph = new PieGraph(500, 400);

$theme_class = new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("Poblacion de las ciudades Gallegas (%)");

// Create
$p1 = new PiePlot3D($data);

$p1->SetSliceColors($t_colors);


$p1->SetLegends($labels);


$graph->legend->Pos(0.15, 0.9, "right", "center");



$p1->value->Show();
$p1->value->SetColor("black");
$p1->value->SetFormat('%1.1f%%');


$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(2);

$graph->Add($p1);
$graph->Stroke();
