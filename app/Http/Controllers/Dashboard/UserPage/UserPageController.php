<?php

namespace App\Http\Controllers\Dashboard\UserPage;


use App\Http\Controllers\Controller;
use App\Models\UserAd;
use App\Models\UserDoc;
use App\Models\UserLaw;
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

        return view('dashboard.user_page.user_new.items', [
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

        return view('dashboard.user_page.user_new.item', [
            'item' => $item,
            'user' => $user,
        ]);

    }



    /**
     * @return | список объявлений для пользователя
     */
    public function m_user_ads() {
        $model = UserAd::class;
        $user = auth()->user();
        $items = UserPageViewModel::make()->user_pages($model);

        return view('dashboard.user_page.user_ad.items', [
            'items' => $items,
            'user' => $user,
        ]);

    }

    /**
     * @return | страница объявления для пользователя
     */
    public function m_user_ad($id) {
        $model = UserAd::class;
        $user = auth()->user();
        $item = UserPageViewModel::make()->user_page($model, $id);


        return view('dashboard.user_page.user_ad.item', [
            'item' => $item,
            'user' => $user,
        ]);

    }


    /**
     * @return | список Законов для пользователя
     */
    public function m_user_laws() {
        $model = UserLaw::class;
        $user = auth()->user();
        $items = UserPageViewModel::make()->user_pages($model);

        return view('dashboard.user_page.user_law.items', [
            'items' => $items,
            'user' => $user,
        ]);

    }

    /**
     * @return | страница Закона для пользователя
     */
    public function m_user_law($id) {
        $model = UserLaw::class;
        $user = auth()->user();
        $item = UserPageViewModel::make()->user_page($model, $id);

        return view('dashboard.user_page.user_law.item', [
            'item' => $item,
            'user' => $user,
        ]);

    }

    /**
     * @return | список Законов для пользователя
     */
    public function m_user_docs() {
        $model = UserDoc::class;
        $user = auth()->user();
        $items = UserPageViewModel::make()->user_pages($model);

        return view('dashboard.user_page.user_doc.items', [
            'items' => $items,
            'user' => $user,
        ]);

    }

    /**
     * @return | страница Закона для пользователя
     */
    public function m_user_doc($id) {
        $model = UserDoc::class;
        $user = auth()->user();
        $item = UserPageViewModel::make()->user_page($model, $id);

        return view('dashboard.user_page.user_doc.item', [
            'item' => $item,
            'user' => $user,
        ]);

    }

}
