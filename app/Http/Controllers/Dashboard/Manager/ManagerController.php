<?php

namespace App\Http\Controllers\Dashboard\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSearchRequest;
use App\Models\User;
use Domain\Manager\ViewModels\MUserViewModel;
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
     * Метод вывода всех пользователей
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

}
