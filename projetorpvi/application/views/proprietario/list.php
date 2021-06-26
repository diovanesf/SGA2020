<body class="hold-transition skin-gray sidebar-mini" style="padding-bottom: 20px">
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
			
			<h1 class="page-header"> Proprietários </h1>

			<div class="row">
				<div class="col-lg-12">
					<button type="button" class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>proprietario/criar/'"> Cadastrar Proprietário</button>
				</div>
			</div>

			<br/>

			<div class="table-responsive" style="border: 0; border-width: 0;">          
				<table class="table table-bordered table-striped" id="tableNB">
					<thead>
						<tr>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Telefone</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($proprietario as $item) { ?>
							<tr>
								<td><?= $item->nome; ?></td>
								<td><?php echo $item->email; ?></td>
								<td><?php echo $item->telefone; ?></td>
								<td>
									<div class="col-sm-2">
										<form action="<?php echo base_url() ?>proprietario/view/<?php echo $item->proprietario_id; ?>" method="post">
											<button type="submit" class="btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i><span class="hidden-xs"></span></button>
										</form>
									</div>

									<div class="col-sm-2">
										<form action="<?php echo base_url() ?>proprietario/editar/<?php echo $item->proprietario_id; ?>" method="post">
											<button type="submit" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs"></span></button>
										</form>
									</div>

									<div class="col-sm-2">
										<button type="submit" class="btn btn-danger" onclick="deletar(<?= $item->proprietario_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
									</div>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	<!-- Modal Dados do Proprietário -->
	<div class="modal fade" id="profileProprietario" tabindex="-1" role="dialog" aria-labelledby="ModaprofileProprietario" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form role="form" method="post" onsubmit="return checkEmptyInput();" action="<?= base_url() ?>register/saveUpdateUser/">
					<div class="modal-header text-center">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h2 style="font-size:30px;" class="modal-title w-100 font-weight-bold">Dados do Proprietário</h2>
					</div>
					<?php $this->db->where('user_id', $_SESSION['user_id']);
					$datauser = $this->db->get('user')->result();
					foreach ($datauser as $data) { ?>
						<div  class="modal-body mx-3">
							<div class="form-group">
								<input id="user_id" name="user_id" type="hidden" placeholder="user_id" class="form-control input-md" value="<?= $data->user_id; ?>" required="true" readonly>
							</div>
							<div class="md-form mb-5">
								<label  style="font-size:15px;" data-error="wrong" data-success="right" for="form3">Nome Completo</label>
								<input class="form-control" placeholder="Full name" name="name" type="name" value="<?= $data->name; ?>" required="true" readonly>
							</div>
							<br>
							<div  class="md-form mb-4">
								<label style="font-size:15px;" data-error="wrong" data-success="right" for="form2">E-mail</label>
								<input class="form-control" placeholder="E-mail" name="email" type="email" value="<?= $data->email; ?>" required="true" readonly>
							</div>
							<br>
							<div  class="md-form mb-4">
								<label style="font-size:15px;" data-error="wrong" data-success="right" for="form2">Endereço</label>
								<input class="form-control" placeholder="role" name="role" value="<?php echo $data->role == 2 ? " Professor" : "Aluno" ?>" required="true" readonly>
							</div>
							<br>
							<div class="md-form mb-4">
								<label  style="font-size:15px;" data-error="wrong" data-success="right" for="form2">Telefone</label>
								<input class="form-control" placeholder="role" name="role" value="<?php echo $data->role == 2 ? " Professor" : "Aluno" ?>" required="true" readonly>
							</div>
							<br>
							<div  class="md-form mb-4">
								<label style="font-size:15px;" data-error="wrong" data-success="right" for="form2">Cidade</label>
								<input class="form-control" placeholder="role" name="role" value="<?php echo $data->role == 2 ? " Professor" : "Aluno" ?>" required="true" readonly>
							</div>
							<br>
							<div class="md-form mb-4">
								<label  style="font-size:15px;" data-error="wrong" data-success="right" for="form2">Estado</label>
								<input class="form-control" placeholder="role" name="role" value="<?php echo $data->role == 2 ? " Professor" : "Aluno" ?>" required="true" readonly>
							</div>
							<br>
							<div  class="md-form mb-4">
								<label style="font-size:15px;" data-error="wrong" data-success="right" for="form2">CEP</label>
								<input class="form-control" placeholder="role" name="role" value="<?php echo $data->role == 2 ? " Professor" : "Aluno" ?>" required="true" readonly>
							</div>
							<br>
							<div  class="md-form mb-4">
								<label style="font-size:15px;" data-error="wrong" data-success="right" for="form2">Coordenada GPS</label>
								<input class="form-control" placeholder="role" name="role" value="<?php echo $data->role == 2 ? " Professor" : "Aluno" ?>" required="true" readonly>
							</div>
							<br>
							<div class="md-form mb-4">
								<label style="font-size:15px;"  data-error="wrong" data-success="right" for="form2">Data de Criação da Conta: <?php echo date("d\/m\/Y\ ", strtotime($data->created_at)); ?></label>
							</div> <?php } ?>
						</div>
				</form>
			</div>
		</div>
	</div>

</body>



<?php $this->load->view('frame/footer_view') ?>


<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />
<link rel="stylesheet" href="assets/css/dataTables.bootstrap.css" />
<link rel="stylesheet" href="assets/css/dataTables.responsive.css" />

<script type="text/javascript">
	'use strict'
	let table;

	$(document).ready(function() {
		table = $('#tableNB').DataTable({
			"columns": [{
					"data": "data"
				},
				{
					"data": "nome"
				},
				{
					"data": "descricao"
				},
				{
					"data": "btn-actions",
					"orderable": false
				}
			],
			"order": [
				[1, 'attr']
			]
		});
	});
</script>

<script type="text/javascript">
	function deletar(id) {
		alertify.confirm('Tem certeza que deseja deletar este proprietário?').setting({
			'title': "Deletar Item",
			'labels': {
				ok: 'Aceitar',
				cancel: 'Cancelar'
			},
			'reverseButtons': false,
			'onok': function() {

				$.post("<?php echo base_url() ?>proprietario/delete/" + id);

				alertify.success('Proprietário deletado com Sucesso.');
				location.reload();
			},
			'oncancel': function() {
				alertify.error('Proprietário Não Deletado.');
			}
		}).show();
	}
</script>
