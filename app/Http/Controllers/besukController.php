<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Besuk;
use App\Models\Tahanan;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class besukController extends Controller
{
    public function index() {
        if ((auth()->user()->image != null) && (auth()->user()->ktp != null)) {
            $name = $_GET['name'] ?? '';
            $nik = $_GET['nik'] ?? '';
            $besuk = Besuk::where('user_id', auth()->user()->id)->when($name != '', function ($query) use ($name) {
                                $query->whereHas('tahanan', function ($query) use ($name) {
                                    $query->where('nama', 'LIKE', "%{$name}%");
                                });
                            })->when($nik != '', function ($query) use ($nik) {
                                $query->whereHas('tahanan', function ($query) use ($nik) {
                                    $query->where('nik', 'LIKE', "%{$nik}%");
                                });
                            })->paginate(10);
           
            return view('user.besuk.index', compact('besuk'));
        } else {
            alert()->info('Perhatian', 'Update Data Foto dan KTP terlebih dahulu!');
            return redirect()->route('dashboard');
        }
    }

    public function tahanan()
    {
        $tahanan = Tahanan::all();
        return view('user.besuk.tahanan', compact('tahanan'));
    }

    public function create()
    {
        $tahanan = $_GET['tahanan'] ?? '';
        $data_tahanan = Tahanan::when($tahanan != '', function ($query) use ($tahanan) {
                            $query->where('id', $tahanan);
                        })->first();

        return view('user.besuk.create', compact('data_tahanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hubungan' => 'required',
            'keperluan' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $besuk = Besuk::create([
                'user_id' => auth()->user()->id,
                'tahanan_id' => $request->id_tahanan,
                'hubungan' => $request->hubungan,
                'keperluan' => $request->keperluan,
            ]);
            DB::commit();
            alert()->success('Success', 'Data Besuk Berhasil Dikirim');
            return redirect()->route('besuk.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function show($id)
    {
        $besuk = Besuk::where('user_id', auth()->user()->id)->where('id', $id)->first();
        return view('user.besuk.show', compact('besuk'));
    }

    public function cetak_pdf($id)
    {
        $besuk = Besuk::where('user_id', auth()->user()->id)->where('id', $id)->first();
        $pdf = PDF::loadview('user.besuk.besuk_pdf',['besuk'=>$besuk]);
        return $pdf->stream();
    }

    public function destroy($id)
    {
        Besuk::where('id', $id)->delete();
        alert()->success('Success', 'Data Laporan Besuk Berhasil Dihapus!');
        return redirect()->route('besuk.index');
    }
}
