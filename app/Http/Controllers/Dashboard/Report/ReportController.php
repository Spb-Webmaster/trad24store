<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportAddFormRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\UpdateFullFormRequest;
use App\Http\Requests\UpdatePasswordFormRequest;
use App\Models\User;

use App\Models\UserMediator;
use Domain\User\ViewModels\UserViewModel;
use Illuminate\Http\RedirectResponse;

class ReportController extends Controller
{

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     * список отчетов (вклюяая не опубликоыванные)
     */

    public function reports()
    {

        /**
         */

        $user = auth()->user();
        $reports = $user->user_mediator_nopublished()->paginate(config('site.constants.paginate'));


        /**
         *  запустим сессию для проверки этого юзера в settingHandel
         */
        session(['user' => $user->id]); // запустим сессию

        return view('dashboard.report.reports',
            [
                'user' => $user,
                'reports' => $reports,
            ]);

    }

    /**
     * @return \#q\class-string|\#ᢔ\string.TClass|\Closure|\Illuminate\Container\Container|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View|mixed|object|string|null
     * Вывод страницы для добавления отчета
     */

    public function reportAdd()
    {

        /**
         */

        $user = auth()->user();
        $reports = $user->user_mediator()->paginate(config('site.constants.paginate'));


        /**
         *  запустим сессию для проверки этого юзера в settingHandel
         */
        session(['user' => $user->id]); // запустим сессию

        return view('dashboard.report.report_add',
            [
                'user' => $user,
                'reports' => $reports,
            ]);

    }

    /**
     * @param ReportAddFormRequest $request
     * @return RedirectResponse
     * Добавление отчета и редирект на список отчетов
     */

    public function reportAddHandel(ReportAddFormRequest $request)
    {


        $session_user = $request->session()->get('user');


        /**
         *  Проверка совпадения сессии и $request->id
         */
        if ($session_user == $request->id) {

           $user = User::find($request->id);

           if (!$user) {
                return redirect()->intended(route('cabinet')); // если такого пользоваетля нет
            }

            $user_mediator = new UserMediator;

           if ($request->sem) {

                $user_mediator->sem = $request->sem; //
            }

           if ($request->ugo) {

                $user_mediator->ugo = $request->ugo; //
            }

           if ($request->gra) {

                $user_mediator->gra = $request->gra; //
            }

           if ($request->uve) {

                $user_mediator->uve = $request->uve; //
            }

           if ($request->kor) {

                $user_mediator->kor = $request->kor; //
            }

           if ($request->tru) {

                $user_mediator->tru = $request->tru; //
            }

           if ($request->ban) {

                $user_mediator->ban = $request->ban; //
            }


            $user_mediator->created_at = $request->month;

            $user_mediator->title = $user->name . ': ' . rusdate_month($user_mediator->created_at);

            $user_mediator->user_id = $user->id;
          //  \Log::info($user_mediator->title); // в логи


            $user_mediator->save();  //это обновит запись с помощью id=$request->id

        }

        /**
         *  запустим сессию для проверки этого юзера
         */
        session(['user' => $user->id]); // запустим сессию

        return redirect()->route('reports');

    }



}
