<?php

namespace Feature\Auth;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


/**
 * Class RegisterTest
 * @package Tests\Feature\Auth
 */
class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function testRegisterSuccess()
    {
        $response = $this->postJson(route('auth.register', [
            "name" => 'first_name',
            "email" => "test.98@gmail.com",
            "password" => "Secret123!",
            "password_confirmation" => "Secret123!"
        ]));
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @dataProvider badDataProvider
     * @param array $data
     * @return void
     */
    public function testRegisterFail(array $data)
    {
        $response = $this->postJson(route('auth.register', $data));
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @return array[]
     */
    public static function badDataProvider(): array
    {
        return [
            [[

            ]],
            [[
                "first_name" => '',
                "last_name" => "",
                "email" => "test.98",
                "password" => "11!",
                "password_confirmation" => "22!"
            ]]
        ];
    }
}
