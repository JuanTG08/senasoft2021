// let actividad_j = [];
$(document).ready(function(){
    const saveStatus = () => {
        $.ajax({
            type: "POST",
            url: URL_+"peticiones.php",
            data: { saveStatus : 1 },
            success: function (response) {
                if (response) {
                    veryStatus(response);
                }
            }
        });
    }

    const veryStatus = (actividad) => {
        $.ajax({
            type: "POST",
            url: URL_+"peticiones.php",
            data: { compStatus : actividad },
            success: function (response) {
                console.log(response);
            }
        });
    }

    const conexionPlayerDoom = () => {
        $.ajax({
            type: "GET",
            url: URL_+"peticiones.php",
            data: { doomReload : 1 },
            success: function (response) {
                let cpanel = document.querySelector("#cpanel-acti");
                cpanel.innerHTML = response;
            }
        });
    }

    setInterval(() => {
        conexionPlayerDoom();
        //saveStatus();
    }, 5000);

});

/*
fetch("http://localhost/juego/prueba.php")
    .then(response => response.json())
    .then(data => console.log(data))
*/