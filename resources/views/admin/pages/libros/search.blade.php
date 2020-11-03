@extends('admin.master.master')

@section('title', 'Produtos')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{url('/admin/products')}}"><i class="fa fa-boxes" aria-hidden="true"></i> Produtos</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h3 class="title"><i class="fa fa-boxes" aria-hidden="true"></i> Produtos</h3>
            </div>
          
            </div>

            <div class="inside">
        
                <div class="mtop16">
                    @include('admin.includes.alerts')
                </div>

                @if(kvfj(Auth::user()->permissions, 'products_add'))
                <div class="btns">
                   <a href="{{ route('products_add')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Novo
                    </a>
                </div>
                @endif

               <div class="form_search" id="form_search">
                {!! Form::open(['url' => '/admin/products/search']) !!}
                <div class="row mtop16">
                    <div class="col-md-5">
                        {!! Form::text('search', null, ['class' => 'form-control',  'placeholder' => 'Digite o nome ou o código do produto']) !!}
                    </div>
                    <div class="col-md-5">
                        {!! Form::select('filter', ['0' => 'Nome do produto', '1' => 'Código do produto'], 0, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
               </div>

                <table class="table table-striped mtop16">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td></td>
                            <td>Nome</td>
                            <td>Categoria</td>
                            <td>Preço</td>
                            <td width="110"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td width="50">{{ $product->id }}</td>
                                <td width="64"> 
                                    <a href="{{ url('/uploads/'.$product->file_path.'/t_'.$product->image) }}" data-fancybox="gallery">
                                        <img src="{{ url('/uploads/'.$product->file_path.'/t_'.$product->image) }}" width="64">
                                    </a>
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->cat->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <div class="opts">
                                        @if(kvfj(Auth::user()->permissions, 'products_edit'))
                                        <a href="{{ url('/admin/product/'.$product->id.'/edit')  }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <i class="fa fa-edit" aria-hidden="true"></i></a>
                                        @endif
                                        @if(kvfj(Auth::user()->permissions, 'products_delete'))
                                        <a href="{{ route('products_delete', $product->id) }}" data-toggle="tooltip" data-placement="top" title="Excluir">
                                            <i class="fa fa-trash-alt" aria-hidden="true"></i></a>
                                        @endif
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