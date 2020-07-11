<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Inicio</li>
                
                <li>
                    <a href="{{ route('home') }}" class="waves-effect"><i class="mdi mdi-security-home"></i><span> Inicio </span></a>
                </li>
                <li>
                    <a href="{{ route('instituciones.index') }}" class="waves-effect"><i class="mdi mdi-newspaper"></i><span> Instituciones </span></a>
                </li>
                <li>
                    <a href="{{ route('beneficiarios.index') }}" class="waves-effect"><i class="mdi mdi-newspaper"></i><span> Beneficiarios </span></a>
                </li>
                <li>
                    <a href="{{ route('menus.index') }}" class="waves-effect"><i class="mdi mdi-newspaper"></i><span> Menús </span></a>
                </li>
                <li>
                    <a href="{{ route('minutas.index') }}" class="waves-effect"><i class="mdi mdi-file-document"></i><span> Minutas </span></a>
                </li>
                <li>
                    <a href="{{ route('calculos.index') }}" class="waves-effect"><i class="mdi mdi-file-chart"></i><span> Calculos </span></a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-black-mesa"></i> <span> Configuraciones <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
                    <ul class="submenu">
                        <li><a href="{{ route('unidades.index') }}">Unidades</a></li>
                        <li><a href="{{ route('grupo_etarios.index') }}">Grupos Etarios</a></li>
                        <li><a href="{{ route('productos.index') }}">Productos</a></li>
                        <li><a href="{{ route('categorias.index') }}">Categorias</a></li>
                        <li><a href="{{ route('jornadas.index') }}">Jornadas</a></li>
                    </ul>
                </li>
               
               

                
            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>