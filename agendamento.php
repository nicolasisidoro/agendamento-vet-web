<?php
echo file_get_contents('header.html');
?>

<div class="section">
    <div class="top_navbar">
        <div class="hamburger">
            <a href="#">
                <i class="fas fa-bars"></i>
            </a>
        </div>
    </div>

    <div class="titulo">
        <div>
            <h1>Meus Agendamentos</h1>
        </div>
        <div style="left: 10px;">
            <img src="./img/relogio.png" id="imgpos">
        </div>
    </div>

    <div>
        <button type="button" class="btn btn-1" data-toggle="modal" data-target="#myModal">Novo Agendamento</button>
    </div>
    <div class="subtitulo">
        <h2>Consultas Agendadas</h2>
    </div>
    <div class="consultas-agendadas" style="border:2px solid rgb(0, 0, 0);">
        <div style="width: 100%; display: flex;">
            <div style="width: 70%;">
                <h5>+ Dr Rogério Alves Fagundes</h5>
            </div>
            <div style="width: 25%;">
                <h5>Agendado para: 16/11/2021 14:00</h5>
            </div>
            <div href="#" class="btn-2">Editar</div>

        </div>

    </div>

    <div class="subtitulo">
        <h2>Consultas Anteriores</h2>
    </div>
    <div class="consultas-agendadas" style="border:2px solid rgb(0, 0, 0);">
        <div style="width: 100%; display: flex;">
            <div style="width: 70%;">
                <h5>+ Dr Rogério Alves Fagundes</h5>
            </div>
            <div style="width: 25%;">
                <h5>Realizada em: 10/10/2021 14:00</h5>
            </div>
            <div href="#" class="btn-3">Arquivar</div>

        </div>

    </div>


    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Novo Agendamento</h4>
                </div>
                <div class="modal-body" style="height: 450px;">
                    <form class="form-horizontal" action="processa.php" method="POST">
                        <div class="col-sm-4 col-sm-offset-2">
                            <label class="lbField">Nome</label>
                            <input class="form-control" type="text" name="nome" placeholder="Digite seu nome" required>
                        </div>
                        <div class="col-sm-4">
                            <label class="lbField">Telefone</label>
                            <input class="form-control" type="text" name="telefone" placeholder="Digite seu telefone" required>
                        </div>
                        <div class="col-sm-8 col-sm-offset-2"><br>
                            <label class="lbField">Serviços</label>
                            <select name="servicos" class="form-control">
                                <option value="" selected=>Selecione um serviço</option>
                                <option>Veterinário -- Geral</option>
                                <option>Odontologia</option>
                                <option>Endocrinologia</option>
                                <option>Oftalmologia</option>
                                <option>Fisioterapia veterinária</option>
                            </select>
                        </div> <br>
                        <div class="col-sm-8 col-sm-offset-2"><br>
                            <label class="lbField">Data e hora</label>
                            <div class="input-group date data_formato" data-date-format="dd/mm/yyyy HH:ii:ss">
                                <input class="form-control" type="text" name="data" placeholder="Data do serviço">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-offset-1 col-sm-10"><br>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-success">Agendar</button>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-primary btn_carrega_conteudo" href='#' id="pagina">Ver agendamentos</a><br><br>
                            </div>


                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            ?>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/locales/bootstrap-datetimepicker.pt-BR.js"></script>

<script type="text/javascript">
    $('.data_formato').datetimepicker({
        weeKStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        language: "pt-BR",
        startDate: '-0d'
    });

    $(document).ready(function() { // Ao carregar a página faça o conteudo abaixo
        $('.btn_carrega_conteudo').click(function() { // Ao clicar no elemento que contenha a classe .btn_carrega_conteudo faça...

            var carrega_url = this.id; //Carregar url pegando os dados pelo ID
            carrega_url = carrega_url + '_listar.php'; //Carregar a url e o conteudo da página

            $.ajax({ //Carregar a função ajax embutida no jQuery
                url: carrega_url,

                //Variável DATA armazena o conteúdo da requisição
                success: function(data) { //Caso a requisição seja completada com sucesso faça...
                    $('#div_conteudo').html(data); // Incluir o conteúdo dentro da DIV
                },

                beforeSend: function() { //Antes do envio do cabeçalho faça...
                    $('#loader').css({
                        display: "block"
                    }); //carregar a imagem de load
                },

                complete: function() { //Após o envio do cabeçalho faça...
                    $('#loader').css({
                        display: "none"
                    }); //esconder a imagem de load
                }
            });
        });
    });
</script>

<?php
echo file_get_contents('footer.html');
?>