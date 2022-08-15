<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $user = Auth::user();
        $isAdmin = loggedInUserIsAdmin();
        if ($user->is_active == 1) {
            $request->session()->regenerate();
            session(['is_regular_user' => 'true']);
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        $this->destroy($request, false);
        flashRegistrationMessage(getFullName($user->first_name, $user->last_name), false);
        if($isAdmin){
            return redirect()->to('/admin-login');
        }
        return redirect()->to('/login');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $redirect = true)
    {
        $isAdmin = loggedInUserIsAdmin();
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        if($redirect){
            if($isAdmin){
                return redirect()->to('/admin-login');
            }
            return redirect('/');
        }
    }
}
