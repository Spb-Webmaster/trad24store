<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInFormPhoneRequest;
use App\Http\Requests\SignInFormRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use MoonShine\Models\MoonshineUser;


class SignInController extends Controller
{

    public function page()
    {
        return view('auth.login');
    }

    public function handle(SignInFormRequest $request): RedirectResponse
    {


        if (!auth()->attempt($request->validated()))
        {

            return back()->withErrors([
                'email' => 'Ошибка в поле E-mail или пароль',
            ])->onlyInput('email');
        }


      //  flash()->info('test');
        $request->session()->regenerate();
        return redirect()->intended(route('cabinet')); // intended - назад или route
    }

    public function handlePhoneEmail(SignInFormPhoneRequest $request): RedirectResponse
    {

        //dd($request->all());

        $pe = trim($request->phone_email);
        $filter = filter_var($pe, FILTER_VALIDATE_EMAIL);

        if($filter) {
            if (!auth()->attempt(['email' => $filter, 'password' => $request->password])) {

                return back()->withErrors([
                    'password' => 'Вход по email: Ошибка в поле "Пароль"',
                ])->onlyInput('password');
            }
        } else {

            $user = User::query()->where('phone', phone($pe))->first();

            if (!$user) {
                return back()->withErrors([
                    'phone_email' => 'Ошибка в поле "Номер телефона"',
                ])->onlyInput('phone_email');
            }

            if (!auth()->attempt(['email' => $user->email, 'password' => $request->password])) {

                return back()->withErrors([
                    'password' => 'Вход по номеру телефона: Ошибка в поле "Пароль"',
                ])->onlyInput('password')->onlyInput('phone_email');
            }

        }

        $request->session()->regenerate();
        flash()->info(config('message_flash.info.success_enter'));

        return redirect()->intended(route('cabinet')); // intended - назад или route
    }




}
