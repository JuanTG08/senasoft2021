<form class="form-control mb-3" method="POST" action="?SetPregunta">
    <h3>¿Vas a Preguntar o Acusar?</h3>
    <div class="row">
        <div class="col-sm-3">
            <label for="escojerPA">Escojer o Acusar</label>
            <select name="escojerPA" id="" class="form-control" required>
                <optgroup label="Escojer o Acusar">
                    <option value="0">Preguntar</option>
                    <option value="1">Acusar</option>
                </optgroup>
            </select>
        </div>

        <div class="col-sm-3">
            <label for="escojerPR">¿Quien Fue?</label>
            <select name="escojerPR" id="" class="form-control" required>
                <optgroup label="Escojer Quien Fue">
                    <?php for ($i=0; $i <= 6; $i++): ?>
                        <option value="<?= $i+1 ?>"><?= $_SESSION['Cartas'][$i][1] ?></option>
                    <?php endfor; ?>
                </optgroup>
            </select>
        </div>

        <div class="col-sm-3">
            <label for="escojerM">¿En que Modulo?</label>
            <select name="escojerM" id="" class="form-control" required>
                <optgroup label="En que Modulo Fue">
                    <?php for ($i=7; $i <= 12; $i++): ?>
                        <option value="<?= $i+1 ?>"><?= $_SESSION['Cartas'][$i][1] ?></option>
                    <?php endfor; ?>
                </optgroup>
            </select>
        </div>

        <div class="col-sm-3">
            <label for="escojerER">¿Con cual error?</label>
            <select name="escojerER" id="" class="form-control">
                <optgroup label="Cual error Fue">
                    <?php for ($i=13; $i <= 18; $i++): ?>
                        <option value="<?= $i+1 ?>"><?= $_SESSION['Cartas'][$i][1] ?></option>
                    <?php endfor; ?>
                </optgroup>
            </select>
        </div>
    </div>
    <button class="btn btn-success form-control mt-3">Notificar</button>
</form>