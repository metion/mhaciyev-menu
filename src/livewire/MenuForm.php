<?php

namespace MHaciyev\Menu\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use MHaciyev\Menu\App\Http\Request\MenuRequest;
use MHaciyev\Menu\app\Models\Menu;
use MHaciyev\Menu\Enums\LinkType;
use MHaciyev\Menu\Services\MenuGroupService;
use MHaciyev\Menu\Services\MenuService;

class MenuForm extends Component
{
    public ?int $menuId = null;
    public ?int $group_id = null;
    public array $title = [];
    public array $value = [];
    public string $target_mode = "true";
    public string $active = "true";
    public Collection $menuGroups;
    public array $languages = [];
    public string $selectedLanguage;
    protected MenuService $service;


    protected $listeners = ['fillForm' => 'fillForm'];

    public function mount(MenuGroupService $menuGroupService)
    {
        $this->rules = (new MenuRequest())->rules();
        $this->link_type = LinkType::CUSTOM->value;
        $this->menuGroups = $menuGroupService->getMenuGroupList();
        $this->languages = config('mhaciyev_menu.languages');
        $this->selectedLanguage = collect($this->languages)->firstOrFail();
    }

    public function boot(MenuService $service)
    {
        $this->service = $service;
    }

    public function render()
    {
        return view('menu::views.livewire.menu-form');
    }

    public function save()
    {
        $data = $this->validate();
        $data['target_mode'] = $this->target_mode === "true" ? 1 : 0;
        $data['active'] = $this->active === "true" ? 1 : 0;
        if ($this->menuId) {
            if (!$menu = Menu::where('id', $this->menuId)->first()) {
                $this->resetForm();
            } else {
                $this->service->updateMenu(new MenuRequest($data), $menu);
            }
        } else {
            $this->service->addMenu(new MenuRequest($data));
        }
        $this->emit('refreshList', $data['group_id']);
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->title = [];
        $this->menuId = null;
        $this->group_id = null;
        $this->value = [];
        $this->target_mode = "true";
        $this->active = "true";
    }

    public function fillForm($menu)
    {
        $this->title = $menu['title'];
        $this->menuId = $menu['id'];
        $this->group_id = $menu['group_id'];
        $this->value = $menu['value'];
        $this->target_mode = $menu['target_mode'] ? "true" : "false";
        $this->active = $menu['active'] ? "true" : "false";
    }

    public function updated()
    {
        $this->validate();
    }

    public function setLanguage($lang)
    {
        $this->selectedLanguage = $lang;
    }


}
