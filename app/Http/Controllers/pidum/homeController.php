<?php

namespace App\Http\Controllers\pidum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Besuk;
use App\Models\Tahanan;
use Carbon\Carbon;

class homeController extends Controller
{
    public function index() {
        $user = User::all();
        $expiredUser = User::where('expired_date', '<=', Carbon::now())->get();
        $tahanan = Tahanan::all();
        $besuk = Besuk::where('status', 'Menunggu Konfirmasi')->get();
        return view('pidum.home.index', compact('user', 'expiredUser', 'tahanan', 'besuk'));
    }
}
