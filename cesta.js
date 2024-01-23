function agregarAlCarrito(nombre, precio, indice) {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

    let productoExistente = carrito.find(item => 
        item.producto.toLowerCase() === nombre.toLowerCase() && item.indice === indice
    );

    if (productoExistente) {
        alert("¡¡¡A donde vas Nanolover!!! Recuerda que no puedes repetir productos, selecciona los que mas te gusten pero solo lleva uno de cada (deja un poco para el resto)");
    } else {
        carrito.push({ producto: nombre, precio: precio, indice: indice });
        localStorage.setItem('carrito', JSON.stringify(carrito));

        mostrarCarrito();
        actualizarTotal();
    }
}