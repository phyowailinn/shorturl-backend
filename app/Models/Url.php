<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Url extends Model
{
    protected $fillable = ['short_code','full_url','counter','expiry'];

    /**
     * Set the url's expiry.
     *
     * @param  string  $value
     * @return void
     */
    public function setExpiryAttribute($value)
    {
    	info(date('Y-m-d H:i:s', strtotime($value)));
        $this->attributes['expiry'] = date('Y-m-d H:i:s', strtotime($value));
    }

    /**
     * Return whether an url has expired.
     *
     * @return bool
     */
    public function getHasExpiredAttribute()
    {	
        if ($this->expiry == null) {
            return false;
        }

        $expiresAt = new Carbon($this->expiry);
        
        return ! $expiresAt->isFuture();
    }
}
