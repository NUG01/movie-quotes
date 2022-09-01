<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class RegisterNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register:new-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command new user from Artisan';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $username=$this->ask('Your username');
        $email=$this->ask('Your email');
        $password=$this->ask('Your password');

        User::create([
            'username'=>$username,
            'email'=>$email,
            'password'=>bcrypt($password)
        ]);
    }
}
