<?php

use Illuminate\Database\Seeder;
use App\Models\Url;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Url::create([
        	'short_code' => 'selrjklwerlke',
        	'full_url' => url('/'),
        	'counter' => 1,
        	'expiry' => false
        ]);
    }
}
