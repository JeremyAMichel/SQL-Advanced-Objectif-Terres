<?php

namespace App\Console\Commands\RequeteChapitre9;

use Illuminate\Console\Command;

class Requete9A extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete9A';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pour une ville donnée, trie toutes les autres villes par ordre de distance';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $villes = app('db')->select("SELECT b.name, 
        111.111 *
         DEGREES(ACOS(LEAST(1.0, COS(RADIANS(a.gps_lat))
              * COS(RADIANS(b.gps_lat))
              * COS(RADIANS(a.gps_lng - b.gps_lng))
              + SIN(RADIANS(a.gps_lat))
              * SIN(RADIANS(b.gps_lat))))) AS distance_in_km
       FROM cities AS a
       JOIN cities AS b ON a.id <> b.id
      WHERE a.name LIKE 'Ouches' ORDER BY distance_in_km");


        foreach ($villes as $ville) {
            $villeProperties = get_object_vars($ville);
            foreach ($villeProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
