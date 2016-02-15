<?php
require_once 'EntidadeInterface.php';
require_once 'Alunos.php';
require_once 'ServiceDb.php';

try {
   $conexao = new \PDO("mysql:host=localhost;dbname=pdo", "bd_pdo", "pdobdpdo");
} catch (\PDOException $e) {
   die("Não foi possível estabelecer a conexão com o banco de dados: Erro código: " . $e->getCode() . ": " . $e->getMessage());
}

$alunos = new Alunos();

$serviceDb = new ServiceDb($conexao, $alunos);
?>
<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Alunos PDO</title>
   </head>

   <body>
      <p>Lista de Alunos PHP com PDO</p>
      <table width="200" border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td>
               <table width="200" border="1" cellspacing="0" cellpadding="0">
                  <th>Nome</th>
                  <th>Nota</th>

                  <?php
                  foreach ($serviceDb->listar("nome Asc") as $c) {
                     print "<tr><td>";
                     echo $c['nome'];
                     print "</td><td>";
                     echo $c['nota'];
                     print "</td></tr>";
                  }
                  ?>
               </table>
            </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td valign="top" >
               <table width="200" border="1" cellspacing="0" cellpadding="0">
                  <th>Nome</th>
                  <th>Nota</th>
                  <?php
                  foreach ($serviceDb->listar("nota Desc", 3) as $c) {
                     print "<tr><td>";
                     echo $c['nome'];
                     print "</td><td>";
                     echo $c['nota'];
                     print "</td></tr>";
                  }
                  ?>
               </table>
            </td>
         </tr>
      </table>

   </body>
</html>



