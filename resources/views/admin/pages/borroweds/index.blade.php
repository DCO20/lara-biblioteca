@extends('admin.master.master')

@section('title', 'Livros Emprestados')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('borroweds.index')}}"><i class="fas fa-book-reader" aria-hidden="true"></i> Livros Emprestados</a>
    </li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h3 class="title"><i class="fas fa-book-reader" aria-hidden="true"></i> Livros Emprestados</h3>
        </div>
      
        </div>

        <div class="inside">
    
            <div class="mtop16">
                @include('admin.includes.alerts')
            </div>

           
            <div class="btns">
               <a href="{{ route('borroweds.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Novo
                </a>
            </div>
          

            <div class="col-md-12 mtop16">
                {!! Form::open(['route' => 'borroweds.search']) !!}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    {!! Form::text('filter', null, ['class' => 'form-control',  'placeholder' => 'Digite o nome do aluno', 'required']) !!}
                    <button class="btn btn-success" type="submit" id="button-addon2">Buscar</button>
                </div>
                {!! Form::close() !!}
            </div>

            <table class="table table-striped mtop16">
                <thead>
                    <tr>
                        <td></td>
                        <td>Titulo</td>
                        <td>Emprestado por</td>
                        <td>Emprestado a</td>
                        <td>Emprestado em</td>
                        <td>Prazo para devolver</td>
                        <td width="110"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borroweds as $borrowed)
                        <tr>
                            <td width="72"> 
                                <img src="{{ url("storage/{$borrowed->libro->image}") }}" alt="{{ $borrowed->libro->name }}" style="max-width: 72px;">
                            </td>
                            <td>{{ $borrowed->libro->name }}</td>
                            <td>{{ $borrowed->user->name }}</td>
                            <td>{{ $borrowed->name_std }}</td>
                            <td>{{ date( 'd/m/Y' , strtotime($borrowed->token_borrowed)) }}</td>
                            <td>{{ date( 'd/m/Y' , strtotime($borrowed->token_returned)) }}</td>
                            <td>
                                <div class="opts">           
                                    <a href="{{ url('/admin/borrowed/'.$borrowed->id.'/destroy') }}" data-toggle="tooltip" data-placement="top" title="Excluir">
                                        <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                    </a>   
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