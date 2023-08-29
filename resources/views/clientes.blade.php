@extends('master')
@section('content')
    <div class="container">
        <div class="text-center">
            <h1>Clientes</h1>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
        <tbody>
        @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente['doc']}}</td>
                <td>{{$cliente['tipo']}}</td>
                <td>{{$cliente['desc']}}</td>
                <td>
                @if(@isset($cliente['tb_preco']))
                    <a class="btn btn-sm btn-secondary" href="/clientes/{{preg_replace('/[^0-9]/', '',$cliente['doc'])}}"> + Relatório </a>
                @else
                    <a class="btn btn-sm btn-warning" href="/tabeladeprecos"> + Adicionar Tabela </a>
                @endif
                    <a class="btn btn-sm btn-secondary" href="/clientes/edit/{{preg_replace('/[^0-9]/', '',$cliente['doc'])}}"> Editar </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
@endsection