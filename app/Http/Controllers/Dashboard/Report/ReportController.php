<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\UpdateFullFormRequest;
use App\Http\Requests\UpdatePasswordFormRequest;
use App\Models\User;

use Domain\User\ViewModels\UserViewModel;
use Illuminate\Http\RedirectResponse;

class ReportController extends Controller
{
    public function reports()
    {

        /**
         */

        $user = auth()->user();
        $reports = $user->user_mediator()->paginate(config('site.constants.paginate'));


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



}
