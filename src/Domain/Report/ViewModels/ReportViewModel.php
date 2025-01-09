<?php

namespace Domain\Report\ViewModels;

use App\Models\User;
use App\Models\UserMediator;
use Support\Traits\Makeable;

class ReportViewModel
{
    use Makeable;



    /**
     * @param $id
     * @return float|int
     * сумма всех отчетов за определенный месяц
     */
    public function periud_report($id)
    {

        $report  =  UserMediator::find($id);
        $array = array($report->sem, $report->ugo, $report->gra, $report->uve, $report->kor, $report->tru, $report->ban);
        $int = array_sum($array);
        return $int;

    }


    /**
     * заблокировать
     */
    public function blocked_report($request) {

        $report = UserMediator::find($request->id);
        if($report) {
            $report->published = 0;
            $report->active = 0;
            $report->desc = ($request->desc)?textarea($request->desc):null;
            $report->save();
            return true;
        }
        return false;
    }

    /**
     * разболокировать
     */
    public function unblock_report($request) {
        $report = UserMediator::find($request->id);
        if($report) {
            $report->published = 1;
            $report->active = 1;
            $report->desc = ($request->desc)?textarea($request->desc):null;
            $report->save();
            return true;
        }
        return false;
    }

    /**
    * получить отчет определенного пользователя
    */
    public function report_user($id, $user_id = null) {

        $report = UserMediator::query();
        $report->where('id', $id);
        if(!is_null($user_id)) {
            $report->where('user_id', $user_id);
        }

        $result = $report->first();

        if($result) {
           return $result;
        }

        return null;
    }



    /**
     * @return
     * все заблокированные, отправленные для модерации отчеты
     */
    public function reports_no_publiched()
    {

        $report = UserMediator::query()
            ->where('published', 0)
            ->where('active', 1)
            ->get()->count();
        if($report) {
            return $report;
        }
        return 0;


    }


}
