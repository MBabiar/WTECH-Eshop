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

function validateFileInput(input) {
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
}

function changeVariantsOnCategory() {
    document.getElementById("category").addEventListener("change", function () {
        let variantElements = ["S", "M", "L", "XL"];
        if (this.value === "hat") {
            variantElements.forEach(function (id) {
                document.getElementById(
                    id
                ).parentElement.parentElement.hidden = true;
            });
            document.getElementById(
                "A"
            ).parentElement.parentElement.hidden = false;
        } else {
            variantElements.forEach(function (id) {
                document.getElementById(
                    id
                ).parentElement.parentElement.hidden = false;
            });
            document.getElementById(
                "A"
            ).parentElement.parentElement.hidden = true;
        }
    });
}

function setInitialVariants() {
    let categoryElement = document.getElementById("category");
    let variantElements = ["S", "M", "L", "XL"];

    if (categoryElement.value === "hat") {
        variantElements.forEach(function (id) {
            document.getElementById(
                id
            ).parentElement.parentElement.hidden = true;
        });
        document.getElementById("A").parentElement.parentElement.hidden = false;
    } else {
        variantElements.forEach(function (id) {
            document.getElementById(
                id
            ).parentElement.parentElement.hidden = false;
        });
        document.getElementById("A").parentElement.parentElement.hidden = true;
    }
}

validation();
changeVariantsOnCategory();
setInitialVariants();
