@extends('layouts.app')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')

<!-- New Task Form -->
<div class="row">
  <div class="Absolute-Center">
    <h1>Registrar em Evento</h1>
    <br/>
    <br/>
    <form id="formEvento" action="{{ route('saveRegistro') }}" method="POST" class="form" onsubmit="return $('#formEvento').valid();">
       {{ csrf_field() }}
       <input type="hidden" name="registroId" id="registroId" value="{{$registro->id}}" />
      <div class="form-group row">
        <label for="nome" class="col-sm-2 col-form-label">Evento:</label>
        <div class="col-sm-10">
          {{ Form::select('evento', $eventos, empty(old('evento')) ? $registro->evento_id : old('evento'), ["class"=>"form-control required", "id"=>"evento", "name"=>"evento"]) }}
        </div>
      </div>
      <div class="form-group row">
        <label for="nome" class="col-sm-2 col-form-label">Pago:</label>
        <div class="col-sm-10">
          {{ Form::select('pago', $pago, empty(old('pago')) ? $registro->pago : old('pago'), ["class"=>"form-control required", "id"=>"pago", "name"=>"pago"]) }}
        </div>
      </div>
      <div class="form-group row">
        <label for="nome" class="col-sm-2 col-form-label">Data do Pagamento:</label>
        <div class="col-sm-10">
          <input type="date" class="form-control required date" id="data" name="data" value="{{ empty(old('data')) ? $registro->data : old('data') }}">
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-def btn-block btn-lg btn-primary">Salvar</button>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">
$(function(){
  $("#formEvento").validate({
			rules: {
				evento: "required",
        pago: "required",
        data: {
          required:true,
          date:true
        }
			}
    });
})
</script>
@endsection
