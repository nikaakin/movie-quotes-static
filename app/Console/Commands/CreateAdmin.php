<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie-quotes:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = $this->ask('What is your name?');
        $email = $this->ask('What is your email?');
        $password = $this->secret('What is your password?');

        if ($name && $email && $password) {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'isAdmin' => true,
            ]);
            $this->info('Admin user created successfully!');
        } else {
            $this->error('Admin user not created!');
        }
    }
}
