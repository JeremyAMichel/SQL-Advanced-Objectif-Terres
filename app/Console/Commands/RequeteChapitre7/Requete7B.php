<?php

namespace App\Console\Commands\RequeteChapitre7;

use Illuminate\Console\Command;

class Requete7B extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete7B';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Récupére toutes les annonces de type recherche de foncier';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $annonces = app('db')->select("SELECT ads.id, ads.title 
        FROM ads 
        WHERE EXISTS (
          SELECT land_seek_ads.id 
          FROM land_seek_ads 
          WHERE land_seek_ads.ad_id = ads.id
        )");


        foreach ($annonces as $annonce) {
            $annonceProperties = get_object_vars($annonce);
            foreach ($annonceProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
