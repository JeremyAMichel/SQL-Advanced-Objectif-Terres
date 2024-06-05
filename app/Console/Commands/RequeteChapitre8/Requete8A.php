<?php

namespace App\Console\Commands\RequeteChapitre8;

use Illuminate\Console\Command;

class Requete8A extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete8A';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trouve les demandeurs qui sont dans la même région que des offreurs et proposent des types de production identique';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $annonces = app('db')->select("SELECT regions.name, ads.title, users.name, land_offer_ads.id 
        FROM regions 
        INNER JOIN departments 
            ON regions.code = departments.region_code 
        INNER JOIN cities 
            ON departments.code = cities.department_code 
        INNER JOIN users 
             ON cities.id = users.zip_code_id 
        INNER JOIN ads 
            ON users.id = ads.user_pp_id 
        INNER JOIN land_offer_ads 
            ON users.id = land_offer_ads.ad_id 
         WHERE ads.is_draft = 0 AND regions.id = 15");


        foreach ($annonces as $annonce) {
            $annonceProperties = get_object_vars($annonce);
            foreach ($annonceProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
