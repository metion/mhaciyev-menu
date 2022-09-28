<?php

namespace MHaciyev\Menu\Routes;

use MHaciyev\Menu\app\Http\Controllers\MenuController;
use MHaciyev\Menu\App\Http\Controllers\MenuGroupController;

\Route::group(['prefix' => config('mhaciyev_menu.route_prefix'),'middleware' => config('mhaciyev_menu.route_middleware')],function(){
    \Route::get('menu-group', [MenuGroupController::class, 'menuGroup'])->name('menu-group');
    \Route::get('menu/', [MenuController::class, 'menu'])->name('menu');
});
