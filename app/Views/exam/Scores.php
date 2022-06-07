<div class="container">
    <?php

    $i = 0;
    foreach ($scores as $row) { ?>
        <form action="<?php echo base_url("public/exam/UpdateScore") ?>" method="POST" id="form<?php echo $i ?>"></form>
    <?php
        $i = $i + 1;
    }
    ?>
    <div class="row">
        <div class="row">
            <h1>Notas de "<?php echo $name ?>"</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Nota</th>
                            <th scope="col">Retroalimentación</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($scores as $row) {
                        ?>
                            <tr>
                                <td>
                                    <p><?php echo $row->name ?></p>
                                </td>
                                <td>
                                    <p id="numP<?php echo $row->user_id ?>"><?php echo $row->score ?></p>
                                    <input type="number" value="<?php echo $row->score ?>" name="score" class="form-control" style="display: none;" id="num<?php echo $row->user_id ?>" form="form<?php echo $i ?>">
                                    <input type="hidden" value="<?php echo $row->user_id ?>" name="valEst" form="form<?php echo $i ?>">
                                    <input type="hidden" value="<?php echo $id ?>" name="valExam" form="form<?php echo $i ?>">
                                </td>
                                <td>
                                    <p id="feedP<?php echo $row->user_id ?>">
                                        <?php echo $row->feedback ?>
                                    </p>
                                    <input type="text" value="<?php echo $row->feedback ?>" name="feedback" class="form-control" style="display: none;" id="feed<?php echo $row->user_id ?>" form="form<?php echo $i ?>">
                                </td>
                                <td>
                                    <button class="btn btn-success" onclick="display('<?php echo $row->user_id ?>')" id="btnEdit<?php echo $row->user_id ?>">
                                        Editar
                                    </button>
                                    <button style="display: none;" class="btn btn-primary" type="submit" id="btn<?php echo $row->user_id ?>" form="form<?php echo $i ?>">
                                        Confirmar
                                    </button>
                                </td>
                            </tr>
                        <?php
                            $i = $i + 1;
                        } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function display(id) {
        var txtNum = document.getElementById("num" + id);
        var txtNumP = document.getElementById("numP" + id);
        var txtFeed = document.getElementById("feed" + id);
        var txtFeedP = document.getElementById("feedP" + id);
        var btnConfirm = document.getElementById("btn" + id);
        var btnEdit = document.getElementById("btnEdit" + id);
        if (btnConfirm.style.display === "none") {
            txtNum.style.display = "block";
            txtFeed.style.display = "block";
            btnConfirm.style.display = "block";
            txtNumP.style.display = "none";
            txtFeedP.style.display = "none";
            btnEdit.style.display = "none";
        } else {
            txtNum.style.display = "none";
            txtFeed.style.display = "none";
            btnConfirm.style.display = "none";
            txtNumP.style.display = "block";
            txtFeedP.style.display = "block";
            btnEdit.style.display = "block";
        }
    }
</script>