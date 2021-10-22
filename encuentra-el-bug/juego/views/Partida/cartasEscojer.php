<div class="form-control">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-control" style="max-height: 450px; overflow: auto;">
                <h4 class="text-center">Tus Cartas</h4>
                <hr>
                <div class="row">
                    <?php for ($i=0; $i < 3; $i++): ?>
                        <div class="col-sm-12 mb-2">
                            <button class="form-control">
                                <span class="text-break">AAAAAAAAAAAAAAAAAAAA</span>
                                <img src="./images/poderosa.jpg" alt="" srcset="" width="100%">
                            </button>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="form-control" style="max-height: 450px; overflow: auto;">
                <h4 class="text-center">Cartas A Escojer</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-control" style="max-height: 400px; overflow: auto;">
                            <h4 class="text-center">Programadores</h4>
                            <hr>
                            <div class="row">
                                <?php for ($i=0; $i <= 6; $i++): ?>
                                    <div class="col-sm-12 mb-3">
                                        <button class="form-control">
                                            <strong class="text-break text-center"><?= $_SESSION['Cartas'][$i][1] ?></strong>
                                            <img src="./images/poderosa.jpg" alt="" srcset="" width="100%">
                                        </button>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-control" style="max-height: 400px; overflow: auto;">
                            <h4 class="text-center">Modulos</h4>
                            <hr>
                            <div class="row">
                                <?php for ($i=7; $i <= 12; $i++): ?>
                                    <div class="col-sm-12 mb-2">
                                        <button class="form-control">
                                            <strong class="text-break text-center"><?= $_SESSION['Cartas'][$i][1] ?></strong>
                                            <img src="./images/poderosa.jpg" alt="" srcset="" width="100%">
                                        </button>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-control" style="max-height: 400px; overflow: auto;">
                            <h4 class="text-center">Tipo de Error</h4>
                            <hr>
                            <div class="row">
                                <?php for ($i=13; $i <= 18; $i++): ?>
                                    <div class="col-sm-12 mt-2">
                                        <button class="form-control">
                                            <strong class="text-break text-center"><?= $_SESSION['Cartas'][$i][1] ?></strong>
                                            <img src="./images/poderosa.jpg" alt="" srcset="" width="100%">
                                        </button>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


