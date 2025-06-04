<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function saveRegister(Request $request)
    {
        /** @var \Illuminate\Contracts\Validation\Validator $validator */
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'telephone' => 'nullable|string|max:20',
            'addresse' => 'nullable|string|max:100',
        ]);
        
        if ($validator->fails()) { 
            
            
            throw ValidationException::withMessages($validator->errors()->toArray());
           
        }
        
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'telephone'=>$request->telephone,
            'addresse'=>$request->addresse,
            'password' => Hash::make($request->password),
        ]);
  
        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginPost(Request $request)
    {
        /** @var \Illuminate\Contracts\Validation\Validator $validator */
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
  
        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
  
        $request->session()->regenerate();
  
        return redirect()->route('dashboard');
    }
  
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/');
    }
}
