<?php
namespace Domain\User\ViewModels;


use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class UserViewModel
{
    use Makeable;

    public function prof_mediators() {
        $users = User::query()
            ->where('published', 1)
            ->where('user_type_id', 1)
            ->paginate(20);
        return $users;
    }

    public function company_mediators() {
        $users = User::query()
            ->where('published', 1)
            ->where('user_type_id', 2)
            ->paginate(20);
        return $users;
    }

    public function notprof_mediators() {
        $users = User::query()
            ->where('published', 1)
            ->where('user_type_id', 3)
            ->paginate(20);
        return $users;
    }


    public function mediators() {
        $users = User::query()
            ->where('published', 1)
            ->paginate(20);
        return $users;
    }




}
