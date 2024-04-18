<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class settingController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $pendidikan = array("Tidak Sekolah", "SD", "SMP", "SMA/SMK", "Diploma 1", "Diploma 3", "Diploma 4", "Strata 1 (S1)", "Strata 2 (S2)", "Strata 3 (Dr)");
        return view('user.setting.index', compact('user', 'pendidikan'));
    }

    public function update_image(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/pengunjung/images',
                $request->file('file'),
            );
            User::where('id', $id)->update([
                'image' => $path,
            ]);
            DB::commit();
            alert()->success('Success', 'Foto Profil Berhasil Diubah');
            return back();
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function update_ktp(Request $request, $id)
    {
        $request->validate([
            'ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:2000',
        ]);

        try {
            DB::beginTransaction();
            $path = Storage::putFile(
                'public/pengunjung/ktp',
                $request->file('ktp'),
            );
            User::where('id', $id)->update([
                'ktp' => $path,
            ]);
            DB::commit();
            alert()->success('Success', 'Foto KTP Berhasil Diubah');
            return back();
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'pekerjaan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'phone' => 'required',
            'pendidikan' => 'required',
        ]);

        try {
            DB::beginTransaction();
            User::where('id', auth()->user()->id)->update([
                'name' => $request->nama,
                'nik' => $request->nik,
                'pekerjaan' => $request->pekerjaan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'phone' => $request->phone,
                'pendidikan' => $request->pendidikan,
            ]);
            DB::commit();
            alert()->success('Success', 'Data Berhasil Diubah');
            return back();
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
        ]); 

        $user = User::find(auth()->user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            alert()->error('Error','Current password does not match!');
            return back();
        }

        $user->password = $request->password;
        $user->save();

        alert()->success('Success','Password successfully changed!');
        return back();
    }
}
