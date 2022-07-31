<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Estandar;

class EstandarSeeder extends Seeder
{

    protected function arrayOfCsvRow($strToSplit, $strLimiter)
    {
        $lastPos = 0;
        $positions = array();

        while (($lastPos = strpos($strToSplit, $strLimiter, $lastPos)) !== false) {
            $positions[] = $lastPos;
            $lastPos = $lastPos + strlen($strLimiter);
        }
        return $positions;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  //CREANDO UN ESTANDAR
        //  $estandar1 = new Estandar();
        //  $estandar1->codigo = "NUSTC001.01";

        //  $estandar1->titulo = "Preparación de órganos para ajuste en banco" ;
        //  $estandar1->proposito = "Servir como referente para la evaluación de las personas que trabajan como ayudantes en el 
        //  desarmado de piezas y componentes para su ajuste en banco.
        //  Asimismo, puede ser referente para el desarrollo de programas de capacitación y de formación 
        //  basados en NTCL.";
        //  $estandar1->descripcion = "" ;

        //  $estandar1->comite_desarrollo = "Sistema de Transporte Colectivo";
        //  $estandar1->nivel_id = 1;
        //  $estandar1->modulo_ocupacional = "Mecánicos de vehículos de motor";
        //  $estandar1->link_documento = ;

        //  //CREANDO UN ESTANDAR
        //  $estandar2 = new Estandar();
        //  $estandar2->codigo = "NUSTC004.01";

        //  $estandar2->titulo = "Preparación del diferencial para su mantenimiento" ;
        //  $estandar2->proposito = "Servir como referente para la evaluación y capacitación de las personas que preparan el diferencial 
        //  para su mantenimiento desmontando y desarmando las partes que lo integran.
        //  Asimismo, puede ser referente para el desarrollo de programas de capacitación y de formación 
        //  basados en NTCL.
        //  ";
        //  $estandar2->descripcion = "" ;

        //  $estandar2->comite_desarrollo = "Sistema de Transporte Colectivo";
        //  $estandar2->nivel_id = 1;
        //  $estandar2->modulo_ocupacional = "Mecánicos de vehículos de motor";
        //  $estandar2->link_documento = ;

        // $unFileX = file_get_contents(__DIR__ . "\ARF2" . ".csv");
        // echo ($unFileX);
        //lee el archivo CSV de los estandares que se adquirieron desde los pdf
        if ($file = fopen(__DIR__ . "\csvForSeed\EstandaresScrapped" . ".csv", "r")) {
            while (!feof($file)) {
                $line = fgets($file);
                // echo ("$line");
                if ($line)
                    if ($line[0] != "#") {
                        //CREANDO UN ESTANDAR
                        $positionS = $this->arrayOfCsvRow($line, ",");
                        $estandar2 = new Estandar();

                        $linkDoc = substr($line, 0, $positionS[0]);
                        $estandar2->link_documento =  $linkDoc;
                        // echo ($linkDoc);

                        $codigo =  substr($line, $positionS[0] + 1, $positionS[1] - $positionS[0] - 1);
                        $estandar2->codigo =  $codigo;
                        // echo ($codigo);

                        $titulo =  substr($line, $positionS[1] + 1, strlen($line) - $positionS[1]);
                        $estandar2->titulo =  $titulo;
                        // echo ($titulo);

                        $estandar2->proposito = "";
                        $estandar2->save();
                    }
            }
            // echo ("\n");
        }
        fclose($file);
    }
}