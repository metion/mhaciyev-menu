<div>
    <div class="form-group">
        <label for="title">Title</label>
        <input wire:model="title" id="title" type="text" name="title" value="{{$title}}" class="form-control  @error('title') is-invalid @enderror">
        @error('title')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group mt-2">
        <div wire:click="save" class="btn btn-primary">Save</div>
    </div>
</div>
