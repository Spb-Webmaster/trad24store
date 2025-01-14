<?php

namespace App\Http\Controllers\Dashboard\UserPage;


use App\Http\Controllers\Controller;
use App\Models\UserNew;
use Domain\User\ViewModels\UserPageViewModel;


class UserPageController extends Controller
{

    /**
     * @return | список новостей для пользователя
     */
    public function m_user_news() {
        $model = UserNew::class;
        $user = auth()->user();
        $items = UserPageViewModel::make()->user_pages($model);

        return view('dashboard.user_page.user_new.user_news', [
            'items' => $items,
            'user' => $user,
        ]);

    }

    /**
     * @return | страница новости для пользователя
     */
    public function m_user_new($id) {
        $model = UserNew::class;
        $user = auth()->user();
        $item = UserPageViewModel::make()->user_page($model, $id);

        return view('dashboard.user_page.user_new.user_new', [
            'item' => $item,
            'user' => $user,
        ]);

    }

}
