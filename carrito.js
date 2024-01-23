document.addEventListener("DOMContentLoaded", function () {
    mostrarCarrito();
});

function mostrarCarrito() {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    let carritoContainer = document.getElementById('carrito-container');
    carritoContainer.innerHTML = '';

    carrito.forEach(producto => {
        let productoDiv = document.createElement('div');
        productoDiv.classList.add('producto-carrito');
        productoDiv.innerHTML += `
            <p>${producto.producto}</p>
            <p>Precio: ${producto.precio.toFixed(2)}€</p>
        `;
        let quitarBtn = document.createElement('button');
        quitarBtn.textContent = 'Quitar';
        quitarBtn.addEventListener('click', function () {
            quitarDelCarrito(producto.producto);
            mostrarCarrito();
            actualizarTotal();
        });
        productoDiv.appendChild(quitarBtn);
        carritoContainer.appendChild(productoDiv);
    });

    actualizarTotal();
}

function quitarDelCarrito(producto) {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    carrito = carrito.filter(item => item.producto !== producto);
    localStorage.setItem('carrito', JSON.stringify(carrito));
}

function agregarAlCarrito(nombre, precio, indice) {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    carrito.push({ producto: nombre, precio: precio, indice: indice });
    localStorage.setItem('carrito', JSON.stringify(carrito));

    mostrarCarrito();
    actualizarTotal();
}

function realizarPago() {
    let total = calcularTotal();
    console.log("Total a pagar: " + total);

}

function actualizarTotal() {
    let total = 0;
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

    carrito.forEach(producto => {
        total += producto.precio;
    });

    document.getElementById('total-precio').innerText = total.toFixed(2);

    return total;
}

function vaciarCarrito() {
    localStorage.removeItem('carrito');
    mostrarCarrito();
    actualizarTotal();
}