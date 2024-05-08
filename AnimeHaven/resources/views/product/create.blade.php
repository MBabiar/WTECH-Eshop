<x-app-layout>
    <!-- Main Content -->
    <form class="needs-validation" novalidate>
        <div class="add-product-container">
            <div class="container-flex">
                <h1>Pridávanie Produktu</h1>
                <div class="row-input mt-3">
                    <label for="inputProdName" class="col-label">Názov Produktu</label>
                    <div class="col-input">
                        <input type="text" class="form-control" id="inputProdName" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Vyplň údaje.</div>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="inputProdCategory" class="col-label">Kategória</label>
                    <div class="col-input">
                        <select class="form-select" id="inputProdCategory" name="inputProdCategory" required>
                            <option value="1">Tričko</option>
                            <option value="2">Mikina</option>
                            <option value="3">Čiapka</option>
                        </select>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="inputProdAnime" class="col-label">Anime</label>
                    <div class="col-input">
                        <select class="form-select" id="inputProdAnime" name="inputProdAnime" required>
                            <option value="1">Naruto</option>
                            <option value="2">Bleach</option>
                            <option value="3">One Piece</option>
                        </select>
                    </div>
                </div>

                <div class="row-input mt-3">
                    <label for="inputProdColor" class="col-label">Farba</label>
                    <div class="col-input">
                        <select class="form-select" id="inputProdColor" name="inputProdColor" required>
                            <option value="1">Čierna</option>
                            <option value="2">Biela</option>
                            <option value="3">Červená</option>
                            <option value="4">Modrá</option>
                        </select>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="inputProdPrice" class="col-label">Cena ( € )</label>
                    <div class="col-input">
                        <input type="number" class="form-control" id="inputProdPrice" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Vyplň údaje.</div>
                    </div>
                </div>
                <div class="row-input mt-3">
                    <label for="inputProdDescription" class="col-label">Popis Produktu</label>
                    <div class="col-input">
                        <!-- Any content between the opening and closing tags of a <textarea> is considered its default value. Therefore closing tag needs to be exactly after opening tag if we don't want to have any spaces in textarea. If I would place closing tag in the next line there would be spaces due to indentation-->
                            <textarea
                                class="form-control input-description"
                                id="inputProdDescription"
                                required></textarea>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Nahraj obrázky produktu</label>
                        <input
                            class="form-control"
                            type="file"
                            id="formFileMultiple"
                            multiple
                            required
                            onchange="validateFileInput(this)" />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Vyplň údaje.</div>
                    </div>
                    <div class="row-input mt-3">
                        <div class="col-input">
                            <button type="submit" class="btn btn-primary">Pridaj Produkt</button>
                        </div>
                    </div>
                    <script>
                        function validateFileInput(input) {
                            if (input.files.length < 2) {
                                input.setCustomValidity('Please upload at least 2 files.');
                            } else {
                                input.setCustomValidity('');
                            }
                        }
                    </script>
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
