<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\CustomeClasses\OwnClasses;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    public function store(LoginRequest $request)
    {

        if (!Auth::attempt($request->generateCredential())) {
            return back()
            ->withErrors([
                'contact' => 'Your either email or user name or password was wrong.'
            ])
            ->withInput();
        }
        $user = Auth::user();
        if($user->status === \App\Enums\Status::Inactive){
            Auth::guard('web')->logout();
            return redirect()->route('login')->with('error','You are blocked by the admin. Please contact support');
        }
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME)->with('message','Login Successfully');



    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message','Logout Successfully');
    }
}
