@extends('layouts.app')

@section('content')

<br/><br/>
<div clas="row">
  <h2>Registros</h2>
</div>
<br/>
<div class="row" style="clear:both;">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>Atleta</th>
        <th>Evento</th>
        <th>Data Pagamento</th>
        <th>Data Evento</th>
        <th>Pago</th>
        <th>Preço</th>
      </tr>
    </thead>
@if (count($registros) > 0)
<tbody>
@foreach ($registros as $registro)
<tr>
  <td>{{$registro->atleta->nome}}</td>
  <td>{{$registro->evento->nome}}</td>
  <td>{{ date('d/m/Y', strtotime($registro->data))}}</td>
  <td>{{ date('d/m/Y', strtotime($registro->evento->data))}}</td>
  <td>{{$registro->pago == 1 ? 'Sim' : 'Não'}}</td>
  <td>R$ {{$registro->evento->preco}}</td>
</tr>
@endforeach
</tbody>
@endif
</table>
@endsection
