// let actividad_j = [];
$(document).ready(function(){
    const saveStatus = () => {
        $.ajax({
            type: "POST",
            url: "http://localhost/juego/peticiones.php",
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
            url: "http://localhost/juego/peticiones.php",
            data: { compStatus : actividad },
            success: function (response) {
                console.log(response);
            }
        });
    }

    setInterval(() => {
        saveStatus();
    }, 5000);

});

/*
fetch("http://localhost/juego/prueba.php")
    .then(response => response.json())
    .then(data => console.log(data))
*/