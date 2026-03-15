<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Notifications\VerifyRegistration;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        return view('auth.register', compact('divisions', 'districts'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'first_name' => ['required', 'string', 'max:255'],
        //     'last_name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', 'min:6', 'string'],
        //     'division_id' => ['required:numeric'],
        //     'district_id' => ['required:numeric'],
        //     'phone_no' => ['required|max:15'],
        //     'street_address' => ['required|max:100']
        // ]);
        $this->validate($request,[
            'first_name' => 'required|string|max:30',
            'last_name' => 'nullable|string|max:15',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'phone_no' => 'required|max:15',
            'street_address' => 'required|max:100',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => Str::slug($request->first_name . $request->last_name),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'phone_no' => $request->phone_no,
            'street_address' => $request->street_address,
            'ip_address' => $request->ip(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(50),
            'status' => 0
        ]);

        // event(new Registered($user));

        // Email Notification
        $user->notify(new VerifyRegistration($user));

        session()->flash('success', 'A confirmation email has sent to your email. please check your and confirm');

        Auth::login($user);
        return redirect('/');
        // return redirect(RouteServiceProvider::HOME);
    }
}
