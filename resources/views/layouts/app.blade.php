<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="/css/app.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="/css/robcss.css" rel="stylesheet">

  <!-- Scripts -->
  <script>
  window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
  ]); ?>
  </script>

</head>
<body>
  <div id="app">
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">

          <!-- Collapsed Hamburger -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- Branding Image -->
          <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
          </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">
            &nbsp;
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{ route('user.show', Auth::id()) }}">Profil</a>
                </li>
                <li>
                  @if(Auth::user()->isadmin)
                  <a href="{{ route('admin') }}">Administration</a>
                  @endif
                </li>

                <li>
                  <a href="{{ route('user.edit', Auth::id()) }}">Seetings</a>
                </li>
                <li>
                  <a href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-sm-3 col-md-3">
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a href="{{ route('dashboard') }}"><span class="glyphicon glyphicon-home">
                </span>Accueil</a>
              </h4>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" ><span class="glyphicon glyphicon-th">
                </span>Prêts</a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body">
                <table class="table">
                  <tr>
                    <td>
                      <span class="glyphicon glyphicon-pencil text-primary"></span><a href="{{ route('loan.index') }}">Tous les prêts</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="glyphicon glyphicon-flash text-success"></span><a href="{{ route('loan.create') }}">Créer un nouveau</a>
                    </td>
                  </tr>

                </table>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                </span>Produits</a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
              <div class="panel-body">
                <table class="table">
                  <tr>
                    <td>
                      <a href="{{ route('product.index') }}">Tous les produits</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a href="{{ route('product.create') }}">Créer nouveau</a> <span class="label label-info">5</span>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                </span>Commandes</a>
              </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
              <div class="panel-body">
                <table class="table">
                  <tr>
                    <td>
                      <span class="glyphicon glyphicon-usd"></span><a href="{{ route('commande.index') }}">Commandes</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="glyphicon glyphicon-user"></span><a href="{{ route('commande.create') }}">Créer une commande</a>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFourb"><span class="glyphicon glyphicon-file">
                </span>Ventes</a>
              </h4>
            </div>
            <div id="collapseFourb" class="panel-collapse collapse">
              <div class="panel-body">
                <table class="table">
                  <tr>
                    <td>
                      <span class="glyphicon glyphicon-usd"></span><a href="{{ route('sale.index') }}">Ventes</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="glyphicon glyphicon-user"></span><a href="{{ route('sale.create') }}">Créer une vente</a>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a href="{{ route('patient.index') }}"><span class="glyphicon glyphicon-home">
                </span>Liste de patients</a>
              </h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-9 col-md-9" style="padding-left : 30px;">
        <div class="row">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->

<script src="/js/app.js"></script>
<script src="/js/app_rob.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>

<script type="text/javascript">

$(function() {
  $('.panel-group').on('mouseenter.collapse.data-api', '[data-toggle=collapse]', function(e) {
    var $this = $(this),
    href, target = $this.attr('data-target') || e.preventDefault() || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') //stri for ie7
    ,
    option = $(target).data('collapse') ? 'show' : $this.data()
    $(target).collapse(option)
  })
})
</script>

</body>
</html>
