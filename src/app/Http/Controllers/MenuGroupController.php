<?php

namespace MHaciyev\Menu\App\Http\Controllers;

use App\Http\Controllers\Controller;
use MHaciyev\Menu\app\MenuGroupRequest;
use MHaciyev\Menu\App\Models\MenuGroup;
use MHaciyev\Menu\Services\MenuGroupService;

class MenuGroupController extends Controller
{
    public function menuGroup()
    {
        return view('menu::views.menu_group');
    }
}
