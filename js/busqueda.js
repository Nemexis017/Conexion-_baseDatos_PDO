window.onload= function(){
    // para la busqueda de usuarios
    document.querySelector('.form-control').onkeyup = function(){
        var input = document.getElementById('buscadorN');
            var filtro = input.value.toUpperCase();
            var tabla = document.getElementById('tablaQuery');
            var filas = tabla.getElementsByTagName('tr');
        
            for (var i = 0; i < filas.length; i++) {
                var celdas = filas[i].getElementsByTagName('td');
                var encontrado = false;
        
                for (var j = 0; j < celdas.length; j++) {
                    var contenido = celdas[j].textContent || celdas[j].innerText;
        
                    if (contenido.toUpperCase().indexOf(filtro) > -1) {
                        encontrado = true;
                        break;
                    }
                }
        
                if (encontrado) {
                    filas[i].style.display = '';
                    filas[i].classList.add('highlight');
                } else {
                    filas[i].style.display = 'none';
                    filas[i].classList.remove('highlight');
                }
            }
    
    }
}



