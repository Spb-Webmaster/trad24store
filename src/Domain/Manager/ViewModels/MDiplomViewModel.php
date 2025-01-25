<?php

namespace Domain\Manager\ViewModels;

use App\Models\Diplom;
use Support\Traits\Makeable;

class MDiplomViewModel
{
    use Makeable;

    /**
     * @return Diplom[]|array|
     * все дипломы
     */
    public function diploms() {
        $diploms  = Diplom::query()
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));
        if($diploms) {
            return $diploms;
        }
        return [];
    }


    /**
     * @param $id
     * диплом
     */

    public function diplom($id)
    {
        $diplom = Diplom::query()
            ->where('id', $id)
            ->first();
        return $diplom;
    }



    /**
     * @return Diplom[]|array|
     * поиск диплома
     */
    public function search_diplom($request) {
        $diploms = Diplom::query()
            ->where("title", "like", "%" . $request->search . "%")
            ->orWhere("name", "like", "%" . $request->search . "%")
            ->orWhere("training", "like", "%" . $request->search . "%")
            ->paginate(config('site.constants.paginate'));

        if($diploms) {
            return $diploms;
        }
        return [];
            }

}
