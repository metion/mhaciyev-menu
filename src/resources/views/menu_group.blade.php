@if(config('mhaciyev_menu.layout') && config('mhaciyev_menu.yield_name'))
    @extends(config('mhaciyev_menu.layout'))
    @section(config('mhaciyev_menu.yield_name'))
        @include("menu::views.menu_group_view")
    @endsection
@else
    @include("menu::views.menu_group_view")

@endif
