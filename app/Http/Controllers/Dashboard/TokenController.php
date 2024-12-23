<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserToken;

class TokenController extends Controller
{
    public function update_user_self($token, $id){
        if($token) {
            $user_token = UserToken::query()->where('token', $token)->first();  /** проверим токен */
        }

        if(!$user_token) {

            flash()->alert(config('message_flash.alert.token_old'));
            return view('dashboard.token.token');
        }

        UserToken::query()->where('token', $token)->delete(); /** удалим токен */

        $user = User::find($id);

        if(!$user) {

            flash()->alert(config('message_flash.alert.token_old'));
            return view('dashboard.token.token');
        }


        $user->user_token()->delete();

        $user->published = 1;
        $user->save();  /** опубликуем  user */

        flash()->info(config('message_flash.info.user_update'));

        return view('dashboard.token.token');

    }

}
