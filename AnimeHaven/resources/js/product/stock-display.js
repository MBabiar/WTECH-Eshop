// Product Detail Page Script - Stock Display
function fetchProductVariants() {
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

            // Trigger a 'change' event on the initially selected size input
            document
                .querySelector('input[name="size"]:checked')
                .dispatchEvent(new Event("change"));
        });
}
