<?php

namespace Domain\User\ViewModels;


use App\Models\User;
use App\Models\UserCity;
use App\Models\UserMediator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Support\Traits\Makeable;

class UserViewModel
{
    use Makeable;

    public function user($id)
    {

        return User::query()
            ->where('published', 1)
            ->where('id', $id)
            ->first();
    }

    public function prof_mediators()
    {

        $result = User::query()
            ->get_data(1)
            ->paginate(config('site.constants.paginate'));
        return $result;
    }

    public function company_mediators()
    {
        $result = User::query()
            ->get_data(2)
            ->paginate(config('site.constants.paginate'));
        return $result;
    }

    public function notprof_mediators()
    {
        $result = User::query()
            ->get_data(3)
            ->paginate(config('site.constants.paginate'));
        return $result;
    }

    public function mediators()
    {
        $users = User::query()
            ->where('published', 1)
            ->with('user_list')
            ->orderBy('stars', 'desc')
            ->orderBy('user_cert_mediator', 'desc')
            ->withAggregate('user_list', 'title')
            ->orderBy('user_list_title', 'desc')
            ->orderBy('user_diplom', 'desc')
            ->orderBy('avatar', 'desc')
            ->paginate(config('site.constants.paginate'));
        return $users;
    }

    /**
     * @param $id
     * аккаунт медиатора
     */

    public function mediator($id)
    {
        $user = User::query()
            ->where('published', 1)
            ->where('id', $id)
            ->with('user_list')
            ->with('user_type')
            ->with('user_language')
            ->with('user_city')
            ->first();
        return $user;
    }

    /**
     * порлучаем все используемые города
     */
    public function cities_mediators()
    {

        $user_city = DB::table('user_user_city')
            ->select('user_city_id')
            ->distinct()
            ->get();
        if (!is_null($user_city)) {
            $array = array();
            foreach ($user_city->toArray() as $item) {
                $array[] = $item->user_city_id;
            }


            $result = UserCity::query()
                ->select('id', 'title')
                ->whereIn('id', $array)
                ->orderBy('id', 'asc')
                ->get();
            if (!is_null($result)) {
                return $result;
            }
        }

        return null;

    }

    public function feedback_user_session(): array
    {

        $u = array();
        if ($id = session('feedback_user')) { // если в сессии feedback_user, то получаем результаты
            session()->forget('feedback_user'); // удалим
            $user = User::find($id); /** получаем пользователя */
            if ($user) {
                $u = array(
                    'user_name' => ($user->username) ?: $user->name,
                    'user_phone' => ($user->phone) ? format_phone($user->phone) : ' - ',
                    'user_email' => $user->email,
                    'user_id' => $id
                );
            }
        }
        return $u;
    }

    public function user_update_stars($id, $stars) {

        User::where('id', $id)
            ->update(['stars' => $stars]);

    }


    /**
     * заблокировать
     */
    public function blocked($id) {

        $user = User::find($id);
        if($user) {
            $user->published = 0;
            $user->save();
            return true;
        }
        return false;
    }

    /**
     * разболокировать
     */
    public function unblock($id) {
        $user = User::find($id);
        if($user) {
            $user->published = 1;
            $user->save();
            return true;
        }
        return false;
    }

    /**
     * @return
     * все заблокированные user-ы
     */
    public function users_no_publiched()
    {

        $users = User::query()
            ->where('published', 0)
            ->get()->count();
        if($users) {
            return $users;
        }
        return 0;


    }

    public function active_comments($id, $active_comments) {


        if(isset($active_comments)) {
            $user = User::find($id);

            if($active_comments) {
                $user->active_comments = 1;
            } else {
                $user->active_comments = 0;
            }
            $user->save();
            return $user;
        }
        return false;

    }

    /**
     * @param $user
     * @return |  или null или модель с изменннием
     */

    public function delete_user($user): model | null
    {

        $u = User::find($user->id);
        if($u) {
            $u->request_delete = 1;
            $u->save();
            return $u;
        }
        return null;
    }

    /**
     * @param $request
     * @param $user
     * @return User|User[]|\LaravelIdea\Helper\App\Models\_IH_User_C|null
     * изменим параметры платной подписки пользователя
     */

    public function user_subscription_bonus($request, $user = null)
    {
        $u = User::find($user->id);
        if($u) {
            if (isset($request->active_comments)) {
                $u->active_comments = $request->active_comments;
            }
            if (isset($request->active_stars)) {
                $u->active_stars = $request->active_stars;
            }
            if (isset($request->active_mediator_result)) {
                $u->active_mediator_result = $request->active_mediator_result;
            }
            $u->save();
            return $u;
        }
        return null;

    }


}
