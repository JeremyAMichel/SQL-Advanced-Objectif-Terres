<?php

namespace App\Console\Commands\RequeteChapitre10;

use Illuminate\Console\Command;

class Requete10A extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete10A';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insére une annonce de recherche de foncier, avec les données de votre choix mais en remplissant 100% de tout ce qui est disponible, dans une transaction qui garantit l\'intégrité des données de bout en bout';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        try {
            app('db')->beginTransaction();
        
            $sql1 = "INSERT INTO ads (user_admin_id, user_pp_id, is_draft, accept_share_contact_infos, title, about_content, about_project_content, created_at, updated_at) 
            VALUES (50, 50, 1, 0, 'Recherche terre pour réinstallation urgent', 'terre pour réinstallation urgent
            Sed velit ratione architecto ex velit. Distinctio', 'Soluta dolores laboriosam aut eaque iure. Ratione ..', CURRENT_DATE(), CURRENT_DATE())";
            app('db')->insert($sql1);
        
            $ad_id = app('db')->getPdo()->lastInsertId();
        
            $sql2 = "INSERT INTO land_seek_ads (is_bio, experience_farming, ad_id, surface_range_min, surface_range_max, created_at, updated_at)
            VALUES (1, 'Merci aux clients fidèles', $ad_id, 35, 70, CURRENT_DATE(), CURRENT_DATE())";
            app('db')->insert($sql2);
        
            app('db')->commit();
        
            echo "La ligne a bien été insérée dans la table.\n";
        } catch (\Exception $e) {
            app('db')->rollback();
            echo "Une erreur est survenue : " . $e->getMessage() . "\n";
        }
    }
}
