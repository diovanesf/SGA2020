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
					<h1 class="page-header">
						 Usuarios
					</h1>
					<div class="row">
						<div class="col-lg-12">
							<button type="button" class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>usuarios/criar'"> Novo Usuario</button>
						</div>
					</div>
					<br>

			<div class="table-responsive" style="border: 0; border-width: 0;">          
				<table class="table table-bordered table-striped" id="tableNB">
					<thead>
						<tr style="font-size:15px;">
							<th>Nome</th>
							<th>E-mail</th>
							<th>Tipo de usuário</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
									<?php
									foreach ($usuario as $item) {
									?>
										<tr>
											<td><?= $item->name; ?></td>
											<td><?php echo $item->email; ?></td>
											<td><?php echo $item->role == 0 ? " Professor" : "Aluno" ?></td>
											<td>
												<div class="row">
													<div class="col-sm-3">
														<form action="<?php echo base_url() ?>usuarios/editar/<?php echo $item->user_id; ?>" method="post">
															<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
														</form>
													</div>

													<div class="col-sm-3">
														<button type="submit" class="btn btn-danger" onclick="deletar(<?= $item->user_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
													</div>
												</div>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
				</table>
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
					"data": "name"
				},
				{
					"data": "email"
				},
				{
					"data": "role"
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
		alertify.confirm('Tem certeza que deseja deletar este item?').setting({
			'title': "Deletar Item",
			'labels': {
				ok: 'Aceitar',
				cancel: 'Cancelar'
			},
			'reverseButtons': false,
			'onok': function() {

				$.post("<?php echo base_url() ?>usuarios/delete/" + id);

				alertify.success('Item Deletado com Sucesso.');
				location.reload();
			},
			'oncancel': function() {
				alertify.error('Item Não Deletado.');
			}
		}).show();
	}
</script>