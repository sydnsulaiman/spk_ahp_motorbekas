<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash, File;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Showroom;
use App\Http\Controllers\MainController;



class LoginController extends Controller
{
    //
    public function index(){
        // dd('login view');
        // session()->flush();
        // dd(Auth::guard('web')->user());
        // dd(Auth::user());

        if(Auth::user()){
            return Redirect::to(url()->previous());
        }

        return view('auth.login');
    }
    public function register(){

        return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/');
    }

    
    public function postShowroom(Request $request){
        // dd($request);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        // dd(Auth::guard('showroom')->attempt($credentials), $credentials);
        // dd(Auth::guard('web'), Auth::check());  


        if(Auth::guard('showroom')->attempt($credentials)){
            // dd(Auth::guard('showroom')->user());
            
            return redirect('profile-showroom');

        }
        if(Auth::attempt($credentials)){
            // dd(Auth::guard('web'), Auth::check());
            
            return redirect('perhitungan');

        }
        return redirect("login")->with('deleted', 'Login Failed');
    }

    public function storeRegisterShowroom(Request $request){
        $request->validate([
            'nama_showroom' => 'required|unique:showrooms,nama_showroom',
            'email' => 'required|unique:showrooms,email',
            'nama_pic' => 'required',
            'password' => 'required',
            'tahun_berdiri' => 'required',
            'no_hp' => 'required',
        ]);
        // dd($request);
        $input = $request->except(['_token']);
        $input['password'] = Hash::make($request->password);
        
        // dd($input);
        $data = MainController::store(Showroom::class, $input);
        // $data = Showroom::create($input);
        // dd($data);
        return view('auth.login');
    }

    // public function post(Request $request){
    //     // dd($request);
    //     $request->validate([
    //         'name' => 'required',
    //         'password' => 'required'
    //     ]);
    //     $credentials = $request->only('name', 'password');
    //     // dd($credentials);
    //     if(Auth::attempt($credentials)){
    //         // dd(Auth::user());
    //         $tipe = Auth::user()->tipe;
    //         $redirect = 'algoritma';
    //         if($tipe === 'operator'){
    //             $redirect = 'pasar';
    //         }
    //         if($tipe === 'bendahara'){
    //             $redirect = 'pembayaran';
    //         }
    //         // if($tipe === 'kadis'){
    //         //     $redirect = 'dashboard';
    //         // }
    //         // dd($redirect);
    //         return redirect()->intended($redirect)
    //                         ->withSuccess('Login Successful');

    //     }
    //     return redirect("login")->with('deleted', 'Login Failed');
    // }
    // public function postShowroom(Request $request){
    //     // dd($request);
    //     $request->validate([
    //         'nama_showroom' => 'required',
    //         'password' => 'required'
    //     ]);
    //     $credentials = $request->only('nama_showroom', 'password');
    //     // dd($credentials);
    //     if(Auth::guard('showroom')->attempt($credentials)){
    //         // dd(Auth::guard('showroom')->user());
            
    //         return redirect('showroom-profile');

    //     }
    //     return redirect("login-showroom")->with('deleted', 'Login Failed');
    // }

   

   

    
}
