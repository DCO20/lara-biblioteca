@extends('admin.master.master')

@section('title', 'Editar Categoria')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('categories.index')}}"><i class="fa fa-folder-open" aria-hidden="true"></i> Categorias</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{url('/admin/category/{id}/edit')}}"><i class="fa fa-edit" aria-hidden="true"></i> Editar Categoria</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
       <div class="row">
            <div class="col-md-12">
                <div class="panel shadow">
                    <div class="header">
                        <h3 class="title"><i class="fa fa-edit" aria-hidden="true"></i> Editar Categoria</h3>
                    </div>

                   <div class="mtop16">
                        @include('admin.includes.alerts')
                   </div>

                    <div class="inside">
                    {!! Form::open(['url' => '/admin/category/'.$cat->id.'/edit]) !!}
                    <label for="name">Nome:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basuc-addon1">
                                <i class="fa fa-keyboard" aria-hidden="true"></i> 
                            </span>
                        </div>
                    {!! Form::text('name', $cat->name, [ 'class' => 'form-control']) !!}
                    </div>   
 
                    <label for="description" class="mtop16">Descrição:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basuc-addon1">
                                <i class="fa fa-keyboard" aria-hidden="true"></i> 
                            </span>
                        </div>
                    {!! Form::text('description', $cat->description,  [ 'class' => 'form-control']) !!}
                    </div>   
 
                    {!! Form::submit('Atualizar', [ 'class' => 'btn btn-success mtop16']) !!}   
                    {!! Form::close() !!}
                    </div>
                </div>   
            </div>
       </div>
    </div>
@endsection