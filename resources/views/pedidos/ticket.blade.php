<!DOCTYPE html>
<html>
<head>
    <title>Ticket - {{ $status }}</title>
    <style>
        @page { size: 10cm 12cm portrait; }
    </style>
</head>
<body>
    <p style="font-weight: bold;">Ticket: {{ $status }}<p>
    <p>
        <strong>Controle: {{ $controle }}</strong><br>
        Vendedor: {{ $vendedor }}<br>
        Loja: {{ $loja }}<br>
        Dt. Imp.: {{ $data }}
    </p>
    <p>
        Ouro: {{ $ouro }}<br>
        Peso: {{ $peso }}<br>
        Peso Final: {{ $peso_entregue }}<br>
        Numeração: {{ $numeracao }}<br>
        Modelo: {{ $modelo }}<br>
        Largura: {{ $largura }}<br>
        Observação: {{ $observacao }}<br><br>
    </p>
</body>
</html>
