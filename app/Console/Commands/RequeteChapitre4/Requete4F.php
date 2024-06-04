<?php

namespace App\Console\Commands\RequeteChapitre4;

use Illuminate\Console\Command;

class Requete4F extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete4F';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Affiche le premier document uploadé par chaque utilisateur';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $userFirstDocuments = app('db')->select("SELECT users.id, users.name, users.first_name, (
            SELECT documents.name 
            FROM documents 
            WHERE documents.user_id = users.id 
            ORDER BY documents.created_at ASC 
            LIMIT 1
          ) as nameDocument 
          FROM users");


        foreach ($userFirstDocuments as $userFirstDocument) {
            $userFirstDocumentProperties = get_object_vars($userFirstDocument);
            foreach ($userFirstDocumentProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
