<?php

namespace MHaciyev\Menu\Services;

use Illuminate\Database\Eloquent\Model;
use MHaciyev\Menu\App\Request\MenuGroupRequest;
use MHaciyev\Menu\App\Models\MenuGroup;
use MHaciyev\Menu\Repositories\MenuGroupRepository;

class MenuGroupService
{
    private MenuGroupRepository $repository;

    public function __construct(MenuGroupRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getMenuGroupList(int $perPage = 0)
    {
        return $perPage != 0 ? $this->repository->paginate($perPage) : \Cache::rememberForever($this->repository->cacheName, fn() => $this->repository->all());
    }

    public function addMenuGroup(MenuGroupRequest $request): Model
    {
        $title = \Str::slug($request->title, '_');
        return $this->repository->save(['title' => $title], new $this->repository->modelClass());
    }

    public function updateMenuGroup(MenuGroupRequest $request, MenuGroup $menuGroup): Model
    {
        $title = \Str::slug($request->title, '_');
        return $this->repository->save(['title' => $title], $menuGroup);
    }

    public function deleteMenuGroup($id)
    {
        $this->repository->delete($id);
    }
}
