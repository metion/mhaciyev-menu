<div>
    <div class="d-flex justify-content-between">
        <h1>Menu list</h1>
        <div class="form-group">
            <label for="group_id">Menu group</label>
            <select wire:model="group_id" name="group_id" id="group_id" class="form-select  @error('group_id') is-invalid @enderror">
                <option value="">Select menu group</option>
                @foreach($menuGroups as $menuGroup)
                    <option value="{{$menuGroup->id}}">{{$menuGroup->title}}</option>
                @endforeach
            </select>
            @error('group_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="my-2">
        @include('menu::views.include.menu-list-loop',['menuList' => $menuList,'parent_id' => null])
    </div>

    <div class="modal fade" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button wire:click="delete" data-bs-dismiss="modal" type="button" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('mhmenu_head')
    <link rel="stylesheet" href="{{asset('vendor/mhaciyev_menu/css/menu-list.css')}}">
@endpush
@push('mhmenu_footer')
    <script src="{{asset('vendor/mhaciyev_menu/js/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/mhaciyev_menu/js/jquery-sortable-lists.js')}}"></script>
    <script>
        var list = $('.sortableMenu').sortableLists({
            placeholderCss: {'background-color': '#ff8'},
            hintCss: {'background-color': '#bbf'},
            onChange: function (cEl) {
                var data = list.sortableListsToArray();
                Livewire.emit('menuUpdated', data);
            },
            ignoreClass: 'clickable',
            insertZonePlus: true,
            opener: {
                active: false,
                as: 'html',
            }
        });
    </script>
@endpush
