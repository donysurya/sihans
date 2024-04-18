<?php

namespace App\Http\Controllers\pidum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Besuk;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class archiveController extends Controller
{
    public function index() {
        $name = $_GET['name'] ?? '';
        $nik = $_GET['nik'] ?? '';
        $user = User::onlyTrashed()->when($name != '', function ($query) use ($name) {
                            $query->where('nama', 'LIKE', "%{$name}%");
                        })->when($nik != '', function ($query) use ($nik) {
                            $query->where('nik', 'LIKE', "%{$nik}%");
                        })->paginate(10);
        return view('pidum.archive.data-user.index', compact('user'));
    }

    public function show($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->first();
        return view('pidum.archive.data-user.show', compact('user'));
    }

    public function restore($id)
    {
        try {
            DB::beginTransaction();
            User::onlyTrashed()->where('id', $id)->update([
                'expired_date' => Carbon::now()->addDays(3),
            ]);
            User::onlyTrashed()->where('id', $id)->restore();
            DB::commit();
            alert()->success('Success', 'Data Pengunjung Berhasil Dikembalikan');
            return redirect()->route('pidum.archive.user');
        } catch (\Exception $exception) {
            DB::rollBack();
            alert()->error('ooppss','theres something wrong. Error Code '. $exception->getCode());
            return back();
        }
    }

    public function besuk_index() {
        $name = $_GET['name'] ?? '';
        $nik = $_GET['nik'] ?? '';
        $besuk = Besuk::where('status', 'Selesai')->when($name != '', function ($query) use ($name) {
            $query->whereHas('tahanan', function ($query) use ($name) {
                $query->where('nama', 'LIKE', "%{$name}%");
            });
        })->when($nik != '', function ($query) use ($nik) {
            $query->whereHas('tahanan', function ($query) use ($nik) {
                $query->where('nik', 'LIKE', "%{$nik}%");
            });
        })->paginate(10);
        return view('pidum.archive.laporan-besuk.index', compact('besuk'));
    }

    public function besuk_show($id)
    {
        $besuk = Besuk::where('id', $id)->first();
        return view('pidum.archive.laporan-besuk.show', compact('besuk'));
    }
}
