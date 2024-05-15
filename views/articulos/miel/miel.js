document.getElementById("searchForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe por defecto

    var searchTerm = document.getElementById("searchInput").value;
    var newUrl = "/" + encodeURIComponent(searchTerm);

    // Cambiar la URL del navegador
    window.location.href = newUrl;
});