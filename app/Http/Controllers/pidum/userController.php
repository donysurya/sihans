<?php

namespace App\Http\Controllers\pidum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function index() {
        $name = $_GET['name'] ?? '';
        $nik = $_GET['nik'] ?? '';
        $user = User::when($name != '', function ($query) use ($name) {
                            $query->where('nama', 'LIKE', "%{$name}%");
                        })->when($nik != '', function ($query) use ($nik) {
                            $query->where('nik', 'LIKE', "%{$nik}%");
                        })->paginate(10);
        return view('pidum.data-user.index', compact('user'));
    }

    public function create()
    {
        $pendidikan = array("Tidak Sekolah", "SD", "SMP", "SMA/SMK", "Diploma 1", "Diploma 3", "Diploma 4", "Strata 1 (S1)", "Strata 2 (S2)", "Strata 3 (Dr)");
        return view('pidum.data-user.create', compact('pendidikan'));
    }

    public function user_login($id)
    {
        Auth::guard('web')->loginUsingId($id, true);
        return redirect(route('dashboard'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'pekerjaan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'phone' => 'required',
            'pendidikan' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
                'pekerjaan' => $request->pekerjaan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'phone' => $request->phone,
                'pendidikan' => $request->pendidikan,
                'password' => $request->password,
                'expired_date' => Carbon::now()->addDays(3),
            ]);
            DB::commit();
            alert()->success('Success', 'Data Pengunjung Berhasil Ditambahkan');
            return redirect()->route('pidum.user');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            dd($request);
            // return back();
        }
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('pidum.data-user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $pendidikan = array("Tidak Sekolah", "SD", "SMP", "SMA/SMK", "Diploma 1", "Diploma 3", "Diploma 4", "Strata 1 (S1)", "Strata 2 (S2)", "Strata 3 (Dr)");
        return view('pidum.data-user.edit', compact('user', 'pendidikan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'pekerjaan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'phone' => 'required',
            'pendidikan' => 'required',
        ]);

        try {
            DB::beginTransaction();
            User::where('id', $id)->update([
                'name' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
                'pekerjaan' => $request->pekerjaan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'phone' => $request->phone,
                'pendidikan' => $request->pendidikan,
            ]);
            DB::commit();
            alert()->success('Success', 'Data Pengunjung Berhasil Diubah');
            return redirect()->route('pidum.user');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        alert()->success('Success', 'Data Pengunjung Berhasil Dihapus!');
        return redirect()->route('pidum.user');
    }
}
