    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Login</title>

    </head>

    <body>
        <?php
        $errorlevel = error_reporting();
        error_reporting($errorlevel & ~E_NOTICE);
        if ($_SESSION['ty'] == false) {
            include "../Header/navbar.php";
        } elseif ($_SESSION['ty'] == 'admin') {
            include "../Header/navbar_admin.php";
        } elseif ($_SESSION['ty'] == 'user') {
            include "../Header/navbar_user.php";
        }
        error_reporting($errorlevel);  ?>
        <section>
            <div class="imgBx">
                <img src="../../images/13.jpg">
            </div>
            <div class="contentBx">
                <div class="formBx">
                    <h2>SIGN UP</h2>
                    <form action="signup-check.php" method="post">
                        <?php
                        include "register_form.php";
                        ?>
                        <div class="inputBx">
                            <p>Already have an account? <a href="login1.php">login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <link rel="stylesheet" type="text/css" href="../../css/login1register.css">
        <?php
        include "../Header/footer.php"; ?>
    </body>

    </html>