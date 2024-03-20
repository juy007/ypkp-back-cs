<?php
//https://makitweb.com/insert-update-and-delete-record-from-mysql-in-laravel/
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;
use PDF;
use File;
use App\Models\M_user;
use Session;

class User extends Controller 
{ 
	  public function __construct()
    {
        $this->back_url='http://localhost/ypkpback/public/';
        //$this->back_url='https://super.pascasarjanausbypkp.ac.id/public/';
    }
	
	public function change_theme(Request $request) 
	{
		$theme = $request->input('theme');
		session()->put('theme', $theme);
		$callback = array('notif' => 'true');

		return $callback;
	}

	public function index() 
	{
		
		$data['back_url'] = $this->back_url;
		return view('index', ['data'=> $data]);
	}
//Pendaftaran===========================================================================
	public function pendaftaran() 
	{
		$data['back_url'] = $this->back_url;
		$data['data'] = M_user::gelombang_show();

		return view('pendaftaran', ['data'=> $data]);
	}
	public function data_pmb($id_gelombang) 
	{
		$data['back_url'] = $this->back_url;
		$data['gelombang'] =M_user::get_where_gelombang($id_gelombang);
		$data['pmb'] = M_user::pmb_show($id_gelombang);
		return view('data_pmb', ['data'=> $data]);
	}


	public function data_pmb_detail($id) 
	{
		$data['back_url'] = $this->back_url;
		$data['data'] = M_user::pmb_select($id);
		$data['gelombang'] = M_user::get_where_gelombang($data['data']->id_gelombang);
		return view('data_pmb_detail', ['data'=> $data]);
	}

	public function data_pmb_cetak($id) 
	{
		$data['data'] = M_user::pmb_select($id);
		$data['back_url'] = $this->back_url;
		$data['gelombang'] = M_user::get_where_gelombang($data['data']->id_gelombang);
		return view('data_pmb_cetak', ['data'=> $data]);
	}

	 public function data_pmb_pdf($id) {
       
        $data['data'] = M_user::pmb_select($id);
        $data['back_url'] = $this->back_url;
		$data['gelombang'] = M_user::get_where_gelombang($data['data']->id_gelombang);
  
        $pdf = PDF::loadView('data_pmb_pdf', ['data' => $data]);
        
        return $pdf->download('Data_calon_mahasiswa_'.$data['data']->nama.'.pdf');
        
      }
//PendaftaranEnd========================================================================

//akun==================================================================================
	public function ubah_profil() 
	{
		$data['data'] = M_user::admin_show();
		return view('profil', ['data'=> $data]);
	}

	public function update_profil(Request $request) 
	{
		$id = $request->input('id');
		$nama = $request->input('nama');
		$username = $request->input('username');
		$password = $request->input('password');

		if (empty($password)) {
			$data = array('nama'=>$nama, 'username'=>$username);
		}else{
			$data = array('nama'=>$nama, 'username'=>$username, 'password'=>bcrypt($password));	
		}

		$save = M_user::update_profil($id, $data);

		if($save == '1'){
	 		session()->put('namaCs',  $nama);
	 		session()->put('usernameCs',  $username);
			Session::flash('notif_sukses','Profil berhasil diupdate');
		}else{
			Session::flash('notif_gagal','Profil gagal diupdate');
		}
		return redirect("/ubah-profil");
	}

}