<?php
    function Hexadecimal($limit){
    	$posibilidades="0123456789abcdef";
    	$number='';
    	for ($i=0; $i <$limit ; $i++) { 
		    $number .= $posibilidades[rand(0,strlen($posibilidades)-1)];
    	}
    	return $number;

    }
    $hexa = Hexadecimal(5);
?>
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
                <input type="text" aria-label="First name" class="form-control" name="room" value="<?=$hexa?>" maxlength="5" minlength="5" required readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <input type="submit" value="Crear" class="btn btn-primary mt-2 form-control" name="create-room">
        </div>
    </div>
</form>
