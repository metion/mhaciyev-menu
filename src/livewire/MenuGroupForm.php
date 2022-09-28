<?php

namespace MHaciyev\Menu\Livewire;

use Livewire\Component;
use MHaciyev\Menu\App\Models\MenuGroup;
use MHaciyev\Menu\App\Http\Request\MenuGroupRequest;
use MHaciyev\Menu\Services\MenuGroupService;

class MenuGroupForm extends Component
{
    public ?int $menuGroupId = null;
    public string $title = "";
    private MenuGroupService $service;
    protected $listeners = ['fillForm' => 'fillForm'];

    public function boot(MenuGroupService $service)
    {
        $this->rules = (new MenuGroupRequest())->rules();
        $this->service = $service;
    }

    public function render()
    {
        return view('menu::views.livewire.menu-group-form');
    }

    public function save()
    {
        $data = $this->validate();
        if ($this->menuGroupId) {
            ;
            if (!$menuGroup = MenuGroup::where('id', $this->menuGroupId)->first()) {
                $this->resetForm();
            } else {
                $this->service->updateMenuGroup(new MenuGroupRequest($data), $menuGroup);
            }
        } else {
            $this->service->addMenuGroup(new MenuGroupRequest($data));
        }
        $this->emit('refreshGroupList');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->title = "";
        $this->menuGroupId = null;
    }

    public function fillForm($menuGroup)
    {
        $this->title = $menuGroup['title'];
        $this->menuGroupId = $menuGroup['id'];
    }

    public function updatedTitle($title)
    {
        $this->validateOnly('title');
    }


}
