@extends('master')
@section('title','Tabela de Preços')
@section('content')

<div class="container-fluid p-4">
<form class="needs-validation" method="POST" action="/tabeladeprecos" enctype="multipart/form-data" novalidate>
@csrf
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class="text-center">
      <h1>Tabela de Preços</h1>
  </div>
<div>
    
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationCustom04">Clientes</label>
      <select class="custom-select" name="cliente" id="validationCustom04" required>
        <option selected disabled value="">Clientes...</option>
        @foreach($dados['clientes'] as $cliente)
        <option value="{{$cliente['doc']}}">{{$cliente['desc']}}</option>
        @endforeach
      </select>
      <div class="invalid-feedback">
        Selecione um cliente para salvar.
      </div>
      <div>
      </div>
    </div>
  </div>
</div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Pruduto</th>
                    <th>Valor</th>
                </tr>
            </thead>
        <tbody>
        @foreach ($dados['produtos'] as $key => $produto)
          <tr>
              <td><input type="text" class="form-control col-4" id="produtos"  name="produto[]" value="{{$produto['codigo']}}" readonly required></td>
              <td>{{$produto['desc']}}</td>
              <td>
                <input type="text" class="form-control" id="valores" data-produto='{{$produto['codigo']}}' name="valor[]" value="" required>
              </td>
            </tr>
        @endforeach
        </tbody>
        </table>
        <div class="d-flex justify-content-end"><button onclick="busca()" class="acao btn btn-primary" type="submit">Criar Tabela</button></div>
      </form>
</div>
<script>

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


// function busca(){
        
//         let cliente = $("#validationCustom04").val();
//         let inputs = jQuery('input[name^="valor"]');
//         let values = [];
//         for(var i = 0; i < inputs.length; i++){
//             values.push([cliente,inputs[i].dataset.produto,$(inputs[i]).val()]);
//         }
        
//         console.log(values);
//     };

</script>

@endsection