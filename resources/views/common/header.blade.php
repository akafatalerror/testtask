<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Test task</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Главная</a></li>
        <?php if(\Auth::check()):?>
            <li><a href="/cabinet">Кабинет</a></li>
            <li><a href="/logout">Выход</a></li>

        <?php endif;?>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
