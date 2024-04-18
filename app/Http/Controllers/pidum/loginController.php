<?php

namespace App\Http\Controllers\pidum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class loginController extends Controller
{
    public function index() {
        return view('pidum.login.index');
    }

    public function login(Request $request) {
        $this->validator($request);

        if(Auth::guard('pidum')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authentication passed...
            return redirect()
                ->intended(route('pidum.home'))
                ->with('status','You are Logged in as Petugas Pidum!');
        }

        // dd(Auth::guard('pidum'));

        //Authentication failed...
        return $this->loginFailed();
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:pidum|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'Email tidak terdaftar dalam sistem'
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }

    public function logout()
    {
        Auth::guard('pidum')->logout();
        return redirect()
            ->route('pidum.login')
            ->with('status','Admin has been logged out!');
    }
}
