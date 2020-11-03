<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{ url('static/images/logo.png')}}" class="img-fluid">
        </div>

        <div class="user">
            <span class="subtitle">Olá:</span>
            <div class="name">
                {{Auth::user()->name}}
            </div>
            <div class="email">{{Auth::user()->email}}</div>
        </div>
    </div>

    <div class="main">
        <ul>

            
            <li>
                <a href="{{route('dashboard.index')}}" class="lk-dashboard.index"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
            </li>
            
            <li>
                <a href="{{route('users.index')}}" class="lk-users.index lk-users.create lk-users.edit"><i class="fa fa-users" aria-hidden="true"></i>Usuários</a>
            </li>
            
            <li>
                <a href="{{route('studants.index')}}" class="lk-students.index lk-students.edit lk-students.destroy ">
                    <i class="fas fa-graduation-cap"></i>Alunos</a>
            </li>
            
            <li>
                <a href="{{route('borroweds.index')}}" class="lk-borroweds.index lk-borroweds.edit lk-borroweds.destroy ">
                    <i class="fas fa-book-reader"></i>Livros Emprestados</a>
            </li>

            <li>
                <a href="{{url('/admin/libros')}}" class="lk-libros.index lk-libros.create lk-libros.edit lk-libros.destroy ">
                    <i class="fas fa-book"></i>Livros</a>
            </li>
        
            <li>
                <a href="{{url('/admin/categories/0')}}" class="lk-categories.home lk-categories.add lk-categories.edit lk-categories.delete">
                    <i class="fa fa-folder-open" aria-hidden="true"></i>Categorias</a>
            </li>
            
            <li>
                <a href="{{ route('web.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</a>
            </li>
        </ul>
    </div>
</div>