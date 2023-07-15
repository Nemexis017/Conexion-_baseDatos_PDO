// Validacion del formulario
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })();

// confirmacion de borrar datos

function eliminarDato(id) {
  if (confirm("¿Estás seguro de que deseas eliminar este dato?")) {
    // Realiza una petición AJAX para enviar el ID del dato a un archivo PHP que realizará la eliminación en la base de datos
    fetch('index.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ id: id })
    })
      .then(response => response.text())
      .then(result => {
        // Realiza acciones después de la eliminación exitosa, como mostrar un mensaje de éxito o actualizar la tabla
      })
      .catch(error => {
        // Manejar errores durante la eliminación
      });
  }
}




