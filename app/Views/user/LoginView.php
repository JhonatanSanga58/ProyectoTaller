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
                        <a href="<?php echo base_url("public/user/forget"); ?>">
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
</div>