<?php

namespace Tests\Unit;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImagesTest extends TestCase
{
    const IMAGES_PATH = 'texts';

    /**
     * Доступность страницы галереи
     */
    public function testNewsPage()
    {
        $response = $this->get('/images');

        $response->assertStatus(200);
    }

    /**
     * Загрузка файла.
     *
     * @return void
     */
    public function testFileUpload()
    {
        Storage::fake(self::IMAGES_PATH);

        Storage::disk(self::IMAGES_PATH)->put('file.txt', 'Contents');

        // Assert the file was stored...
        Storage::disk(self::IMAGES_PATH)->assertExists('file.txt');

        // Assert a file does not exist...
        Storage::disk(self::IMAGES_PATH)->assertMissing('missing.jpg');
    }
}
