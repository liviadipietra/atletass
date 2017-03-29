@extends('layouts.app')

@section('content')

<br/><br/>
<div clas="row">
  <h2>Total de Registros</h2>
</div>
<br/>
<div class="row" style="clear:both;">
@if (count($atletas) > 0)
<?php $totalRegistros = 0; $valorTotal = 0; ?>
<table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>Atleta</th>
        <th>Qtde Registros</th>
        <th>Valor Total</th>
      </tr>
    </thead>
<tbody>
@foreach ($atletas as $atleta)
<?php
  $totalRegistros += count($atleta->registros);
  $totalAtleta = 0;
  foreach($atleta->registros as $registro){
    $totalAtleta += $registro->evento->preco;
  }
  $valorTotal += $totalAtleta;
?>
<tr>
  <td>{{$atleta->nome}}</td>
  <td>{{count($atleta->registros)}}</td>
  <td>R$ {{$totalAtleta}}</td>
</tr>
@endforeach
</tbody>
<tfoot>
  <tr>
    <td></td>
    <td><strong>Total de Eventos:</strong></td>
    <td>{{$totalRegistros}}</td>
  </tr>
  <tr>
    <td></td>
    <td><strong>Valor Total:</strong></td>
    <td>R$ {{$valorTotal}}</td>
  </tr>
</tfoot>
</table>
@endif
<br><br>
@if (count($eventos) > 0)
<?php $totalRegistros = 0; $valorTotal = 0; ?>
<table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>Evento</th>
        <th>Qtde Registros</th>
        <th>Valor Total</th>
      </tr>
    </thead>
<tbody>
@foreach ($eventos as $evento)
<?php
  $totalRegistros += count($evento->registros);
  $totalAtleta = 0;
  foreach($evento->registros as $registro){
    $totalAtleta += $registro->evento->preco;
  }
  $valorTotal += $totalAtleta;
?>
<tr>
  <td>{{$evento->nome}}</td>
  <td>{{count($evento->registros)}}</td>
  <td>R$ {{$totalAtleta}}</td>
</tr>
@endforeach
</tbody>
<tfoot>
  <tr>
    <td></td>
    <td><strong>Total de Eventos:</strong></td>
    <td>{{$totalRegistros}}</td>
  </tr>
  <tr>
    <td></td>
    <td><strong>Valor Total:</strong></td>
    <td>R$ {{$valorTotal}}</td>
  </tr>
</tfoot>
</table>
@endif
@endsection
