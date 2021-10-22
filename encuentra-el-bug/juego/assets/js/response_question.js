$(document).ready(function () {

    let info_pregunta = false;

    const statusTurnos = () => {
        $.ajax({
            type: "POST",
            url: "ingame.php",
            data: { statusTurno : 1 },
            success: function (response) {
                let id_jugador = JSON.parse(response).id_turno_jugador;
                veifyIDS(id_jugador);
            }
        });
    }

    const veifyIDS = (id_jugad) => {
        $.ajax({
            type: "POST",
            url: "ingame.php",
            data: { verifyIDs : id_jugad },
            success: function (response) {
                if (response) {
                    info_pregunta = JSON.parse(response);
                    RenderPregunta(info_pregunta);
                }
            }
        });
    }

    const RenderPregunta = () => {
        $.ajax({
            type: "POST",
            url: "ingame.php",
            data: { renderQuestion : info_pregunta },
            success: function (response) {
                if (document.getElementById('pregunta-quest')) {
                    document.getElementById('pregunta-quest').innerHTML = response;
                }
            }
        });
    }

    if (FUNCIONALIDAD == "ingame" && !info_pregunta) {
        setInterval(() => {
            statusTurnos();
        }, 500);
    }
});