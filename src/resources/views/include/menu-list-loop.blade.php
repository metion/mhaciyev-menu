<ul class="{{$parent_id == null ? 'sortableMenu' : ''}} listsClass sTree2">
    @foreach($menuList->where('parent_id',$parent_id)->sortBy('sort_order') as $menu)
        <li id="{{$menu->id}}" class="s-l-open">
            <div class="li-item-container">
                <div class="clickable">{{$menu->id}}</div>
                <div class="clickable">{{$menu->title}}</div>
                <div class="d-flex justify-content-center clickable">
                    <button wire:click="toEdit({{$menu}})" class="btn btn-sm btn-primary mx-2 pe-auto">edit</button>
                    <button wire:click="toDelete({{$menu}})" class="btn btn-sm btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#delete-modal">delete</button>
                </div>
            </div>
            @include('menu::views.include.menu-list-loop',['menuList' => $menuList,'parent_id' => $menu->id])
        </li>
    @endforeach
</ul>
