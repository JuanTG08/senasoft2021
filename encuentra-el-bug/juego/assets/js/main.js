// let actividad_j = [];
$(document).ready(function(){
    console.log(FUNCIONALIDAD);
    if (FUNCIONALIDAD == "load-play") {
        const actualizarStateJugadores = () => {
            $.ajax({
                type: "POST",
                url: "peticiones.php",
                data: { actualizarPlayers : 1 },
                success: function (response) {
                    console.log(response);
                }
            });
        }

        const actualizarDOMJugadores = () => {
            $.ajax({
                type: "POST",
                url: "peticiones.php",
                data: { actualizarDOMJugadores : 1 },
                success: function (response) {
                    //console.log(response);
                }
            });
        }

        setInterval(() => {
            actualizarStateJugadores();
        }, 500);
    }

});

/*
fetch("http://localhost/juego/prueba.php")
    .then(response => response.json())
    .then(data => console.log(data))
*/