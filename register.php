<?php
require('partials/header.php');
?>

<link href="static/my-login.css" rel="stylesheet">

    <div class="my-login-page">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">Register</h4>
                                <form method="POST" action="login_register_action.php">

                                    <input type="hidden" name="type" value="register"/>

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" class="form-control" name="name" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">E-Mail Address</label>
                                        <input id="email" type="email" class="form-control" name="email" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control" name="pass" required data-eye>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" required name="aggree" value="1"> I agree to the Terms and Conditions
                                        </label>
                                    </div>


                                    <script src="https://authedmine.com/lib/captcha.min.js" async></script>
                                    <div class="coinhive-captcha w-100" data-hashes="1024" data-key="om5FLZQaWDRypRjGuavvpahd0ty508We" data-disable-elements="#submit">
                                        <em>Loading Captcha...<br>
                                            If it doesn't load, please disable Adblock!</em>
                                    </div>

                                    <div class="form-group no-margin">
                                        <button id="submit" type="submit" class="btn btn-primary btn-block">
                                            Register
                                        </button>
                                    </div>
                                    <div class="margin-top20 text-center">
                                        Already have an account? <a href="login.php">Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="footer">
                            Copyright &copy; <?php echo date("Y"); ?> &mdash; Fejsbůček
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php
require ('partials/footer.php');