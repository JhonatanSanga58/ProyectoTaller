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
                        	<form action="<?php echo base_url('public/student/registerModel')?>" target="_self" method="post">
								<div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="lbl">Nombres</label>
												<input type="txt" name="Names" id="Names" class="form-control" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Primer apellido</label>
												<input type="txt" name="FirstLastSurame" id="FirstLastSurame" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="row">
										
										<div class="col-md-6">
											<label>Segundo apellido</label>
											<input type="txt" name="SecondLastSurname" id="SecondLastSurname" class="form-control">
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Nombre de usuario</label>
												<input type="txt" name="NickName" id="NickName" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Contraseña</label>
												<input type="password" name="Password" id="Password" class="form-control" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Repetir contraseña</label>
												<input type="password" name="RepeatPassword" id="RepeatPassword" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Correo electronico</label>
												<input type="email" name="Email" id="Email" class="form-control" required>
											</div>
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
							
						<script type="text/javascript"> 
							let message = '<?php echo $message ?>';
							if(message == '0')
							{
								swal('ERROR','Error inesperado intentelo denuevo.','error');
							}
							if(message == '1')
							{
								swal('EXITO','Registrado con exito, se envio un mensaje de confirmacion a su correo.','success');
							}
							if(message == '2')
							{
								swal('ERROR','El email insertado ya esta en uso','error');
							}
						</script>
                        </div>
                    </div>
                </div>
        	</div>
        	<br><br>
		</div>
	</div>
</div>

