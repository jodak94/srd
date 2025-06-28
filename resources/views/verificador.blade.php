    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verificación de Certificado</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

            body {
                background-color: #5b0f0f; 
                font-family: 'Roboto', sans-serif;
                margin: 0;
                padding: 50px 0;
            }

            .card {
                background-color: white;
                max-width: 40%;
                margin: auto;
                border: 5px solid #cc9a49; /* Dorado */
                padding: 40px;
                text-align: center;
                box-shadow: 0 0 15px rgba(0,0,0,0.2);
                border-radius: 5px;
            }

            .logo {
                max-width: 75%;
                margin-bottom: 20px;
            }

            .titulo {
                font-size: 22px;
                font-weight: bold;
                color: #333;
                margin-bottom: 10px;
            }

            .subtitulo {
                font-size: 18px;
                margin-bottom: 25px;
            }

            .datos {
                font-size: 16px;
                margin-bottom: 10px;
                color: #555;
            }

            .valido {
                color: green;
                font-weight: bold;
                margin-top: 30px;
            }

            .dato-item {
                position: relative;
                padding-left: 25px;
                margin-bottom: 10px;
                font-size: 16px;
                color: #555;
                text-align: left;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }

            .dato-item::before {
                content: '';
                position: absolute;
                left: 0;
                top: 4px;
                width: 10px;
                height: 10px;
                background-color: #cc9a49; 
                border-radius: 50%;
            }
            @media (max-width: 480px) {
                .card {
                    padding: 20px;
                    max-width: 100%;
                    margin: 5px;
                }

                .logo {
                    max-width: 100%;
                }

                .titulo {
                    font-size: 1rem;
                }

                .subtitulo {
                    font-size: 0.95rem;
                }

                .dato-item {
                    font-size: 0.9rem;
                }

                .valido {
                    font-size: 0.95rem;
                }
            }
        </style>
    </head>
    <body>
        <div class="card">
            <img src="{{ asset('images/logo_verificador.png') }}" alt="Logo Facultad" class="logo">
            <div class="titulo">UNIVERSIDAD NACIONAL DE ASUNCIÓN</div>
            <div class="titulo">FACULTAD DE INGENIERÍA</div>
            <div class="subtitulo">Verificación de Certificado</div>
            <div class="datos-container">
                <div class="dato-item">Nombre: <strong>{{ $documento->nombre_apellido }}</strong></div>
                <div class="dato-item">CI: <strong>{{ $documento->cic }}</strong></div>
                <div class="dato-item">Curso: <strong>{{ $documento->nombre_curso }}</strong></div>
                <div class="dato-item">Carga Horaria: <strong>{{ $documento->carga_horaria }} hs</strong></div>
                <div class="dato-item">Nro. registro: <strong>{{ $documento->nro_registro }} hs</strong></div>
            </div>
            <div class="valido">✔ Documento válido y verificado</div>
        </div>
    </body>
    </html>
