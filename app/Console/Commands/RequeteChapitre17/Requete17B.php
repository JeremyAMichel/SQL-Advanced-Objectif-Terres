<?php

namespace App\Console\Commands\RequeteChapitre17;

use Illuminate\Console\Command;

class Requete17B extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete17B';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Utilise le querybuilder lister tous les utilisateurs dont le code postal commence par 6 ou 0';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $users = app('db')
            ->table('users')
            ->where(function ($query) {
                $query->where('zip_code_id', 'LIKE', '6%')
                    ->orWhere('zip_code_id', 'LIKE', '0%');
            })
            ->get();

        foreach ($users as $user) {
            $userProperties = get_object_vars($user);
            foreach ($userProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
