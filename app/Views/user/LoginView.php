<div class="container">
    <br><br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-title">
                    <h1>Iniciar sesión</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <form action="<?php echo base_url('public/user/LoginValidate') ?>" target="_self" method="post">
                                <div class="form-group">
                                    <label>Correo electrónico</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" name="pswd" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary col-md-12">Ingresar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <!--<button class="btn btn-sucess" data-bs-toggle="modal" data-bs-target="#emailModal">
                            ¿Olvidaste tu contraseña?
                        </button>-->
                        <a data-bs-toggle="modal" data-bs-target="#emailModal" class="text-blue" style="cursor:pointer;">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Registrate
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo base_url("public/teacher/register"); ?>">Como profesor</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url("public/student/register"); ?>">Como estudiante</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <br><br>
    <div class="modal" id="emailModal" tabindex="-1" role="dialog" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Recuperar contraseña</h5>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('public/user/SendMailForRecover') ?>" target="_self" method="post">
                        <label>Ingrese su correo</label>
                        <br>
                        <input type="email" name="Email" id="Email" class="form-control" required>
                        <button type="submit" class="btn btn-primary" >Siguiente</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript"> 
		let messageReport = '<?php echo $messageReport ?>';
		if(messageReport == '0')
		{
			swal('ERROR','El correo que ingreso no existe','error');
		}
        if(messageReport == '1')
		{
			swal('REGISTRO CON EXITO','Se envio un mensaje a su correo electronico por favor reviselo para poder continuar con la recuperacion de su contraseña','success');
		}
        if(messageReport == '2')
		{
			swal('EXITO AL CAMBIAR SU CONTRASEÑA','Su contraseña se cambio exitosamente','success');
		}
        if(messageReport == '3')
		{
			swal('ACTIVACION CON EXITO','Gracias por registrarse ya puede usar el sistema','success');
		}
	</script>
</div>