<?php
require("partials/auth.php");
require('partials/header.php');
require('partials/nav.php');
?>


    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-md-8">


                <h4>Nejsme jako facebook, toto jsou všechny údaje které o vás máme</h4>

                <div class="card m-4 w-100">
                    <div class="card-body">
                        <? $user = $_SESSION['user']; ?>
                        Vaše jméno: <b><? echo $user['display_name'] ?></b> <br>
                        Vaše id: <b><? echo $user['id'] ?></b> <br>
                        Vaše user_id: <b><? echo $user['user'] ?></b> <br>

                        <div class="py-2"></div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        Váš jedinečný identifikátor reklam: <? if (!isset($_GET['aff'])) { echo $user['ad_id']; } else { echo "<b>Odhlaste se prosím</b>"; }  ?><br>
                                        <small class="text-muted">Změna se projeví až při dalším restartu.</small><br>
                                        <a href="update_ad_id.php" class="btn btn-sm btn-warning float-right text-white">Resetovat reklamní id</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card py-1">
                                    <div class="card-body">
                                        <h5>Sledujeme Vás?</h5>
                                        <small>Váš jedinečný identifikátor nám umožňuje Vás důkladně sledovat, umisťovat na vaší zeď relevantní reklamu a personalizovat výkon vašeho
                                            bitcoin mineru.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            </div>

            <div class="col-md-4">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- banner-na-pravo -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-5036777483973833"
                     data-ad-slot="2553995168"
                     data-ad-format="auto"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <div class="card">
                    <div class="card-body">
                        <small>Je morální zobrazovat reklamy u vašich osobních údajů? Zeptejte se: <a href="//facebook.com" target="_blank">zde</a> </small>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
require('partials/footer.php');
?>