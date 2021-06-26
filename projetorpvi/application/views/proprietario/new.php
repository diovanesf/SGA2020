<body id="body" class="hold-transition skin-gray sidebar-mini" style="padding-bottom: 20px">
  <div class="wrapper">
    <div class="row" style="margin-top: 50px;">
      <div class="col-lg-12">
        <div class="panel-body">
          <h1 class="page-header" style="font-size:30px;">
            Cadastar Proprietário
          </h1>


          <form method="POST" action="<?php echo base_url() ?>proprietario/insert">

            <div class=" col-lg-6 form-group">
              <label style="font-size:15px;" for="">Nome Completo</label>
              <div>
                <input id="" name="nome" class="form-control input-md">
              </div>
            </div>


            <div class=" col-lg-6 form-group">
              <label style="font-size:15px;" for="">E-mail</label>
              <div>
                <input id="" type="email" name="email" class="form-control input-md">
              </div>
            </div>

            <div class=" col-lg-6 form-group">
              <label style="font-size:15px;" for="">Endereço</label>
              <div>
                <input id="" type="text" name="endereco" class="form-control input-md">
              </div>
            </div>

            <div class=" col-lg-3 form-group">
              <label style="font-size:15px;" for="">Telefone</label>
              <div>
                <input id="telefone" type="phone" name="telefone" class="form-control input-md">
              </div>
            </div>

            <div class=" col-lg-3 form-group">
              <label style="font-size:15px;" for="">Cidade</label>
              <div>
                <input id="" type="text" name="cidade" class="form-control input-md">
              </div>
            </div>

            <div class="col-lg-3 form-group">
              <label style="font-size:15px;" for="estado">Estado:</label>
              <select name="estado" class="form-control input-md">
                <option value="0">Acre - AC</option>
                <option value="1">Alagoas - AL</option>
                <option value="2">Amapá - AP</option>
                <option value="3">Amazonas - AM</option>
                <option value="4">Bahia - BA</option>
                <option value="5">Ceará - CE</option>
                <option value="6">Distrito Federal - DF</option>
                <option value="7">Espírito Santo - ES</option>
                <option value="8">Goiás - GO</option>
                <option value="9">Maranhão - MA</option>
                <option value="10">Mato Grosso - MT</option>
                <option value="11">Mato Grosso do Sul - MS</option>
                <option value="12">Minas Gerais - MG</option>
                <option value="13">Pará - PA</option>
                <option value="14">Paraíba - PB</option>
                <option value="15">Paraná - PR</option>
                <option value="16">Pernambuco - PE</option>
                <option value="17">Piauí - PI</option>
                <option value="18">Roraima - RR</option>
                <option value="19">Rondônia - RO</option>
                <option value="20">Rio de Janeiro - RJ</option>
                <option value="21">Rio Grande do Norte - RN</option>
                <option value="22">Rio Grande do Sul - RS</option>
                <option value="23">Santa Catarina - SC</option>
                <option value="24">São Paulo - SP</option>
                <option value="25">Sergipe - SE</option>
                <option value="26">Tocantins - TO</option>
              </select>
            </div>

            <div class=" col-lg-3 form-group">
              <label style="font-size:15px;" for="">CEP</label>
              <div>
                <input id="" type="text" name="cep" class="form-control input-md">
              </div>
            </div>



            <div class=" col-lg-6 form-group">
              <label style="font-size:15px;" for="">Coordenada GPS</label>
              <div>
                <input id="" type="text" name="gps" class="form-control input-md">
              </div>
            </div>

            <div class="col-lg-12">
              <button type="submit" class="btn btn-lg btn-success pull-right">
                <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
              </button>
          </form>

          <form action="<?php echo base_url('proprietarios'); ?>">
            <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- </div> -->

</body>


<script>
  var room = 0;

  function education_fields() {
    room--;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    divtest.setAttribute("id", 'removeclass[' + room + ']');
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<div class="input-group"> <label for="identificador">Identificador</label> <input type="text" class="form-control elasticteste" id="identificador[]" name="identificador[]" value=> &nbsp; <button class="btn btn-danger" type="button" id="button[' + room + ']" onclick="remove_education_fields(' + room + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button> </div>';


    objTo.appendChild(divtest);

  }

  function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
  }
  m
</script>

<script>
  function somenteNumeros(e) {
    var charCode = e.charCode ? e.charCode : e.keyCode;
    // charCode 8 = backspace   
    // charCode 9 = tab

    if (charCode != 8 && charCode != 9) {
      // charCode 48 equivale a 0   
      // charCode 57 equivale a 9
      if (charCode < 48 || charCode > 57) {
        return false;
      }
    };
  }
</script>
<?php $this->load->view('frame/footer_view') ?>