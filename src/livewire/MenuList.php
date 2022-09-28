<?php

namespace MHaciyev\Menu\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use MHaciyev\Menu\Services\MenuGroupService;
use MHaciyev\Menu\Services\MenuService;

class MenuList extends Component
{
    public Collection $menuList;
    public ?int $deleteId;
    private MenuService $service;
    protected $listeners = ['refreshList' => 'loadMenuList', 'menuUpdated' => 'menuUpdated'];
    public $group_id = null;
    public Collection $menuGroups;

    public function mount(MenuGroupService $menuGroupService)
    {
        $this->menuList = collect([]);
        $this->menuGroups = $menuGroupService->getMenuGroupList();
        if ($this->menuGroups->count()) {
            $this->group_id = $this->menuGroups->first()->id;
            $this->loadMenuList($this->group_id);
        }
    }

    public function boot(MenuService $service)
    {
        $this->service = $service;
    }

    public function loadMenuList($groupId)
    {
        $this->menuList = $this->service->getMenuList($groupId);
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
            $this->service->deleteMenu($this->deleteId);
            $this->loadMenuList($this->group_id);
        }
    }

    public function updatedGroupId($groupId)
    {
        $this->loadMenuList($groupId);
    }

    public function menuUpdated($data)
    {
        $this->service->sortMenu($data);
        $this->loadMenuList($this->group_id);
    }

    public function render()
    {
        return view('menu::views.livewire.menu-list');
    }


}
