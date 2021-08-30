<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;

class profileController extends Controller
{
    public function index()
    {
        return view('profile');
    }
    public function changeProfile(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35'
        ];
 
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = User::all()->where('user_id', Auth::user()->user_id);
        $user = $user->first();
        
        $user->name = ucwords(strtolower($request->name));
        $simpan = $user->save();

        if($simpan){
            Session::flash('success', 'Ganti Profile berhasil!');
            return redirect()->back();
        } else {
            Session::flash('errors', ['' => 'Ganti Profile gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->back();
        }
    }

    public function ShowFromChangePassword()
    {
        return view('changePassword');
    }

    public function changePassword(Request $request)
    {
        $rules = [
            'passwordLama'              => 'required|string',
            'password'                  => 'required|confirmed'
        ];
 
        $messages = [
            'passwordLama.required'     => 'Password lama wajib diisi',
            'passwordLama.string'       => 'Password harus berupa string',
            'password.required'         => 'Password wajib diisi',
            'password.confirmed'        => 'Password tidak sama dengan konfirmasi password'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = User::all()->where('user_id', Auth::user()->id);
        $user = $user->first();
        $data = [
            'email'     => $user->email,
            'password'  => $request->input('passwordLama'),
        ];
 
        Auth::attempt($data);
 
        if (Hash::check($request->passwordLama,$user->password)) {
            $user->password = Hash::make($request->password);
            $simpan = $user->save();
 
            if($simpan){
                Session::flash('success', 'Ganti Password berhasil!');
                return redirect('/profile');
            } else {
                Session::flash('errors', ['' => 'Ganti Password gagal! Silahkan ulangi beberapa saat lagi']);
                return redirect()->back();
            }
        } else {
            Session::flash('error', 'Password Lama salah');
            return redirect()->back();
        }
    }
}
