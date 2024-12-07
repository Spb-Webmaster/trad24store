<?php

namespace Domain\User\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;


class SearchQueryBuilder extends Builder
{
    public function get_search_data($search, $user_type_id, $city)
    {





           if(!$search) $search =  '';

            $query = $this->where(function ($q) use ($search) {
                $q->where("username", "like", "%" . $search . "%");
                $q->orWhere("email", "like", "%" . $search . "%");
                if(phone($search)) {
                    $q->orWhere("phone", "like", "%" . phone($search) . "%");
                }
            });

        if ($city) {
            $query->whereHas('user_city', function ($q) use ($city) {
                $q->where('user_city_id', $city);
            })->get();
        }

        $query->where('published', 1);

        $query->where('user_type_id', $user_type_id);


        $query->with('user_list')
            ->orderBy('stars', 'desc')
            ->orderBy('user_cert_mediator', 'desc')
            ->withAggregate('user_list', 'title')
            ->orderBy('user_list_title', 'desc')
            ->orderBy('user_diplom', 'desc')
            ->orderBy('avatar', 'desc');

        return $query;


    }

    public function get_data($user_type_id)
    {

        return $this->where('published', 1)
            ->where('user_type_id', $user_type_id)
            ->with('user_list')
            ->with('user_mediator')
            ->orderBy('stars', 'desc')
            ->orderBy('user_cert_mediator', 'desc')
            ->withAggregate('user_list', 'title')
            ->orderBy('user_list_title', 'desc')
            ->orderBy('user_diplom', 'desc')
            ->orderBy('avatar', 'desc');


    }

}
