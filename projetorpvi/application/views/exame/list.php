<body class="hold-transition skin-gray sidebar-mini" style="padding-bottom: 20px">
	<div class="col-lg-12">
		<div class="panel-body">
			<h1 class="page-header"> 
			Exames
			</h1>
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



			<div class="row">
				<div class="col-lg-12">
					<button type="button" class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>exame/criar/<?php echo $amostra_id ?>'"> Cadastrar Exame</button>
				</div>
			</div>

			<br />

			<div class="table-responsive" style="border: 0; border-width: 0;">
				<table class="table table-bordered table-striped" id="tableNB">
					<thead>
						<tr>
							<th>Técnica</th>
							<th>Suspeita</th>
							<th>Resultado</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($exame as $item) { ?>
							<tr>
								<td><?= getTecnicaById($item->tecnica_tratamento_id); ?></td>
								<td><?= getTratamentoById($item->tecnica_tratamento_id) ?></td>
								<td><?php if ($item->resultado == "0") {
										echo  "Sem resultado";
									} else {
										echo $item->resultado;
									} ?>
								</td>
								<td>
									<?php if ($_SESSION['role'] != 1) {	?>
										<div class="col-sm-2">
											<form action="<?php echo base_url() ?>exame/editar/<?php echo $item->exame_id; ?>" method="post">
												<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
											</form>
										</div>

										<div class="col-sm-2">
											<button type="submit" class="btn btn-danger" onclick="deletar(<?= $item->exame_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
										</div>
									<?php }	?>

								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<form action="<?php echo base_url('amostras'); ?>">
				<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
			</form>
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
					"data": "tecnica"
				},
				{
					"data": "suspeita"
				},
				{
					"data": "resultados"
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

				$.post("<?php echo base_url() ?>exame/delete/" + id);

				alertify.success('Item Deletado com Sucesso.');
				location.reload();
			},
			'oncancel': function() {
				alertify.error('Item Não Deletado.');
			}
		}).show();
	}
</script>