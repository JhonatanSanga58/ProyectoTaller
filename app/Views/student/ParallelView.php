<div class="container">
    <div class="row">
        <div class="row">
            <h1>Tus cursos</h1>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h3>Inirse a un curso</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#codeParallel">
                    UNIRSE
                </button>
            </div>
            
            <br><br><br><br>
        </div>

        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Curso</th>
                        <th scope="col" class="justify-content-center">Retroalimentación</th>
                        <th scope="col" class="d-flex justify-content-center">Notas</th>              
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($parallels as $row) {
                    ?>
                        <tr class="table-info">
                            <td>
                                <p id="pg<?php echo $row['id']; ?>">
                                    <?php echo $row['name']; ?>
                                </p>
                                <!--<form style="display: none;" id="fg<?php echo $row['id']; ?>" action="<?php echo base_url('/public/grade/UpdateGrade'); ?>" method="POST" target="_self">
                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="val">
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required>
                                    <br>
                                    <button type="submit" class="btn btn-primary form-control">
                                        Confirmar
                                    </button>
                                </form>-->
                            </td>
                            <td class="text-right">
                                <!--
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            ...
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <p class="dropdown-item" onclick="display('g<?php echo $row['id']; ?>')">Editar</p>
                                            </li>
                                            <li>
                                                <p class="dropdown-item" onclick="changeVal('g', '<?php echo $row['id']; ?>')" data-bs-toggle="modal" data-bs-target="#confirmationDelete">Eliminar</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>-->
                            </td>
                            <td></td>
                            <!--<td>
                                <form action="" method="POST" target="_self">
                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="val">
                                    <button type="submit" class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </td>-->
                        </tr>
                        <?php
                        
                        foreach ($row['examen'] as $exam) {
                        ?>
                            <tr>
                                <td>
                                    <p id="pp<?php echo $exam->exam_id; ?>">
                                        <?php echo $exam->exam_name; ?>
                                    </p>
                                    <!--<form style="display: none;" id="fp<?php echo $exam->exam_id; ?>" action="<?php echo base_url('/public/exam/Updateexam'); ?>" method="POST" target="_self">
                                        <input type="hidden" value="<?php echo $exam->exam_id; ?>" name="val">
                                        <input type="text" class="form-control" name="name" value="<?php echo $exam->exam_name; ?>" required>
                                        <br>
                                        <button type="submit" class="btn btn-primary form-control">
                                            Confirmar
                                        </button>
                                    </form>-->
                                </td>
                                <td>
                                    <div class="justify-content-center">
                                            <?php echo $exam->feedback;?>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="d-flex justify-content-center">
                                        <?php echo $exam->score;?>
                                    </div>
                                </td>
                                
                            </tr>
                        <?php
                        } ?>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal" id="codeParallel" tabindex="-1" role="dialog" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Unirse a un curso</h5>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('public/student/RegisterParallel') ?>" target="_self" method="post">
                        <label>Ingrese el codigo</label>
                        <br>
                        <input type="text" name="code" id="code" class="form-control" required>
                        <button type="submit" class="btn btn-primary" >Registrarse</button>
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
			swal('CODIGO INEXISTENTE','No existe un paralelo con ese codigo','error');
		}
		if(messageReport == '1')
		{
			swal('EXITO','Te has unido exitasamente a este paralelo','success');
		}
		if(messageReport == '2')
		{
			swal('ERROR','El email insertado ya esta en uso','error');
		}
	</script>
</div>