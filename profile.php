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
                    </div>
                </div>


            </div>

            <div class="col-md-4">
                Místo pro vaše reklamy
            </div>
        </div>
    </div>


<?php
require('partials/footer.php');
?>