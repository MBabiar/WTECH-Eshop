<x-app-layout>
    <!-- Main Content -->
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation"
        novalidate>
        @csrf
        <div class="add-product-container">
            <div class="container-flex">
                <h1>Pridávanie Produktu</h1>
                <div class="row-input mt-3">
                    <label for="name" class="col-label">Názov Produktu</label>
                    <div class="col-input">
                        <input type="text" class="form-control" id="name" name="name" required />
                        <div class="invalid-feedback">Vyplň údaje.</div>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="category" class="col-label">Kategória</label>
                    <div class="col-input">
                        <select class="form-select" id="category" name="category" required>
                            <option value="" hidden></option>
                            <option value="shirt">Tričko</option>
                            <option value="hoodie">Mikina</option>
                            <option value="hat">Čiapka</option>
                        </select>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="anime" class="col-label">Anime</label>
                    <div class="col-input">
                        <select class="form-select" id="anime" name="anime" required>
                            <option value="" hidden></option>
                            <option value="Naruto">Naruto</option>
                            <option value="Bleach">Bleach</option>
                            <option value="Death Note">Death Note</option>
                        </select>
                    </div>
                </div>

                <div class="row-input mt-3">
                    <label for="color" class="col-label">Farba</label>
                    <div class="col-input">
                        <select class="form-select" id="color" name="color" required>
                            <option value="" hidden></option>
                            <option value="black">Čierna</option>
                            <option value="white">Biela</option>
                            <option value="blue">Modrá</option>
                        </select>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="price" class="col-label">Cena ( € )</label>
                    <div class="col-input">
                        <input type="decimal" class="form-control" id="price" name="price" required />
                        <div class="invalid-feedback">Vyplň údaje.</div>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="description" class="col-label">Popis Produktu</label>
                    <div class="col-input">
                        <textarea id="description" name="description" required class="form-control input-description"></textarea>
                        <div class="invalid-feedback">Vyplň údaje.</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mainImage" class="form-label">Nahraj hlavný obrázok produktu</label>
                    <input type="file" id="mainImage" name="mainImage" onchange="window.validateFileInput(this)"
                        required class="form-control" />
                    <div class="invalid-feedback">Vyber obrázok.</div>
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">Nahraj ďalšie obrázky produktu</label>
                    <input type="file" id="images" name="images[]" onchange="window.validateFileInput(this)"
                        required class="form-control" />
                    <div class="invalid-feedback">Vyber obrázok/y.</div>
                </div>
                <div class="row-input mt-3">
                    <div class="col-input">
                        <button type="submit" class="btn btn-primary">Pridaj Produkt</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Scripts --}}
    @vite(['resources/js/product/admin.js']);
</x-app-layout>
