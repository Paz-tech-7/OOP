<?php
require_once "../../../jpgraph/jpgraph.php";
require_once "../../../jpgraph/jpgraph_line.php";



$file_name = "Backend_languages.txt";


$years = array();
$language_names = array();
$all_data = array();

$colors = ["#6495ED", "#B22222", "#FF1493", "#000000" , "#7ee664"];
if (($fileReader = fopen($file_name, "r")) !== false) {
    $row_count = 0;

    while (($data = fgets($fileReader)) !== false) {
        $row_count++;

        $fields = array_map('trim', explode(',', $data));

        if ($row_count == 1) {
            $language_names = array_slice($fields, 1);

            foreach ($language_names as $name) {
                $all_data[$name] = array();
            }
            continue;
        }

        if (count($fields) >= 2) {
            $years[] = $fields[0];

            // Comenzamos en $i = 1 para saltar la columna de 'Año'
            for ($i = 1; $i < count($fields); $i++) {
                // $i - 1 es necesario porque $language_names empieza en el índice 0
                // pero $fields empieza en el índice 1 (después de 'Año')
                $language_name = $language_names[$i - 1];

                // Limpiar el símbolo '%' y convertir a entero
                $value = (int) str_replace('%', '', $fields[$i]);

                $all_data[$language_name][] = $value;
            }
        }
    }
    fclose($fileReader);
} else {
    die("Error: No se pudo abrir el archivo de datos " . $file_name);
}
// Setup the graph
$graph = new Graph(650, 500);
$graph->SetScale("textlin");

$theme_class = new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Backend languages');
$graph->SetBox(false);

$graph->SetMargin(40, 20, 36, 150);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false, false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($years);
$graph->xgrid->SetColor('#E3E3E3');

/*PYTHON
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Python');

//NODE
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('Node.js');

//JAVA
$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#FF1493");
$p3->SetLegend('Java');

//PHP
$p4 = new LinePlot($datay4);
$graph->Add($p4);
$p4->SetColor("#000000");
$p4->SetLegend('PHP');*/


$color_index = 0;
foreach ($all_data as $language => $data_points) {
    $p = new LinePlot($data_points);

    $graph->Add($p);

    $p->SetColor($colors[$color_index % count($colors)]);
    $p->SetLegend($language);

    $color_index++;
}


$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();
?>


