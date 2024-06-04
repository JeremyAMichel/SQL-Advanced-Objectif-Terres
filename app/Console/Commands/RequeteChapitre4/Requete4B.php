<?php

namespace App\Console\Commands\RequeteChapitre4;

use Illuminate\Console\Command;

class Requete4B extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete4B';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Liste tous les utilisateurs et leur département correspondant';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $users = app('db')->select("SELECT users.name AS name_user, departments.name AS departement FROM users 
        INNER JOIN cities 
            ON users.zip_code_id = cities.id INNER 
        JOIN departments 
            ON cities.department_code = departments.code;");


        foreach ($users as $user) {
            $userProperties = get_object_vars($user);
            foreach ($userProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
