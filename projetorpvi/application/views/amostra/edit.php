<body id="body" class="hold-transition skin-gray sidebar-mini" style="padding-bottom: 20px">
  <div class="wrapper">
    <div class="row" style="margin-top: 50px;">
      <div class="col-lg-12">
        <div class="panel-body">
          <h1 class="page-header">
            Edição de Amostra
          </h1>
          <div class="col-lg-12 form-group">
            <h4>
              Identificação da Amostra
            </h4>
          </div>

          <?php extract($amostra); ?>
          <?php extract($proprietario); ?>
          <form method="POST" action="<?php echo base_url() ?>amostras/update/<?= $amostra_id ?>">

            <div class=" col-lg-2 form-group">
              <label for="date">Data:</label>
              <div><input class="form-control input-md" type="text" class="date" id="" name="data" value="<?= $data ?>" disabled required></div>
            </div>

            <div class="col-lg-6 form-group">
              <label for="forma_envio">Proprietario:</label>
              <select name="proprietario_id" class="form-control" required>
                <option selected="selected" disabled="disabled" value=""> Selecione </option>
                <?php foreach ($proprietario as $p) { ?>
                  <option value="<?= $p->proprietario_id; ?>" <?php if ($proprietario_id == $p->proprietario_id) echo 'selected'; ?>><?= $p->nome; ?></option>
                <?php  } ?>
              </select>
            </div>

            <div class="col-lg-4 form-group">
              <label for="forma_envio">Forma de Envio:</label>
              <select name="forma_envio" id="forma_envio" class="form-control" requerid>
                <option value="correios" <?php if ($forma_envio == "correios") echo 'selected'; ?>>Correios</option>
                <option value="rodoviaria" <?php if ($forma_envio == "rodoviaria") echo 'selected'; ?>>Rodoviária</option>
                <option value="transport" <?php if ($forma_envio == "transport") echo 'selected'; ?>>Transportadora</option>
                <option value="lab" <?php if ($forma_envio == "lab") echo 'selected'; ?>>Entrega no Laboratório</option>
              </select>
            </div>

            <div class="col-lg-2 form-group">
              <label for="">Número de Amostras:</label>
              <input class="form-control input-md" id="n_amostras" name="n_amostras" value="<?= $n_amostras ?>">
            </div>

            <div class="col-lg-6 form-group">
              <label for="especie">Espécie:</label>
              <select name="especie" id="especie" class="form-control">
                <option value="bovina" <?php if ($especie == "bovina") echo 'selected'; ?>>Bovina</option>
                <option value="equina" <?php if ($especie == "equina") echo 'selected'; ?>>Equina</option>
                <option value="ovina" <?php if ($especie == "ovina") echo 'selected'; ?>>Ovina</option>
                <option value="suina" <?php if ($especie == "suina") echo 'selected'; ?>>Suína</option>
                <option value="canina" <?php if ($especie == "canina") echo 'selected'; ?>>Canina</option>
                <option value="felina" <?php if ($especie == "felina") echo 'selected'; ?>>Felina</option>
                <option value="selvagem" <?php if ($especie == "selvagen") echo 'selected'; ?>>Selvagem</option>
                <option value="morcego" <?php if ($especie == "morcego") echo 'selected'; ?>>Morcego</option>
                <option value="outros" <?php if ($especie == "outros") echo 'selected'; ?>>Outros</option>
              </select>
            </div>

            <div class="col-lg-4 form-group">
              <label for="material">Material Recebido:</label>
              <select name="material" id="material" class="form-control" required>
                <option value="sangue" <?php if ($material == "sangue") echo 'selected'; ?>>Sangue Total</option>
                <option value="soro" <?php if ($material == "soro") echo 'selected'; ?>>Soro</option>
                <option value="crostas" <?php if ($material == "crostas") echo 'selected'; ?>>Crostas</option>
                <option value="neoplasias" <?php if ($material == "neoplasias") echo 'selected'; ?>>Neoplasias</option>
                <option value="tecidos" <?php if ($material == "tecidos") echo 'selected'; ?>>Tecidos</option>
                <option value="swab_nasal" <?php if ($material == "swab_nasal") echo 'selected'; ?>>Swab Nasal</option>
                <option value="swab_ocular" <?php if ($material == "swab_ocular") echo 'selected'; ?>>Swab Ocular</option>
                <option value="swab_vesic_lesoes" <?php if ($material == "swab_vesic_lesoes") echo 'selected'; ?>>Swab de Vesículas/Lesões</option>
              </select>
            </div>

            <div class="col-lg-6 form-group">
              <label for="acondicionamento">Acondicionamento:</label>
              <select name="acondicionamento" id="acondicionamento" class="form-control" required>
                <option value="refrigerada" <?php if ($acondicionamento == "refrigerada") echo 'selected'; ?>>Refrigerada</option>
                <option value="congelada" <?php if ($acondicionamento == "congelada") echo 'selected'; ?>>Congelada</option>
                <option value="ambiente" <?php if ($acondicionamento == "ambiente") echo 'selected'; ?>>Temperatura Ambiente</option>
                <option value="formol" <?php if ($acondicionamento == "formol") echo 'selected'; ?>>Formol</option>
                <option value="parafina" <?php if ($acondicionamento == "parafina") echo 'selected'; ?>>Parafinizada</option>
              </select>
            </div>

            <div class="col-lg-6 form-group">
              <label for="condicao">Condições do Material:</label>
              <select name="condicao" id="condicao" class="form-control" required>
                <option value="bom" <?php if ($condicao == "bom") echo 'selected'; ?>>Bom</option>
                <option value="hemolisado" <?php if ($condicao == "hemolisado") echo 'selected'; ?>>Hemolisado</option>
                <option value="coagulado" <?php if ($condicao == "coagulado") echo 'selected'; ?>>Coagulado</option>
                <option value="putrefacao" <?php if ($condicao == "putrefacao") echo 'selected'; ?>>Putrefação</option>
                <option value="swab seco" <?php if ($condicao == "swab seco") echo 'selected'; ?>>Swab seco</option>
                <option value="descongelado" <?php if ($condicao == "descongelado") echo 'selected'; ?>>Descongelado</option>
                <option value="outro" <?php if ($condicao == "outro") echo 'selected'; ?>>Outro</option>
              </select>
            </div>

            <div class="col-lg-6 form-group">
              <label for="status">
                <hr>Status:
              </label>
              <input class="form-check-input" type="radio" name="status" id="status" value="aceita" <?php if ($status == "aceita") echo 'checked'; ?>>
              <label class="form-check-label" for="status">
                Aceita
              </label>

              <input class="form-check-input" type="radio" name="status" id="status" value="recusada" <?php if ($status == "recusada") echo 'checked'; ?>>
              <label class="form-check-label" for="status">
                Recusada
              </label>

              <input class="form-check-input" type="radio" name="status" id="status" value="aguardando" <?php if ($status == "aguardando") echo 'checked'; ?>>
              <label class="form-check-label" for="status">
                Em processamento
              </label>

              <input class="form-check-input" type="radio" name="status" id="status" value="finalizada" <?php if ($status == "finalizada") echo 'checked'; ?>>
              <label class="form-check-label" for="status">
                Finalizada
              </label>

            </div>


            <div class="col-lg-12 form-group">
              <h4>
                Histórico e Suspeita Clinica
              </h4>
            </div>
            <div class="col-lg-6 form-group">
              <label for="propriedade">Propriedade:</label>
              <select name="propriedade" id="propriedade" class="form-control" requerid>
                <option value="rural" <?php if ($propriedade == "rural") echo 'selected'; ?>>Rural</option>
                <option value="haras" <?php if ($propriedade == "haras") echo 'selected'; ?>>Haras</option>
                <option value="granja" <?php if ($propriedade == "granja") echo 'selected'; ?>>Granja</option>
              </select>
            </div>

            <div class="col-lg-6 form-group">
              <label for="">Total de Animais:</label>
              <input class="form-control input-md" id="total_animais" name="total_animais" value="<?= $total_animais ?>" required>
            </div>

            <div class="col-lg-6 form-group">
              <label for="">Acometidos:</label>
              <input class="form-control input-md" id="acometidos" name="acometidos" value="<?= $acometidos ?>" required>
            </div>

            <div class="col-lg-6 form-group">
              <label for="criacao">
                <hr>Criação:
              </label>
              <input class="form-check-input" type="radio" name="criacao" id="criacao" value="intensiva" <?php if ($criacao == "intensiva") echo 'checked'; ?>>
              <label class="form-check-label" for="intensiva">
                Intensiva
              </label>
              <input class="form-check-input" type="radio" name="criacao" id="criacao" value="extensiva" <?php if ($criacao == "extensiva") echo 'checked'; ?>>
              <label class="form-check-label" for="extensiva">
                Extensiva
              </label>
              <input class="form-check-input" type="radio" name="criacao" id="criacao" value="semiextensiva" <?php if ($criacao == "semiextensiva") echo 'checked'; ?>>
              <label class="form-check-label" for="semiextensiva">
                Semiextensiva
              </label>
              <input class="form-check-input" type="radio" name="criacao" id="criacao" value="aberta" <?php if ($criacao == "aberta") echo 'checked'; ?>>
              <label class="form-check-label" for="aberta">
                Aberta
              </label>
              <input class="form-check-input" type="radio" name="criacao" id="criacao" value="fechada" <?php if ($criacao == "fechada") echo 'checked'; ?>>
              <label class="form-check-label" for="fechada">
                Fechada
              </label>
              <input class="form-check-input" type="radio" name="canil_gatil" id="canil_gatil" value="canil_gatil" <?php if ($criacao == "canil_gatil") echo 'checked'; ?>>
              <label class="form-check-label" for="canil_gatil">
                Canil/Gatil
              </label>
            </div>

            <div class="col-lg-12 form-group">
              <label for="observacoes">Observações:</label>
              <div>
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="observacoes" name="observacoes" required><?= $observacoes ?></textarea>
              </div>
            </div>

            <div class="col-lg-12 form-group">
              <label for="suspeitas">Principais Suspeitas:</label>
              <div>
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="suspeitas" name="suspeitas"><?= $suspeitas ?></textarea>
              </div>
            </div>

            <div class="col-lg-12">
              <button type="submit" class="btn btn-lg btn-success pull-right">
                <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
              </button>
          </form>
          <form action="<?php echo base_url('amostras'); ?>">
            <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
          </form>
        </div>
        </form>

      </div>
    </div>
  </div>


  <!-- </div> -->
  <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="ModalForgot" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalForgot">MIDIAS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php $id['amostra_id'] = $amostra_id;
          ?>

          <!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
          <?php $this->load->view('upload/index', $id) ?>

          <!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
          <?php $this->load->view('upload/retrieve', $id) ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" type="submit" data-dismiss="modal">Fechar</button>
        </div>
        </form>
      </div>
    </div>
  </div>

</body>

<?php $this->load->view('frame/footer_view') ?>