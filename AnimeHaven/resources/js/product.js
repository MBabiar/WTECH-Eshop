// Switch Images

window.productShowScripts = function productShowScripts() {
    // Script for switching images
    function switchImage() {
        let mainImage = document.querySelector(".main-image");
        let subImages = document.querySelectorAll(".sub-image");

        subImages.forEach((image) => {
            image.addEventListener("click", function () {
                mainImage.src = this.src;
            });
        });
    }

    // Script for handling variant selection
    // Adds button-active class to the selected button (removes from others)
    // Displays stock information
    function clickVariant() {
        let productId = window.productId;
        fetch(`/products/${productId}/variants`)
            .then((response) => response.json())
            .then((variants) => {
                let sizeInputs =
                    document.querySelectorAll('input[name="size"]');
                let stockDisplay = document.getElementById("stock-display");

                sizeInputs.forEach((input) => {
                    input.addEventListener("change", function () {
                        let size = this.value;
                        let stock = variants.find(
                            (variant) => variant.size === size
                        ).stock;
                        if (stock <= 0) {
                            stockDisplay.textContent = "Nedostupné";
                        } else if (stock <= 5) {
                            stockDisplay.textContent =
                                "Skladom (" + stock + "ks)";
                        } else {
                            stockDisplay.textContent = "Skladom (&gt;5ks)";
                        }
                    });

                    // Add click event listener to handle the active button
                    input.parentElement.addEventListener("click", function () {
                        sizeInputs.forEach((inp) => {
                            inp.parentElement.classList.remove("button-active");
                        });

                        this.classList.add("button-active");

                        // Handle stock display here
                        let size = this.querySelector("input").value;
                        let stock = variants.find(
                            (variant) => variant.size === size
                        ).stock;
                        if (stock <= 0) {
                            stockDisplay.textContent = "Nedostupné";
                        } else if (stock <= 5) {
                            stockDisplay.textContent =
                                "Skladom (" + stock + "ks)";
                        } else {
                            stockDisplay.textContent = "Skladom (&gt;5ks)";
                        }
                    });
                });
            });
    }

    switchImage();
    clickVariant();
};

window.productEditScripts = function productEditScripts() {
    function validation() {
        "use strict";
        let forms = document.querySelectorAll(".needs-validation");
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener(
                "submit",
                function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add("was-validated");
                },
                false
            );
        });
    }

    validation();
};

window.validateFileInput = function (input) {
    let maxFileSize = 2 * 1024 * 1024; // 2MB
    if (input.files) {
        for (let file of input.files) {
            if (file.size > maxFileSize) {
                alert("File size must be less than 2MB");
                input.value = "";
                return false;
            }
        }
    }
    return true;
};
