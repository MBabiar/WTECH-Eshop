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
            let sizeInputs = document.querySelectorAll('input[name="size"]');
            let stockDisplay = document.getElementById("stock-display");

            sizeInputs.forEach((input) => {
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
                        stockDisplay.textContent = "Skladom (" + stock + "ks)";
                    } else {
                        stockDisplay.textContent = "Skladom (>5ks)";
                    }
                });
            });
        });

}

function incDecButtons() {
    let amountInput = document.getElementById("amount");
    let incButton = document.getElementById("inc-button");
    let decButton = document.getElementById("dec-button");

    incButton.onclick = function () {
        if (isNaN(parseInt(amountInput.value))) {
            amountInput.value = 1;
        } else {
            amountInput.value = parseInt(amountInput.value) + 1;
        }
    };

    decButton.onclick = function () {
        if (parseInt(amountInput.value) > 1) {
            amountInput.value = parseInt(amountInput.value) - 1;
        }
    };
}

switchImage();
clickVariant();
incDecButtons();
