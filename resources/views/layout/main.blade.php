@include('layout.header')

{{-- <div class="container background-image" style="background-image: url('@yield('background-image')');">
    @yield('main-section')
</div> --}}

<div class="background-image" style="background-image: url('@yield('background-image')');">
    @yield('main-section')
</div>

@include('layout.footer')