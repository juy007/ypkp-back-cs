<?php
//https://makitweb.com/insert-update-and-delete-record-from-mysql-in-laravel/
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\M_login;
use App\Models\M_user;
use Session;
use Auth;

class Login extends Controller 
{ 
	public function index() {
		return view('login/form_login');
	}

	public function authentication(Request $request) {
		// Validate the form data
		 $credentials = $request->validate([
			'username' => 'required',
			'password' => 'required',
			'level' => 'required'
		]);
		 
		
		 
	    if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 			
 			$dataUser = M_user::data_user($request->username);
 			session()->put('idCs',  $dataUser->id_user);
 			session()->put('namaCs',  $dataUser->nama);
 			session()->put('emailCs',  $dataUser->email);
 			session()->put('usernameCs',  $dataUser->username);
 			session()->put('passwordCs',  $dataUser->password);
 			//session()->put('theme', 'semi-dark');
 			session()->put('theme', 'semi-dark');
 			//session()->put('theme', 'light-theme');

 			
            return redirect()->intended('dashboard');
        }else{
        	Session::flash('notif_gagal','Username atau password salah');
			return back();
		}

	    // Passwordnya pake bcrypt
		//if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
		//	return redirect()->intended('/warga');
		
		 /*else if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
			return redirect()->intended('/user');
		}*/

	}

	public function logout(Request $request)
	{
	    Auth::logout();
	 
	    $request->session()->invalidate();
	 
	    $request->session()->regenerateToken();
	 
	    return redirect('/login');
	}
}