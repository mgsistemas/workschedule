@extends('layouts.email_layout')

@section('content')

<div class="container">
    <table width="700" cellspacing="0" cellpadding="0">
        <tr>
            <td align="middle" width="100%">
                <img src="{{ $message->embed(storage_path('app\trabalh.png')) }}" width="150" height="150">
            </td>
        </tr>
        <tr>
            <td align="middle" width="100%">
                <span><strong>Suas tarefas sob controle</strong></span>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>&nbsp;<br></td>
        </tr>
        <tr>
            <td>
                <span> Abaixo a lista de prestadores que não possuem espelhos gerados neste mês : <strong>{{  \App\Espelho::getMes(date('m')) }}</strong></span>
            </td>
        </tr>
    </table>
    <table class="table table-striped" width="700">
        <thead>
            <tr bgcolor="#CCCCCC">
                <th width="10%" style="text-align: center">Código</th>
                <th width="90%" style="text-align: left">Prestador</th>
            </tr>
        </thead>
        <tbody>
            <div style="display: none">
            {!! $i = 0 !!}
            </div>

            @foreach($dados as $dado)
                @if (($i % 2) == 0)
                <tr bgcolor="#FFFFFF">
                @else
                <tr bgcolor="#EFEFEF">
                @endif
                    <td>{{ $dado['id'] }}</td>
                    <td>{{ $dado['razao_social'] }}</td>
                </tr>
                <div style="display: none;">
                    {!! $i++ !!}
                </div>
            @endforeach
        </tbody>
    </table>
    <table class="table" width="700">
        <tr><td>&nbsp;</td></tr>
        <tr><td><span>Atenciosamente<br><br></span></td></tr>
        <tr><td><span class="small">TrabalhoEmDia.com - Suas tarefas sob controle - <strong>Gerado em : {{ date('d/m/Y H:i:s') }}</strong></span> </td></tr>
    </table>
</div>

@endsection