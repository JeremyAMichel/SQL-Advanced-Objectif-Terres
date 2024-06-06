<?php

namespace App\Console\Commands\RequeteChapitre15;

use Illuminate\Console\Command;

class Requete15A extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete15A';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test le trigger ci-dessous, qui est chargé d\'écouter les modifications de la table ads et de les historiser dans la table ads_history.';

    // LE TRIGGER :
    // 
    // DELIMITER //
    // CREATE TRIGGER ads_after_update
    // AFTER UPDATE ON ads
    // FOR EACH ROW
    // BEGIN
    //     IF OLD.title != NEW.title OR OLD.about_content != NEW.about_content OR OLD.about_project_content != NEW.about_project_content THEN
    //         INSERT INTO ads_history (ad_id, old_title, new_title, old_about_content, new_about_content, old_about_project_content, new_about_project_content)
    //         VALUES (OLD.id, OLD.title, NEW.title, OLD.about_content, NEW.about_content, OLD.about_project_content, NEW.about_project_content);
    //     END IF;
    // END //
    // DELIMITER ;

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        // Mise à jour de l'annonce avec l'id 132
        app('db')->update("UPDATE ads SET title = 'Nouveau titre', about_project_content = 'Nouveau contenu du projet' WHERE id = 132");

        // Récupération de la dernière entrée de la table d'historisation
        $historyEntries = app('db')->select("SELECT * FROM ads_history ORDER BY changed_at DESC LIMIT 1");

        foreach ($historyEntries as $entry) {
            $entryProperties = get_object_vars($entry);
            foreach ($entryProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
