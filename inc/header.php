<header class="header">
    <h1 class="head-1">Gestion des appartements</h1>
    <div class="user">
        <div class="user__photo">
            <a href="#options">
                <svg class="illustration">
                    <use href="public/img/SVG/user.svg#user"></use>
                </svg>
            </a>
        </div>
        <p class="user__id">
            <span class="user__level">Priv : <?php echo Session::get('level'); ?></span><br>
            <strong class="user__names"><?php echo Session::get('names'); ?></strong>
        </p>
        <div class="user__options">
            <ul class="user__menu">
                <!-- <li><a href="#">Profil</a></li>
                <li><a href="#">Messages<span class="count">21</span></a></li> -->
                <li><a href="admin/logout">Déconnexion</a></li>
            </ul>
        </div>
        <svg class="dot">
            <use href="public/img/SVG/point.svg#point"></use>
        </svg>
    </div>
</header>
