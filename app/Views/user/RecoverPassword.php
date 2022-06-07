<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<br><br>
			<div class="card text-center">
                <div class="card-title">
                    <h1>Cambiar Contraseña</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                        	<form action="<?php echo base_url('public/user/updatepassword')?>" target="_self" method="post">
								<div>
                                    <input type="text" value="<?php echo $key ?>" hidden id="key" name="key">
									<div class="row">
                                        <div class="col-md-2"></div>
										<div class="col-md-8">
											<div class="form-group">
												<label>Nueva Contraseña</label>
												<input type="password" name="password" id="password" class="form-control" minlength="8" required>
											</div>
										</div>
									</div>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
											<div class="form-group">
												<label>Repetir contraseña</label>
												<input type="password" name="repeatPassword" id="repeatPassword" class="form-control" minlength="8" required>
											</div>
										</div>
                                    </div>
									<br><br>
									<div class="row">
										<div class="col-md-12">
											<button type="submit" class="btn btn-primary col-md-12">GUARDAR</button>
										</div>
									</div>
									<br><br>
								</div>
							</form>
							
						<!--<script type="text/javascript"> 
							let message = '<?php //echo $message ?>';
							if(message == '0')
							{
								swal('ERROR','Error inesperado intentelo denuevo ','error');
							}
							if(message == '1')
							{
								swal('EXITO','Registrado con exito, se envio un mensaje de confirmacion a su correo.','success');
							}
							if(message == '2')
							{
								swal('ERROR','El email insertado ya esta en uso','error');
							}
						</script>-->
                        </div>
                    </div>
                </div>
        	</div>
        	<br><br>
		</div>
	</div>
</div>