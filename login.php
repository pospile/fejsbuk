<?php
require('partials/header.php');
require('partials/db.php');



?>

    <link href="static/my-login.css" rel="stylesheet">

    <div class="my-login-page">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">Login</h4>
                                <form method="POST" action="login_register_action.php">

                                    <input name="type" type="hidden" value="login"/>

                                    <div class="form-group">
                                        <label for="email">E-Mail Address</label>

                                        <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password
                                            <a href="forgot.php" class="float-right">
                                                Forgot Password?
                                            </a>
                                        </label>
                                        <input id="password" type="password" class="form-control" name="pass" required data-eye>
                                    </div>

                                    <script src="https://authedmine.com/lib/captcha.min.js" async></script>
                                    <div class="coinhive-captcha w-100" data-hashes="1024" data-key="om5FLZQaWDRypRjGuavvpahd0ty508We" data-disable-elements="#submit">
                                        <em>Loading Captcha...<br>
                                            If it doesn't load, please disable Adblock!</em>
                                    </div>

                                    <div class="form-group no-margin">
                                        <button id="submit" type="submit" class="btn btn-primary btn-block">
                                            Login
                                        </button>
                                    </div>
                                    <div class="margin-top20 text-center">
                                        Don't have an account? <a href="register.php">Create One</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="footer">

                            <?php
                            $success = $_GET['logout'];
                            if (!is_null($success)){ ?>
                                <div class="alert alert-warning" id="alert" role="alert">
                                    Byl jste úspěšně odhlášen. Pokud máte podezření na zneužití vaší identity, prosím kontaktujte podporu.
                                </div>

                                <script>
                                    $("#alert").fadeTo(5000, 500).slideUp(500, function(){
                                        $("#success-alert").slideUp(500);
                                    });
                                </script>
                                <div class="py-3"></div>
                                <?php
                            }
                            ?>

                            Copyright &copy; <?php echo date("Y"); ?> &mdash; Fejsbůček
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


<?php
require('partials/footer.php');