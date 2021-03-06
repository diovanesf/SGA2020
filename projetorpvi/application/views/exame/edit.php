<body class="hold-transition skin-gray sidebar-mini">
  <script>
    (function() {
      if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
        var body = document.getElementsByTagName('body')[0];
        body.className = body.className + ' sidebar-collapse';
      }
    })();
  </script>
  <div class="wrapper">
    <div class="panel-body">
      <h1 class="page-header">
        Editar Exame
      </h1>
      <div class="row" style="margin-top: 50px;">
        <div class="col-lg-12">

          <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong><?php echo $this->session->flashdata('success'); ?></strong>
            </div>
          <?php elseif ($this->session->flashdata('error')) : ?>
            <div class="alert alert-warning">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong><?php echo $this->session->flashdata('error');

                      ?></strong>
            </div>
          <?php endif;
          extract($exame);
          ?>

          <form method="POST" action="<?php echo base_url() ?>exame/update/<?php echo $exame_id ?>">

            <input type="hidden" name="amostra_id" value="<?= $amostra_id ?>">
            <input type="hidden" id="tt_id" value="<?= $tecnica_tratamento_id ?>">

            <div class="col-lg-6 form-group">
              <label for="tecnica">Tecnica</label>
              <select name="Distrito" size="1" class="form-control" id="tecnica" tabindex="1">
                <?php foreach ($tecnica as $t) { ?>
                  <option value="<?= $t->tecnica_id; ?>" <?php if (getIdTecnica($tecnica_tratamento_id) == $t->tecnica_id) echo 'selected'; ?>><?= $t->nome; ?></option>
                <?php  } ?>
              </select>
            </div>


            <div class="col-lg-6 form-group">
              <label for="tratamento">Suspeita</label>
              <select name="Concelho" class="form-control" size="1" id="COMBOCID">
                <?php foreach ($tecnica_tratamento as $tt) { ?>

                  <option data-distrito="<?= $tt->tecnica_id; ?>" value="<?= $tt->tecnica_tratamento_id; ?>" <?= $tecnica_tratamento_id == $tt->tecnica_tratamento_id ? 'selected=true' : 'selected=false'; ?>><?= getTratamentoById($tt->tecnica_tratamento_id); ?></option>
                <?php  } ?>

                <!-- <option data-distrito="Aveiro" value="Agueda">Agueda</option>
               								 <option data-distrito="Beja" value="Aljustrel">Aljustrel</option>
                							<option data-distrito="Braga" value="Amares">Amares</option> -->

              </select>
            </div>

            <div class="col-lg-12 form-group">
              <label for="resultado">Resultado</label>
              <div>
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="resultado" name="resultado"><?= $resultado ?></textarea>
              </div>
            </div>


            <div class="col-lg-12">
              <button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
              </button>
          </form>
          <form action="<?php echo base_url() ?>exames/<?php echo $amostra_id; ?>" method="post">
            <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
          </form>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</body>

<script src="//code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>

<script>
  var concelhos = $('select[name="Concelho"] option');

  var novoSelect = concelhos.filter(function() {
    return $(this).data('distrito') == document.getElementById("tecnica").value;
  });
  $('select[name="Concelho"]').html(novoSelect);

  $('select[name="Concelho"]').val(document.getElementById("tt_id").value);

  $('select[name="Distrito"]').on('change', function() {
    var Distrito = this.value;

    var novoSelect = concelhos.filter(function() {
      return $(this).data('distrito') == Distrito;
    });
    $('select[name="Concelho"]').html(novoSelect);
  });
</script>
<?php $this->load->view('frame/footer_view') ?>