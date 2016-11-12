@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <th width="05%" style="text-align: center">ID</th>
                <th width="55%" style="text-align: left">Razão Social</th>
                <th width="20%" style="text-align: left">CNPJ</th>
                <th width="20%" style="text-align: left">Cidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestadores as $prestador)
                <tr>
                    <td align="center">{{ $prestador->id }}</td>
                    <td>{{ $prestador->razao_social }}</td>
                    <td>{{ $prestador->cnpj }}</td>
                    <td>{{ $prestador->cidade }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row" style="text-align: center">
        {{ $prestadores->links() }}
    </div>
</div>

@endsection