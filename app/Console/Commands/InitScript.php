<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Console\Command;

class InitScript extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init-script';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize script to create random user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $faker = Faker::create();
        $name = $faker->userName;
        $password = $faker->password;
        $email = $faker->email;
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        $this->info("A generált felhasználó neve: $name");
        $this->info("A generált felhasználó email címe: $email");
        $this->info("A generált felhasználó jelszava: $password");

        /*
        $specifiedName = '2FA-user';
        $specifiedEmail = '2FA@user.com';
        $specifiedPassword = '2FA_USER';

        User::create([
            'name' => $specifiedName,
            'email' => $specifiedEmail,
            'password' => Hash::make($specifiedPassword),
        ]);

        $this->info("A megadott felhasználó neve: $specifiedName");
        $this->info("A megadott felhasználó email címe: $specifiedEmail");
        $this->info("A megadott felhasználó jelszava: $specifiedPassword");
        */
    }
}