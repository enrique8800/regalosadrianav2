<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="{{asset('melody/images/faces/cara.png')}}" alt="image" />
                </div>
                <div class="profile-name">
                    <p class="name">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="designation">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Menú Principal</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts1" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-chart-line menu-icon"></i>
                <span class="menu-title">Informes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('reportes.dia')}}">Informe de hoy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('reportes.fecha')}}">Informe por fecha</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('compras.index')}}">
                <i class="fas fa-cart-plus menu-icon"></i>
                <span class="menu-title">Compras</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('ventas.index')}}">
                <i class="fas fa-shopping-cart menu-icon"></i>
                <span class="menu-title">Ventas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('categorias.index')}}">
                <i class="fas fa-tags menu-icon"></i>
                <span class="menu-title">Categorías</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('productos.index')}}">
                <i class="fas fa-boxes menu-icon"></i>
                <span class="menu-title">Productos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('clientes.index')}}">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-title">Clientes</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('providers.index')}}">
                <i class="fas fa-shipping-fast menu-icon"></i>
                <span class="menu-title">Proveedores</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('empresas.index')}}">
                <i class="fas fa-building menu-icon"></i>
                <span class="menu-title">Empresa</span>
            </a>
        </li>
    </ul>
</nav>