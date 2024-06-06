<?php

namespace App\Console\Commands\RequeteChapitre16;

use Illuminate\Console\Command;

class Requete16A extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete16A';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Créer une view qui reprendra toutes les données de ads et de land_seek_ads';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        // Suppression de la vue si elle existe déjà
        app('db')->statement("DROP VIEW IF EXISTS ads_and_land_seek_ads");
    
        // Création de la vue
        app('db')->statement("
            CREATE VIEW ads_and_land_seek_ads AS
            SELECT ads.id as ads_id, ads.user_admin_id, ads.user_pp_id, ads.is_draft, ads.accept_share_contact_infos,
            ads.title, ads.about_content, ads.created_at, ads.updated_at, land_seek_ads.id as land_seek_ads_id,
            land_seek_ads.is_bio, land_seek_ads.experience_farming, land_seek_ads.ad_id, land_seek_ads.surface_range_min,
            land_seek_ads.surface_range_max, land_seek_ads.created_at AS land_seek_ads_created_at, land_seek_ads.updated_at AS land_seek_ads_updated_at 
            FROM ads
            JOIN land_seek_ads ON ads.id = land_seek_ads.ad_id
        ");
    
        echo "Vue 'ads_and_land_seek_ads' créée avec succès.\n";
    }
}
