<?php echo "<script>FUNCIONALIDAD='load-play'</script>"; ?>
<div class="row mb-3">
    <div class="col-sm-4">
        <div class="form-control">
            <h4 class="text-center">Jugadores</h4>
            <hr>
            <div class="row text-center">
                <?php while ($name = $name_->fetch_object()): ?>
                    <div class="col-sm-6">
                        <?php echo '<h5 class="text-right"><strong>'.((empty($name->name) ? 'Sin nombre' : $name->name)).'</strong></h5>' ?>
                    </div>
                    <div class="col-sm-6">
                        <?php echo '<h5><strong>'.$name->status.'</strong></h5>' ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="form-control">
            <h4 class="text-center">Esperando Jugadores...</h4>
        </div>
    </div>
</div>
