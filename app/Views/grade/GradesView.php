<div class="container">
    <div class="row">
        <div class="row">
            <h1>Tus cursos</h1>
        </div>
        <div class="row">
            <h3>Nuevo curso</h3>
            <form action="<?php echo base_url('public/grade/InsertGrade') ?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nombre del curso" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    Registrar
                </button>
            </form>
            <br><br><br><br>
        </div>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col" class="d-flex justify-content-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($grades as $row) {
                    ?>
                        <tr class="table-info">
                            <td>
                                <p id="pg<?php echo $row['id']; ?>">
                                    <?php echo $row['name']; ?>
                                </p>
                                <form style="display: none;" id="fg<?php echo $row['id']; ?>" action="<?php echo base_url('/public/grade/UpdateGrade'); ?>" method="POST" target="_self">
                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="val">
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required>
                                    <br>
                                    <button type="submit" class="btn btn-primary form-control">
                                        Confirmar
                                    </button>
                                </form>
                            </td>
                            <td class="text-right">
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
                                </div>
                            </td>
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
                        foreach ($row['parallels'] as $parallel) {
                        ?>
                            <tr>
                                <td>
                                    <p id="pp<?php echo $parallel->parallel_id; ?>">
                                        <?php echo $parallel->name; ?>
                                    </p>
                                    <form style="display: none;" id="fp<?php echo $parallel->parallel_id; ?>" action="<?php echo base_url('/public/parallel/UpdateParallel'); ?>" method="POST" target="_self">
                                        <input type="hidden" value="<?php echo $parallel->parallel_id; ?>" name="val">
                                        <input type="text" class="form-control" name="name" value="<?php echo $parallel->name; ?>" required>
                                        <br>
                                        <button type="submit" class="btn btn-primary form-control">
                                            Confirmar
                                        </button>
                                    </form>
                                </td>
                                <td class="text-right">
                                    <div class="d-flex justify-content-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                ...
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <p class="dropdown-item" onclick="display('p<?php echo $parallel->parallel_id; ?>')">Editar</p>
                                                </li>
                                                <li>
                                                    <p class="dropdown-item" onclick="changeVal('p', '<?php echo $parallel->parallel_id; ?>')" data-bs-toggle="modal" data-bs-target="#confirmationDelete">Eliminar</p>
                                                </li>
                                            </ul>
                                        </div>
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
</div>
<script>
    function display(id) {
        var form = document.getElementById("f" + id);
        var txt = document.getElementById("p" + id);
        if (form.style.display === "none") {
            form.style.display = "block";
            txt.style.display = "none";
        } else {
            form.style.display = "none";
            txt.style.display = "block";
        }
    }

    function changeVal(mode, id) {
        if (mode == "g")
            document.getElementById("deleteform").action = "<?php echo base_url('/public/grade/DeleteGrade'); ?>";
        else
            document.getElementById("deleteform").action = "<?php echo base_url('/public/parallel/DeleteParallel'); ?>";
        document.getElementById("valId").value = id;
    }
</script>

<div class="modal" id="confirmationDelete" tabindex="-1" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>¿ESTÁ SEGURO DE ELIMINARLO?</h5>
            </div>
            <form id="deleteform" action="" method="POST" target="_self">
                <div class="modal-body d-flex justify-content-center">
                    <input type="hidden" id="valId" value="0" name="val">
                    <button type="submit" class="btn btn-danger">
                        Eliminar
                    </button>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

            </div>
        </div>
    </div>
</div>