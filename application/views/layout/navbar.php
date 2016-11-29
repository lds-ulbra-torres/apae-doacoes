<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu-principal" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= base_url() ?>">APAE</a>
    </div>

    <div class="collapse navbar-collapse" id="navbar-menu-principal">

      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar...">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list"></span> Entidades <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url('frequency') ?>"><span class="glyphicon glyphicon-signal"></span> Frequência</a></li>
            <li><a href="<?= base_url('banks') ?>"><span class="glyphicon glyphicon-usd"></span> Bancos</a></li>
            <li><a href="<?= base_url('cedentes') ?>"><span class="glyphicon glyphicon-user"></span> Cedentes</a></li>
            <li><a href="<?= base_url('associated') ?>"><span class="glyphicon glyphicon-thumbs-up"></span> Associados</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
