@extends('layouts.app')

@section('content')

<br/><br/>
<div clas="row">
  <h2>Atletas</h2>
</div>
<br/>
<div class="row" style="clear:both;">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>Atleta</th>
      </tr>
    </thead>
@if (count($atletas) > 0)
<tbody>
@foreach ($atletas as $atleta)
<tr>
  <td>{{$atleta->nome}}</td>
</tr>
@endforeach
</tbody>
@endif
</table>
@endsection
