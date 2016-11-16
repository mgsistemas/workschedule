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
    <table class="table" width="700">
        <tr><td>
            <span>Limpeza Inbox - Total de Registros Removidos = <strong>{{ $dados['total'] }}</strong></span>
        </td></tr>
    </table>
    <table class="table" width="700">
        <tr><td>&nbsp;</td></tr>
        <tr><td><span>Atenciosamente<br><br></span></td></tr>
        <tr><td><span class="small">TrabalhoEmDia.com - Suas tarefas sob controle - <strong>Gerado em : {{ date('d/m/Y H:i:s') }}</strong></span> </td></tr>
    </table>
</div>

@endsection