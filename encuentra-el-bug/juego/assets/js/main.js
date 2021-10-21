// let actividad_j = [];
$(document).ready(function(){
    if (FUNCIONALIDAD == "load-play") {
        const actualizarStateJugadores = () => {
            $.ajax({
                type: "POST",
                url: "peticiones.php",
                data: { actualizarPlayers : 1 },
                success: function (response) {
                    actualizarActividadJugador();
                }
            });
        }

        // Actualizamos el DOM para los jugadores
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
                }
            });
        }
        actualizarStateJugadores();
        actualizarDOMJugadores();

        setInterval(() => {
            actualizarStateJugadores();
            actualizarDOMJugadores();
        }, 500);
    }

});

/*
fetch("http://localhost/juego/prueba.php")
    .then(response => response.json())
    .then(data => console.log(data))
*/