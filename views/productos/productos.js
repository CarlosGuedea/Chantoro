
function cargarProductos(url, opciones) {
  return fetch(url, opciones)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error en la solicitud: " + response.status);
      }
      return response.json();
    })
    .then((data) => {
      

    })
    .catch((error) => {
      // Manejo de errores
      console.error("Error de red:", error);
    });
}

// Llamas a la función cargarProductos con la URL y opciones deseadas
const url = "/proudcto-eliminar";
const opciones = {
  method: "DELETE",
  // Otras opciones, como encabezados, se pueden configurar aquí
};

// Supongamos que esto es la función que se ejecuta al recibir una nueva notificación
    function recibirNotificacion() {
        // Obtener el elemento del badge
        const badge = document.getElementById('contadorNotificaciones');

        // Mostrar el badge y aumentar el contador
        badge.style.display = 'block';
        // Suponiendo que ya hay una notificación, aumentar el contador en uno
        badge.textContent = parseInt(badge.textContent) + 1;
    }

    // Ejemplo: Simulación de recibir una nueva notificación después de un tiempo (solo para propósitos de demostración)
    setTimeout(recibirNotificacion, 3000); // Llamar a la función después de 3 segundos 

    function guardarEdicion(btn) {
        // Obtener la fila padre del botón
        const fila = btn.closest('tr');

        // Obtener los valores de los campos de entrada
        const idProducto = fila.cells[0].textContent;
        const nombre = fila.cells[1].querySelector('input').value;
        const descripcion = fila.cells[2].querySelector('input').value;
        const precio = fila.cells[3].querySelector('input').value;
        const stock = fila.cells[4].querySelector('input').value;

        // Aquí puedes enviar los datos al servidor usando AJAX o un formulario oculto
        // Ejemplo usando AJAX:
        // ...
        // Manejar clic en el botón de guardar

        // Realizar la solicitud AJAX para guardar los cambios
        fetch('/guardar-cambios-productos', {
                method: 'POST',
                body: JSON.stringify({
                    id_producto: idProducto,
                    nombre,
                    descripcion,
                    precio,
                    stock
                }),
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log('Guardado exitoso:', data);
                // Actualizar la fila con los datos nuevos (esto es solo visual, la persistencia de datos en el servidor depende de cómo manejes la solicitud)
                fila.cells[1].innerHTML = nombre;
                fila.cells[2].innerHTML = descripcion;
                fila.cells[3].innerHTML = precio;
                fila.cells[4].innerHTML = stock;
            })
            .catch(error => {
                console.error('Error al guardar:', error);
            });
    }
