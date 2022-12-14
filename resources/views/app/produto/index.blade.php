@extends('app.layouts.app')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header-template">
                <div>LISTAGEM DE PRODUTOS</div>
                <div>
                    <a href="{{ route('produto.create') }}" class="btn btn-sm btn-primary">
                        NOVO
                    </a>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" class="th-title">Id</th>
                            <th scope="col" class="th-title">Nome</th>
                            <th scope="col" class="th-title">Marca</th>
                            <th scope="col" class="th-title">Un.</th>
                            <th scope="col" class="th-title">Categoria</th>
                            <th scope="col" class="th-title">Estoque</th>
                            <th scope="col" class="th-title">Operaçoes</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <th scope="row">{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->marca->nome }}</td>
                                <td>{{ $produto->unidade_medida->nome }}</td>
                                <td>{{ $produto->categoria->nome }}</td>
                                <td>{{ $produto->estoque_atual }}</td>
                                <td>
                                    <div class="div-op">
                                        <a class="btn btn-sm-template btn-primary mx-1"
                                            href="{{ route('produto.show', ['produto' => $produto->id]) }}"><i
                                                class="icofont-eye-alt"></i></a>
                                        <a class="btn btn-sm-template btn-success mx-1 @can('user') disabled @endcan"
                                            href="{{ route('produto.edit', ['produto' => $produto->id]) }}"><i
                                                class="icofont-pen-alt-1"></i></a>
                                        <form id="form_{{ $produto->id }}" method="post"
                                            action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <a class="btn btn-sm-template btn-danger mx-1 @can('user') disabled @endcan"
                                                href="#"
                                                onclick="document.getElementById('form_{{ $produto->id }}').submit()"><i
                                                    class="icofont-close-squared-alt"></i></a>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $produtos->appends($request)->links() }}
                </div>

            </div>


        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
