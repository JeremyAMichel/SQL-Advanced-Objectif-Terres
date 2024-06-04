<?php

namespace App\Console\Commands\RequeteChapitre4;

use Illuminate\Console\Command;

class Requete4E extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete4E';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Liste le nombre de documents uploadés par des utilisateurs qui sont de type image';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $documentsByUser = app('db')->select("SELECT count(documents.id), users.name, users.first_name FROM `documents` 
        JOIN users ON users.id = documents.user_id
        WHERE type LIKE 'image%'
        GROUP BY users.id");


        foreach ($documentsByUser as $documentsByUser) {
            $documentsByUserProperties = get_object_vars($documentsByUser);
            foreach ($documentsByUserProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
