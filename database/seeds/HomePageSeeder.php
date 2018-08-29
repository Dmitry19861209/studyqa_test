<?php

use App\Models\HomePage;
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
        HomePage::truncate();
        HomePage::create([
            'title' => 'Главная страница'
        ]);
    }
}
