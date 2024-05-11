<x-app-layout>
    <!-- Main content -->
    <x-profile-nav :active="'password'" />

    <!-- Zmena hesla -->
    <div class="form-container">
        <form method="POST" action="{{ route('password.change') }}">
            @csrf

            <div class="mb-3 ">
                <div class="row">
                    <label for="inputPassword" class="col-3 col-form-label">Staré heslo</label>
                    <div class="col-8">
                        <input type="password" id="inputPassword" class="form-control" name="current_password"
                            placeholder="Staré heslo" required autofocus />
                    </div>
                </div>
            </div>

            <div class="mb-3 ">
                <div class="row">
                    <label for="inputPassword" class="col-3 col-form-label">Nové heslo</label>
                    <div class="col-8">
                        <input type="password" id="inputPassword" class="form-control" name="password"
                            placeholder="Nové heslo" required autofocus />
                    </div>
                </div>
            </div>

            <div class="mb-3 ">
                <div class="row">
                    <label for="inputPassword" class="col-3 col-form-label">Potvrdenie hesla</label>
                    <div class="col-8">
                        <input type="password" id="inputPassword" class="form-control" name="password_confirmation"
                            placeholder="Potvrdenie hesla" required autofocus />
                    </div>
                </div>


                <button class="btn btn-primary" type="submit">Zmeniť heslo</button>
        </form>
    </div>
</x-app-layout>
