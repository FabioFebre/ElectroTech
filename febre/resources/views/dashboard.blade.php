<x-app-layout>
    <header class="header">
        <div class="contenedor">
            <div class="primera linea">
                <div class="logo">
                </div>

                <div>
                    <ul>
                        <li class="submenu">
                        <svg id="img-carrito" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <circle cx="6" cy="19" r="2" />
                            <circle cx="17" cy="19" r="2" />
                            <path d="M17 17h-11v-14h-2" />
                            <path d="M6 5l14 1l-1 7h-13" />
                        </svg>
                        <span id="contador-carrito" class="contador-carrito">0</span>

                            <div id="carrito">
                                <table id="lista-carrito" class="u-full-width">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="carrito-body"></tbody>
                                </table>
    
                                <a href="#" id="vaciar-carrito" class="button u-full-width">Vaciar Carrito</a>
                                <a href="{{ route('carrito') }}" id="comprar-carrito" class="button u-full-width">Ir al carrito</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="segunda linea">
                <h2 style="margin-left: 2rem;color:white;"> "Explora lo último en tecnología con ElectroTech. <br> Descubre una amplia selección de dispositivos <br> y gadgets para potenciar tu vida digital. "</h2>
                <div class="inputs">
                    <input id="categoria_buscar" class="input" type="text" placeholder="Buscar por categoría...">
                    <button id="btn_buscar" class="input-btn">Buscar</button>
                </div>
            </div>

            <div class="tercera linea">
                <div class="info">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shield-lock" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3" />
                        <circle cx="12" cy="11" r="1" />
                        <line x1="12" y1="12" x2="12" y2="14.5" />
                    </svg>
                    <p>Compras 100% seguras</p>
                </div>
                <div class="info">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-movie" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                        <line x1="8" y1="4" x2="8" y2="20" />
                        <line x1="16" y1="4" x2="16" y2="20" />
                        <line x1="4" y1="8" x2="8" y2="8" />
                        <line x1="4" y1="16" x2="8" y2="16" />
                        <line x1="4" y1="12" x2="20" y2="12" />
                        <line x1="16" y1="8" x2="20" y2="8" />
                        <line x1="16" y1="16" x2="20" y2="16" />
                    </svg>
                    <p>Miles de productos en tecnología para adquirir</p>
                </div>
                <div class="info">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 3l2.89 5.64l6.36.92l-4.63 4.5l1.09 6.35L12 16.25l-5.71 3.16l1.09-6.35l-4.63 -4.5l6.36 -.92L12 3" />
                    </svg>
                    <p>Consigue lo último en tecnología</p>
                </div>
            </div>
        </div>
    </header>
    <br>
    <main id="lista-cursos" class="main">
        <h2>Explora los productos</h2>
        
        <div class="peliculas grid"> 
            @foreach ($productos as $producto)         
                <div class="pelicula">
                    @if(!empty($producto->banner_image))
                        <img class="img" style="height: 240px; width: 100%;" src="{{ asset('images/'.$producto->banner_image) }}" alt="Banner">
                    @else
                        <p class="text-black">Imagen: Not available</p>
                    @endif
                    <p class="titulo">{{ $producto->marca }}</p>
                    <p class="genero">{{ $producto->modelo }}</p>
                    <div class="descripcion" style="display: none;">{{ $producto->descripcion }}</div>
                    <p class="costo" style="display: none;">{{ $producto->categoria->nombre_categoria }}</p>
                    <p class="show" style="color: black"><strong>Precio: </strong> ${{ $producto->precio }}</p>
                    <div class="boton">
                        <button class="agregar-carrito" 
                                data-id="{{ $producto['modelo'] }}" 
                                data-nombre="{{ $producto['modelo'] }}" 
                                data-precio="{{ $producto['precio'] }}" 
                                data-cantidad="1">Agregar al Carrito
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    
    <span id="mensaje" class="mensaje" style="display: none;">¡Se agregó un producto al carrito!</span>
    <style>
        .contador-carrito {
        position: absolute;
        top: 0;
        right: 0;
        color: white;
        background-color: #0d6efd;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 12px;
        }
        .mensaje {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: green;
            color: white;
            padding: 20px;
            font-size: 18px;
            border-radius: 5px;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.5s, display 0.5s;
        }
        .mensaje.mostrar {
            display: block;
            opacity: 1;
        }
        .mensaje.ocultar {
            opacity: 0;
        }
        
    </style>
    
        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const productos = document.querySelectorAll('.pelicula');

            
                        
            // Función para calcular el total de productos en el carrito
            function calcularTotalProductos() {
                const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
                const totalProductos = carrito.reduce((acc, producto) => acc + producto.cantidad, 0);
                return totalProductos;
            }


            // Escuchamos el evento 'carritoActualizado' y actualizamos el contador
            window.addEventListener('carritoActualizado', () => {
                console.log('Evento carritoActualizado recibido en la página principal');
                const contadorCarritoPrincipal = document.getElementById('contador-carrito');
                const totalProductos = calcularTotalProductos();
                contadorCarritoPrincipal.textContent = totalProductos;
            });

            // Tu código JavaScript adicional
            const categoriaBuscarInput = document.getElementById('categoria_buscar');
            const peliculasGrid = document.querySelector('.peliculas');

            categoriaBuscarInput.addEventListener('input', () => {
                const textoBusqueda = categoriaBuscarInput.value.trim().toLowerCase();
                const peliculas = peliculasGrid.querySelectorAll('.pelicula');

                peliculas.forEach(pelicula => {
                    const marca = pelicula.querySelector('.titulo').innerText.toLowerCase();
                    const modelo = pelicula.querySelector('.genero').innerText.toLowerCase();
                    const categoria = pelicula.querySelector('.costo').innerText.toLowerCase();

                    if (marca.includes(textoBusqueda) || modelo.includes(textoBusqueda) || categoria.includes(textoBusqueda)) {
                        pelicula.style.display = '';
                    } else {
                        pelicula.style.display = 'none';
                    }
                });
            });

            const botonesAgregar = document.querySelectorAll('.agregar-carrito');
            const listaCarrito = document.querySelector('#lista-carrito tbody');
            const vaciarCarritoBtn = document.querySelector('#vaciar-carrito');
            const mensaje = document.getElementById('mensaje');
            const contadorCarrito = document.getElementById('contador-carrito');

            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

            botonesAgregar.forEach(boton => {
                boton.addEventListener('click', agregarProducto);
            });

            vaciarCarritoBtn.addEventListener('click', vaciarCarrito);

            function agregarProducto(event) {
                const boton = event.target;
                const producto = {
                    id: boton.getAttribute('data-id'),
                    nombre: boton.getAttribute('data-nombre'),
                    precio: boton.getAttribute('data-precio'),
                    cantidad: 1
                };

                const productoExistente = carrito.find(item => item.id === producto.id);

                if (productoExistente) {
                    productoExistente.cantidad++;
                } else {
                    carrito.push(producto);
                }

                actualizarCarritoVista();
                mostrarMensaje();
                localStorage.setItem('carrito', JSON.stringify(carrito));
            }

            function actualizarCarritoVista() {
                while (listaCarrito.firstChild) {
                    listaCarrito.removeChild(listaCarrito.firstChild);
                }

                carrito.forEach(producto => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${producto.nombre}</td>
                        <td>${producto.precio}</td>
                        <td>
                            <input type="number" class="cantidad" data-id="${producto.id}" value="${producto.cantidad}" min="1" size="3" style=" width: 80px;">
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger borrar-producto" data-id="${producto.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                                </svg>
                            </a>
                        </td>
                    `;
                    listaCarrito.appendChild(row);
                });

                const botonesBorrar = document.querySelectorAll('.borrar-producto');
                botonesBorrar.forEach(boton => {
                    boton.addEventListener('click', borrarProducto);
                });

                const inputsCantidad = document.querySelectorAll('.cantidad');
                inputsCantidad.forEach(input => {
                    input.addEventListener('change', actualizarCantidad);
                    actualizarContadorCarrito();
                });

                actualizarContadorCarrito();
            }

            function borrarProducto(event) {
                event.preventDefault();
                const idProducto = event.target.getAttribute('data-id');
                carrito = carrito.filter(producto => producto.id !== idProducto);

                actualizarCarritoVista();
                localStorage.setItem('carrito', JSON.stringify(carrito));
            }

            function actualizarCantidad(event) {
                const input = event.target;
                const idProducto = input.getAttribute('data-id');
                const nuevaCantidad = parseInt(input.value);

                const producto = carrito.find(item => item.id === idProducto);
                if (producto) {
                    producto.cantidad = nuevaCantidad;
                    actualizarContadorCarrito();
                }

                localStorage.setItem('carrito', JSON.stringify(carrito));
            }

            function vaciarCarrito(event) {
                event.preventDefault();
                carrito = [];
                actualizarCarritoVista();
                localStorage.setItem('carrito', JSON.stringify([]));
            }

            function mostrarMensaje() {
                mensaje.style.display = 'block';
                mensaje.classList.add('mostrar');

                setTimeout(() => {
                    mensaje.classList.remove('mostrar');
                    mensaje.classList.add('ocultar');
                }, 2000);

                setTimeout(() => {
                    mensaje.style.display = 'none';
                    mensaje.classList.remove('ocultar');
                }, 2500);
            }

            function actualizarContadorCarrito() {
                const totalProductos = carrito.reduce((acc, producto) => acc + producto.cantidad, 0);
                const contadorCarrito = document.querySelectorAll('.contador-carrito');
                contadorCarrito.forEach(contador => {
                    contador.textContent = totalProductos;
                });
            }

            actualizarCarritoVista();
            actualizarContadorCarrito();
            
        });
        function regresar() {
            window.location.href = "{{ route('dashboard') }}";
        }
    </script>


</x-app-layout>