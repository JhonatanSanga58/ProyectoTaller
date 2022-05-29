<div class="container">
    <div class="row">
        <div class="row">
            <h1>Tus cursos</h1>
        </div>
        <div class="row">
            <p>Nuevo curso</p>
            <form action="<?php echo base_url('public/InsertGrade') ?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nombre del curso" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    Registrar
                </button>
            </form>
        </div>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($grades as $row) {
                    ?>
                        <tr class="table-info">
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/public/grade/UpdateGrade'); ?>" method="POST" target="_self">
                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="val">
                                    <button type="submit" class="btn btn-success">
                                        Editar
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/public/grade/DeleteGrade'); ?>" method="POST" target="_self">
                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="val">
                                    <button type="submit" class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        foreach ($row['parallels'] as $parallel) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $parallel->name; ?>
                                </td>
                                <td>
                                    <form action="<?php echo base_url('/public/parallel/UpdateParallel'); ?>" method="POST" target="_self">
                                        <input type="hidden" value="<?php echo $parallel->parallel_id; ?>" name="val">
                                        <button type="submit" class="btn btn-success">
                                            Editar
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?php echo base_url('/public/parallel/UpdateParallel'); ?>" method="POST" target="_self">
                                        <input type="hidden" value="<?php echo $parallel->parallel_id; ?>" name="val">
                                        <button type="submit" class="btn btn-danger">
                                            Eliminar
                                        </button>
                                    </form>
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