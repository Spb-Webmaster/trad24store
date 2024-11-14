<?php

namespace App\MoonShine\Fields;

use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentAttributeBag;
use MoonShine\Components\Files;
use MoonShine\Fields\Field;
use MoonShine\Traits\Fields\CanBeMultiple;
use MoonShine\Traits\Fields\FileDeletable;
use MoonShine\Traits\Fields\FileTrait;
use MoonShine\Traits\Removable;

class Node extends  Field
{


    protected string $view = 'moonshine.fields.node';




}
