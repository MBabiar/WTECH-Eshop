<x-app-layout>
    <!-- Main content -->
    <div class="container-fluid user-profile-menu">
        <div class="row products-nav-2 mt-1 mb-1 justify-content-center">
            <button type="button" class="button-order" onclick="window.location.href='{{ route('password.change') }}'">
                Zmena hesla
            </button>
            <button type="button" class="button-order" onclick="window.location.href='{{ route('orders') }}'">
                Moje objednávky
            </button>
        </div>
    </div>

    {{-- TODO: What is this? --}}
    <div class="content"></div>
</x-app-layout>
