<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use File;
use Session;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class adminPageController extends Controller
{
    //
    public function index()
    {
        //$users = User::all()->except(Auth::id());
        $users = User::withTrashed()->get();
        return view('adminPage' , ['users' => $users]);
    }

    public function create()
    {
        //
    }

    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        Session::flash('success', 'User Berhasil Dihapus');
        return redirect('/adminPage');
    }
    public function restore($id)
    {
        $Users = User::onlyTrashed()->where('user_id',$id);
        // dd($documents);
        $Users->restore();
        Session::flash('success', 'User Berhasil Dikembalikan');
        return redirect()->back();
    }
}
