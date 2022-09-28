<div>
    <h1>Menu group list</h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($menuGroupList as $menuGroup)
                <tr>
                    <th scope="row">{{$menuGroup->id}}</th>
                    <td>{{$menuGroup->title}}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <button wire:click="toEdit({{$menuGroup}})" class="btn btn-sm btn-primary mx-2 pe-auto">edit</button>
                            <button wire:click="toDelete({{$menuGroup}})" class="btn btn-sm btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#delete-modal">delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
