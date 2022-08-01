<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\estandares\elementos\Criterio;

class CriterioSeeder extends Seeder
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
        //
        if ($file = fopen(__DIR__ . "\csvForSeed\Criterios" . ".csv", "r")) {
            while (!feof($file)) {
                $line = fgets($file);
                // echo ($line);
                if ($line) {
                    if ($line[0] != "#") {
                        // echo ($line);
                        $positionS = $this->arrayOfCsvRow($line, "|");
                        $firstColum = substr($line, 0, $positionS[0] - 1);
                        $secondColum = substr($line, $positionS[0] + 1, $positionS[1] - $positionS[0] - 1);
                        $thirdColum = substr($line, $positionS[1] + 1, strlen($line) - $positionS[1]);

                        echo ("\n" . $secondColum . "\n" . $thirdColum);
                        //CREANDO UN ESTANDAR

                        $nuevoCriterio = new Criterio();

                        // $xx =  substr($line, $positionS[0] + 1, $positionS[1] - $positionS[0] - 1);
                        // $nuevoCriterio->estandar_competencia_id =  $xx;
                        $nuevoCriterio->desemp_product_ahv_id = $secondColum;
                        $nuevoCriterio->enunciado = $thirdColum;
                        //la calificacion maxima en default s

                        // $titulo =  substr($line, $positionS[1] + 1, strlen($line) - $positionS[1]);
                        // $nuevoCriterio->titulo =  $titulo;
                        // // echo ($titulo);

                        $nuevoCriterio->save();
                    }
                }
            }
            // echo ("\n");
        }
        fclose($file);
    }
}