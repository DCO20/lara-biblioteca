@extends('admin.master.master')

@section('title', 'Editar Livro')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{url('admin/libros')}}"><i class="fas fa-book" aria-hidden="true"></i> Livros</a>
    </li>
    <li class="breadcrumb-item">
        <a href=""><i class="fa fa-edit" aria-hidden="true"></i> Editar Livro</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="panel shadow">
                    <div class="header">
                        <h3 class="title"><i class="fa fa-edit" aria-hidden="true"></i> Editar Livro</h3>
                    </div>
        
                    <div class="inside">
                        @include('admin.includes.alerts')
        
                        {!! Form::open(['url' => '/admin/libros/'.$l->id.'/edit', 'files' => true]) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">Nome:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-keyboard" aria-hidden="true"></i> 
                                        </span>
                                    </div>
                                    {!! Form::text('name',$l->name,  [ 'class' => 'form-control']) !!}
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
                                    {!! Form::select('category', $cats, $l->category_id, ['class' => 'custom-select']) !!}
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
                                            {!! Form::text('code', $l->code,  [ 'class' => 'form-control']) !!}
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
                                            {!! Form::text('slug', $l->slug, [ 'class' => 'form-control']) !!}
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
                                        {!! Form::textarea('description', $l->description, [ 'class' => 'form-control', 'id' => 'editor']) !!}
                                    </div>
                                </div>
                                <div class="row mtop16">
                                    <div class="col-md-12">
                                    {!! Form::submit('Atualizar', [ 'class' => 'btn btn-success']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                        </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <h3 class="title"><i class="fa fa-image" aria-hidden="true"></i> Imagem Destacada</h3>
                        <div class="inside">
                            <img src="{{ url("storage/{$l->image}") }}" alt="{{ $l->name }}" style="max-width: 120px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection