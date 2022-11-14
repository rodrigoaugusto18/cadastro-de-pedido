<html>
    <head>
        <title>Status</title>
    </head>
    <body>
        <form method="post">
            <p>Nome do status:
                 <input type="text" name="nomestatus" 
                    value="<?php echo (isset($status) ? $status->nomestatus : '')
                ?>">
            </p>
            <p><input type="submit" value="<?php echo $acao ?>"></p>
            <p><?php echo $comboStatus ?></p>
        </form>
    </body>
</html>