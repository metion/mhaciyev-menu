<?php

namespace MHaciyev\Menu\app\Models;

use Iksaku\Laravel\MassUpdate\MassUpdatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Menu extends Model
{
    use HasTranslations,MassUpdatable;

    protected $table = 'menu';
    protected $guarded = [];

    public array $translatable = ['title', 'value'];

    protected $casts = [
        'title' => 'array',
        'value' => 'array'
    ];
}
