@extends('admin.master.master')

@section('title', 'Livros')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{url('/admin/libros')}}"><i class="fas fa-book" aria-hidden="true"></i> Livros</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h3 class="title"><i class="fas fa-book" aria-hidden="true"></i> Livros</h3>
            </div>
          
            </div>

            <div class="inside">
        
                <div class="mtop16">
                    @include('admin.includes.alerts')
                </div>

               
                <div class="btns">
                   <a href="{{ route('libros.create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Novo
                    </a>
                </div>
              

                <div class="col-md-12 mtop16">
                    {!! Form::open(['route' => 'libros.search']) !!}
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        {!! Form::text('filter', null, ['class' => 'form-control',  'placeholder' => 'Digite o nome ou o código do livro', 'required']) !!}
                        <button class="btn btn-success" type="submit" id="button-addon2">Buscar</button>
                    </div>
                    {!! Form::close() !!}
                </div>

                <table class="table table-striped mtop16">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td></td>
                            <td>Nome</td>
                            <td>Código</td>
                            
                            <td width="110"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr>
                                <td width="50">{{ $libro->id }}</td>
                                <td width="72"> 
                                    <img src="{{ url("storage/{$libro->image}") }}" alt="{{ $libro->name }}" style="max-width: 72px;">
                                </td>
                                <td>{{ $libro->name }}</td>
                                <td>{{ $libro->code }}</td>
                                
                                
                                <td>
                                    <div class="opts">
                                       
                                        <a href="{{ route('libros.edit', $libro->id) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <i class="fa fa-edit" aria-hidden="true"></i></a>
                                        
                                        
                                        <a href="{{ url('/admin/libro/'.$libro->id.'/destroy') }}" data-toggle="tooltip" data-placement="top" title="Excluir">
                                            <i class="fa fa-trash-alt" aria-hidden="true"></i></a>
                                        
                                   </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection