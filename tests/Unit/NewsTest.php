<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsTest extends TestCase
{
    /**
     * Доступность страницы списка новостей
     */
    public function testNewsPage()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    /**
     * Проверить, есть ли таблица news и заполнено ли поле
     */
    public function testDatabaseNewsCategoryField()
    {
        $this->assertDatabaseHas('news', [
            'category' => 'Происшествия'
        ]);
    }
}
