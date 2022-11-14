<html>
    <head>
        <title><?php echo $titulo ?></title>
    </head>

    <body>
        <h2><?php echo $titulo ?></h2>
        <strong><?php echo $msg ?></strong>
        <form method="post">
            <input type="hidden" name="cnpj" value="<?php echo (isset($pessoas) ? $pessoas->cnpj : '') ?>">
            <p>Razão social:
                 <input type="text" name="razaosocial" 
                    value="<?php echo (isset($pessoas) ? $pessoas->razaosocial : '')
                ?>">
            </p>

            <input type="hidden" name="cnpj" value="<?php echo (isset($pessoas) ? $pessoas->cnpj : '') ?>">
            <p>Cnpj:
                 <input type="text" name="cnpj" 
                    value="<?php echo (isset($pessoas) ? $pessoas->cnpj : '') 
                ?>">
            </p>

            <p><input type="submit" value="<?php echo $acao ?>"></p>

            <p><button type="submit"><a href="<?php echo base_url('juridica') ?>">Visualizar dados</a></button></p>

            <p><button type="submit"><a href="<?php echo base_url('produtos/inserir') ?>">Escolher produtos</a></button></p>
        </form>
    </body>
</html>