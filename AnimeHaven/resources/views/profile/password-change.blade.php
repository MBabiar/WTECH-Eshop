<x-app-layout>
    <!-- Main content -->
    <div class="container-fluid user-profile-menu">
        <div class="row products-nav-2 mt-1 mb-1 justify-content-center">
            <button type="button" class="button-order active"
                onclick="window.location.href='{{ route('password-change') }}'">
                Zmena hesla
            </button>
            <button type="button" class="button-order" onclick="window.location.href='{{ route('orders') }}'">
                Moje objednávky
            </button>
        </div>
    </div>

    <!-- Zmena hesla -->
    <div class="container-fluid user-profile-password mt-3 content">
        <div class="row">
            <div>
                <form class="form-signin">
                    <h1 class="h3 mb-3 font-weight-normal">Zmena hesla</h1>
                    <label for="inputPassword" class="sr-only">Staré heslo</label>
                    <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Staré heslo"
                        required autofocus />
                    <label for="inputPassword" class="sr-only">Nové heslo</label>
                    <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Nové heslo"
                        required autofocus />
                    <label for="inputPassword" class="sr-only">Potvrdenie nového hesla</label>
                    <input type="password" id="inputPassword" class="form-control mb-2"
                        placeholder="Potvrdenie nového hesla" required autofocus />
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Zmeniť heslo</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
