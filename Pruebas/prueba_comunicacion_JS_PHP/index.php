<?php
$var = 1;
$varArray = ["Hola", "adiós"];
$var2 = serialize($varArray);
$var3 = urlencode($var2);
?>
<html>
    <body>
        <a href="get_var.php?var='<?php echo $var3 ?>'">Click aquí</a>
        <input type="submit" value="Enviar variable" id="send"/>
    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script type="text/javascript">
    $('#send').click( function(e) {
        $.ajax(
                {
                    url: 'get_var.php?var=' + <?php echo $var3; ?>,
                    success: function( data ) {
                        alert(data);
                    }
                }
            )
        }
    );
    </script>
</html>