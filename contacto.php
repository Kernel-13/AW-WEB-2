<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="icon" href="img/hecate.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/body-style.css">
    <link rel="stylesheet" type="text/css" href="css/session-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Registro - 1er Paso</title>
</head>

<body>
    

    <div class="container Novedades-container" style="margin-top:50px;">
        <?php require "includes/navbar.php"; ?>


        <div class="row">

            <div class="col-md-2">
            </div>

            <div class="col-md-8">

                <h1 align=c enter>Contactanos</h1>

                <!--fórmulario de contacto-->
                <div class="container-fluid register">
                    <div class="row form-class">
                        <div class="col-lg-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Formulario de contacto
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" action="register_second.html">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label class="sr-only" for="email"> Email </label>
                                                <input type="email" class="form-control" id="email" placeholder="Email" required="required" onchange="validar(this.value)">
                                            </div>
                                            <div class="col-sm-3 message-box">
                                                <span id="er_icon" class="icon_hidden"><img alt="Invalido" class="signal" src="img/no.png"> Invalido </span>
                                                <span id="ok_icon" class="icon_hidden"><img alt="Correcto" class="signal" src="img/ok.png"> Correcto </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="sr-only" for="name"> Nombre </label>
                                                <input type="text" class="form-control" required="required" id="name" placeholder="Nombre">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="sr-only" for="user"> Telefono </label>
                                                <input type="text" class="form-control" required="required" id="user" placeholder="Teléfono">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="sr-only" for="user"> Asunto </label>
                                                <input type="text" class="form-control" required="required" id="user" placeholder="Asunto">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="sr-only" for="pass"> Mensaje </label>
                                                <textarea name="mensaje" class="form-control" placeholder="Escriba aquí su mensaje"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12 submitButton">
                                                <button type="submit" class="btn btn-warning">Enviar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-2"></div>
        </div>


    </div>
    <?php require "includes/PiePagina.php"; ?>
</body>
</html>