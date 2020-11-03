@extends('admin.master.master')

@section('title', 'Novo Usuário')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('users.index')}}"><i class="fa fa-users" aria-hidden="true"></i> Usuários</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('users.create')}}"><i class="fa fa-users" aria-hidden="true"></i> Novo Usuário</a>
    </li>
@endsection

@section('content')
<div class="container-fluid">
    @include('admin.includes.alerts')
    <div class="page_user">
        <div class="row">
            <div class="col-md-4">
                <div class="panel shadow">
                    <div class="header">
                        <h3 class="title"><i class="fas fa-user" aria-hidden="true"></i> Imagem</h3>
                    </div>

                    <div class="inside">
                        {!! Form::open(['route' => 'users.store', 'files' => true]) !!}
                        <div class="mini_profile">
                        </div>
                            <div class="custom-file mtop16">
                            {!! Form::file('avatar', [ 'class' => 'custom-file-input', 'accept' => 'image/']) !!}
                            <label class="custom-file-label" for="customFile">Escolher Imagem</label>
                            </div>
                        </div>
                    </div>
                <div class="panel shadow mtop16">
                    <div class="header">
                        <h3 class="title"><i class="fas fa-fingerprint"></i> Criar a senha</h3>
                    </div>
                    <div class="inside">
                        <div class="row mto16">
                            <div class="col-md-12">
                                <label for="password">Criar a senha:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fas fa-fingerprint" aria-hidden="true"></i> 
                                        </span>
                                    </div>
                                    {!! Form::password('password', [ 'class' => 'form-control']) !!}
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mtop16"></div>
                </div>

                <div class="col-md-8">
                    <div class="panel shadow">
                        <div class="header">
                            <h3 class="title"><i class="fas fa-address-card" aria-hidden="true"></i> Informações</h3>
                        </div>
                        <div class="inside">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">Nome:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-keyboard" aria-hidden="true"></i> 
                                        </span>
                                    </div>
                                    {!! Form::text('name', null,  [ 'class' => 'form-control']) !!}
                                </div>   
                            </div>
                            <div class="col-md-4">
                                <label for="document">Documento:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basuc-addon1">
                                            <i class="fas fa-passport"></i>
                                        </span>
                                    </div>
                                    {!! Form::text('document', null, [ 'class' => 'form-control']) !!}
                                </div>   
                            </div>
                            <div class="col-md-4">
                                <label for="genre">Gênero:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fas fa-restroom" aria-hidden="true"></i> 
                                        </span>
                                    </div>
                                    {!! Form::text('genre', null, ['class' => 'form-control']) !!}
                                </div>   
                             </div>
                            <div class="col-md-4 mtop16">
                                <label for="date_of_birth">Data de nascimento:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    {!! Form::text('date_of_birth', null, [ 'class' => 'form-control', 'mask-date']) !!}
                                </div>   
                            </div>
                            <div class="col-md-4 mtop16">
                                <label for="email">Email:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="far fa-envelope-open" aria-hidden="true"></i> 
                                        </span>
                                    </div>
                                    {!! Form::text('email',null,  [ 'class' => 'form-control']) !!}
                                </div>   
                            </div>
                            <div class="col-md-4 mtop16">
                                <label for="phone">Celular:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fas fa-mobile-alt"></i> 
                                        </span>
                                    </div>
                                    {!! Form::text('phone', null,  [ 'class' => 'form-control']) !!}
                                </div>   
                            </div>
                        </div>
                        {!! Form::submit('Salvar', [ 'class' => 'btn btn-success mtop16']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection