<?php

namespace Domain\Manager\ViewModels;


use App\Models\User;
use App\Models\UserCity;
use App\Models\UserMediator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Support\Traits\Makeable;

class MReportViewModel
{
    use Makeable;



    public function reports()
    {


        $reports = UserMediator::query()
         ->where('published', 0)
            ->with('user')
                        ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));
        if($reports) {
            return $reports;
        }
        return [];
    }



    public function  search_user_report($request)
    {

        $search = $request->search;

        /** @var  $reports - получаем список user_id которые находятся на медерации */
        $reports =  UserMediator::query()
            ->select('user_id')
            ->groupBy('user_id')
            ->where('published', 0)
            ->get()->toArray();

        $ids = array();

        /** создаем массив ids  */
        foreach ($reports as $k => $report)
        {
            $ids[] = $report['user_id'];
        }



        /** @var  $users - получаем список пользователей у которых есть совпадения */
        $users = User::query()
            ->whereIn('id', $ids)
            ->where(function ($query) use ($search) {
                $query->where("name", "like", "%" . $search . "%");
                $query->orWhere("username", "like", "%" . $search . "%");
                $query->orWhere("email", "like", "%" . $search . "%");
            })
            ->get()->toArray();

        $ids = array();

        /** создаем массив ids  */
        foreach ($users as $user) {
            $ids[] = $user['id'];
        }

        /** @var  $reports - получаем список пользователей или пользователя у которых есть отчеты на модерации */
        $reports = UserMediator::query()
            ->whereIn('user_id', $ids)
            ->where('published', 0)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));


        if($reports) {
            return $reports;
        }
        return [];

    }

    public function report($id) {

        $report = UserMediator::query()
            ->where('id', $id)
            ->where('published', 0)
            ->with('user')
            ->first();


        if($report) {
            return $report;
        }
        return [];
    }


}
