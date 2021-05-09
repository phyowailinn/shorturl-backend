<?php

namespace App\Observers;

use App\Models\Url;
use Cache;
use Log;

class UrlObserver
{
    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\Url  $url
     * @return void
     */
    public function updated(Url $url)
    {
        if( $url->expiry ) {
            Cache::forget("url.{$url->short_code}");
            Log::warning("Update: Remove cache name: url.{$url->short_code}");
        }    
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\Url  $url
     * @return void
     */
    public function deleted(Url $url)
    {
        Log::warning("Delete: Remove cache name: url.{$url->short_code}");
        Cache::forget("url.{$url->short_code}");
    }
}
