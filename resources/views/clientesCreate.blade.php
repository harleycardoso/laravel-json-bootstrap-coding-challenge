@extends('master')
@section('title','Cadastro clientes')
@section('content')
<div class="container">
<form class="needs-validation" method="POST" action="{{ !empty($clientes) ? '/clientes/update' : '/clientes'}}" enctype="multipart/form-data" novalidate>
  @csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Nome/Razão Social</label>
      <input type="text" name="desc" class="form-control" id="validationCustom01" value="{{ $clientes['desc'] ?? ''}}" required>
      <div class="valid-feedback">
        Parece Ótimo!
      </div>
    </div>
    <div class="col-md-1 mb-1">
      <label for="validationCustom04">Tipo</label>
      <select class="custom-select" name="tipo" id="validationCustom04" required>
        <option selected disabled value="">Selecionar</option>
        <option value="PF" @isset($clientes) {{$clientes['tipo'] == 'PF' ? "selected" : ''}}@endisset>PF</option>
        <option value="PJ" @isset($clientes){{$clientes['tipo'] == 'PJ' ? "selected" : '' }}@endisset>PJ</option>
      </select>
      <div class="invalid-feedback">
       Selecione um Tipo Cadastro válido.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">CPF/CNPJ</label>
      <input type="text" name="doc" class="form-control" id="validationCustom02" value="{{ $clientes['doc'] ?? ''}}" required>
      <div class="valid-feedback">
        Parece Ótimo!
      </div>
    </div>
    
  </div>
  <div class="form-row">
  <div class="col-md-3 mb-3">
      <label for="validationCustom04">Tipo Endereço</label>
      <select class="custom-select" name="tp_end" id="validationCustom04" required>
        <option selected disabled value="">Selecionar</option>
        <option value="sede"      @isset($clientes){{$clientes['Enderecos'][0]['tp_end'] == 'sede' ?  "selected" : '' }}@endisset  >Sede</option>
        <option value="cobranca"  @isset($clientes){{$clientes['Enderecos'][0]['tp_end'] == 'cobranca' ? "selected" : '' }}@endisset>Cobrança</option>
      </select>
      <div class="invalid-feedback">
       Selecione um Tipo Endereço válido.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">CEP</label>
      <input type="text" name="cep" class="form-control" id="validationCustom05" value="{{$clientes['Enderecos'][0]['cep'] ?? '' }}" required>
      <div class="invalid-feedback">
       Selecione um CEP válido.
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Endereço</label>
      <input type="text" name="endereco" class="form-control" id="validationCustom03" value="{{$clientes['Enderecos'][0]['endereco'] ?? ''}}" readonly required>
      <div class="invalid-feedback">
        Selecione um Endereço.
      </div>
    </div>
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <button class="btn btn-primary" type="submit">Salvar</button>
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

(function(){

const cep = document.querySelector("input[name=cep]");

cep.addEventListener('blur', e=> {
    const value = cep.value.replace(/[^0-9]+/, '');
    const url = `https://viacep.com.br/ws/${value}/json/`;
    
    fetch(url)
    .then( response => response.json())
    .then( json => {
        
        if( json.logradouro ) {
          document.querySelector('input[name=endereco]').value = json.logradouro+','+json.bairro+','+json.localidade+','+json.uf;
        }
    
    });
    
    
});







})();


</script>
@endsection