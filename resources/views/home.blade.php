@extends('layouts.app')

@section('content')

<br/><br/>
<div clas="row">
  <h2>Eventos</h2>
</div>
<br/>
<div class="row">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Data</th>
      </tr>
    </thead>
@if (count($eventos) > 0)
<tbody>
@foreach ($eventos as $evento)
<tr>
  <td>{{ $evento->nome }}</td>
  <td>R$ {{ $evento->preco }}</td>
  <td>{{ date('d/m/Y', strtotime($evento->data))}}</td>
</tr>
@endforeach
</tbody>
@endif
</table>
@endsection
