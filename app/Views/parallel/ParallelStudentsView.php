<div class="container">
    <div class="row">
        <div class="row">
            <h1>Estudiantes del paralelo <?php echo $name ?></h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Exámenes
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                        foreach ($exams as $row) {
                        ?>
                            <li>
                                <p class="dropdown-item">
                                <form action="<?php echo base_url("public/exam/scores") ?>" method="post">
                                    <input type="hidden" value="<?php echo $row->exam_id ?>" name="val">
                                    <input type="hidden" value="<?php echo $row->exam_name ?>" name="name">
                                    <button class="btn btn-white text-primary" type="submit">
                                        <?php echo $row->exam_name; ?>
                                    </button>
                                </form>
                                </p>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php
                                foreach ($students as $row) {
                                ?>
                                    <p><?php echo $row->name ?></p>
                                <?php
                                } ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
