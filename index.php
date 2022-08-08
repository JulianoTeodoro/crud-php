<?php

include "config.php";
require 'dao/UsuarioDAO.php';

$usuarioDao = new UsuarioDaoMySql($pdo);
$lista = $usuarioDao->findAll();

?>

<a href="adicionar.php">Adicionar usuario</a>

<table border="1" width="100%">

    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    
    <?php foreach($lista as $usuario): ?>
        <tr>
            <td>  <?= $usuario->getId() ?> </td>
            <td>  <?= $usuario->getName() ?> </td>
            <td>  <?= $usuario->getEmail() ?>  </td>
            <td>  <a href="editar.php?id=<?=$usuario->getId()?>">Editar</a> | 
            <a href="remover.php?id=<?=$usuario->getId()?>">Remover</a> 
            </td>

        </tr>
    <?php endforeach ?>

</table>

<?php

$senha = '123456';
$hash = password_hash($senha, PASSWORD_BCRYPT);

$hash2 = '$2y$10$0xh55bXQ9FAoO7gDdQi35uk63QZWGY1v1TwiOuWdK0YuJa9vDiflS';

echo $hash.'</br>';

if(password_verify($senha, $hash2)){
    echo 'Senha correta</br>';
} else {
    echo 'Senha incorreta';
}

$date = new DateTime();
$date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
$date->add(DateInterval::createFromDateString('2 months')); // adicionar data;

$date1 = new DateTime('2020-01-01');
$date2 = new DateTime('2020-02-15');

$diff = $date1->diff($date2);

echo $diff->format('%y anos, %m meses e %a dias, %h horas e %i minutos, %s segundos').'</br>';

echo $date->format('d/m/Y H:i:s').'</br>';

for ($i = 0; $i < 12; $i++) {
    if ($i % 3 == 0) continue;
    if ($i % 5 == 0) break;
    if ($i % 7 == 0) continue;

    echo $i.'</br>';
}
