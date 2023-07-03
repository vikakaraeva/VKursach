<?php

namespace Tests\Feature;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\UserModel;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_post_register()
    {
        //проверка входа на страницу кабинета
        session_destroy();

        $_SESSION['id'] = 16;

        $response = $this->get('/cabinet');

        $response->assertOk();
    }
}
