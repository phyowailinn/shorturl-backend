<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Url as UrlResource;
use App\Http\Requests\UrlRequest;
use App\Http\Requests\UserRequest;
use Cache;
use App\Models\Url;
use App\Models\Hasher;

class ApiController extends Controller
{
    /**
     * Create url info.
     *
     * @param App\Http\Requests\UrlRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function generateUrl(UrlRequest $request)
    {
        $hash = new Hasher;

    	$url = Url::create([
    		'short_code' => $hash->generate(),
    		'full_url' => $request->url,
		]);

		return UrlResource::make($url);
    }

    /**
     * Edit url info.
     *
     * @param Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function editUrl(Request $request)
    {
        $this->validate($request, ['data' => 'required','value' => 'date|after:now']);

        $url = Url::whereShortCode($request->data)->firstOrFail();
        $url->update(['expiry' => $request->value]);
       
        return response()->json('success', 201);
    }

    /**
     * Redirect to url by its code.
     *
     * @param string $code
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectUrl(Request $request)
    {  
        $code = $request->code;

        $url = Cache::rememberForever("url.$code", function () use ($code) {
            return Url::whereShortCode($code)->first();
        });

    	if( $url ) {
    		if( $url->hasExpired ) {
    			return response()->json('fails', 410);
    		} 

    		$url->increment('counter');

    		return (new UrlResource($url))->response()->setStatusCode(302);
        } 

        return response()->json('fails', 410);
    }
}
