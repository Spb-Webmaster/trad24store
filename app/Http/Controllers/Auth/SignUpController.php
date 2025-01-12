<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\CreateUserEvent;
use App\Events\Auth\MessageAdminCreateUserEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpFormRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;


class SignUpController extends Controller
{

    public function page()
    {
        return view('auth.sign-up');
    }

    public function handle(SignUpFormRequest $request):RedirectResponse
    {


       $user = User::query()->create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)

        ]);

        /**
         * Событие отправка сообщения новому пользователю
         */


        CreateUserEvent::dispatch($user);

        /**
         * Событие отправка сообщения админу
         */


        MessageAdminCreateUserEvent::dispatch($user);

        auth()->login($user, true); // залогинили

       return redirect()->intended(route('cabinet'));

    }




}
