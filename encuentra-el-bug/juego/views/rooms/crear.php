<form action="<?= base ?>?room" class="form-control mt-3" method="POST">
    <!--div class="form-control">
        <h3 class="text-center">Codigo de la Sala</h3>
        <input type="text" name="codigo" id="" value="<?php echo dechex(0); ?>" class="form-control text-center fs-4" disabled>
    </div!-->
    <div class="mt-2">
        <label for="nombre">Nombre del Jugador</label>
        <input type="text" class="form-control" placeholder="Sin nombre" name="nombre">
        <input type="submit" value="Crear Sala" class="btn btn-success btn-lg form-control mt-3" name="f-crear-sala">
    </div>
</form>