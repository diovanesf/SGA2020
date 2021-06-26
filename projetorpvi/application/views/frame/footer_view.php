<footer>
  <div class="col-lg-12 text-center" vertical-align="middle">
    <small>&copy; <?php echo date("Y"); ?> - <a target="_blank" href="http://unipampa.edu.br">UNIPAMPA</a></small>
  </div>
</footer>


<!-- jQuery -->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

<!-- JavaScript Chat-->
<script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>
<script src="<?= base_url() ?>assets/js/fastclick.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.slimscroll.min.js"></script>

<script src="<?= base_url() ?>assets/js/demo.js"></script>



<script>
const tel = document.getElementById('telefone') // Seletor do campo de telefone

tel.addEventListener('keypress', (e) => mascaraTelefone(e.target.value)) // Dispara quando digitado no campo
tel.addEventListener('change', (e) => mascaraTelefone(e.target.value)) // Dispara quando autocompletado o campo

const mascaraTelefone = (valor) => {
    valor = valor.replace(/\D/g, "")
    valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
    valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
    tel.value = valor // Insere o(s) valor(es) no campo
}
</script>




<!-- Include jQuery -->
<!--Verificar se é necessario ja que ja tem o 1.11.1 -->
<!-- Include Date Range Picker -->
<!-- <script src="<?= base_url() ?>assets/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>
 -->
<script type="text/javascript">
  var baseurl = "<?php print base_url(); ?>";
</script>

<script>
  window.onload = hideLoginErrors();

  function hideLoginErrors() {
    $("#login-empty-input").hide();
  }

  function checkEmptyInput() {
    hideLoginErrors();
    $("#login-invalid-input").hide();
    if ($("#email").val() == '' || $("#password").val() == '') {
      $("#login-empty-input").show();
      return false;
    }
  }
</script>

<!-- ToolTip -->
<script type="text/javascript">
  $(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>

<!-- <?php if ($this->uri->segment(1) != 'chat') { ?>
  <script src="<?= base_url('assets') ?>/PACE/pace.min.js"></script>
<?php } ?> -->


<script>
  //código usando jQuery
  $(document).ready(function() {
    $('.load').hide();
  });
</script>