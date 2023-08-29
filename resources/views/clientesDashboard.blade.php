@extends('master')
@section('content')
    <div class="container">
        <div class=" text-center">
            <h1>Relatório de Movimentação</h1>
        </div>
    </div>
    <div class="container">
        <h2>Dados do Cliente</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                </tr>
            </thead>
        <tbody>
            <tr>
                <td>{{$cliente['doc']}}</td>
                <td>{{$cliente['tipo']}}</td>
                <td>{{$cliente['desc']}}</td>             
             </tr>
        </tbody>
        </table>
    </div>
    <div class="container">
        <h2>Tabela de Preço pela Descrição</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Produto</th>
                    <th>Compra</th>
                    <th>Venda</th>
                    <th> (R$) </th>                    
                    <th> ( % ) </th>
                </tr>
            </thead>
        <tbody>        
            @foreach(collect($produtos)->sortBy('desc') as $produto)
                <tr>
                    @foreach($cliente['tb_preco'] as $tb_preco)
                        @if($produto['codigo'] == $tb_preco['cd_produto'])
                            <td>{{$tb_preco['cd_produto']}}</td>
                            <td>{{$produto['desc']}}</td>
                            <td>{{$produto['custo']}}</td>
                            <td>{{$tb_preco['pr_venda']}}</td> 
                            <td>{{$produto['vr_margem']}}</td> 
                            <td>{{$produto['vr_margem']}}</td>
                        @endif
                    @endforeach
                </tr>
             @endforeach
        </tbody>
        </table>
    </div>
    <div class="container">
        <h2>Tabela de Preço pela Margem de Lucro</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Produto</th>
                    <th>Compra</th>
                    <th>Venda</th>
                    <th> (R$) </th>                    
                    <th> ( % ) </th>
                    <th> Situação </th>
                </tr>
            </thead>
        <tbody>        
            @foreach(collect($produtos)->sortByDesc('vr_margem') as $produto)
                <tr>
                    @foreach($cliente['tb_preco'] as $tb_preco)
                        @if($produto['codigo'] == $tb_preco['cd_produto'])
                            <td>{{$tb_preco['cd_produto']}}</td>
                            <td>{{$produto['desc']}}</td>
                            <td>{{$produto['custo']}}</td>
                            <td>{{$tb_preco['pr_venda']}}</td> 
                            <td>{{$produto['custo']+($produto['custo']*($produto['vr_margem']/100))}}</td> 
                            <td>{{$produto['vr_margem']}}</td> 
                            @if($produto['custo']+($produto['custo']*($produto['vr_margem']/100)) < $tb_preco['pr_venda'])
                                <td class='badge badge-success'>Acima da margem mínima</td>
                            @elseif($produto['custo']+($produto['custo']*($produto['vr_margem']/100)) > $tb_preco['pr_venda'])
                                <td class='badge badge-danger'>Abaixo da margem mínima</td>
                            @else
                                <td class='badge badge-warning'>Igual margem mínima</td>
                            @endif
                        @endif
                    @endforeach
                </tr>
             @endforeach
        </tbody>
        </table>
    </div >
    <div class="container">
        <h2>Tabela de Consumo</h2>
        <table class="table table-striped" >
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Valor Devido</th>
                    <th>Custo(-)</th>
                    <th>Lucro(+)</th>
                </tr>
            </thead>
        <tbody>
        
            @foreach($consumo as $total)
                @if($cliente['doc'] == $total['CLIENTE'])
                    @foreach($cliente['tb_preco'] as $tb_preco)
                        @if($total['COD_PRODUTO'] == $tb_preco['cd_produto'])
                            @foreach($produtos as $produto)
                                @if($produto['codigo']==$total['COD_PRODUTO'])
                                    <tr>
                                        <td>{{$cliente['desc']}}</td>
                                        <td>{{$total['QUANTIDADE']*$tb_preco['pr_venda']}}</td>
                                        <td>{{$total['QUANTIDADE']*$produto['custo']}}</td> 
                                        <td>{{($total['QUANTIDADE']*$tb_preco['pr_venda'])-($produto['custo']*$total['QUANTIDADE'])}}</td>  
                                    <tr>
                                @endif
                            @endforeach  
                        @endif
                    @endforeach
                @endif
            @endforeach
        </tbody>
        </table>
    </div>

@endsection