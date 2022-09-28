<?php

namespace MHaciyev\Menu\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use MHaciyev\Menu\Services\MenuGroupService;

class MenuGroupList extends Component
{
    public array|Collection $menuGroupList = [];
    public ?int $deleteId;
    private MenuGroupService $service;
    protected $listeners = ['refreshGroupList' => 'loadMenuGroupList'];

    public function boot(MenuGroupService $service)
    {
        $this->service = $service;
        $this->loadMenuGroupList();
    }

    public function loadMenuGroupList()
    {
        $this->menuGroupList = $this->service->getMenuGroupList();
        $this->deleteId = null;
    }

    public function toEdit($menuGroup)
    {
        $this->emit('fillForm', $menuGroup);
    }

    public function toDelete($menuGroup)
    {
        $this->deleteId = $menuGroup['id'];
    }

    public function delete()
    {
        if ($this->deleteId) {
            $this->service->deleteMenuGroup($this->deleteId);
            $this->loadMenuGroupList();
        }
    }

    public function render()
    {
        return view('menu::views.livewire.menu-group-list');
    }


}
