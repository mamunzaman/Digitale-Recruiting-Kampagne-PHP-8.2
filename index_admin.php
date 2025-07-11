<?php
// need for direct access the *.php
define('DirectAccessRestriction', TRUE);

 
require_once("header_footer/header_admin.php"); ?>

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="login-wrap p-0">
                <p style="text-align: center;"><img src="assets/images/base/focke-logo-black.png" alt=""
                                                  class="d-inline-block
                brand-logo-responsive
                align-text-top"></p>
                <h3 class="mb-4 text-center" style="    color: rgba(12, 83, 136, 1.0);">Have an account?</h3>
                <form method="post" autocomplete="off" class="signin-form">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="E-Mail" class="form-control" aria-label="Username"
                               aria-describedby="addon-wrapping" required>
                    </div>
                    <div class="form-group">
                        <input id="password-field" type="password" name="password" aria-label="Username" aria-describedby="addon-wrapping" class="form-control"
                               placeholder="Password" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-focke btn-primary submit px-3">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
session_destroy();
require_once("header_footer/footer_admin.php"); ?>
