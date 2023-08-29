@extends('master')
@section('title','Produtos')
@section('content')
    <div class="container">
        <div class="text-center">
            <h1>Produtos</h1>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Fornecedor</th>
                    <th>Custo</th>
                    <th>Margem</th>
                    <th>Ações</th>
                </tr>
            </thead>
        <tbody>
            
        @foreach ($res['produtos'] as $produto)
            <tr>
                <td>{{$produto['desc']}}</td>
                <td>{{$produto['codigo']}}</td>
                <td>{{$produto['custo']}}</td>
                <td>{{$produto['vr_margem']}} %</td>
                <td>
                    <a class="btn btn-sm btn-secondary" href="/produtos/edit/{{$produto['codigo']}}"> Editar </a>
                </td>
             </tr>
        @endforeach
             
           
        </tbody>
        </table>
    </div>
@endsection