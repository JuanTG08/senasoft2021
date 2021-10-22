<h2 class="text-center mt-3 mb-4 text-primary">Crear Sala</h2>
<form class="form-control" method="POST" action="<?= base ?>?create-room">
    <div class="row">
        <div class="col-sm-6">
            <div class="input-group">
                <span class="input-group-text">Apodo</span>
                <input type="text" name="nickname" placeholder="Apodo" class="form-control">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="input-group">
                <span class="input-group-text">Codigo</span>
                <input type="text" aria-label="First name" class="form-control" name="room" placeholder="FFFFF" maxlength="5" minlength="5" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <input type="submit" value="Unirme" class="btn btn-primary mt-2 form-control" name="unite-room">
        </div>
    </div>
</form>
