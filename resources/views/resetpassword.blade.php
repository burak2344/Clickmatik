<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet"  href="css/loginstyle.css">

    <a class="navbar-brand" href="{{ url('/') }}" >
        <h1 class="hidden">
            <img src="img/clickmatik1.png" alt="Flexor Logo">
        </h1>
    </a>




</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <section>

                <form class="form-horizontal" method="post" name="signup" id="signup" enctype="multipart/form-data" >
                    <br><br><br>
                    <div class="form-group">
                        <label class="control-label col-sm-3"><span class="text-danger"></span></label>
                        <div class="col-md-8 col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Enter your Email ID" value="">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-10">
                            <input name="Submit" type="submit" value="GÖNDER" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>