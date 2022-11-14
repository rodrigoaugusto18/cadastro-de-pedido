<html>
    <head>
        <title><?php echo $titulo ?></title>
        <style>
            .tabela, .tabela td, .tabela tr {
                border: 1px solid;
                width: 800px;
            }
        </style>
    </head>
<body>
    <div id="header">
        <h1><?php echo $titulo ?></h1>
            <hr>
            <h2><?php echo $titulo . ' do ' . $pessoas . $razaosocial ?></h2>
            <p><?php echo $msg ?></p>
            
            <table class="tabela">
            <tr>
                <td>Código da produto</td>
                <td>Nome do produto</td>
                <td>Valor</td>
                <td>Código da pessoa</td>

            </tr>
            <?php foreach ($produtos as $produto) : ?>
            <tr>
                <td><?php echo $produto->id ?></td>
                <td><?php echo $produto->nomeproduto ?></td>
                <td><?php echo $produto->valor ?></td>
                <td><?php echo $produto->pessoa_id ?></td>
                <td><a href="<?php echo base_url('produtos/editar/' . $produto->id ) ?>">Editar</a></td>
                <td><a href="<?php echo base_url('produtos/excluir/' . $produto->id) ?>">Excluir</a></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>