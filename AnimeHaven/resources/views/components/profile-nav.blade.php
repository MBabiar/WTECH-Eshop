<div class="container-fluid user-profile-menu">
    <div class="row products-nav-2 mt-1 mb-1 justify-content-center">
        <button type="button" class="button-order {{ $active == 'password' ? 'active' : '' }}"
            onclick="window.location.href='{{ route('password.change') }}'">
            Zmena hesla
        </button>
        <button type="button" class="button-order {{ $active == 'orders' ? 'active' : '' }}"
            onclick="window.location.href='{{ route('orders') }}'">
            Moje objednávky
        </button>
    </div>
</div>
