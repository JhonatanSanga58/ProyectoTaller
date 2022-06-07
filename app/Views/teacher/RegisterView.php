<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <br><br>
            <div class="card text-center">
                <div class="card-title">
                    <h1>Registrarse</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <form action="<?php echo base_url('public/teacher/registerInsert') ?>" target="_self" method="post" enctype="multipart/form-data">
                                <div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="lbl">Nombres</label>
                                                <input type="txt" pattern="^[a-z A-Z]+$" name="names" id="names" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Primer apellido</label>
                                                <input type="txt" pattern="^[a-z A-Z]+$" name="firstLastName" id="firstLastName" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Segundo apellido</label>
                                            <input type="txt" pattern="^[a-z A-Z]+$" name="secondLastName" id="secondLastName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contraseña</label>
                                                <input type="password" minlength="8" name="password" id="password" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Repetir contraseña</label>
                                                <input type="password" minlength="8" name="repeatPassword" id="repeatPassword" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Correo electronico</label>
                                                <input type="email" name="email" id="email" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Foto de perfil
                                            <br>
                                            <input type="file" id="file-upload" name="photo" accept=".jpg">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="<?php echo base_url('sources/images/users/0.png'); ?>" id="imagen" width="200" height="200" style="margin: auto; border-radius:10em;" />
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary col-md-12">REGISTRARSE</button>
                                        </div>
                                    </div>
                                    <br><br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>
</div>

<!-- preview image -->
<script type="text/javascript">
    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewZone = document.getElementById('imagen');
                previewZone.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            var previewZone = document.getElementById('imagen');
            previewZone.src = "users/0.png";
        }
    }

    var fileUpload = document.getElementById('file-upload');
    fileUpload.onchange = function(e) {
        readFile(e.srcElement);
    }
</script>
<script type="text/javascript">
    let messageReport = '<?php echo $messageReport ?>';
    if (messageReport == '0') {
        swal('ERROR', 'Error inesperado intentelo denuevo ', 'error');
    }
    if (messageReport == '1') {
        swal('EXITO', 'Registrado con exito, se envio un mensaje de confirmacion a su correo.', 'success');
    }
    if (messageReport == '2') {
        swal('ERROR', 'El email insertado ya esta en uso', 'error');
    }
</script>