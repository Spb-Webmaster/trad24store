<?php

namespace Domain\Partner\ViewModels;


use App\Models\Partner;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class PartnerViewModel
{
    use Makeable;

    public function partners(): Collection|null
    {
        $partners = Cache::rememberForever('partners', function () {

            return Partner::query()
                ->orderBy('sorting')
                ->take(50)
                ->get();
        });
        return $partners;

    }


}
