<div class="form-control mb-3">
    <h3>¿Vas a Preguntar o Acusar?</h3>
    <div class="row">
        <div class="col-sm-3">
            <label for="escojerPA">Escojer o Acusar</label>
            <select name="escojerPA" id="" class="form-control">
                <optgroup label="Escojer o Acusar">
                    <option value="0">Preguntar</option>
                    <option value="0">Acusar</option>
                </optgroup>
            </select>
        </div>

        <div class="col-sm-3">
            <label for="escojerPA">¿Quien Fue?</label>
            <select name="escojerPA" id="" class="form-control">
                <optgroup label="Escojer Quien Fue">
                    <?php for ($i=0; $i <= 6; $i++): ?>
                        <option value="<?= $i ?>"><?= $_SESSION['Cartas'][$i][1] ?></option>
                    <?php endfor; ?>
                </optgroup>
            </select>
        </div>

        <div class="col-sm-3">
            <label for="escojerPA">¿En que Modulo?</label>
            <select name="escojerPA" id="" class="form-control">
                <optgroup label="En que Modulo Fue">
                    <?php for ($i=7; $i <= 12; $i++): ?>
                        <option value="<?= $i ?>"><?= $_SESSION['Cartas'][$i][1] ?></option>
                    <?php endfor; ?>
                </optgroup>
            </select>
        </div>

        <div class="col-sm-3">
            <label for="escojerPA">¿Con cual error?</label>
            <select name="escojerPA" id="" class="form-control">
                <optgroup label="Cual error Fue">
                    <?php for ($i=13; $i <= 18; $i++): ?>
                        <option value="<?= $i ?>"><?= $_SESSION['Cartas'][$i][1] ?></option>
                    <?php endfor; ?>
                </optgroup>
            </select>
        </div>
    </div>
    <button class="btn btn-success form-control mt-3">Notificar</button>
</div>