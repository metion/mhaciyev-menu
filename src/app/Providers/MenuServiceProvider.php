<?php

namespace MHaciyev\Menu\App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use MHaciyev\Menu\App\Http\Middleware\VerifyCsrfToken;
use MHaciyev\Menu\Livewire\MenuForm;
use MHaciyev\Menu\Livewire\MenuGroupForm;
use MHaciyev\Menu\Livewire\MenuGroupList;
use MHaciyev\Menu\Livewire\MenuList;

class MenuServiceProvider extends ServiceProvider
{
    public function register()
    {
        require_once __DIR__ . '/../../helper.php';
    }

    public function boot()
    {
        $this->configurePackage();
        $this->configureLivewire();

    }

    public function configurePackage()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../../resources', 'menu');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
        $this->publishes([
            __DIR__ . '/../../database/migrations' => 'database/migrations',
            __DIR__ . '/../../config/mhaciyev_menu.php' => config_path('mhaciyev_menu.php'),
            __DIR__ . '/../../public/assets' => public_path('vendor/mhaciyev_menu')
        ], 'init-mhaciyev-menu');
        $this->publishes([
            __DIR__ . '/../../resources/views' => 'resources/views/mhaciyev/',
        ], 'customize-mhaciyev-menu');
        $this->mergeConfigFrom(__DIR__ . '/../../config/mhaciyev_menu.php', 'mhaciyev_menu');
    }

    public function configureLivewire()
    {
        Livewire::component('menu-group-form', MenuGroupForm::class);
        Livewire::component('menu-group-list', MenuGroupList::class);
        Livewire::component('menu-form', MenuForm::class);
        Livewire::component('menu-list', MenuList::class);
    }
}
