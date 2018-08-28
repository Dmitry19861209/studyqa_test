<?php

use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\HomePage::create([
            'title' => 'Главная страница'
        ]);
    }
}
