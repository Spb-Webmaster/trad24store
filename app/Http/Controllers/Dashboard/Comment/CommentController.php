<?php

namespace App\Http\Controllers\Dashboard\Comment;

use App\Events\Report\ReportAddFormEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportAddFormRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\UpdateFullFormRequest;
use App\Http\Requests\UpdatePasswordFormRequest;
use App\Models\User;

use App\Models\UserMediator;
use Domain\Comment\ViewModels\CommentViewModel;
use Domain\Report\ViewModels\ReportViewModel;
use Domain\User\ViewModels\UserViewModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * @return
     * array $user
     * collection $comments
     * все комментарии о себе
     */

    public function comments()
    {

        $user = auth()->user();
        $comments = CommentViewModel::make()->comments($user->id);

        return view('dashboard.comment.comments',
            [
                'user' => $user,
                'comments' => $comments,
            ]);

    }


    /**
     * @return
     * array $user
     * collection $comments
     * изменим вывод комментарием о себе ($user->active_comments)
     */

    public function active_comments(Request $request)
    {

        $user = auth()->user();
        $user = UserViewModel::make()->active_comments($user->id, $request->active_comments);
        if(!$user) {
            abort('404');
        }
        $comments = CommentViewModel::make()->comments($user->id);

        return view('dashboard.comment.comments',
            [
                'user' => $user,
                'comments' => $comments,
            ]);

    }




}
