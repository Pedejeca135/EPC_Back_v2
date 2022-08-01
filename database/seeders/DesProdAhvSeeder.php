<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\estandares\elementos\Producto;
use App\Models\estandares\elementos\Desempenyo;
use App\Models\estandares\elementos\ActitudHabitoValor;

class DesProdAhvSeeder extends Seeder
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
    {        //
        if ($file = fopen(__DIR__ . "\csvForSeed\Des_Prod_AHV" . ".csv", "r")) {
            while (!feof($file)) {
                $line = fgets($file);
                // echo ("$line");
                if ($line) {
                    if ($line[0] != "#") {
                        $positionS = $this->arrayOfCsvRow($line, "|");
                        $firstColum = substr($line, 0, $positionS[0]);
                        // echo ($positionS[0] - 1);
                        $secondColum = substr($line, $positionS[0] + 1, $positionS[1] - $positionS[0] - 1);
                        $thirdColum = substr($line, $positionS[1] + 1, $positionS[2]  - $positionS[1] - 1);
                        $fourthColum = substr($line, $positionS[2] + 1,  $positionS[3] - $positionS[2] - 1);
                        $qColum = substr($line, $positionS[3] + 1, strlen($line) - $positionS[3]);

                        $elemento = "";
                        if ($thirdColum == 'D') {
                            $elemento = new Desempenyo();
                        } else if ($thirdColum == 'P') {
                            $elemento = new Producto();
                        } else if ($thirdColum == 'A') {
                            $elemento = new ActitudHabitoValor();
                        }

                        $elemento->type = $thirdColum;

                        $elemento->elemento_id = $secondColum;
                        $elemento->descripcion = $thirdColum;
                        $elemento->number = $fourthColum;

                        //la calificacion maxima en default s

                        // $titulo =  substr($line, $positionS[1] + 1, strlen($line) - $positionS[1]);
                        // $nuevoCriterio->titulo =  $titulo;
                        // // echo ($titulo);

                        $elemento->save();
                    }
                }
                // echo ("\n");
            }
            fclose($file);
        }
    }
}