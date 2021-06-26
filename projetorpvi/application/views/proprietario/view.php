<body id="body" class="hold-transition skin-gray sidebar-mini">
    <div class="wrapper">
        <div class="row" style="margin-top: 50px;">
            <div class="col-lg-12">
                <div class="panel-body">
                    <h1 class="page-header" style="font-size:30px;">
                        Visualizar Cadastro do Proprietário
                    </h1>
                    <?php extract($proprietario); ?>
                    <div class="row" style="margin-top: 50px;">
                        <div class="col-lg-12">

                            <div class=" col-lg-6 form-group">
                                <label style="font-size:15px;" for="">Nome Completo</label>
                                <div>
                                    <input id="" name="nome" class="form-control input-md" value="<?= $nome ?>" disabled>
                                </div>
                            </div>

                            <div class=" col-lg-6 form-group">
                                <label style="font-size:15px;" for="">E-mail</label>
                                <div>
                                    <input id="" type="email" name="email" class="form-control input-md" value="<?= $email ?>" disabled>
                                </div>
                            </div>

                            <div class=" col-lg-6 form-group">
                                <label style="font-size:15px;" for="">Endereço</label>
                                <div>
                                    <input id="" type="endereco" name="email" class="form-control input-md" value="<?= $endereco ?>" disabled>
                                </div>
                            </div>

                            <div class=" col-lg-3 form-group">
                                <label style="font-size:15px;" for="">Telefone</label>
                                <div>
                                    <input id="telefone" type="phone" name="telefone" class="form-control input-md" value="<?= $telefone ?>" disabled>
                                </div>
                            </div>

                            <div class=" col-lg-3 form-group">
                                <label style="font-size:15px;" for="">Cidade</label>
                                <div>
                                    <input id="" name="cidade" class="form-control input-md" value="<?= $cidade ?>" disabled>
                                </div>
                            </div>

                            <div class="col-lg-3 form-group">
                                <label style="font-size:15px;" for="estado">Estado:</label>
                                <select id="combo1" name="estado" class="form-control" disabled>
                                    <option value="0" <?php if ($estado == "0") echo 'selected'; ?>>Acre - AC</option>
                                    <option value="1" <?php if ($estado == "1") echo 'selected'; ?>>Alagoas - AL</option>
                                    <option value="2" <?php if ($estado == "2") echo 'selected'; ?>>Amapá - AP</option>
                                    <option value="3" <?php if ($estado == "3") echo 'selected'; ?>>Amazonas - AM</option>
                                    <option value="4" <?php if ($estado == "4") echo 'selected'; ?>>Bahia - BA</option>
                                    <option value="5" <?php if ($estado == "5") echo 'selected'; ?>>Ceará - CE</option>
                                    <option value="6" <?php if ($estado == "6") echo 'selected'; ?>>Distrito Federal - DF</option>
                                    <option value="7" <?php if ($estado == "7") echo 'selected'; ?>>Espírito Santo - ES</option>
                                    <option value="8" <?php if ($estado == "8") echo 'selected'; ?>>Goiás - GO</option>
                                    <option value="9" <?php if ($estado == "9") echo 'selected'; ?>>Maranhão - MA</option>
                                    <option value="10" <?php if ($estado == "10") echo 'selected'; ?>>Mato Grosso - MT</option>
                                    <option value="11" <?php if ($estado == "11") echo 'selected'; ?>>Mato Grosso do Sul - MS</option>
                                    <option value="12" <?php if ($estado == "12") echo 'selected'; ?>>Minas Gerais - MG</option>
                                    <option value="13" <?php if ($estado == "13") echo 'selected'; ?>>Pará - PA</option>
                                    <option value="14" <?php if ($estado == "14") echo 'selected'; ?>>Paraíba - PB</option>
                                    <option value="15" <?php if ($estado == "15") echo 'selected'; ?>>Paraná - PR</option>
                                    <option value="16" <?php if ($estado == "16") echo 'selected'; ?>>Pernambuco - PE</option>
                                    <option value="17" <?php if ($estado == "17") echo 'selected'; ?>>Piauí - PI</option>
                                    <option value="18" <?php if ($estado == "18") echo 'selected'; ?>>Roraima - RR</option>
                                    <option value="19" <?php if ($estado == "19") echo 'selected'; ?>>Rondônia - RO</option>
                                    <option value="20" <?php if ($estado == "20") echo 'selected'; ?>>Rio de Janeiro - RJ</option>
                                    <option value="21" <?php if ($estado == "21") echo 'selected'; ?>>Rio Grande do Norte - RN</option>
                                    <option value="22" <?php if ($estado == "22") echo 'selected'; ?>>Rio Grande do Sul - RS</option>
                                    <option value="23" <?php if ($estado == "23") echo 'selected'; ?>>Santa Catarina - SC</option>
                                    <option value="24" <?php if ($estado == "24") echo 'selected'; ?>>São Paulo - SP</option>
                                    <option value="25" <?php if ($estado == "25") echo 'selected'; ?>>Sergipe - SE</option>
                                    <option value="26" <?php if ($estado == "26") echo 'selected'; ?>>Tocantins - TO</option>
                                </select>

                            </div>


                            <div class=" col-lg-3 form-group">
                                <label style="font-size:15px;" for="">CEP</label>
                                <div>
                                    <input id="" type="text" name="cep" class="form-control .cep-mask" value="<?= $cep ?>" disabled>
                                </div>
                            </div>



                            <div class="col-lg-6 form-group">
                                <label style="font-size:15px;" for="telefone">Coordenada GPS</label>
                                <div><input id="" type="coordenada" class="form-control input-md" name="telefone" value="<?= $gps ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>


                    <form action="<?php echo base_url('proprietarios'); ?>">
                        <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

<script>
    (function() {
        var combo1 = new Dropkick("#combo1");
        var combo2 = new Dropkick("#combo2");

        combo1.open(); //Abre o combo1
    })();
</script>

<?php $this->load->view('frame/footer_view') ?>