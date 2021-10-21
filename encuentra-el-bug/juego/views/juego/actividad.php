<div class="row">
    <div class="col-sm-4">
        <h4 class="text-center">Jugadores</h4>
        <div class="row">
            <?php while ($name = $name_->fetch_object()): ?>
                <div class="col-sm-6">
                    <?php echo '<h5><strong>'.$name->name.'</strong></h5>' ?>
                </div>
                <div class="col-sm-6">
                    <?php echo '<h5><strong>'.$name->status.'</strong></h5>' ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>