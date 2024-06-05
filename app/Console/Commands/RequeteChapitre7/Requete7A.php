<?php

namespace App\Console\Commands\RequeteChapitre7;

use Illuminate\Console\Command;

class Requete7A extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete7A';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Récupére toutes les annonces de type offre de foncier';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $annonces = app('db')->select("SELECT ads.*, land_offer_ads.id as offre_de_vente 
        FROM ads 
        INNER JOIN land_offer_ads 
            ON land_offer_ads.ad_id = ads.id 
        WHERE EXISTS( 
          SELECT * 
          FROM land_offer_ads 
          WHERE land_offer_ads.ad_id = ads.id 
        );");


        foreach ($annonces as $annonce) {
            $annonceProperties = get_object_vars($annonce);
            foreach ($annonceProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
