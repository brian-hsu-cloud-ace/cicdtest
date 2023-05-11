<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_api_returns_a_response(): void
    {
        if ( env('APP_ENV') === "local" )
        {
            $response = $this->withHeaders
            ([
                'Api-Token' => 'v0HFh8a4BVWJQXQ2joqv',
            ])
                ->post('/api/test');
            $response = $this->post('/api/test');
            $response->dump();
            $response->assertSuccessful();
        }else{
            $response = $this->post('/api/test');
            $response->dump();
            $response->assertSuccessful();
            exit(1);
        }

    }
}