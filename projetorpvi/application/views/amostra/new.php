<body id="body" class="hold-transition skin-gray sidebar-mini" style="padding-bottom: 20px">
  <div class="wrapper">
    <div class="row" style="margin-top: 50px;">
      <div class="col-lg-12">
        <div class="panel-body">
          <h1 class="page-header">
            Cadastro de Amostra
          </h1>
          <div class="col-lg-12 form-group">
            <h4>
              Identificação da Amostra
            </h4>
          </div>
          <form method="POST" action="<?php echo base_url() ?>amostras/insert">
            <!--Pega a data atual do cadastro-->
            <!-- <?php date_default_timezone_set('america/sao_paulo'); ?>
            <div class=" col-lg-2 form-group">
              <label for="date">Data:</label>
              <div><input id='' type="date-local" name="data" class="form-control input-md"></div>
            </div> -->

            <div class="col-lg-6 form-group">
              <label for="forma_envio">Proprietario:</label>
              <select name="proprietario_id" class="form-control" >
                <option selected="selected" disabled="disabled" value=""> Selecione </option>
                <?php foreach ($proprietario as $p) { ?>
                  <option value="<?= $p->proprietario_id; ?>"><?= $p->nome; ?></option>
                <?php  } ?>
              </select>
            </div>


            <div class="col-lg-4 form-group">
              <label for="forma_envio">Forma de Envio:</label>
              <select name="forma_envio" id="forma_envio" class="form-control" requerid>
              <option selected="selected" disabled="disabled" value=""> Selecione </option>
                <option value="correios">Correios</option>
                <option value="rodoviaria">Rodoviária</option>
                <option value="transport">Transportadora</option>
                <option value="lab">Entrega no Laboratório</option>
              </select>
            </div>

            <div class="col-lg-2 form-group">
              <label for="">Número de Amostras:</label>
              <div><input class="form-control input-md" id="n_amostras" name="n_amostras"></div>
            </div>

            <div class="col-lg-6 form-group">
              <label for="especie">Espécie:</label>
              <select name="especie" id="especie" class="form-control">
              <option selected="selected" disabled="disabled" value=""> Selecione </option>
                <option value="bovina">Bovina</option>
                <option value="equina">Equina</option>
                <option value="ovina">Ovina</option>
                <option value="suina">Suína</option>
                <option value="canina">Canina</option>
                <option value="felina">Felina</option>
                <option value="selvagem">Selvagens</option>
                <option value="morcego">Morcegos</option>
                <option value="outros">Outra</option>
              </select>
            </div>

            <div class="col-lg-6 form-group">
              <label for="material">Material Recebido:</label>
              <select name="material" id="material" class="form-control" required>
              <option selected="selected" disabled="disabled" value=""> Selecione </option>
                <option value="sangue">Sangue Total</option>
                <option value="soro">Soro</option>
                <option value="crostas">Crostas</option>
                <option value="neoplasias">Neoplasias</option>
                <option value="tecidos">Tecidos</option>
                <option value="swab_nasal">Swab Nasal</option>
                <option value="swab_ocular">Swab Ocular</option>
                <option value="swab_vesic_lesoes">Swab de Vesículas/Lesões</option>
              </select>
            </div>

            <div class="col-lg-6 form-group">
              <label for="acondicionamento">Acondicionamento:</label>
              <select name="acondicionamento" id="acondicionamento" class="form-control" required>
              <option selected="selected" disabled="disabled" value=""> Selecione </option>
                <option value="refrigerada">Refrigerada</option>
                <option value="congelada">Congelada</option>
                <option value="ambiente">Temperatura Ambiente</option>
                <option value="formol">Formol</option>
                <option value="parafina">Parafinizada</option>
              </select>
            </div>

            <div class="col-lg-6 form-group">
              <label for="condicao">Condições do Material:</label>
              <select name="condicao" id="condicao" class="form-control" required>
              <option selected="selected" disabled="disabled" value=""> Selecione </option>
                <option value="bom">Bom</option>
                <option value="hemolisado">Hemolisado</option>
                <option value="coagulado">Coagulado</option>
                <option value="putrefacao">Putrefação</option>
                <option value="swab seco">Swab seco</option>
                <option value="descongelado">Descongelado</option>
                <option value="outro">Outro</option>
              </select>
            </div>

            <div class="col-lg-12 form-group">
              <h4>
                Histórico e Suspeita Clinica
              </h4>
            </div>

            <div class="col-lg-6 form-group">
              <label for="propriedade">Propriedade:</label>
              <select name="propriedade" id="propriedade" class="form-control" requerid>
              <option selected="selected" disabled="disabled" value=""> Selecione </option>
                <option value="rural">Rural</option>
                <option value="haras">Haras</option>
                <option value="granja">Granja</option>

              </select>
            </div>

            <div class="col-lg-6 form-group">
              <label for="">Total de Animais:</label>
              <div><input class="form-control input-md" id="total_animais" name="total_animais" required>
              </div>
            </div>

            <div class="col-lg-6 form-group">
              <label for="">Acometidos:</label>
              <div><input class="form-control input-md" id="acometidos" name="acometidos" required>
              </div>
            </div>

            <div class="col-lg-6 form-group">
              <label for="criacao">
                <hr>Criação:
              </label>
              <input class="form-check-input" type="radio" name="criacao" id="criacao" value="intensiva">
              <label class="form-check-label" for="intensiva">
                Intensiva
              </label>
              <input class="form-check-input" type="radio" name="criacao" id="criacao" value="extensiva">
              <label class="form-check-label" for="extensiva">
                Extensiva
              </label>
              <input class="form-check-input" type="radio" name="criacao" id="criacao" value="semiextensiva">
              <label class="form-check-label" for="semiextensiva">
                Semiextensiva
              </label>
              <input class="form-check-input" type="radio" name="criacao" id="criacao" value="aberta">
              <label class="form-check-label" for="aberta">
                Aberta
              </label>
              <input class="form-check-input" type="radio" name="criacao" id="criacao" value="fechada">
              <label class="form-check-label" for="fechada">
                Fechada
              </label>
              <input class="form-check-input" type="radio" name="canil_gatil" id="canil_gatil" value="canil_gatil">
              <label class="form-check-label" for="canil_gatil">
                Canil/Gatil
              </label>

            </div>

            <div class="col-lg-12 form-group">
              <label for="observacoes">Observações:</label>
              <div>
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="observacoes" name="observacoes" required></textarea>
              </div>
            </div>

            <div class="col-lg-12 form-group">
              <label for="suspeitas">Principais Suspeitas:</label>
              <div>
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="suspeitas" name="suspeitas"></textarea>
              </div>
            </div>

            <div class="col-lg-12 form-group">

              <div class="col-lg-12">
                <button type="submit" class="btn btn-lg btn-success pull-right">
                  <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                </button>
                </form>
                <form action="<?php echo base_url('amostras'); ?>">
                  <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
                </form>
              </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- </div> -->

</body>

<?php $this->load->view('frame/footer_view') ?>