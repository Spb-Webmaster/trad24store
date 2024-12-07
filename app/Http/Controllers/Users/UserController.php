<?php
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Domain\Comment\ViewModels\CommentViewModel;
use Domain\Training\ViewModels\TrainingViewModel;
use Domain\User\ViewModels\UserViewModel;

class UserController extends Controller
{

    public function reestr() {

        return redirect(route('prof_mediators'));
    }



    /**
     * список групп  медиаторов
     */

    /**
     * проф медиаторы
     */

    public function prof_mediators() {

        $items = UserViewModel::make()->prof_mediators();
        $cities = UserViewModel::make()->cities_mediators();



        if(!$items) {
            abort(404);
        }

        return view('pages.users.prof_mediators', [
            'items'=> $items,
            'cities'=> $cities
        ]);
    }

    /**
     * компании медиаторов
     */
    public function company_mediators() {

        $items = UserViewModel::make()->company_mediators();
        $cities = UserViewModel::make()->cities_mediators();


        if(!$items) {
            abort(404);
        }


        return view('pages.users.company_mediators', [
            'items'=> $items,
            'cities'=> $cities

        ]);
    }

    /**
     * не проф медиаторы
     */
    public function notprof_mediators() {

        $items = UserViewModel::make()->notprof_mediators();
        $cities = UserViewModel::make()->cities_mediators();


        if(!$items) {
            abort(404);
        }

        return view('pages.users.notprof_mediators', [
            'items'=> $items,
            'cities'=> $cities

        ]);
    }


    /**
     * все медиаторы
     */

    public function mediators() {


        $items = UserViewModel::make()->mediators();

        if(!$items) {
            abort(404);
        }

        return view('pages.users.mediators', [
            'items'=> $items
        ]);
    }



    /**
     * отдельная страница медиаторов
     */

    /**
     * проф медиаторы
     */


    public function prof_mediator($id) {

        $item = UserViewModel::make()->mediator($id);

        if(!$item) {
            abort(404);
        }

        $comments = CommentViewModel::make()->comments($item->id);


        /**
         * Записываем в сессию id пользователя, для дальнейшего, возможного, оствление ему отзыва
         */

        session(['feedback_user' => $item->id]);

        return view('pages.users.user.user', [
            'item'=> $item,
            'comments'=> $comments,
        ]);
    }

    /**
     * компании медиаторов
     */

    public function company_mediator($id) {

        $item = UserViewModel::make()->mediator($id);

        if(!$item) {
            abort(404);
        }

        $comments = CommentViewModel::make()->comments($item->id);

        /**
         * Записываем в сессию id пользователя, для дальнейшего, возможного, оствление ему отзыва
         */

        session(['feedback_user' => $item->id]);

        return view('pages.users.user.user', [
            'item'=> $item,
            'comments'=> $comments,

        ]);
    }

    /**
     * не проф медиаторы
     */

    public function notprof_mediator($id) {

        $item = UserViewModel::make()->mediator($id);

        if(!$item) {
            abort(404);
        }

        $comments = CommentViewModel::make()->comments($item->id);

        /**
         * Записываем в сессию id пользователя, для дальнейшего, возможного, оствление ему отзыва
         */

        session(['feedback_user' => $item->id]);

        return view('pages.users.user.user', [
            'item'=> $item,
            'comments'=> $comments,

        ]);
    }




}
