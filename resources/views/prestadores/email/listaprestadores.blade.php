<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Prestadores</title>
    </head>
<body>
    <table width="900" class="table table-responsive table-striped">
        <thead>
            <th>ID</th>
            <th>Razão Social</th>
            <th>CNPJ</th>
            <th>Cidade</th>
        </thead>
        <tbody>
            @foreach($prestadores as $prestador)
                <tr>
                    <td>{{ $prestador->id ]}</td>
                    <td>{{ $prestador->rezao_social ]}</td>
                    <td>{{ $prestador->cnpj ]}</td>
                    <td>{{ $prestador->cidade ]}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
<table class="table">
    <tr>
        <td><span class="small">TrabalhoEmDia.com - Suas tarefas em Dia - Porto Seguro Cia de Seguros Gerais.</span>/td>
    </tr>
</table>
</body>
</html>