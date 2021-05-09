<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Url;
use App\Models\Hasher;

class UrlGenerationTest extends TestCase
{
    /**
     * General validation
     *
     * @return void
     */
    public function testRequiredFieldsForUrl()
    {
        $this->json('POST','api/url/generate', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "url" => ["The url field is required."]
                ]
            ]);
    }

    /**
     * Blacklist validation
     *
     * @return void
     */
    public function testBlacklistFieldsForUrl()
    {
        \Config::set('shorturl.blacklist', 'darkweb');

        $payload = [
            'url' => "http://darkweb.com"
        ];

        $this->json('POST','api/url/generate', $payload, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "url" => ["This url contains blacklisted keyword."]
                ]
            ]);
    }

    /**
     * Make Hash
     *
     * @return void
     */
    public function testMakeHashForUrl()
    {
        $hash = new Hasher;
        $count = $hash->generate();

        $this->assertEquals(strlen($count), 6);
    }

    /**
     * If created 
     *
     * @return void
     */
    public function testSuccessfulCreateUrl()
    {
        $payload = [
            'url' => "http://dev.shorturl-maker.local/admin/url"
        ];

        $this->json('POST', 'api/url/generate', $payload, ['Accept' => 'application/json'])
             ->assertStatus(201)
             ->assertJsonStructure(
                 [
                     'data' => [
                         'id',
                         'short_code',
                         'url',
                         'short_url',
                         'expiry',
                     ]
                 ]
             );
    }

    /**
     * If udpated
     *
     * @return void
     */
    public function testSuccessfulEditUrl()
    {
        $url = Url::create([
            'full_url' => "http://dev.shorturl-maker.local/admin/url",
            'short_code' => 'Testmm',
        ]);

        $payload = [
            'data' => $url->short_code,
            'value' => now()->addHours(1),
        ];

        $this->json('POST', 'api/url/edit', $payload, ['Accept' => 'application/json'])
             ->assertStatus(201);
    }

    /**
     * valide redirect
     *
     * @return void
     */
    public function testRedirectUrl()
    {
        $url = Url::create([
            'full_url' => "http://dev.shorturl-maker.local/admin/url",
            'short_code' => 'Testmm',
        ]);

        $payload = [ 'code' => $url->short_code ];

        $this->json('POST', 'api/url/redirect', $payload, ['Accept' => 'application/json'])
             ->assertStatus(302)
             ->assertJsonStructure(
                 [
                     'data' => [
                         'id',
                         'short_code',
                         'url',
                         'short_url',
                         'expiry',
                     ]
                 ]
             );
    }

    /**
     * If any invalid redirect url.
     *
     * @return void
     */
    public function testRedirectInvalidUrl()
    {
        $url = Url::create([
            'full_url' => "http://dev.shorturl-maker.local/admin/url",
            'short_code' => 'Testmm',
            'expiry' => date('Y-m-d H:i:s', strtotime('-1 day', strtotime(now())))
        ]);
        
        $payload = [ 'code' => $url->short_code ];

        $this->json('POST', 'api/url/redirect', $payload, ['Accept' => 'application/json'])
             ->assertStatus(410);
    }
}
