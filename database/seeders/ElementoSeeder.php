<?php

namespace Database\Seeders;

use App\Models\estandares\elementos\Elemento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElementoSeeder extends Seeder
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

        if ($file = fopen(__DIR__ . "\csvForSeed\Elementos" . ".csv", "r")) {
            while (!feof($file)) {
                $line = fgets($file);
                // echo ("$line");
                if ($line) {
                    if ($line[0] != "#") {
                        // echo ($line);
                        //CREANDO UN ESTANDAR
                        $positionS = $this->arrayOfCsvRow($line, "|");
                        foreach ($positionS as $pos)
                            // echo ($pos);
                            $nuevoElemento = new Elemento();

                        $codigo = substr($line, 0, $positionS[0]);
                        $nuevoElemento->codigo =  $codigo;
                        // echo ($linkDoc);

                        $estandarId =  substr($line, $positionS[0] + 1, $positionS[1] - $positionS[0] - 1);
                        $nuevoElemento->estandar_competencia_id =  $estandarId;
                        // echo ($codigo);

                        $titulo =  substr($line, $positionS[1] + 1, strlen($line) - $positionS[1]);
                        $nuevoElemento->titulo =  $titulo;
                        // echo ($titulo);

                        $nuevoElemento->save();
                    }
                }
            }
            // echo ("\n");
        }
        fclose($file);
    }
}