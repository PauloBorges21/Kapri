

<?php
/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 11/10/2018
 * Time: 10:36
 */

session_start();
require '../../config.php';

if(empty($_SESSION['kaprilogin'])){  /*Se a sessão não existir ou tiver vazia redireciona para login.php*/
    header("Location: login.php");
}

$id = $_SESSION['kaprilogin'];

?>


<?php include('../includes/headerdash.php');
      include ('../../classes/contato.class.php');
      $contato = new Contato();



?>



<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Contatos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Base de Dados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Data de Cadastro</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                     $lista = $contato->getAll();
                                     foreach($lista as $item):
                                    ?>
                                       <tr class="success">
                                        <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nome']; ?></td>
                                        <td><?php echo $item['email']; ?></td>
                                        <td><?php echo $item['data_cadastro']; ?></td>
                                           <td>
                                           <button type="button" class="btn btn-outline btn-primary">Editar </button>
                                            <button type="button" class="btn btn-outline btn-danger">Excluir</button>
                                           </td>
                                    </tr>
                                    <?php endforeach; ?>

<!--                                    <tr class="info">-->
<!--                                        <td>2</td>-->
<!--                                        <td>Jacob</td>-->
<!--                                        <td>Thornton</td>-->
<!--                                        <td>@fat</td>-->
<!--                                    </tr>-->
<!--                                    <tr class="warning">-->
<!--                                        <td>3</td>-->
<!--                                        <td>Larry</td>-->
<!--                                        <td>the Bird</td>-->
<!--                                        <td>@twitter</td>-->
<!--                                    </tr>-->
<!--                                    <tr class="danger">-->
<!--                                        <td>4</td>-->
<!--                                        <td>John</td>-->
<!--                                        <td>Smith</td>-->
<!--                                        <td>@jsmith</td>-->
<!--                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
    </div>
        <!-- /#page-wrapper -->
<!--                <div class="panel-body">-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-6">-->
<!--                            <form role="form">-->
<!--                                <div class="form-group">-->
<!--                                    <label>Text Input</label>-->
<!--                                    <input class="form-control">-->
<!--                                    <p class="help-block">Example block-level help text here.</p>-->
<!--                                </div>-->
