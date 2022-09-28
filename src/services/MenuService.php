<?php

namespace MHaciyev\Menu\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use MHaciyev\Menu\App\Http\Request\MenuRequest;
use MHaciyev\Menu\app\Models\Menu;
use MHaciyev\Menu\Repositories\MenuRepository;

class MenuService
{
    private MenuRepository $repository;

    public function __construct(MenuRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getMenuList($group_id, int $perPage = 0)
    {
        return $perPage != 0 ? $this->repository->where('group_id', $group_id)->paginate($perPage) : $this->repository->query()->where('group_id', $group_id)->get();
    }

    public function addMenu(MenuRequest $request): Model
    {
        $data = $request->all();
        $data['sort_order'] = 0;
        return $this->repository->save($data, new $this->repository->modelClass());
    }

    public function updateMenu(MenuRequest $request, Menu $menuGroup): Model
    {
        $data = $request->all();
        $data['target_mode'] = $data['target_mode'] == "true" ? 1 : 0;
        return $this->repository->save($data, $menuGroup);
    }

    public function deleteMenu($id)
    {
        $this->repository->delete($id);
    }

    public function sortMenu($sortData)
    {
        $update_data = [];
        foreach ($sortData as $item) {
            $item_data = [
                'id' => $item['id'],
                'sort_order' => $item['order'],
                'parent_id' => $item['parentId'] ?? null
            ];
            $update_data[] = $item_data;
        }
        Menu::massUpdate($update_data, 'id');
    }
}
