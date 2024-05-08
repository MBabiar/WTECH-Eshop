<x-app-layout>
    {{-- Product Edit Form --}}
    <form action="{{ route('product.update', $product) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="add-product-container">
            <div class="container-flex">
                <h1>Úprava Produktu</h1>
                <div class="row-input mt-3">
                    <label for="name" class="col-label">Názov Produktu</label>
                    <div class="col-input">
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $product->name }}" required />
                        <div class="invalid-feedback">Vyplň údaje.</div>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="category" class="col-label">Kategória</label>
                    <div class="col-input">
                        <select class="form-select" id="category" name="category" required>
                            <option value="shirt" {{ $product->category === 'shirt' ? 'selected' : '' }}>T-Shirt
                            </option>
                            <option value="hoodie" {{ $product->category === 'hoodie' ? 'selected' : '' }}>Hoodie
                            </option>
                            <option value="hat" {{ $product->category === 'hat' ? 'selected' : '' }}>Hat</option>
                        </select>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="anime" class="col-label">Anime</label>
                    <div class="col-input">
                        <select class="form-select" id="anime" name="anime" required>
                            <option value="Naruto" {{ $product->anime === 'Naruto' ? 'selected' : '' }}>Naruto</option>
                            <option value="Bleach" {{ $product->anime === 'Bleach' ? 'selected' : '' }}>Bleach</option>
                            <option value="Death Note" {{ $product->anime === 'Death Note' ? 'selected' : '' }}>
                                Death Note</option>
                        </select>
                    </div>
                </div>

                <div class="row-input mt-3">
                    <label for="color" class="col-label">Farba</label>
                    <div class="col-input">
                        <select class="form-select" id="color" name="color" required>
                            <option value="black" {{ $product->color === 'black' ? 'selected' : '' }}>Čierna</option>
                            <option value="white" {{ $product->color === 'white' ? 'selected' : '' }}>Biela</option>
                            <option value="blue" {{ $product->color === 'blue' ? 'selected' : '' }}>Modrá</option>
                        </select>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="price" class="col-label">Cena ( € )</label>
                    <div class="col-input">
                        <input type="decimal" class="form-control" id="price" name="price"
                            value="{{ $product->price }}" required />
                        <div class="invalid-feedback">Vyplň údaje.</div>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="description" class="col-label">Popis Produktu</label>
                    <div class="col-input">
                        <textarea class="form-control input-description" id="description" name="description" required>{{ $product->description }}</textarea>
                        <div class="invalid-feedback">Vyplň údaje.</div>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <div class="col-input">
                        <button type="submit" class="btn btn-primary">Zmeň údaje</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Product Add Image Form --}}
    <form action="{{ route('product.addImage', $product) }}" method="POST" class="needs-validation"
        enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="add-product-container">
            <div class="container-flex">
                <div class="mb-3">
                    <label for="image" class="form-label">Nahraj obrázky produktu</label>
                    <input type="file" id="image" name="image[]" onchange="window.validateFileInput(this)"
                        multiple required class="form-control" />
                    <div class="invalid-feedback">Vyberte Fotku.</div>
                </div>
                <div class="row-input mt-3">
                    <div class="col-input">
                        <button type="submit" class="btn btn-primary">Pridaj fotku/fotky</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Product Images For Deleting --}}
    <div class="container add-product-container">
        <h1>Vymazať obrázok produktu</h1>
        <div class="row">
            @foreach ($images as $image)
                <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                    <div class="card">
                        <img src="{{ asset($image->image) }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <form action="{{ route('product.destroyImage', $product) }}" method="POST"
                                class="delete-product-form">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="image_id" value="{{ $image->id }}" />
                                <button type="submit" class="delete-image-btn">Vymazať</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            window.productEditScripts();
        });
    </script>
</x-app-layout>
