<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $asunto }}</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f6f9; font-family: Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f9; padding:30px 0;">
    <tr>
        <td align="center">

            <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.1);">

                <!-- HEADER -->
                <tr>
                    <td style="background:#0d6efd; padding:20px; text-align:center; color:white;">
                        <h2 style="margin:0;">Sistema de Seguimiento</h2>
                        <p style="margin:5px 0 0 0;">Notificación automática</p>
                    </td>
                </tr>

                <!-- CONTENIDO -->
                <tr>
                    <td style="padding:30px;">

                        <h3 style="margin-top:0; color:#333;">{{ $asunto }}</h3>

                        <p style="color:#555; font-size:14px;">
                            Se ha generado una notificación relacionada con un aprendiz en el sistema.
                        </p>

                        <!-- DATOS DEL APRENDIZ -->
                        <h4 style="margin-top:25px; color:#0d6efd;">Datos del Aprendiz</h4>

                        <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse; font-size:14px;">
                            <tr style="background:#f1f1f1;">
                                <td><strong>NIS</strong></td>
                                <td>{{ $aprendiz->NIS }}</td>
                            </tr>

                            <tr>
                                <td><strong>Documento</strong></td>
                                <td>{{ $aprendiz->NumDoc }}</td>
                            </tr>

                            <tr style="background:#f1f1f1;">
                                <td><strong>Nombres</strong></td>
                                <td>{{ $aprendiz->Nombres }}</td>
                            </tr>

                            <tr>
                                <td><strong>Apellidos</strong></td>
                                <td>{{ $aprendiz->Apellidos }}</td>
                            </tr>

                            <tr style="background:#f1f1f1;">
                                <td><strong>Teléfono</strong></td>
                                <td>{{ $aprendiz->Telefono }}</td>
                            </tr>

                            <tr>
                                <td><strong>Correo institucional</strong></td>
                                <td>{{ $aprendiz->CorreoInstitucional }}</td>
                            </tr>

                            <tr style="background:#f1f1f1;">
                                <td><strong>Correo personal</strong></td>
                                <td>{{ $aprendiz->CorreoPersonal }}</td>
                            </tr>

                            <tr>
                                <td><strong>Sexo</strong></td>
                                <td>{{ $aprendiz->sexo_texto }}</td>
                            </tr>

                            <tr style="background:#f1f1f1;">
                                <td><strong>EPS</strong></td>
                                <td>{{ $aprendiz->eps->Denominacion ?? 'No registrada' }}</td>
                            </tr>

                        </table>

                        <!-- CAMBIOS SI ES ACTUALIZACIÓN -->
                        @if(isset($cambios) && count($cambios) > 0)

                            <h4 style="margin-top:30px; color:#dc3545;">Cambios realizados</h4>

                            <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse; font-size:14px; border:1px solid #ddd;">

                                <tr style="background:#f8d7da;">
                                    <th align="left">Campo</th>
                                    <th align="left">Antes</th>
                                    <th align="left">Después</th>
                                </tr>

                                @foreach($cambios as $campo => $valores)

                                    <tr style="border-top:1px solid #ddd;">
                                        <td>{{ $campo }}</td>
                                        <td>{{ $valores['Antes'] }}</td>
                                        <td>{{ $valores['Después'] }}</td>
                                    </tr>

                                @endforeach

                            </table>

                        @endif

                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td style="background:#f1f1f1; padding:15px; text-align:center; font-size:12px; color:#666;">
                        Este correo fue generado automáticamente por el sistema.<br>
                        {{ date('Y') }} - Sistema de Gestión
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
