<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório de Imagens - Sistema Aula</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
            margin: 1cm 0.5cm;
            color: #000;
        }
        .texto-marca-dagua {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 7em;
            color: #888;
            opacity: 0.3;
            pointer-events: none;
            white-space: nowrap;
            z-index: 0;
        }
        .texto-restrito-cima {
            position: absolute;
            top: 0px;
            left: 130px;
            border: 1px solid #999;
            color: #999;
            font-size: 18px;
            font-weight: bolder;
            text-align: center;
            padding: 1px 8px;
        }
        .texto-restrito-baixo {
            position: absolute;
            bottom: 0px;
            left: 130px;
            border: 1px solid #999;
            color: #999;
            font-size: 20px;
            font-weight: bolder;
            text-align: center;
            padding: 1px 8px;
        }

        .header {
            text-align: center;
            line-height: 1.2;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .header .main-title { font-size: 11pt; }

        table.images-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        table.images-table td {
            border: 1px solid black;
            padding: 4px;
            text-align: center;
            vertical-align: top;
        }
        table.images-table img {
            max-width: 180px;
            height: auto;
            margin-bottom: 5px;
        }
        .image-title {
            font-weight: bold;
            display: block;
        }
        .image-tag {
            font-style: italic;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="texto-marca-dagua">JOCA - DANIEL</div>
    <div class="texto-restrito-cima">DOCUMENTO GERADO PELO SISTEMA DE IMAGENS</div>

    <div class="header">
        <span class="main-title">PDF DE IMAGEM</span>
    </div>
    <hr>

    <table class="images-table">
        <tbody>
            @foreach($images as $img)
                <tr>
                    <td>
                        <img src="{{ $img->image }}" style="width:120px; height:auto; display:block; margin:auto;">
                        <span class="image-title">{{ $img->title }}</span>
                        <span class="image-tag">{{ $img->tag }}</span>
                        <br>
                        <span class="image-user">Postado por: {{ $img->user->name }}</span>
                        <br>

                        <span class="image-user">E-mail: {{ $img->user->email }}</span>

                        <br>
                        <span class="image-user">Horário: {{ $img->created_at }}</span>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="texto-restrito-baixo" style="position: absolute; bottom: 1px;">
        DOCUMENTO GERADO PELO SISTEMA DE IMAGENS
    </div>

</body>
</html>
