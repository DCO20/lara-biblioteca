@extends('admin.master.master')

@section('title', 'Alunos')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{url('admin/studants')}}"><i class="fas fa-graduation-cap" aria-hidden="true"></i> Alunos</a>
    </li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h3 class="title"><i class="fas fa-graduation-cap" aria-hidden="true"></i> Alunos</h3>
        </div>
      
        </div>

        <div class="inside">
    
            <div class="mtop16">
                @include('admin.includes.alerts')
            </div>

           
            <div class="btns">
               <a href="{{ route('studants.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Novo
                </a>
            </div>
          

            <div class="col-md-12 mtop16">
                {!! Form::open(['route' => 'studants.search']) !!}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    {!! Form::text('filter', null, ['class' => 'form-control',  'placeholder' => 'Digite o nome ou o documento do aluno', 'required']) !!}
                    <button class="btn btn-success" type="submit" id="button-addon2">Buscar</button>
                </div>
                {!! Form::close() !!}
            </div>

            <table class="table table-striped mtop16">
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Documento</td>
                        <td>Endereço</td>
                        <td>Celular</td>
                        <td width="160"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studants as $studant)
                        <tr>
                            <td>{{ $studant->name }}</td>
                            <td>{{ $studant->document }}</td>
                            <td>{{ $studant->street }}</td>
                            <td>{{ $studant->cell }}</td>
    
                            <td>
                                <div class="opts">

                                    <a href="{{ route('studants.show', $studant->id) }}" data-toggle="tooltip" data-placement="top" title="Informações do aluno">
                                        <i class="fas fa-graduation-cap"></i></a>
                                   
                                    <a href="{{ route('studants.edit', $studant->id) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="fa fa-edit" aria-hidden="true"></i></a>
                                    
                                    
                                    <a href="{{ url('/admin/studant/'.$studant->id.'/destroy') }}" data-toggle="tooltip" data-placement="top" title="Excluir">
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