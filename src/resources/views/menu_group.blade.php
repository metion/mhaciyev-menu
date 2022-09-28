@extends('menu::views.layout.app')
@section('title','MenuGroup')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                @livewire('menu-group-list')
            </div>
            <div class="col-4">
                @livewire('menu-group-form')
            </div>
        </div>
    </div>
@endsection
@push('footer')
    <script>

    </script>
@endpush
