<?php

namespace App\View\Composers;




use Domain\Comment\ViewModels\CommentViewModel;
use Domain\Report\ViewModels\ReportViewModel;
use Domain\Service\ViewModels\ServiceViewModel;
use Domain\Training\ViewModels\TrainingViewModel;
use Domain\User\ViewModels\UserViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CabinetMenuComposer
{
    public function compose(View $view): void
    {


        $users_no_publiched = UserViewModel::make()->users_no_publiched();
        $report_no_publiched = ReportViewModel::make()->reports_no_publiched();
        $comment_no_publiched = CommentViewModel::make()->comment_no_publiched();



        $view->with([
            'users_no_publiched' => $users_no_publiched,
            'report_no_publiched' => $report_no_publiched,
            'comment_no_publiched' => $comment_no_publiched,
        ]);

    }

}
