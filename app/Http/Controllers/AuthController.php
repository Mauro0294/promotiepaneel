<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
      
    public function loginRequest(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('users')->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function register()
    {
        return view('auth.registration');
    }
      
    public function registerRequest(Request $request)
    {  
        $request->validate([
            'username' => 'required:unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->createUser($data);
         
        return redirect("/");
    }

    public function createUser(array $data)
    {
      return User::create([
        'username' => $data['username'],
        'password' => Hash::make($data['password']),
        'rank_id' => 1,
        'kluis' => 0,
      ]);
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('login');
    }
}