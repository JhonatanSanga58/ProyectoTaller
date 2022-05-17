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
										<div class="col-md-12">
											<div class="form-group">
												<label class="lbl">Nombres</label>
												<input type="txt" name="names" id="names" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Primer apellido</label>
												<input type="txt" name="firstLastName" id="firstLastName" class="form-control" required>
											</div>
										</div>
										<div class="col-md-6">
											<label>Segundo apellido</label>
											<input type="txt" name="secondLastName" id="secondLastName" class="form-control">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Usuario</label>
												<input type="txt" name="userName" id="userName" class="form-control" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Nombre de usuario</label>
												<input type="txt" name="nickName" id="nickName" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Contraseña</label>
												<input type="password" name="password" id="password" class="form-control" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Repetir contraseña</label>
												<input type="password" name="repeatPassword" id="repeatPassword" class="form-control" required>
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

