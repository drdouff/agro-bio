

<!-- sidebar  -->
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="index-2.html"><img src="{{asset('backend/img/logo.png')}}" alt=""></a>
        <a class="small_logo" href="index-2.html"><img src="{{asset('backend/img/mini_logo.png')}}" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/dashboard.svg')}}" alt="">
                </div>
                <div class="nav_title">
                    <span>Creation</span>
                </div>
            </a>
            <ul>
                <li><a href="{{URL::to('/addcategories')}}">Ajouter categorie</a></li>
              <li><a href="{{URL::to('/addproduit')}}">Ajouter produit</a></li>
              <li><a href="{{URL::to('/addslider')}}">Ajouter slider</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/2.svg')}}" alt="">
                </div>
                <div class="nav_title">
                    <span>Affichage </span>
                </div>
            </a>
            <ul>
              <li><a href="{{URL::to('/categories')}}">Categories</a></li>
              <li><a href="{{URL::to('/produits')}}">Produits</a></li>
              <li><a href="{{URL::to('/slider')}}">Sliders</a></li>
              <li><a href="{{URL::to('/commandes')}}">Commandes</a></li>
            </ul>
        </li>
    </ul>
</nav>
 <!--/ sidebar  -->
