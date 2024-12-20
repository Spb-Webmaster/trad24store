<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\UpdateFullFormRequest;
use App\Http\Requests\UpdatePasswordFormRequest;
use App\Models\User;

use Domain\User\ViewModels\UserViewModel;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function page()
    {

        /**
         */

        $user = auth()->user();

        /**
         *  запустим сессию для проверки этого юзера в settingHandel
         */
        session(['user' => $user->id]); // запустим сессию

        return view('dashboard.cabinet',
            [
                'user' => $user
            ]);

    }

    public function edit()
    {

        /**
         */

        $user = auth()->user();

        /**
         *  запустим сессию для проверки этого юзера в settingHandel
         */
        session(['user' => $user->id]); // запустим сессию

        return view('dashboard.cabinet.edit.edit',
            [
                'user' => $user
            ]);

    }

    public function blocked()
    {
        /**
         *  для заблдоктрованного пользователя
         */
        $user = User::find(auth()->user()->id);

        return view('dashboard.blocked.cabinet_blocked',
            [
                'user' => $user,
            ]);
    }


    /**
     * Метод простого обновления данных пользователя
     *   'name'  'username'  'phone'  'birthday'
     */
    public function settingHandel(UpdateFormRequest $request)
    {


        $session_user = $request->session()->get('user');

        /**
         *  Проверка совпадения сессии и $request->id
         */
        if ($session_user == $request->id) {
            $user = User::query()
                ->where('id', auth()->user()->id)
                ->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'phone' => $request->phone,
                    'birthday' => ($request->birthday) ?: auth()->user()->birthday,
                ]);
        }
        flash()->info(config('message_flash.info.user_self_update'));


        return redirect()->intended(route('cabinet'));

    }

    /**
     * Метод обновлнения и добавления информации
     *
     */
    public function settingFullHandel(UpdateFullFormRequest $request)
    {

        //city - relative
        //street
        //home
        //office
        //sex
        //status
        //language - relative
        //list - relative
        //certificate
        //sphere
        //oput
        //dop

        dd($request->all());

        $session_user = $request->session()->get('user');

        /**
         *  Проверка совпадения сессии и $request->id
         */
        if ($session_user == $request->id) {


            $user = User::find($request->id);

            if (!$user) {
                return redirect()->intended(route('cabinet')); // если такого пользоваетля нет
            }

            if ($request->type) {
                $user->user_type_id = (int)$request->type; // тип медиатора
            }

            /**
             * отногшения BelongsToMany
             */

            if ($request->city) {
                $user->user_city()->sync($request->city); // города
            } else {
                $user->user_city()->detach();
            }

            if ($request->language) {
                $user->user_language()->sync($request->language); // языки
            } else {
                $user->user_language()->detach();
            }

            if ($request->list) {
                $user->user_list()->sync($request->list); // виды медиации
            } else {
                $user->user_list()->detach();
            }

            /**
             * отногшения BelongsToMany
             */

            if ($request->street) {
                $user->street = $request->street; // улица
            }

            if ($request->home) {
                $user->home = $request->home; // дом
            }

            if ($request->office) {
                $user->office = $request->office; // office
            }

            if ($request->sex) {

                $user->sex = $request->sex; // пол
            }

            if ($request->company) {

                $user->company = $request->company; // организация
            }


            $user->status = $request->status; // статус


            if (textarea($request->certificate)) {

                $user->certificate = textarea($request->certificate); // сертификат (textarea)
            }

            if (textarea($request->sphere)) {

                $user->sphere = textarea($request->sphere); // сфера (textarea)
            }

            if (textarea($request->oput)) {

                $user->oput = textarea($request->oput); // опыт (textarea)
            }

            if (textarea($request->dop)) {

                $user->dop = textarea($request->dop); // допорлнительно (textarea)
            }

            $user->save();  //это обновит запись с помощью id=$request->id


        }
        return redirect()->intended(route('cabinet.edit'));

    }

    /**
     * Метод изменения пароля
     */
    public function settingPasswordHandel(UpdatePasswordFormRequest $request)
    {


        $session_user = $request->session()->get('user');

        /**
         *  Проверка совпадения сессии и $request->id
         */
        $user = auth()->user();
        /*        dump($session_user);
                dump($request->id);
                dd($user->id);*/
        if ($session_user == $request->id) {
            /** сессия совпадает с id пользователя которого изменяем **/

            $user = auth()->user();

            $q = false;
            $regenerate = false;


            if ($user->id == $request->id) {
                $q = true; // если это сам пользователь редактирует себя
                $regenerate = true; // если это сам пользователь редактирует себя, то можно regenerate

            }

            if ($q) {

                User::query()
                    ->where('id', $request->id)
                    ->update([
                        'password' => bcrypt($request->password)
                    ]);
            }


        }

        if ($regenerate) {

            $request->session()->regenerate();
            flash()->info(config('message_flash.info.success_password'));
            return redirect()->back();


        }

        flash()->info(config('message_flash.info.m_success_password'));
        return redirect()->back();

    }


}
