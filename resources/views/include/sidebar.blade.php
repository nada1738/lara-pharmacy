
<script type="text/javascript">
    var pid = "none";
    function showhide(id) {
      var elements = document.getElementById(id).childNodes;
      var menu = elements[3];
      var arrow = ((elements[1].childNodes)[4].childNodes)[1];
      if(menu.style.display == 'block') {
        menu.style.display = "none";
        arrow.style.transform = "rotate(0deg)";
        elements[1].style.color = "#eeeeee";
      }
      else {
        menu.style.display = "block";
        arrow.style.transform = "rotate(270deg)";
        elements[1].style.color = "#56ff38";
      }
      if(pid == id)
        pid = "none";
      if(pid != "none") {
        elements = document.getElementById(pid).childNodes;
        menu = (document.getElementById(pid).childNodes)[3];
        arrow = ((elements[1].childNodes)[4].childNodes)[1];
        if(menu.style.display == 'block') {
          menu.style.display = "none";
          arrow.style.transform = "rotate(0deg)";
          elements[1].style.color = "#eeeeee";
        }
      }
      pid = id;
    }
  
    function showOptions() {
      var flag = document.getElementById('options');
      if(flag.style.display == 'block') {
        flag.style.display = "none";
        document.getElementById('mark').style.display = "none";
      }
      else {
        flag.style.display = "block";
        document.getElementById('mark').style.display = "block";
      }
    }
  </script>
  
  <div class="sidenav ">
    <div class="card">
      <div class="card-body">
        <div class="logo">
          <!-- <img src="images/prof.jpg" class="profile"/> -->
          <h1 class="logo-caption"><span class="tweak">G</span>estion de Pharmacie</h1>
        </div> <!-- logo class -->
  
        <!-- dashboard start -->
        <div class="main-menu-item">
          <a href="/home"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
        </div>
        <!-- dashboard end -->
  
        <!-- invoice strat -->
        <div id="first" class="main-menu-item" onclick="showhide(this.id);">
            <a  href="#">
                <i class="fa fa-balance-scale"></i><span>Commande</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li class="treeview"><a href="/commandes/create">Nouvelle Commande</a></li>
                <li class="treeview"><a href="/commandes">Geree les commandes </a></li>
            </ul>
        </div>
        <!-- invoice end -->
  
        <!-- customer end -->
        <div id="second" class="main-menu-item" onclick="showhide(this.id);">
            <a href="#">
                <i class="fa fa-handshake"></i><span>Client</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li class="treeview"><a href="/clients/create">Nouveau Client</a></li>
                <li class="treeview"><a href="/clients">Gerer Clients</a></li>
            </ul>
        </div>
        <!-- customer end -->
  
        <!-- medicine strat -->
        <div id="third" class="main-menu-item" onclick="showhide(this.id);">
            <a href="#">
                <i class="fa fa-shopping-bag"></i><span>Produit</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li class="treeview"><a href="/produits/create">Nouvelle Produit</a></li>
                <li class="treeview"><a href="/produits">Gerer Les produits</a></li>
            <!--<li class="treeview"><a href="manage_medicine_stock.php">Manage Medicine Stock</a></li>-->
            </ul>
        </div>
        <!-- medicine end -->
  
        <!-- manufacturer start -->
        <div id="fourth" class="main-menu-item" onclick="showhide(this.id);">
            <a href="#">
                <i class="fa fa-group"></i><span>Fournisseur</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li class="treeview"><a href="/fournisseurs/create">Nouveau Fournisseur</a></li>
                <li class="treeview"><a href="/fournisseurs">Gerer Les Fournisseurs</a></li>
            </ul>
        </div>
        <!-- manufacturer end -->
  
        <!-- purchase start -->
        <div id="fifth" class="main-menu-item" onclick="showhide(this.id);">
            <a href="#">
                <i class="fa fa-bar-chart"></i><span>Achat</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li class="treeview"><a href="/achats/create">Acheter Produits</a></li>
                <li class="treeview"><a href="/achats">Gerer Les achats</a></li>
            </ul>
        </div>
        <!-- purchase end -->
  
        <!-- report start -->
        <div id="sixth" class="main-menu-item" onclick="showhide(this.id);">
            <a href="#">
                <i class="fa fa-book"></i><span>Rapport</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
            <li class="treeview"><a href="RapportCommande">Rapport de vente</a></li>
                <li class="treeview"><a href="RapportAchat">Rapport d'achat</a></li>
            </ul>
        </div>
        <!-- report end -->
  
        <!-- search start -->
        <div id="seventh" class="main-menu-item" onclick="showhide(this.id);">
            <a href="#">
                <i class="fa fa-search"></i><span>Rechercher</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
            <li class="treeview"><a href="/commandes">Commande</a></li>
            <li class="treeview"><a href="/clients">Client</a></li>
                <li class="treeview"><a href="/produits">Produit</a></li>
            <li class="treeview"><a href="/fournisseurs">Fournisseur</a></li>
                <li class="treeview"><a href="/achats">Achat</a></li>
            </ul>
        </div>
        <!-- search end -->

          <!-- Logout -->
          <div class="main-menu-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-key"></i><span>Se déconnecter</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <!-- Logout end -->

        

        
  
      </div> <!-- card-body class -->
    </div> <!-- card  -->
  </div>
  