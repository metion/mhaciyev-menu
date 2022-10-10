@extends('menu::views.layout.app')
@section('title','MenuGroup')
@section('mhmenu_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                @livewire('menu-list')
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                @livewire('menu-form')
            </div>
        </div>
    </div>
@endsection
