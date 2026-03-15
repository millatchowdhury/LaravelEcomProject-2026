<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Notifications\VerifyRegistration;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

    protected $redirectTo = '/';
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    // public function store(LoginRequest $request): RedirectResponse
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if($user->status == 1){
            if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
                return redirect()->intended(route('index'));
            }else{
                session()->flash('sticky_error', 'Invalid Login');
                return back();
            }
        }else{
            if(!is_null($user)){
                $user->notify(new VerifyRegistration($user));
                session()->flash('success', 'A New confirmation email has sent to you.. Please check and confirm your email');
                return redirect('/');
            }else{
                session()->flash('sticky_error', 'Please login first !!');
                return redirect()->route('login');
            }
        }
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
