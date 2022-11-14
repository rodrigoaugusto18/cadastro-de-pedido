<html>
    <head>
        <title><?php echo $titulo ?></title>
    </head>

    <body>
        <h2><?php echo $titulo ?></h2>
        <strong><?php echo $msg ?></strong>
        <form method="post">
            <input type="hidden" name="cpf" value="<?php echo (isset($pessoas) ? $pessoas->cpf : '') ?>">
            <p>Nome da pessoa:
                 <input type="text" name="nomepessoa" 
                    value="<?php echo (isset($pessoas) ? $pessoas->nomepessoas : '')
                ?>">
            </p>

            <input type="hidden" name="id" value="<?php echo (isset($pessoas) ? $pessoas->cpf : '') ?>">
            <p>Cpf da pessoa:
                 <input type="text" name="cpf" 
                    value="<?php echo (isset($pessoas) ? $pessoas->cpf : '') 
                ?>">
            </p>

            <input type="hidden" name="cpf" value="<?php echo (isset($pessoas) ? $pessoas->cpf : '') ?>">
            <p>Cnpj:
                 <input type="text" name="cnpj" 
                    value="<?php echo (isset($pessoas) ? $pessoas->cnpj : '') 
                ?>">
            </p>

            <input type="hidden" name="cpf" value="<?php echo (isset($pessoas) ? $pessoas->cpf : '') ?>">
            <p>Razão social:
                 <input type="text" name="razaosocial" 
                    value="<?php echo (isset($pessoas) ? $pessoas->razaosocial : '') 
                ?>">
            </p>

            <p><input type="submit" value="<?php echo $acao ?>"></p>
        </form>
    </body>
</html>