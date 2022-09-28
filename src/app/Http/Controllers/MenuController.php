<?php

namespace MHaciyev\Menu\app\Http\Controllers;

use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function menu()
    {
        return view('menu::views.menu');
    }
}
