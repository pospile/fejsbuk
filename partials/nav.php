<? $user = $_SESSION['user']; ?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="fa fa-facebook-square"></i> Fejsbůček</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fa fa-align-justify"></i> Zeď</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-users"></i> Přátelé</a>
                </li>
                <li class="nav-item">
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell"></i> Upozornění
                    </a>
                    <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                        <div class="py-5">Žádná upozornění</div>
                    </div>
                </li>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i> <? echo $user['display_name'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a style="color: black !important;" class="nav-link dropdown-item" href="profile.php"> <i class="fa fa-user"></i> Profil</a>
                        <a style="color: black !important;" class="nav-link dropdown-item" href="log_out.php"> <i class="fa fa-lock"></i> Odhlásit</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
