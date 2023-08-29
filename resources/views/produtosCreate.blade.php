@extends('master')
@section('title','Cadastro Produtos')
@section('content')
<div class="container">
<form class="needs-validation" method="POST" action="{{ !empty($produto) ? '/produtos/update' : '/produtos'}}" enctype="multipart/form-data" novalidate>
  <div class="form-row">
    <div class="col-md-1 mb-3">
      <label for="validationCustom01">Código</label>
      <input type="text" name="codigo" class="form-control" id="validationCustom01" value="{{ $produto['codigo'] ?? ''}}" {{ !empty($produto) ? "readonly" : '' }}  required>
      <div class="valid-feedback">
        Parece ótimo!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Descrição</label>
      <input type="text" name="desc" class="form-control" id="validationCustom02" value="{{ $produto['desc'] ?? ''}}" required>
      <div class="valid-feedback">
        Parece ótimo!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-2 mb-3">
      <label for="validationCustom03">Custo</label>
      <input type="text" name="custo" class="form-control" id="validationCustom03" value="{{ $produto['custo'] ?? ''}}" required>
      <div class="invalid-feedback">
        Forneça um valor válido.
      </div>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationCustom05">Margem</label>
      <input type="text" name="vr_margem" class="form-control" id="validationCustom05" value="{{ $produto['vr_margem'] ?? ''}}" required>
      <div class="invalid-feedback">
        Forneça um valor válido.
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
</script>
@endsection