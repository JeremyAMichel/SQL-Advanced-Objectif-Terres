<?php

namespace App\Console\Commands\RequeteChapitre4;

use Illuminate\Console\Command;

class Requete4A extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete4A';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Liste tous les utilisateurs dont le code postal commence par 6 ou 0';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $users = app('db')->select("SELECT * FROM users 
        INNER JOIN cities 
             ON users.zip_code_id = cities.id 
         WHERE cities.zip_code LIKE '6%' OR cities.zip_code LIKE '0%';");


        foreach ($users as $user) {
            $userProperties = get_object_vars($user);
            foreach ($userProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
