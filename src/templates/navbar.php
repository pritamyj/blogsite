<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

                
        <link rel="stylesheet" type="text/css" href="../css/indexadmin.css">


    <title>home</title>
</head>
<body>
<header>
        <div class="navbar navbar-fixed-top">
            <div class="container">
                <div class="">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" >
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>     
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span>                      
                        </button>

                        <a href="" class="navbar-brand">LOGO</a>

                    </div>

                    <div class="collapse navbar-collapse" id="menu" >
                        <ul class="nav navbar-nav ">
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="login1.php">LOGIN</a></li>
                            <li><a href="register.php">SIGN UP</a></li>
                            <li><a href="">ABOUT</a></li>
                            <li><a href="">CONTACT</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </header>


<script
  src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    

 $(function(){
        $(window).scroll(function () {
            if ($(this).scrollTop() < 50){
                $(".navbar").css({"background-color":"transparent","background-image": "linear-gradient(326deg, transparent 0%, transparent 74%)",
    "padding": "45px 0"});

            }else{
                $(".navbar").css({"background-color":"#bd4f6c","background-image": "linear-gradient(326deg, #bd4f6c 0%, #d7816a 74%)",
    "padding": "7px 0"});
            }
        })
    })



</script>



</body>
</html>