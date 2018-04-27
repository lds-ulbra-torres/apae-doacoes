<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu-principal" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand logo" href="<?=base_url()?>" >
          <img class="logo-img" src="<?=base_url('assets/img/logo_apae.png')?>"/>
          <span><?= APP_NAME ?></span>
          <span class="navbar-version">v<?= APP_VERSION ?></span>
      </a>
    </div>

    <div class="collapse navbar-collapse" id="navbar-menu-principal">
      <div class='toast'></div>
      <!--<form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar...">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>-->
      <ul class="nav navbar-nav navbar-right">
        <?php if ($this->ion_auth->logged_in()) { ?>

          <li class="<?=$page === 'notification' ? 'active':''?>"  style="color: red">
              <a href="<?= base_url('notification') ?>" <?= $this->ion_auth->notification()?>>
                    <span class="glyphicon glyphicon-bell"></span> Notificação</a>
          </li>

          <li class="<?=$page === 'donations' ? 'active':''?>">
            <a href="<?= base_url('donations') ?>">
              <span class="glyphicon glyphicon-dashboard"></span> Doações</a></li>

          <li class="dropdown <?=$page==='users'||$page==='frequency'||$page==='banks'||$page==='associated'||$page==='cedentes' ? 'active':''?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list"></span> Entidades <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <?php if ($this->ion_auth->is_admin()) { ?>
                <li class="<?=$page === 'users' ? 'active':''?>">
                  <a href="<?= base_url('users') ?>">
                    <span class="glyphicon glyphicon-user"></span> Usuários</a></li>
              <?php } ?>
              <li class="<?=$page === 'frequency' ? 'active':''?>">
                <a href="<?= base_url('frequency') ?>">
                  <span class="glyphicon glyphicon-signal"></span> Frequência</a>
              </li>

              <li class="<?=$page === 'banks' ? 'active':''?>">
                <a href="<?= base_url('banks') ?>">
                  <span class="glyphicon glyphicon-usd"></span> Bancos</a></li>
              <!--<li class="<?=$page === 'cedentes' ? 'active':''?>">
                <a href="<?= base_url('cedentes') ?>">
                  <span class="glyphicon glyphicon-user"></span> Cedentes</a></li>
                -->
              <li class="<?=$page === 'associated' ? 'active':''?>">
                <a href="<?= base_url('associated') ?>">
                  <span class="glyphicon glyphicon-thumbs-up"></span> Associados</a></li>
              <li class="<?=$page === 'partner' ? 'active' : '' ?>">
                 <a href="<?= base_url('partner') ?>">
                  <span class="glyphicon glyphicon-heart"></span> Parceiros</a></li>
              </li>

              <li class="<?=$page === 'category' ? 'active':''?>">
                  <a href="<?= base_url('category') ?>">
                    <span class="glyphicon glyphicon-menu-hamburger"></span> Categorias</a>
              </li>
              </ul>
          </li>


          <li class="dropdown <?=$page==='edit_user'||$page==='change_password' ? 'active':''?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-lock"></span> Conta <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="<?=$page === 'edit_user' ? 'active':''?>">
                <a href="<?= base_url('edit_user/'. $this->ion_auth->user()->row()->id) ?>">
                  <span class="glyphicon glyphicon-cog"></span> Meu Cadastro</a></li>
              <li class="<?=$page === 'change_password' ? 'active':''?>">
                <a href="<?= base_url('change_password') ?>">
                  <span class="glyphicon glyphicon-wrench"></span> Alterar Senha</a></li>
              <li>
                <a href="<?= base_url('auth/logout') ?>">
                  <span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
            </ul>
          </li>
        <?php } else { ?>
          <li><a href="<?= base_url('auth/login') ?>"><span class="glyphicon glyphicon-log-in"></span> Faça Login</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
