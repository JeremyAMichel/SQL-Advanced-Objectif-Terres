<?php

namespace App\Console\Commands\RequeteChapitre12;

use Illuminate\Console\Command;

class Requete12A extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete12A';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'requêtes préparées de 10A';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {

        // TODO

        try {
            app('db')->beginTransaction();
        
            $admin_id = 24;
            $pp_id = 24;
            $is_draft = 0;
            $accept_share_contact_infos = 1;
            $title = 'Mon titre';
            $about_content = 'lorem ipsum';
            $about_project_content = 'lorem ipsum';
        
            app('db')->insert('INSERT INTO ads (user_admin_id, user_pp_id, is_draft, accept_share_contact_infos, title, about_content, about_project_content, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, CURRENT_DATE(), CURRENT_DATE())', [$admin_id, $pp_id, $is_draft, $accept_share_contact_infos, $title, $about_content, $about_project_content]);
        
            $ad_id = app('db')->getPdo()->lastInsertId();
        
            $is_bio = 1;
            $experience_farming = "lorem ipsum";
            $surface_range_min = 14;
            $surface_range_max = 69;
        
            app('db')->insert('INSERT INTO land_seek_ads(is_bio, experience_farming, ad_id, surface_range_min, surface_range_max, created_at, updated_at)
            VALUES(?, ?, ?, ?, ?, CURRENT_DATE(), CURRENT_DATE())', [$is_bio, $experience_farming, $ad_id, $surface_range_min, $surface_range_max]);
        
            $locationable_ad_id = 7;
            $locationable_ad_type = "regions";
            $radius = NULL;
        
            app('db')->insert('INSERT INTO locationable_ads(ad_id, locationable_ad_id, locationable_ad_type, radius, created_at, updated_at)
            VALUES(?, ?, ?, ?, CURRENT_DATE(), CURRENT_DATE())', [$ad_id, $locationable_ad_id, $locationable_ad_type, $radius]);
        
            app('db')->commit();
        
            echo "Les ligne ont bien été insérées dans la table.\n";
        } catch (\Exception $e) {
            app('db')->rollback();
            echo "Une erreur est survenue : " . $e->getMessage() . "\n";
        }
    }
}
