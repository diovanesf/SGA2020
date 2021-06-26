 <header class="main-header">
   <a href="#" class="logo" style="pointer-events: none;">
     <span class="logo-lg"><b>Sistema Grupo 02</b></span>
   </a>

   <nav class="navbar navbar-static-top">
     <!-- Sidebar toggle button-->
     <div class="navbar-custom-menu">
       <ul class="nav navbar-nav">

         <li class="dropdown ">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <i class="glyphicon glyphicon-plus"></i> Cadastros
           </a>
           <ul class="dropdown-menu">
             <li class="dropdown hidden-xs">
             <li class="dropdown notifications-menu">
               <a href="<?= base_url('usuarios'); ?>">
                 <i class="glyphicon glyphicon-user"></i> Usuarios
               </a>
             </li>
         </li>

         <li class="dropdown hidden-xs">
         <li class="dropdown notifications-menu">
           <a href="<?= base_url('proprietarios'); ?>">
             <i class="glyphicon glyphicon-briefcase"></i> Proprietário
           </a>
         </li>
         </li>

         <li class="dropdown hidden-xs">
         <li class="dropdown notifications-menu">
           <a href="<?= base_url('amostras'); ?>">
             <i class="glyphicon glyphicon-list-alt"></i> Amostras
           </a>
         </li>
         </li>
       </ul>

       </li>

       <li class="dropdown user user-menu">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           <img src="<?= base_url() ?>assets/images/user-icon.jpg" class="user-image profileImgUrl" alt="User Image">
           <span class="hidden-xs NameEdt"><?= $this->session->userdata('name'); ?></span>
         </a>
         <ul class="dropdown-menu">
           <li class="user-header">

             <img src="<?= base_url() ?>assets/images/user-icon.jpg" class="img-circle profileImgUrl" alt="User Image">

             <p>
               <span class="NameEdt"><?= $this->session->userdata('name'); ?></span>
               <small><?= $this->session->userdata('email'); ?></small>
             </p>
           </li>
           <li class="user-footer">
             <div class="pull-left">
               <a data-toggle="modal" data-target="#myAccount" href="#myAccount" class="btn btn-info btn-flat">Meu Perfil</a>
             </div>
             <div class="pull-right">
               <a href="<?= base_url(); ?>authentication/logout" class="btn btn-danger btn-block">Sair</a>
             </div>
           </li>
         </ul>
       </li>

       <div class="modal fade" id="myAccount" tabindex="-1" role="dialog" aria-labelledby="ModalmyAccount" aria-hidden="true">
         <div class="modal-dialog">
           <div class="modal-content">
             <form role="form" method="post" onsubmit="return checkEmptyInput();" action="<?= base_url() ?>register/saveUpdateUser/">
               <div class="modal-header text-center">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h2 class="modal-title w-100 font-weight-bold">Dados Pessoais</h2>
               </div>
               <?php $this->db->where('user_id', $_SESSION['user_id']);
                $datauser = $this->db->get('user')->result();
                foreach ($datauser as $data) { ?>
                 <div class="modal-body mx-3">
                   <div class="form-group">
                     <input id="user_id" name="user_id" type="hidden" placeholder="user_id" class="form-control input-md" value="<?= $data->user_id; ?>" required="true" readonly>
                   </div>
                   <div class="md-form mb-5">
                     <label data-error="wrong" data-success="right" for="form3">Seu Nome</label>
                     <input class="form-control" placeholder="Full name" name="name" type="name" value="<?= $data->name; ?>" required="true">
                   </div>
                   <br>
                   <div class="md-form mb-4">
                     <label data-error="wrong" data-success="right" for="form2">Seu Email</label>
                     <input class="form-control" placeholder="E-mail" name="email" type="email" value="<?= $data->email; ?>" required="true" readonly>
                   </div>
                   <br>
                   <div class="md-form mb-4">
                     <label data-error="wrong" data-success="right" for="form2">Tipo de Usuario</label>
                     <input class="form-control" placeholder="role" name="role" value="<?php echo $data->role == 2 ? " Professor" : "Aluno" ?>" required="true" readonly>
                   </div>
                   <br>
                   <!-- <div class="md-form mb-4">
                     <label data-error="wrong" data-success="right" for="form2">Data de Criação da Conta: <?php echo date("d\/m\/Y\ ", strtotime($data->created_at)); ?></label>
                   </div> -->
                 </div>
               <?php } ?>
               <div class="modal-footer">
                 <div class="pull-right">
                 <input type="submit" class="btn btn-success" value="Save">
                 </div>
                 <div class="pull-left">
                 <a data-toggle="modal" data-target="#changePasswordModal" href="#changePasswordModal" class="btn btn-info btn-flat">Alterar Senha</a>
                 </div>
               </div>

           </div>
           </form>
         </div>
       </div>
     </div>


     <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="ModalmyAccount" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header text-center">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             <h2 class="modal-title w-100 font-weight-bold" id="myModalLabel">Mudança de Senha (<?= $this->session->userdata('email') ?>)</h2>
           </div>
           <div class="modal-body">
             &nbsp;
             <form method="POST" name="formuser" action="<?= base_url() ?>register/saveSenha/">
               <input name="user_id" type="hidden" placeholder="user_id" class="form-control input-md" value="<?= $_SESSION['user_id']; ?>" required="true" readonly>
               <div class="row">
                 <div class="col-lg-6">
                   <div class="form-group">
                     <label>Nova Senha</label> &nbsp;&nbsp;
                     <input class="form-control" id="newPassword" placeholder="Nova Senha" name="password" type="password" autofocus>
                   </div>
                 </div>
                 <div class="col-lg-6">
                   <div class="form-group">
                     <label>Confirmar nova senha</label> &nbsp;&nbsp;
                     <input class="form-control" id="confirmNewPassword" placeholder="Confirmar nova senha" name="rep_senha" type="password" autofocus>
                   </div>
                 </div>
               </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
             <button type="submit" onclick="return validar()" class="btn btn-success">Salvar</button>
             </form>
           </div>
         </div>
       </div>

       <!-- JavaScript -->
       <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
       <!-- CSS -->
       <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />


       <script type="text/javascript">
         function validar() {
           var senha = formuser.password.value;
           var rep_senha = formuser.rep_senha.value;

           //  if (senha == "" || senha.length < 5) {
           //    alert('Preencha o campo senha com no minimo 5 caracteres');
           //    formuser.password.focus();
           //    return false;
           //  }

           //  if (rep_senha == "" || rep_senha.length < 5) {
           //    alert('Preencha o campo senha com no minimo 5 caracteres');
           //    formuser.rep_senha.focus();
           //    return false;
           //  }

           if (senha != rep_senha) {
             alertify.alert('As senhas estão diferentes!').setting({
               title: 'Alerta de Atualização de Senha!',
             }).show();
             formuser.password.focus();
             return false;
           }
         }
       </script>

       </ul>
     </div>
   </nav>
 </header>