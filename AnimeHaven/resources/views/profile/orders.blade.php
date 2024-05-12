<x-app-layout>
    <!-- Main content -->
    <x-profile-nav :active="'orders'" />
    <!-- Orders -->
    <div class="container-fluid user-profile-orders">
        <div class="row justify-content-center">
            <div>
                @foreach ($orders as $order)
                    <div class="card mt-2">
                        <div class="card-header">
                            <h4>Objednávka č. {{ $loop->iteration }}</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Objednané produkty</h5>
                            @foreach ($order->variants as $variant)
                                <p class="card-text">{{ $variant->product->name }} - {{ $variant->product->price }}€/ks -
                                    Počet kusov:
                                    {{ $variant->pivot->amount }}
                                </p>
                            @endforeach
                            <h5 class="card-title">Cena</h5>
                            <p class="card-text">{{ $order->price }}€</p>
                            <h5 class="card-title">Dátum</h5>
                            <p class="card-text">{{ $order->created_at->format('d.m.Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
