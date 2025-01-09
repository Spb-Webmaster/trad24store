<?php

namespace App\Http\Controllers\Dashboard\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSearchRequest;
use App\Models\User;
use Domain\Manager\ViewModels\MReportViewModel;
use Domain\Manager\ViewModels\MUserViewModel;
use Domain\Report\ViewModels\ReportViewModel;
use Domain\User\ViewModels\UserViewModel;
use Illuminate\Http\Request;

class ManagerController extends Controller
{

    /**
     * @return
     * спискок пользователей для менеджера
     */

    public function users()
    {

        $user = auth()->user();

        $items = MUserViewModel::make()->users();

        return view('dashboard.manager.user.users', [
            'user' => $user,
            'items' => $items,
        ]);
    }

    /**
     * @return
     * пользователь для менеджера по id
     */

    public function user($id)
    {

        $user = auth()->user();

        $item = MUserViewModel::make()->user($id);

        return view('dashboard.manager.user.user', [
            'user' => $user,
            'item' => $item,
        ]);
    }



    /**
     * Метод вывода всех пользователей по полям name,username,email
     */
    public function user_search(UserSearchRequest $request)
    {


        $user = auth()->user();

        $items = MUserViewModel::make()->user_search($request);

        return view('dashboard.manager.user.users', [
            'user' => $user,
            'items' => $items,
        ]);

    }



    /**
     * @param Request $request
     * блокировать
     */

    public function blocked(Request $request)
    {

        UserViewModel::make()->blocked($request->id);
        return redirect()->back();

    }

    /**
     * @param Request $request
     * разблоктровать
     */

    public function unblock(Request $request)
    {

        UserViewModel::make()->unblock($request->id);
        return redirect()->back();

    }

    /**
     * отчеты
     * спискок отчетов
     */

    public function reports() {

        $user = auth()->user();

        $items = MReportViewModel::make()->reports();
        if(!$items) {
            abort(404);
        }
        return view('dashboard.manager.report.reports', [
            'user' => $user,
            'items' => $items,
        ]);

    }

    /**
     *
     *  отчет по id
     */

    public function report($id) {

        $user = auth()->user();

        $item = MReportViewModel::make()->report($id);
        if(!$item) {
            abort(404);
        }

        return view('dashboard.manager.report.report', [
            'user' => $user,
            'item' => $item,
        ]);

    }


    /**
     * Метод вывода всех пользователей по полям name,username,email у кого есть отчеты на модерации
     */
    public function search_user_report(UserSearchRequest $request)
    {


        $user = auth()->user();

        $items = MReportViewModel::make()->search_user_report($request);

        return view('dashboard.manager.report.reports', [
            'user' => $user,
            'items' => $items,
        ]);

    }


    /**
     * @param Request $request
     * блокировать
     */


    public function blocked_report(Request $request)
    {
        ReportViewModel::make()->blocked_report($request);
        flash()->alert(config('message_flash.alert.manager_blocked_report'));
        return redirect(route('m_reports'));

    }
    /**
     * @param Request $request
     * разблоктровать
     */

    public function unblock_report(Request $request)
    {

        ReportViewModel::make()->unblock_report($request);
        flash()->info(config('message_flash.info.manager_unblock_report'));
        return redirect(route('m_reports'));

    }


}
