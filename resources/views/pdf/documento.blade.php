<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Diploma</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 0;
        }

        .container {
            width: 100%;
            height: 100vh;
            box-sizing: border-box;
            position: relative;
            padding: 80px;
        }

        .signature-line {
            border-top: 1px solid #000;
            width: 200px;
            margin: 0 auto 5px;
        }

        .qr-code {
            position: absolute;
            top: 125px;
            right: 275px;
            width: 90px;
            z-index: 99999;
        }

        body{
            font-family: Helvetica, sans-serif;
            border: 1px solid #5b0f0f;
            background: url('{{ $background }}') no-repeat;
            background-size: 100% 100%;
            font-size: 18px;
            margin: 0;
            padding: 0;
        }

        .content {
            line-height: 1.6;
            position: absolute;
            top: 625px;
            width: 60%;
            left: 45%;
            transform: translate(-50%, -50%);
        }

        .content .title{
            text-align: center;
            font-size: 32px;
            width: 80%;
            margin: 60px auto;
        }

        .footer {
            text-align: center;
            top: 925px;
            position: absolute;
            left: 45%;
            transform: translate(-50%, -50%);
        }

        .signatures{
            position: absolute;
            top: 1125px;
            text-align: center;
        }

        .sec{
            left: 150px;
        }

        .dec{
            left: 525px;
        }

        .nro_registro{
            position: absolute;
            top: 1322px;
            left: 105px;
        }

    </style>
</head>
<body>
<div class="container">
    <img class="qr-code" src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">
    <div class="content">
        <div class="title">
            <b>CERTIFICADO EN
            {{ strtoupper($documento->nombre_curso) }}</b>
        </div>
        <div class="body">
            Se confiere la presente Certificación, a
            <strong>{{ strtoupper($documento->nombre_apellido) }}</strong> con CI Nº: <strong>{{ strtoupper($documento->cic) }}</strong>.
            Por haber culminado satisfactoriamente el {{ $documento->tipoCurso->descripcion }} en
            <strong>{{ strtoupper($documento->nombre_curso) }}</strong>, programa académico habilitado según Resolución N° {{ strtoupper($documento->numero_resolucion) }}.
            {{$periodo}}, completando un total de {{ $documento->carga_horaria }} horas académicas.
        </div>
    </div>
    <div class="footer">
        San Lorenzo, República del Paraguay, {{ \Carbon\Carbon::now()->format('d/m/Y') }}
    </div>
    <div class="signatures sec">
        <div class="signature-line"></div>
        Lic. Sonia Emilce León Cañete<br>Secretaria
    </div>
    <div class="signatures dec">
        <div class="signature-line"></div>
        Prof. Dr. Ing. Rubén Alcides López Santacruz<br>Decano
    </div>
    <div class="nro_registro">{{$documento->nro_registro}}</div>
</body>
</html>
