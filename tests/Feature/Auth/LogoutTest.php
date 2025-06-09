<?php

namespace Feature\Auth;

use App\Modules\Auth\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class LogoutTest
 * @package Tests\Feature\Auth
 */
class LogoutTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     */
    public function testLogOutSuccess()
    {
        $user = User::factory()->create();
        $token = $user->createToken('api-token', [])->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => "Bearer $token"
        ])->deleteJson(route('auth.logout'));
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    /**
     * @return void
     */
    public function testLogOutFail()
    {
        $response = $this->withHeaders([
            'Authorization' => "Bearer NO token"
        ])->deleteJson(route('auth.logout'));
        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
