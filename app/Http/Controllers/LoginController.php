<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
  public function index()
  {
    return view('welcome');
  }
  //
  public function proses_login(Request $request)
  {
    // Validasi username dan password wajib diisi
    $request->validate([
      'username' => 'required',
      'password' => 'required'
    ]);

    // Ambil data request username & password saja
    $credential = $request->only('username', 'password');


    if (Auth::attempt($credential)) {
      // Kalau berhasil simpan data user ya di variabel $user
      $user = Auth::user();

      // Cek lagi jika level user admin maka arahkan ke halaman admin
      if ($user->role == 'admin') {
        return redirect()->intended('/admin/operator');
      }
      // Tapi jika level user nya user biasa maka arahkan ke halaman user
      else if ($user->role == 'operator') {
        return redirect()->intended('/operator/dashboard');
      }
      // Tentukan pesan sukses login dalam format JSON
      $response = [
        'success' => true,
        'message' => 'Login successful',
        'user' => $user
      ];

      return response()->json($response);
    }

    // Jika tidak ada data user yang valid maka kembalikan lagi ke halaman login
    // Pastikan kirim pesan error juga kalau login gagal ya
    return redirect('login')
      ->withInput()
      ->withErrors(['login_gagal' => 'These credentials does not match our records']);
  }


  public function logout(Request $request)
  {
    // logout itu harus menghapus session nya 

    $request->session()->flush();

    // jalan kan juga fungsi logout pada auth 

    Auth::logout();
    // kembali kan ke halaman login
    return Redirect('/login');
  }
}
