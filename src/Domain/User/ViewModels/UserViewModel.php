<?php

namespace Domain\User\ViewModels;


use App\Models\User;
use App\Models\UserCity;
use Illuminate\Database\Eloquent\Collection;
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
     * @return \Illuminate\Database\Eloquent\Builder|\LaravelIdea\Helper\App\Models\_IH_User_QB|mixed|null
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
     * @return \Illuminate\Database\Eloquent\Collection
     * порлучаем все используемые города
     */
    public function cities_mediators(): Collection|null
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
            $user = $this->user($id);
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


}
