<?php

namespace App\Console\Commands\RequeteChapitre8;

use Illuminate\Console\Command;

class Requete8B extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete8B';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trouve les demandeurs qui sont dans le même département que des offreurs, et qui demande une surface min/max correspondante à une surface proposée par un offreur';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {

        /////TO FINISH
        $annonces = app('db')->select("SELECT
        users.name AS demandeur,
        offer_users.name AS offreur,
        land_seek_ads.surface_range_min,
        land_seek_ads.surface_range_max,
        land_offer_ads.surface
    FROM
        users
    JOIN
        land_seek_ads ON users.id = land_seek_ads.user_id
    JOIN
        ads AS seek_ads ON land_seek_ads.ad_id = seek_ads.id
    JOIN
        cities AS seek_cities ON users.zip_code_id = seek_cities.zip_code
    JOIN
        departments AS seek_departments ON seek_cities.department_code = seek_departments.code
    JOIN
        land_offer_ads ON land_offer_ads.surface BETWEEN land_seek_ads.surface_range_min AND land_seek_ads.surface_range_max
    JOIN
        ads AS offer_ads ON land_offer_ads.ad_id = offer_ads.id
    JOIN
        users AS offer_users ON offer_ads.user_pp_id = offer_users.id
    JOIN
        cities AS offer_cities ON offer_users.zip_code_id = offer_cities.zip_code
    JOIN
        departments AS offer_departments ON offer_cities.department_code = offer_departments.code
    WHERE
        seek_departments.code = offer_departments.code;
    ");


        foreach ($annonces as $annonce) {
            $annonceProperties = get_object_vars($annonce);
            foreach ($annonceProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
