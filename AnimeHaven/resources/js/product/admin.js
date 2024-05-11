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

validation();
