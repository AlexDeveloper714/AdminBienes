        function formCliente() {
        $('#activo').hide();
                $('#back').hide();
                $('#next').click(
                function () {
                $('#activo').show();
                        $('#back').show();
                        $('#cliente').hide();
                        $('#next').hide();
                }
        );
                $('#back').click(
                function () {
                $('#cliente').show();
                        $('#next').show();
                        $('#activo').hide();
                        $('#back').hide();
                }
        );
        }

function cambiarArchivoCss() {
$('#Estilo2').hide();
        $('#Estilo1').click(
        function () {
        document.getElementById("css").href = "css/Form2.css";
                $('#Estilo2').show();
                $('#Estilo1').hide();
        }
);
        $('#Estilo2').click(
        function () {
        document.getElementById("css").href = "css/metisMenu_min.css";
                $('#Estilo1').show();
                $('#Estilo2').hide();
        }
);
        }