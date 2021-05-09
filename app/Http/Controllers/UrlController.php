<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\UrlRequest;
use Cache;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $urls = Url::query();

            return Datatables::of($urls)->editColumn('created_at', function ($data) {
                        return $data->created_at->diffForHumans();
                    })->addColumn('actions', function ($url) {
                        return view('admin.url.actions', compact('url'))->render();
                    })->rawColumns(['actions'])->make();
        }

        return view('admin.url.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function edit(Url $url)
    {
        return view('admin.url.edit', compact('url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Url $url)
    {   
        $url->update([
            'full_url' => $request->full_url,
            'short_code' => $request->short_code,
            'counter' =>  $request->counter,
            'expiry' =>  $request->expiry
        ]);

        return redirect()->route('admin.url.index')->withFlashSuccess('Url have been submitted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {   
        $url->delete();

        return redirect()->route('admin.url.index')->withFlashSuccess('Url have been submitted!');
    }
}
