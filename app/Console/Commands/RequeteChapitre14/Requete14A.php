<?php

namespace App\Console\Commands\RequeteChapitre14;

use Illuminate\Console\Command;

class Requete14A extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete14A';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Appelle une procédure stockée recevant deux paramètres (l\id d\une ville et la distance en km) 
    capable de trouver toutes les villes voisines dans le rayon indiqué';

    // La procédure stockée en question : 
    // 
    // DELIMITER //
    // CREATE PROCEDURE FindNearbyCities(IN city_id INT, IN distance_km DOUBLE)
    // BEGIN
    //   SELECT b.name, 
    //         111.111 *
    //          DEGREES(ACOS(LEAST(1.0, COS(RADIANS(a.gps_lat))
    //               * COS(RADIANS(b.gps_lat))
    //               * COS(RADIANS(a.gps_lng - b.gps_lng))
    //               + SIN(RADIANS(a.gps_lat))
    //               * SIN(RADIANS(b.gps_lat))))) AS distance_in_km
    //        FROM cities AS a
    //        JOIN cities AS b ON a.id <> b.id
    //      WHERE a.id = city_id 
    //      HAVING distance_in_km <= distance_km
    //      ORDER BY distance_in_km ASC;
    // END //
    // DELIMITER ;

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $city_id = $this->ask('Veuillez entrer l\'ID de la ville'); 
        $distance_km = $this->ask('Veuillez entrer la distance en kilomètres');

        $nearbyCities = app('db')->select("CALL FindNearbyCities(?, ?)", array($city_id, $distance_km));

        foreach ($nearbyCities as $city) {
            $cityProperties = get_object_vars($city);
            foreach ($cityProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
        }
    }
}
