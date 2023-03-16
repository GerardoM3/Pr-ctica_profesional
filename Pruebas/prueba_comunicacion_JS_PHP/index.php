<?php
$var = 1;
?>
<html>
    <body>
        <input type="search" value="Enviar variable" id="send"/>
    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script type="text/javascript">
    $('#send').keyup( function(e) {
        $.ajax(
                {
                    url: 'get_var.php?var=' + e.target.value,
                    success: function( data ) {
                        alert(data);
                    }
                }
            )
        }
    );
    </script>
</html>