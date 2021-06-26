<body id="body" class="hold-transition skin-gray sidebar-mini" style="padding-bottom: 20px">
  <div class="wrapper">
    <div class="row" style="margin-top: 50px;">
      <div class="col-lg-12">
        <div class="panel-body">
          <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong><?php echo $this->session->flashdata('success'); ?></strong>
            </div>
          <?php elseif ($this->session->flashdata('update')) : ?>
            <div class="alert alert-warning">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong><?php echo $this->session->flashdata('update'); ?></strong>
            </div>
          <?php elseif ($this->session->flashdata('danger')) : ?>
            <div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong><?php echo $this->session->flashdata('danger'); ?></strong>
            </div>
          <?php endif; ?>
          <h1 class="page-header">
            Cadastro de Usuário
          </h1>
          <form method="POST" action="<?php echo base_url() ?>usuarios/insert">

            <div class="col-lg-6 form-group">
              <label for="name">Nome</label>
              <div>
                <input type="text" id="name" class="form-control input-md" name="name" required>
              </div>
            </div>

            <div class="col-lg-6 form-group">
              <label for="email">E-mail</label>
              <div><input class="form-control input-md" id="email" name="email" type="email" required>
              </div>
            </div>


            <div class="col-lg-6 form-group">
              <label for="role">Tipo de Usuário</label>
              <select name="role" id="role" class="form-control">
                <option value="0">Professor</option>
                <option value="1">Aluno</option>
              </select>
            </div>

            <div class="col-lg-12">
              <button type="submit" class="btn btn-lg btn-success pull-right">
                <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
              </button>
          </form>

          <form action="<?php echo base_url('usuarios'); ?>">
            <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- </div> -->

</body>

<?php $this->load->view('frame/footer_view') ?>