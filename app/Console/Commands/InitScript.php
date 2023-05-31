<?php

namespace App\Console\Commands;

use App\Models\Company;
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

        $companyFaker=Faker::create();
        $company_name=$companyFaker->name;
        $taxNumber=$companyFaker->numberBetween(10000000000,99999999999);
        $phone_number=$companyFaker->phoneNumber;
        $company_email=$companyFaker->email;
        Company::create([
            'company_name'=>$company_name,
            'taxNumber'=>$taxNumber,
            'phone_number'=>$phone_number,
            'company_email'=>$company_email,
        ]);
        $this->info("A generált cég neve: $company_name");
        $this->info("A generált cég adó száma: $taxNumber");
        $this->info("A generált cég email címe: $company_email");
        $this->info("A generált cég telefonszáma: $phone_number");
    }
}