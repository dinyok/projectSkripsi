<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect('/home');
        }
        return view('/login1');
    }
 
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
 
        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
 
        Auth::attempt($data);
 
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            // dd(Auth::user()->hasRole('admin'));
            return redirect('/home');
 
        } else { // false
 
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect('/login1');
        }
    }

    public function showFormForgetPassword()
    {
        return view('/forgetPassword');
    }

    public function forgetPassword(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'pin'                   => 'required|integer',
            'password'              => 'required|confirmed'
        ];
 
        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'pin.required'          => 'Pin wajib diisi',
            'pin.integer'           => 'Pin harus berupa integer',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = User::all()->where('email', $request->email);
        // $data = [
        //     'email'     => $request->input('email'),
        //     'pin'       => $request->input('pin'),
        // ];
 
        // Auth::attempt($data);

        if(count($user) == 0){
            Session::flash('error', 'Email atau pin salah');
            return redirect('/forgetPassword');
        }
        else{
            $user = $user->first();
        }

        if ($request->pin == $user->pin) { 
            $user->password = Hash::make($request->password);
            $simpan = $user->save();
 
            if($simpan){
                Session::flash('success', 'Ganti Password berhasil! Silahkan login untuk mengakses data');
                return redirect('/login1');
            } else {
                Session::flash('errors', ['' => 'Ganti Password gagal! Silahkan ulangi beberapa saat lagi']);
                return redirect('/forgetPassword');
            }
        } else { 
 
            Session::flash('error', 'Email atau pin salah');
            return redirect('/forgetPassword');
        }
    }

    public function showFormRegister()
    {
        return view('/register');
    }

    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'pin'                   => 'required|numeric|digits:6',
            'password'              => 'required|confirmed'
        ];
 
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'pin.required'          => 'Pin wajib diisi',
            'pin.numeric'           => 'Pin harus berupa angka',
            'pin.digits'            => 'Pin harus 6 karakter',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->pin = $request->pin;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->assignRole('user');
        $simpan = $user->save();
 
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect('/login1');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect('/register');
        }
    }
 
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect('/login1');
    }
}
