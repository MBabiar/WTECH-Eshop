<x-app-layout>
    <!-- Main Content -->
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation"
        novalidate>
        @csrf
        <div class="add-product-container">
            <h1>Pridávanie Produktu</h1>

            <div class="d-lg-flex d-xl-flex">
                {{-- Product Information --}}
                <div class="product-form-left">
                    <h4>Všeobecné informácie</h4>
                    {{-- Name --}}
                    <div class="row-input mt-3">
                        <label for="name" class="col-label">Názov Produktu</label>
                        <div class="col-input">
                            <input type="text" class="form-control" id="name" name="name" required />
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>

                    {{-- Category --}}
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

                    {{-- Anime --}}
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

                    {{-- Color --}}
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

                    {{-- Price --}}
                    <div class="row-input mt-3">
                        <label for="price" class="col-label">Cena ( € )</label>
                        <div class="col-input">
                            <input type="decimal" class="form-control" id="price" name="price" required />
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="row-input mt-3">
                        <label for="description" class="col-label">Popis Produktu</label>
                        <div class="col-input">
                            <textarea id="description" name="description" required class="form-control input-description"></textarea>
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                </div>

                {{-- Variants --}}
                <div class="product-form-right">
                    <h4>Varianty</h4>
                    <div class="row-input mt-3" hidden>
                        <label for="S" class="col-label-variant">S</label>
                        <div class="col-input-variant">
                            <input type="number" id="S" name="S" min="0" value="0" required
                                class="form-control-variant" />
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <div class="row-input mt-3" hidden>
                        <label for="M" class="col-label-variant">M</label>
                        <div class="col-input-variant">
                            <input type="number" id="M" name="M" min="0" value="0" required
                                class="form-control-variant" />
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <div class="row-input mt-3" hidden>
                        <label for="L" class="col-label-variant">L</label>
                        <div class="col-input-variant">
                            <input type="number" id="L" name="L" min="0" value="0" required
                                class="form-control-variant" />
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <div class="row-input mt-3" hidden>
                        <label for="XL" class="col-label-variant">XL</label>
                        <div class="col-input-variant">
                            <input type="number" id="XL" name="XL" min="0" value="0"
                                required class="form-control-variant" />
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <div class="row-input mt-3" hidden>
                        <label for="A" class="col-label-variant">A</label>
                        <div class="col-input-variant">
                            <input type="number" id="A" name="A" min="0" value="0"
                                required class="form-control-variant" />
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Images --}}
            <div class="product-image-container">
                <h2>Fotky</h2>
                {{-- Main Image --}}
                <div class="mb-3">
                    <label for="mainImage" class="form-label">Nahraj hlavný obrázok produktu</label>
                    <input type="file" id="mainImage" name="mainImage" onchange="window.validateFileInput(this)"
                        required class="form-control" />
                    <div class="invalid-feedback">Vyber obrázok.</div>
                </div>

                {{-- Additional Images --}}
                <div class="mb-3">
                    <label for="images" class="form-label">Nahraj ďalšie obrázky produktu</label>
                    <input type="file" id="images" name="images[]" onchange="window.validateFileInput(this)"
                        required class="form-control" />
                    <div class="invalid-feedback">Vyber obrázok/y.</div>
                </div>

                {{-- Submit Button --}}
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
