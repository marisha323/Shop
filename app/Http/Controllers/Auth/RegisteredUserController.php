<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ReferralUser;
use App\Models\TotalSalary;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Найдите пользователя по реферальному коду, если он передан
        $referrer = User::where('referral_code', $request->input('referral_code'))->first();
        //dd($referrer);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_role_id' => 3,
            'code_mentor_id' => $referrer ? $referrer->id : null,  // Записать id реферера
        ]);

        Auth::login($user);



        $referraluser = [
            'referrer_id' => $referrer->id,
            'referred_id' => $user->id,

        ];

        ReferralUser::create($referraluser);

        $total_salary=[
            'user_id'=>Auth::id(),
            'money'=>0,
        ];
        TotalSalary::create($total_salary);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
