<x-app-layout>
    {{-- Product Edit Form --}}
    <form class="needs-validation" novalidate>
        <div class="add-product-container">
            <div class="container-flex">
                <h1>Úprava Produktu</h1>
                <div class="row-input mt-3">
                    <label for="inputProdName" class="col-label">Názov Produktu</label>
                    <div class="col-input">
                        <input type="text" class="form-control" id="inputProdName" value="{{ $product->name }}"
                            required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Vyplň údaje.</div>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="inputProdCategory" class="col-label">Kategória</label>
                    <div class="col-input">
                        <select class="form-select" id="inputProdCategory" name="inputProdCategory" required>
                            <option value="shirt" {{ $product->category === 'shirt' ? 'selected' : '' }}>T-Shirt
                            </option>
                            <option value="hoodie" {{ $product->category === 'Bleach' ? 'selected' : '' }}>Hoodie
                            </option>
                            <option value="hat" {{ $product->category === 'hat' ? 'selected' : '' }}>Hat</option>
                        </select>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="inputProdAnime" class="col-label">Anime</label>
                    <div class="col-input">
                        <select class="form-select" id="inputProdAnime" name="inputProdAnime" required>
                            <option value="Naruto" {{ $product->anime === 'Naruto' ? 'selected' : '' }}>Naruto</option>
                            <option value="Bleach" {{ $product->anime === 'Bleach' ? 'selected' : '' }}>Bleach</option>
                            <option value="Death Note" {{ $product->anime === 'Death Note' ? 'selected' : '' }}>
                                Death Note</option>
                        </select>
                    </div>
                </div>

                <div class="row-input mt-3">
                    <label for="inputProdColor" class="col-label">Farba</label>
                    <div class="col-input">
                        <select class="form-select" id="inputProdColor" name="inputProdColor" required>
                            <option value="black" {{ $product->color === 'black' ? 'selected' : '' }}>Čierna</option>
                            <option value="white" {{ $product->color === 'white' ? 'selected' : '' }}>Biela</option>
                            <option value="blue" {{ $product->color === 'blue' ? 'selected' : '' }}>Modrá</option>
                        </select>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="inputProdPrice" class="col-label">Cena ( € )</label>
                    <div class="col-input">
                        <input type="number" class="form-control" id="inputProdPrice" value="{{ $product->price }}"
                            required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Vyplň údaje.</div>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="inputProdDescription" class="col-label">Popis Produktu</label>
                    <div class="col-input">
                        <textarea class="form-control input-description" id="inputProdDescription" required>{{ $product->description }}</textarea>
                        <div class="valid-feedback">Looks good!</div>
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
    <form class="needs-validation" novalidate>
        <div class="add-product-container">
            <div class="container-flex">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Nahraj obrázky produktu</label>
                    <input class="form-control" type="file" id="formFileMultiple" multiple required
                        onchange="validateFileInput(this)" />
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Vyplň údaje.</div>
                </div>
                <div class="row-input mt-3">
                    <div class="col-input">
                        <button type="submit" class="btn btn-primary">Pridaj fotku/fotky</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            let forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener(
                    'submit',
                    function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    },
                    false
                );
            });
        })();
    </script>
</x-app-layout>
