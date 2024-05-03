<?php

namespace App\Http\Controllers\pidum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Besuk;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class besukController extends Controller
{
    public function index() {
        $name = $_GET['name'] ?? '';
        $nik = $_GET['nik'] ?? '';
        $besuk = Besuk::where('status','!=','Selesai')->when($name != '', function ($query) use ($name) {
            $query->whereHas('tahanan', function ($query) use ($name) {
                $query->where('nama', 'LIKE', "%{$name}%");
            });
        })->when($nik != '', function ($query) use ($nik) {
            $query->whereHas('tahanan', function ($query) use ($nik) {
                $query->where('nik', 'LIKE', "%{$nik}%");
            });
        })->paginate(10);
        return view('pidum.laporan-besuk.index', compact('besuk'));
    }

    public function show($id)
    {
        $besuk = Besuk::where('id', $id)->first();
        return view('pidum.laporan-besuk.show', compact('besuk'));
    }

    public function cetak_pdf($id)
    {
        $besuk = Besuk::where('id', $id)->first();
        $pdf = PDF::loadview('pidum.laporan-besuk.besuk_pdf',['besuk'=>$besuk]);
        return $pdf->stream();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tgl_kunjungan' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'file' => 'required|file|max:2048'
        ]);

        try {
            DB::beginTransaction();

            //File Upload
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'file';
            $file->move($tujuan_upload,$nama_file);

            Besuk::where('id', $id)->update([
                'status' => $request->status,
                'nomor_surat' => $request->nomor_surat,
                'tgl_kunjungan' => $request->tgl_kunjungan,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                't10' => $nama_file,
            ]);
            DB::commit();
            alert()->success('Success', 'Data Berhasil Di Konfirmasi');
            return back();
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function destroy($id)
    {
        Besuk::where('id', $id)->delete();
        alert()->success('Success', 'Data Laporan Besuk Berhasil Dihapus!');
        return redirect()->route('pidum.besuk');
    }
}
