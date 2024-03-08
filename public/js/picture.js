document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("picture");
    const urlInput = document.getElementById("url_picture");
    const btnUrl = document.getElementById("btn-url");
    const btnPic = document.getElementById("btn-pic");

    fileInput.addEventListener("change", function () {
        if (fileInput.files.length > 0) {
            // Si se selecciona un archivo, deshabilitar el campo de URL
            urlInput.disabled = true;
            urlInput.value = ""; // Limpiar el valor del campo de URL
        } else {
            // Si no se selecciona ningún archivo, habilitar el campo de URL
            urlInput.disabled = false;
        }
    });

    urlInput.addEventListener("input", function () {
        if (urlInput.value.trim() !== "") {
            // Si se introduce una URL, deshabilitar el campo de selección de archivo
            fileInput.disabled = true;
            fileInput.value = ""; // Limpiar el valor del campo de selección de archivo
        } else {
            // Si no se introduce ninguna URL, habilitar el campo de selección de archivo
            fileInput.disabled = false;
        }
    });

    

    btnUrl.addEventListener("click", function () {
        fileInput.disabled = false;
        urlInput.value = "";
        console.log("click url");
    });

    btnPic.addEventListener("click", function () {
        urlInput.disabled = false;
        fileInput.value = "";
        console.log("click pic");
    });

    
});