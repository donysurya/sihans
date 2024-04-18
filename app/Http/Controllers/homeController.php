<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Besuk;
use App\Models\Tahanan;
use Carbon\Carbon;

class homeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function dashboard()
    {
        $besuk = Besuk::where('user_id', auth()->user()->id)->where('status','Selesai')->get();
        $besuk_ditolak = Besuk::where('user_id', auth()->user()->id)->where('status','Ditolak')->get();
        return view('user.home.index', compact('besuk', 'besuk_ditolak'));
    }
}
