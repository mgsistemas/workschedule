@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table table-responsive table-striped">
        <thead>
        <tr>
            <th width="05%" style="text-align: center">ID</th>
            <th width="40%" style="text-align: left">Prestador</th>
            <th width="15" style="text-align: center">Data</th>
            <th width="20%" style="text-align: left">Serviço</th>
            <th width="20%" style="text-align: left">Valor</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lancamentos as $lancamento)
        <tr>
            <td align="center">{{ $lancamento->id }}</td>
            <td>{{ \App\Lancamento::getPrestador($lancamento->prestador_id) }}</td>
            <td>{{ $lancamento->data_servico_formatted }}</td>
            <td>{{ \App\Lancamento::getServico($lancamento->servico_id) }}</td>
            <td>{{ $lancamento->valor }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row" style="text-align: center">
        {{ $lancamentos->links() }}
    </div>
</div>

@endsection