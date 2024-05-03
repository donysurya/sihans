<?php

namespace App\Http\Controllers\pidum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tahanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class tahananController extends Controller
{
    public function index() {
        $name = $_GET['name'] ?? '';
        $nik = $_GET['nik'] ?? '';
        $tahanan = Tahanan::when($name != '', function ($query) use ($name) {
                            $query->where('nama', 'LIKE', "%{$name}%");
                        })->when($nik != '', function ($query) use ($nik) {
                            $query->where('nik', 'LIKE', "%{$nik}%");
                        })->paginate(10);
        return view('pidum.data-tahanan.index', compact('tahanan'));
    }

    public function create()
    {
        $pendidikan = array("Tidak Sekolah", "SD", "SMP", "SMA/SMK", "Diploma 1", "Diploma 3", "Diploma 4", "Strata 1 (S1)", "Strata 2 (S2)", "Strata 3 (Dr)");
        return view('pidum.data-tahanan.create', compact('pendidikan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'no_tahanan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'perkara' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:2048',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
        ]);

        try {
            DB::beginTransaction();
            // $path = Storage::putFile(
            //     'public/tahanan',
            //     $request->file('file'),
            // );

            //File Upload
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'tahanan/'.$request->nama;
            $file->move($tujuan_upload,$nama_file);

            $tahanan = Tahanan::create([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'no_tahanan' => $request->no_tahanan,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'perkara' => $request->perkara,
                'image' => $nama_file,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pendidikan' => $request->pendidikan,
            ]);
            DB::commit();
            alert()->success('Success', 'Data Tahanan Berhasil Ditambahkan');
            return redirect()->route('pidum.tahanan');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $tahanan = Tahanan::where('id', $id)->first();
        return view('pidum.data-tahanan.show', compact('tahanan'));
    }

    public function edit($id)
    {
        $tahanan = Tahanan::where('id', $id)->first();
        $pendidikan = array("Tidak Sekolah", "SD", "SMP", "SMA/SMK", "Diploma 1", "Diploma 3", "Diploma 4", "Strata 1 (S1)", "Strata 2 (S2)", "Strata 3 (Dr)");
        return view('pidum.data-tahanan.edit', compact('tahanan', 'pendidikan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'no_tahanan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'perkara' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $admin = auth()->guard('pidum')->user()->id;
            Tahanan::where('id', $id)->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'no_tahanan' => $request->no_tahanan,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'perkara' => $request->perkara,
                'updated_by' => $admin,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pendidikan' => $request->pendidikan,
            ]);
            DB::commit();
            alert()->success('Success', 'Data Tahanan Berhasil Diubah');
            return redirect()->route('pidum.tahanan');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function image($id)
    {
        $tahanan = Tahanan::where('id', $id)->first();
        return view('pidum.data-tahanan.image', compact('tahanan'));
    }

    public function update_image(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:2048',
        ]);

        try {
            DB::beginTransaction();
            // $path = Storage::putFile(
            //     'public/tahanan',
            //     $request->file('file'),
            // );

            //File Upload
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'tahanan/'.$request->nama;
            $file->move($tujuan_upload,$nama_file);

            $admin = auth()->guard('pidum')->user()->id;
            Tahanan::where('id', $id)->update([
                'image' => $nama_file,
                'updated_by' => $admin,
            ]);
            DB::commit();
            alert()->success('Success', 'Foto Tahanan Berhasil Diubah');
            return redirect()->route('pidum.tahanan');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Tahanan::where('id', $id)->delete();
        alert()->success('Success', 'Data Tahanan Berhasil Dihapus!');
        return redirect()->route('pidum.tahanan');
    }
}
