<?php

namespace Domain\Manager\ViewModels;


use App\Models\User;
use App\Models\UserCity;
use App\Models\UserComment;
use App\Models\UserMediator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Support\Traits\Makeable;

class MCommentViewModel
{
    use Makeable;

    /**
     * @return
     * Все комментарии не опубликованные
     * На проверке
     */

    public function comments()
    {

        $comments = UserComment::query()
         ->where('published', 0)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));
        if($comments) {
            return $comments;
        }
        return [];
    }


    /**
     * @return
     * один комментарий, который на проверке
     *
     */

    public function comment($id)
    {

        $comment = UserComment::query()
            ->where('id', $id)
            ->where('published', 0)
            ->with('user')
            ->first();


        if($comment) {
            return $comment;
        }
        return [];
    }

    /**
     * @return
     * удалить комментарий
     */

    public function delete_comment($id) {

        $result = UserComment::query()
            ->where('id', $id)->delete();

        return $result;


    }
    /**
     * @return
     * опубликовать  комментарий
     */

    public function published_comments($id) {

        $result = UserComment::query()
            ->where('id', $id)->update(['published' => 1]);

        return $result;


    }



}
