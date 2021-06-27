<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FilePondTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_file_upload_process()
    {
        Storage::fake('public');

        $testImage = UploadedFile::fake()->image('testImage.jpg');

        $response = $this->post('/filepond/process', ['filepond' => $testImage]);

        $uniqueID = $response->content();

        $filePath = 'filepond/tmp/'.$uniqueID.'/testImage.jpg';

        Storage::disk('public')->assertExists($filePath);

        $response->assertSee($uniqueID);
    }
}
