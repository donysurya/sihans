<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pendidikan = array("Tidak Sekolah", "SD", "SMP", "SMA/SMK", "Diploma 1", "Diploma 3", "Diploma 4", "Strata 1 (S1)", "Strata 2 (S2)", "Strata 3 (Dr)");
        $jenis_kelamin = array("Laki-laki", "Perempuan");

        return view('auth.register', compact('pendidikan', 'jenis_kelamin'));
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        // try {
        //     DB::beginTransaction();
        //     $user = User::create($request->validated());
        //     DB::commit();
        //     auth()->login($user);
        //     alert()->success('Selamat', 'Akun telah teregristrasi, mohon menunggu hingga akun di konfirmasi oleh Petugas Pidum');
        //     return redirect()->route('login.show');
        // } catch (\Exception $exception) {
        //     DB::rollBack();
        //     alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
        //     dd($request);
        //     return back();
        // }

        $user = User::create($request->validated());

        auth()->login($user);

        alert()->success('Congratulation', 'Account successfully registered.');
        return redirect()->route('login.show');

        
    }
}
