<x-app-layout>
    <!-- Main content -->
    <div class="container-fluid user-profile-menu">
        <div class="row products-nav-2 mt-1 mb-1 justify-content-center">
            <button type="button" class="button-order" onclick="window.location.href='{{ route('password-change') }}'">
                Zmena hesla
            </button>
            <button type="button" class="button-order active" onclick="window.location.href='{{ route('orders') }}'">
                Moje objednávky
            </button>
        </div>
    </div>

    <!-- Orders -->
    <div class="container-fluid user-profile-orders">
        <div class="row justify-content-center">
            <div>
                <div class="card mt-2">
                    <div class="card-header">
                        <h4>Objednávka č. 1</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Objednané produkty</h5>
                        <p class="card-text">Tričko s potlačou</p>
                        <p class="card-text">Mikina s potlačou</p>
                        <p class="card-text">Čiapka s potlačou</p>
                        <h5 class="card-title">Cena</h5>
                        <p class="card-text">100€</p>
                        <h5 class="card-title">Dátum</h5>
                        <p class="card-text">12.12.2021</p>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-header">
                        <h4>Objednávka č. 2</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Objednané produkty</h5>
                        <p class="card-text">Tričko s potlačou</p>
                        <p class="card-text">Mikina s potlačou</p>
                        <p class="card-text">Čiapka s potlačou</p>
                        <h5 class="card-title">Cena</h5>
                        <p class="card-text">100€</p>
                        <h5 class="card-title">Dátum</h5>
                        <p class="card-text">12.12.2021</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
