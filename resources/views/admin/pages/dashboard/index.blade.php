@extends('admin.master.master')

@section('title', 'Home')

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h3 class="title"><i class="fas fa-chart-bar" aria-hidden="true"></i> Estatíticas</h3>
            </div>

            <div class="row mtop16">
                <div class="col-md-3">
                    <div class="panel shadow">
                        <div class="header">
                            <h3 class="title"><i class="fas fa-users" aria-hidden="true"></i> Usuários</h3>
                        </div>
                        <div class="inside">
                            <div class="big_count">{{ $totalUsers }}</div>
                        </div>
                        <div class="infor">
                            <a href="{{route('users.index')}}">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                    </div>
                </div>

                    <div class="col-md-3">
                        <div class="panel shadow">
                            <div class="header">
                                <h3 class="title"><i class="fas fa-graduation-cap" aria-hidden="true"></i> Alunos</h3>
                            </div>
                            <div class="inside">
                                <div class="big_count">{{ $totalStudants }}</div>
                            </div>
                            <div class="infor">
                                <a href="{{route('studants.index')}}">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                             </div>
                        </div>
                    </div>

                <div class="col-md-3">
                    <div class="panel shadow">
                        <div class="header">
                            <h3 class="title"><i class="fas fa-book" aria-hidden="true"></i> Livros</h3>
                        </div>
                        <div class="inside">
                            <div class="big_count">{{ $totalLibros }}</div>
                        </div>
                        <div class="infor">
                            <a href="{{route('libros.index')}}">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel shadow">
                        <div class="header">
                            <h3 class="title"><i class="fas fa-book-reader" aria-hidden="true"></i> Livros Emprestados</h3>
                        </div>
                        <div class="inside">
                            <div class="big_count">{{ $totalBorroweds }}</div>
                        </div>
                        <div class="infor">
                           <a href="{{route('borroweds.index')}}">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection