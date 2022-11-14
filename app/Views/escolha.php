<html>
    <head>
        <title>Física ou Jurídica?</title>
    </head>
    <body>
        <h1><?php echo $titulo ?></h1>
        <div>
            <p>
                <button type="submit"><a href="<?php echo base_url('juridica/inserir') ?>">Jurídica</a></button>
            </p>
        </div>

        <div>
            <p>
                <button type="submit"><a href="<?php echo base_url('fisica/inserir') ?>">Física</a></button>
            </p>
        </div>
    </body>

</html>