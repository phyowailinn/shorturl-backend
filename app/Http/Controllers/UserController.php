<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {

            $users = User::query();

            return Datatables::of($users)->editColumn('created_at', function ($data) {
                    return $data->created_at->diffForHumans();
                })->make();
        }

        return view('admin.user.index');
    }
}
