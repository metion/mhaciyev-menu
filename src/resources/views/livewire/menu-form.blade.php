<div>
    <div class="btn-group my-2" role="group">
        @foreach($languages as $language)
            <button wire:click="setLanguage('{{$language}}')" type="button" class="btn btn-primary {{$language == $selectedLanguage ? 'active' : ''}}">{{$language}}</button>
        @endforeach
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input wire:model="title.{{$selectedLanguage}}" id="title" type="text" name="title" value="{{data_get($title,$selectedLanguage)}}" class="form-control  @error("title.$selectedLanguage") is-invalid @enderror">
        @error("title.$selectedLanguage")
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="value">Value</label>
        <input wire:model="value.{{$selectedLanguage}}" id="value" type="text" name="value" value="{{data_get($value,$selectedLanguage)}}" class="form-control  @error("value.$selectedLanguage") is-invalid @enderror">
        @error("value.$selectedLanguage")
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="group_id">Menu groups</label>
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
    <div class="form-group">
        <label for="target_mode">Target mode</label>
        <select wire:model="target_mode" name="target_mode" id="target_mode" class="form-select  @error('target_mode') is-invalid @enderror">
            <option value="true">Yes</option>
            <option value="false">No</option>
        </select>
        @error('target_mode')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="active">Active</label>
        <select wire:model="active" name="active" id="active" class="form-select  @error('active') is-invalid @enderror">
            <option value="true">Yes</option>
            <option value="false">No</option>
        </select>
        @error('active')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group mt-2">
        <div wire:click="save" class="btn btn-primary">Save</div>
    </div>
</div>
