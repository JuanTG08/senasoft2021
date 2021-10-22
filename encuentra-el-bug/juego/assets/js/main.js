// let actividad_j = [];
$(document).ready(function(){
    // Trae la informacion si se añade un nuevo Jugador
    const actualizarStateJugadores = () => {
        $.ajax({
            type: "POST",
            url: "peticiones.php",
            data: { actualizarPlayers : 1 },
            success: function (response) {
                actualizarDOMJugadores(response);
            }
        });
    }

    // Actualizamos el DOM para los nuevos jugadores
    const actualizarDOMJugadores = () => {
        $.ajax({
            type: "POST",
            url: "peticiones.php",
            data: { actualizarDOMJugadores : 1 },
            success: function (response) {
                let cpanel = document.querySelector("#cpanel-acti");
                cpanel.innerHTML = response;
            }
        });
    }

    // Actualizamos el tiempo de la Actividad en cada jugador
    const actualizarActividadJugador = () => {
        $.ajax({
            type: "POST",
            url: "peticiones.php",
            data: { insertActivityPlayer : 1 },
            success: function (response) {
                cambiarEstadoPlayer(response);
            }
        });
    }

    const cambiarEstadoPlayer = (timpos) => {
        $.ajax({
            type: "POST",
            url: "peticiones.php",
            data: { verifyActifityOnline : timpos },
            success: function (response) {
                //console.log(response);
            }
        });
    }
    
    // Obtenemos lo que hay en la sala
    const getPlayersRoom = () => {
        $.ajax({
            type: "POST",
            url: "peticiones.php",
            data: { getRoom : 1 },
            success: function (response) {
                // console.log(response);
                veryStart(JSON.parse(response));
            }
        });
    }
    // Verificamos los jugadores
    const veryStart = (players) => {
        if (players.player_1 != null) {
            $.ajax({
                type: "POST",
                url: "peticiones.php",
                data: { Partida : 1 },
                success: function (response) {
                    let cpanel = document.querySelector("#cpanel-acti");
                    cpanel.innerHTML = "";
                }
            });
            location.href = '?Start';
        }
    }

    if (FUNCIONALIDAD == "load-play") {
        setInterval(() => {
            actualizarStateJugadores();
            actualizarActividadJugador();

            getPlayersRoom();
        }, 500);
    }    
});


/*
fetch("http://localhost/juego/prueba.php")
    .then(response => response.json())
    .then(data => console.log(data))
*/