<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 

class M_user extends Model
{
    /*public $timestamps = false;
    use HasFactory;

    protected $table = 'warga';
        protected $primaryKey = 'id_warga';
        protected $fillable = ['nokk', 'nik', 'nama', 'input_warga'];
    }
    */
    public static function theme()
    {
        $value=DB::table('setting')->where('id_setting', '1')->first(); 
        return $value;
    }
    
    public static function pmb_show($id_gelombang)
    {
        $value=DB::table('pendaftar')->where('id_gelombang', $id_gelombang)->orderBy('id_pendaftar', 'desc')->get(); 
        return $value;
    }

     public static function pmb_select($id)
    {
        $value=DB::table('pendaftar')->where('id_pendaftar', $id)->first(); 
        return $value;
    }

     public static function pmb_hapus($id)
    {
        $save = DB::table('pendaftar')->where('id_pendaftar', $id)->delete(); 
        return $save;
    }

//link=======================================================================
    public static function link_show()
    {
        $value=DB::table('link')->orderBy('id_link', 'desc')->get(); 
        return $value;
    }
    public static function link_tambah($data)
    {
        $save = DB::table('link')->insert($data); 
        return $save;
    }
    public static function link_hapus()
    {
        $save = DB::table('link')->delete(); 
        return $save;
    }
    public static function link_hapus_select($id)
    {
        $save = DB::table('link')->where('id_link', $id)->delete(); 
        return $save;
    }
//linkEnd=======================================================================
//Gelombang=======================================================================
    public static function gelombang_show()
    {
        $value=DB::table('gelombang')->orderBy('id_gelombang', 'desc')->get(); 
        return $value;
    }

    public static function cek_gelombang()
    {
        return DB::table('gelombang')
            ->where('status_gelombang', 'aktiv')
            ->get(); 
            // ->where('tanggal_akhir','>', $tanggal_awal)
    }

    public static function simpan_gelombang($data)
    {
        $save = DB::table('gelombang')->insert($data);
        return $save;
    }

    public static function cek_jurusan_aktiv()
    {
        return DB::table('jurusan')->where('status_jurusan', 'aktiv')->get(); 
    }

     public static function status_gelombang($id_gelombang, $data)
    {
        $save = DB::table('gelombang')->where('id_gelombang', $id_gelombang)->update($data);
        return $save;
    }

    public static function hapus_gelombang($id_gelombang){
        return DB::table('gelombang')->where('id_gelombang', $id_gelombang)->delete();
    }

     public static function cek_pendaftaran($id_gelombang)
    {
        $value=DB::table('pendaftar')->where('id_gelombang', $id_gelombang)->get(); 
        return $value;
    }
     public static function get_where_gelombang($id_gelombang)
    {
        $value=DB::table('gelombang')->where('id_gelombang', $id_gelombang)->first(); 
        return $value;
    }

    public static function simpan_gelombang_perpanjang($id_gelombang, $data)
    {
        $save = DB::table('gelombang')->where('id_gelombang', $id_gelombang)->update($data);
        return $save;
    }
//GelombangEnd====================================================================
//Jurusan=========================================================================
    public static function jurusan_show()
    {
        $value=DB::table('jurusan')->orderBy('id_jurusan', 'desc')->get(); 
        return $value;
    }

    public static function cek_jurusan($jurusan)
    {
        return DB::table('jurusan')->where('nama_jurusan', $jurusan)->first(); 
    }

    public static function simpan_jurusan($data)
    {
        $save = DB::table('jurusan')->insert($data);
        return $save;
    }

      public static function status_jurusan($id_jurusan, $data)
    {
        $save = DB::table('jurusan')->where('id_jurusan', $id_jurusan)->update($data);
        return $save;
    }

    public static function hapus_jurusan($id_jurusan){
        return DB::table('jurusan')->where('id_jurusan', $id_jurusan)->delete();
    }
//JurusanEnd=======================================================================
//Akun=============================================================================
    public static function admin_show()
    {
        $value=DB::table('admin')->orderBy('id_admin', 'desc')->get(); 
        return $value;
    }
    public static function cek_email_admin($email)
    {
        $value=DB::table('admin')->where('email', $email)->get(); 
        return $value;
    }

    public static function cek_username_admin($username)
    {
        $value=DB::table('admin')->where('username', $username)->get(); 
        return $value;
    }

     public static function simpan_admin($data)
    {
        $save = DB::table('admin')->insert($data);
        return $save;
    }

    public static function admin_hapus($id_admin){
        return DB::table('admin')->where('id_admin', $id_admin)->delete();
    }

     public static function ambil_data_admin($id_admin)
    {
        return DB::table('admin')->where('id_admin', $id_admin)->first(); 
    }

    public static function simpan_admin_update($id, $data)
    {
        $save = DB::table('admin')->where('id_admin', $id)->update($data);
        return $save;
    }

    
    public static function cs_show()
    {
        $value=DB::table('user')->where('level', 'cs')->orderBy('id_user', 'desc')->get(); 
        return $value;
    }
     public static function cek_email_cs($email)
    {
        $value=DB::table('user')->where('email', $email)->get(); 
        return $value;
    }

    public static function cek_username_cs($username)
    {
        $value=DB::table('user')->where('username', $username)->get(); 
        return $value;
    }
    public static function simpan_cs($data)
    {
        $save = DB::table('user')->insert($data);
        return $save;
    }

     public static function cs_hapus($id_cs){
        return DB::table('user')->where('id_user', $id_cs)->delete();
    }

     public static function ambil_data_cs($id_cs)
    {
        return DB::table('user')->where('id_user', $id_cs)->first(); 
    }

    public static function simpan_cs_update($id, $data)
    {
        $save = DB::table('user')->where('id_user', $id)->update($data);
        return $save;
    }
//Akunend==========================================================================
//Setting==========================================================================
   
      public static function update_profil($id, $data)
    {
        $save = DB::table('user')->where('id_user', $id)->update($data);
        return $save;
    }
//SettingEnd=======================================================================

     public static function data_user($username)
    {
        return DB::table('user')
            ->where('username', $username)
            ->where('level', 'cs')
            ->first(); 
    }
}