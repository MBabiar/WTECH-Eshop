// Switch Images

window.switchImage = function switchImage() {
    let mainImage = document.querySelector(".main-image");
    let subImages = document.querySelectorAll(".sub-image");

    subImages.forEach((image) => {
        image.addEventListener("click", function () {
            mainImage.src = this.src;
        });
    });
};

// Product Detail Page Script - Stock Display
window.fetchProductVariants = function fetchProductVariants() {
    let productId = window.productId;
    fetch(`/products/${productId}/variants`)
        .then((response) => response.json())
        .then((variants) => {
            let sizeInputs = document.querySelectorAll('input[name="size"]');
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
                        stockDisplay.textContent = "Skladom (" + stock + "ks)";
                    } else {
                        stockDisplay.textContent = "Skladom (&gt;5ks)";
                    }
                });
            });
        });
};
