<?php

namespace Domain\Report\ViewModels;

use App\Models\UserMediator;
use Illuminate\Support\Carbon;
use Support\Traits\Makeable;

class ReportExcel
{
    use Makeable;

    /**
     * @return UserMediator[]
     * получим результат из диапазона дат
     */
    public function report_range_dates($dates)
    {


        $startDate = Carbon::createFromFormat('d.m.Y', $dates['from']);
        $endDate = Carbon::createFromFormat('d.m.Y', $dates['to']);



        return UserMediator::query()
            ->where('published', 1)
            ->where('user_id', $dates['id'])
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->get();


    }




}
