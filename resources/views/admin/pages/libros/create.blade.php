@extends('admin.master.master')

@section('title', 'Novo Livro')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('libros.index')}}"><i class="fas fa-book" aria-hidden="true"></i> Livros</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('libros.create')}}"><i class="fas fa-book" aria-hidden="true"></i> Novo Livro</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h3 class="title"><i class="fa fa-plus" aria-hidden="true"></i> Novo Livro</h3>
            </div>

            <div class="inside">
            
            @include('admin.includes.alerts')

            {!! Form::open(['route' => 'libros.store', 'files' => true]) !!}
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
                    <label for="category">Categoria:</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basuc-addon1">
                                <i class="fa fa-layer-group" aria-hidden="true"></i> 
                            </span>
                        </div>
                        {!! Form::select('category', $cats, 0, ['class' => 'custom-select']) !!}
                        </div>   
                    </div>

                    <div class="col-md-4">
                        <label for="code">Codigo:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basuc-addon1">
                                        <i class="fa fa-layer-group" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                {!! Form::text('code', 0,  [ 'class' => 'form-control']) !!}
                                </div>   
                            </div>
                    <div class="col-md-6 mtop16">
                        <label for="code">Slug:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basuc-addon1">
                                        <i class="fa fa-keyboard" aria-hidden="true"></i> 
                                    </span>
                                </div>
                                {!! Form::text('slug', null, [ 'class' => 'form-control']) !!}
                                </div>   
                            </div>

                    <div class="col-md-6 mtop16">
                        <label for="image">Imagem:</label>
                            <div class="custom-file">
                            {!! Form::file('image', [ 'class' => 'custom-file-input', 'id' => 'customFile', 'accept' => 'image/']) !!}
                            <label class="custom-file-label" for="customFile">Escolher Imagem</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mtop16">
                        <div class="col-md-12">
                            <label for="description">Descrição:</label>
                            {!! Form::textarea('description', null, [ 'class' => 'form-control', 'id' => 'editor']) !!}
                        </div>
                    </div>
                    <div class="row mtop16">
                        <div class="col-md-12">
                        {!! Form::submit('Cadastar', [ 'class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection