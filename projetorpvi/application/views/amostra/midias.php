<body id="body" class="hold-transition skin-gray sidebar-mini">
  <div class="wrapper">
    <div class="row" style="margin-top: 50px;">
      <div class="col-lg-12">
        <div class="panel-body">
          <h1 class="page-header">
          Midias da Amostra de Protocolo: 
          <?php extract($amostra); echo $amostra_id;?>
          </h1>
          <div class="modal-body">
            <?php $id['amostra_id'] = $amostra_id;
            ?>

            <!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
            <?php $this->load->view('upload/index', $id) ?>

            <!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
            <?php $this->load->view('upload/retrieve', $id) ?>
            <form action="<?php echo base_url('amostras'); ?>">
            <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
          </form>
          </div>

        
        </div>
      </div>
    </div>

</body>

<?php $this->load->view('frame/footer_view') ?>