window.onload= function(e){
    document.querySelector('.borrarDel').onclick= function confirmacion(){
        if(confirm('¿Estas seguro de eliminar este registro?')){
            return true;
        } else(
            e.preventDefault()
        ); 
        
        
    }
}




// function confirmacion(e){
//     if (confirm('¿Estas seguro que deseas hacerlo?')){
//         return true; 
//     } else{
//         e.preventDefault(); 
//     }
// }

// let  uDelete =document.querySelectorAll('borrarDel');

// for (var i = 0; i < uDelete.length; i++){
//     uDelete[i].addEventListener('click', confirmacion);
// }