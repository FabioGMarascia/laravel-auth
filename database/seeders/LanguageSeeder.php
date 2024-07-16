<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $techJS = new Language();
        $techJS->name = "JavaScript";
        $techJS->icon = "fa-brands fa-js";
        $techJS->save();

        $techVue = new Language();
        $techVue->name = "VueJS";
        $techVue->icon = "fa-brands fa-vuejs";
        $techVue->save();

        $techPHP = new Language();
        $techPHP->name = "PHP";
        $techPHP->icon = "fa-brands fa-php";
        $techPHP->save();

        $techLaravel = new Language();
        $techLaravel->name = "Laravel";
        $techLaravel->icon = "fa-brands fa-laravel";
        $techLaravel->save();
    }
}
