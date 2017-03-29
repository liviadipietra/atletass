@extends('layouts.app')

@section('content')

<br/><br/>
<div clas="row">
  <h2>Meus Eventos</h2>
</div>
<br/>
<div class="row" style="clear:both;">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>Evento</th>
        <th>Data Pagamento</th>
        <th>Data Evento</th>
        <th>Pago</th>
        <th>Preço</th>
      </tr>
    </thead>
<?php $total = 0; ?>
@if (count($registros) > 0)
<tbody>
@foreach ($registros as $registro)
<?php $total += $registro->evento->preco; ?>
<tr>
  <td>{{$registro->evento->nome}}</td>
  <td>{{ date('d/m/Y', strtotime($registro->data))}}</td>
  <td>{{ date('d/m/Y', strtotime($registro->evento->data))}}</td>
  <td>{{$registro->pago == 1 ? 'Sim' : 'Não'}}</td>
  <td>R$ {{$registro->evento->preco}}</td>
</tr>
@endforeach
</tbody>
@endif
<tfoot>
  <tr>
    <td></td>
    <td>Total de Eventos:</td>
    <td>{{count($registros)}}</td>
    <td>Valor Total:</td>
    <td>R$ {{$total}}</td>
  </tr>
</tfoot>
</table>
@endsection
