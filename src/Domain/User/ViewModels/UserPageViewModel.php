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

class UserPageViewModel
{
    use Makeable;

    /**
     * @param $model
     * @return array|mixed
     * получение списка с пагинацией из модели  $model
     */

  public function user_pages($model) {

      $items = $model::query()
          ->where('published', 1)
          ->paginate(config('site.constants.paginate'));

      if($items) {
          return $items;
      }
      return [];

  }

    /**
     * @param $model
     * @param $id
     * @return array|null
     * получение одной записи из модели  $model
     */

  public function user_page($model, $id) {

      $item = $model::query()
          ->where('id', $id)
          ->where('published', 1)
          ->first();

          return $item;

  }


}
