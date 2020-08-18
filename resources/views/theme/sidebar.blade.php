<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">

                <li>
                    <a href="{{ route('home') }}" class="waves-effect"><i class="fa fa-home"></i><span> Inicio </span></a>
                </li>
                <li>
                    <a href="{{ route('instituciones.index') }}" class="waves-effect"><i class="fa fa-university"></i><span> Instituciones </span></a>
                </li>
                <li>
                    <a href="{{ route('beneficiarios.index') }}" class="waves-effect"><i class="fa fa-child"></i><span> Beneficiarios </span></a>
                </li>
                <li>
                    <a href="{{ route('menus.index') }}" class="waves-effect"><i class="fa fa-clipboard"></i><span> Menús </span></a>
                </li>
                <li>
                    <a href="{{ route('minutas.index') }}" class="waves-effect"><i class="fa fa-file"></i><span> Minutas </span></a>
                </li>
                <li>
                    <a href="{{ route('calculos.index') }}" class="waves-effect"><i class="fa fa-calculator"></i><span> Calculos </span></a>
                </li>
                <li><a href="{{ route('pedidomen.index') }}"><i class="fa fa-paper-plane"></i><span> Pedidos </span></a></li>
                <li><a href="{{ route('kardex.index') }}"><i class="fa fa-paper-plane"></i><span> Kardex </span></a></li>
                <li>
                    <a href="{{ route('usuarios.index') }}" class="waves-effect"><i class="fa fa-user-circle"></i><span> Usuarios </span></a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-black-mesa"></i> <span> Configuraciones <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
                    <ul class="submenu">
                        <li><a href="{{ route('empresa.index') }}"><i class="fa fa-circle"></i><span> Datos de Empresa </span></a></li>
                        <li><a href="{{ route('unidades.index') }}"><i class="fa fa-percent"></i><span>  Unidades </span></a></li>
                        <li><a href="{{ route('grupo_etarios.index') }}"><i class="fa fa-file"></i><span> Grupos Etarios</span></a></li>
                        <li><a href="{{ route('productos.index') }}"><i class="fa fa-shopping-bag"></i><span>  Productos </span></a></li>
                        <li><a href="{{ route('categorias.index') }}"><i class="fa fa-bookmark"></i><span>  Categorias </span></a></li>
                        <li><a href="{{ route('jornadas.index') }}"><i class="fa fa-calendar"></i><span>  Jornadas </span></a></li>
                        <li><a href="{{ route('bodegas.index') }}"><i class="fa fa-calendar"></i><span>  Bodegas </span></a></li>
                        <li><a href="{{ route('productobodegas.index') }}"><i class="fa fa-calendar"></i><span> Productos en Bodegas </span></a></li>


                    </ul>
                </li>




            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
