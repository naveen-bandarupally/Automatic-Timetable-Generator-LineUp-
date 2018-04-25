<?php
    session_start();
    if(isset($_SESSION["login"]))
        {
            if($_SESSION["role"] == 'FACULTY')
                $url = "faculty.php";
            else
                $url = "admin.php";
            header('Location:'.$url);
        }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Line Up | Vignan</title>
        <link rel="shortcut icon" type="image/png" href="images/favicon.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
        <style>
            body{
                background: #212f3d;
                color: white;
                font-family: serif;
            }
            .move {
                padding-top: 70px;
            }
            .error{
                background-color: red;
                padding: 10px 50px 10px 50px;
                font-variant: small-caps;
                font-weight:bold;
                font-size:18px;
                border-radius:4px;
                box-shadow: 3px 0px 20px red;
                transition: box-shadow 0.5s;
                position: absolute;
                top: 100px;
                right: 50%;
                margin-right: -165px;
                display:none;
            }
            .bottom{
                position: relative;
            }
            #home_img { 
                top: 0;
                left: 0;
                width:100%;
                height: 100vh;
            }
            .modal {

               top: 50%;
               margin-top: -150px;
               color: black;
            }
            .nava{
                color: white;
                text-transform: uppercase;
                font-weight: bold;
            }
            .nava:hover{
                color: #2e4053;
                text-transform: uppercase;
                font-weight: bold;
                box-shadow: 0px 0px 10px white;
            }
            .table > tbody > tr > td, .table > thead > tr > th {
                vertical-align: middle;
                text-align: center;
                text-transform: uppercase;
                font-weight: bold;
            }
            .borderless td, .borderless th{
                border: 0 !important;
                background-color:#34495e; 
                border-radius: 4px;
                box-shadow: 0px 0px 3px #ffffff;
            }
            .borderless {
                margin-bottom: 0px;
                border-collapse: separate;
                border-spacing: 5px 5px;
            }
            .navbar .navbar-nav > .active a{
                color: #2e4053;
                background: white;
                box-shadow: 0px 2px 10px white;
                border-radius: 3px;
            }
            .modal-content{
                background-color: #2e4053;
                color: white;
            }
            .control-label,span{
                text-align: center; 
                font-weight: bold; 
                text-transform:uppercase;
            }
            #ttform{
                width: 60%;
                padding-top: 100px;
                z-index: 999px;
            }
            .heading{
                padding: 10px 10px 10px 10px;
                color: #ffffff;
                text-align: center;
                font-weight: bold;
                font-variant: small-caps;
                border-radius: 4px;
                font-size: 32px;
            }
            #timetable{
                height: 100vh;
            }
            .container_pics{
                width:270px;
                height:270px;
                border-radius:50%;
            }
            .person {
                display: block;
                box-shadow: 0px 0px 9px #ffffff;
            }
            .container_pics:hover .person{
                -webkit-filter: blur(2px);
                filter: blur(2px);
            }
            .overlay {
                position: absolute; 
                bottom: 0; 
                background: rgb(0, 0, 0);
                background: rgba(0, 0, 0, 0.5);
                color: #f1f1f1; 
                width: 270px;
                height: 270px;
                transition: .5s ease;
                opacity:0;
                text-transform: uppercase;
                color: white;
                font-size: 20px;
                padding-top: 124px;
                text-align: center;
                border-radius: 50%;
            }
            .container_pics:hover .overlay {
                opacity: 1;
                box-shadow: 0px 0px 11px #ffffff;
            }
        </style>
        <script>
            $(document).ready(function(){
//                $("#tt").hide();
                $("#distt").submit(function(e){
                    var year = $("#ttyear").val();
                    var sec = $('#ttsec').val();
                    $.ajax({
                        url:"distt.php",
                        method:"post",
                        data:{year:year,sec:sec},
                        success:function(q){
                            $("#tt").html(q);
                        }
                    });
//                    $("#tt").show();
                    e.preventDefault();
                });
                $("#loginform").submit(function(e){
                    var uid = $("#uid").val();
                    var pwd = $("#pwd").val();
                    $.ajax({
                        url:"login.php",
                        method:"post",
                        data:{uid:uid,pwd:pwd},
                        success:function(q){
                            if(q=="false")
                            {
                                $("#errmsg").fadeIn();
                                $("#login").modal('toggle');
                                window.setTimeout( hideerror, 5000 );
                            }
                            else if(q == 'FACULTY')
                            {
                                window.location.href = "faculty.php";
                            }
                            else
                            {
                                window.location.href = "admin.php";
                            }
                        }
                    });
                    e.preventDefault();
                });
                $("#ttyear").change(function(){
                    var year = $("#ttyear").val();
                    if(year==2)
                    {
                        $("#ttsec").empty();
                        $("#ttsec").append("<option selected disabled>select section</option><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option><option value='E'>E</option><option value='F'>F</option><option value='G'>G</option>");
                    }
                    if(year==3)
                    {
                        $("#ttsec").empty();
                        $("#ttsec").append("<option selected disabled>select section</option><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option><option value='E'>E</option>");
                    }
                });
                $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
                    if (this.hash !== "") {
                        event.preventDefault();
                        var hash = this.hash;
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 900, function(){
                            window.location.hash = hash;
                        });
                    }
                });
                function hideerror(){
                    $("#errmsg").fadeOut();
                }
            });
        </script>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="20">
        <nav class="navbar navbar-fixed-top" style="background-color: #2e4053; box-shadow: 2px 4px 6px #2e4053;">
            <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle"  style="background-color:white;" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar" style="background-color:#2e4053;"></span>
                <span class="icon-bar" style="background-color:#2e4053;"></span>
                <span class="icon-bar" style="background-color:#2e4053;"></span>                        
              </button>
              <span class="navbar-brand"><img src="images/icon.png" alt="lineup image" style="width: inhirit; height: 100%; display: inline;">LineUp</span>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                <li><a class="nava" href="#home">HOME</a></li>
                <li><a class="nava" href="#timetable">TIMETABLE</a></li>
                  <li><a class="nava" href="#about">ABOUT</a></li>
                <li><a class="nava" href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
              </ul>
            </div>
            </div>
        </nav>
        <div id="home" class="container-fluid move bottom">
            <img id="home_img" class="rounded img-fluid" src="images/time-table.png">
            <p id="errmsg" class='error'>invalid userid or password</p>
        </div>
        
        <div id="timetable" class="container-fluid move">
            <div class="heading"><p>enter year & section to display time table</p></div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <center>
                        <form id="distt" class="form-horizontal" method="post">
                            <div class="input-group">
                                <span class="input-group-addon">year</span>
                                    <select class="form-control" id="ttyear" name="ttyear" required>
                                        <option selected disabled>select year</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">section</span>
                                    <select class="form-control" id="ttsec" name="ttsec" required>
                                        <option selected disabled>select section</option>
                                    </select>
                            </div>
                            <br>
                            <div class="form-group">        
                                <input type="submit" value="submit" name="ttsubmit" class="btn btn-default">
                            </div>
                        </form>
                    </center>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div id="tt" class="table-responsive">
                
            </div>
        </div>
        <div id="about" class="container-fluid move">
            <div class="container-fluid text-center">
                <div class="heading"><p>this project was developed under the guidence of</p></div><br /><br /><br /><br /><br />
                <div class="row" style="padding-bottom: 70px">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4" align="center">
                        <div class="container_pics">
                            <img src="images/ramireddy2.jpg" class="img-circle person" alt="ch venkata ramireddy" width="100%" height="100%">
                            <div class="overlay">ch venkata ramireddy</div>
                        </div>
                    </div>
                    <div class="col-sm-4" align="center">
                        <div class="container_pics">
                            <img src="images/jaykumar.jpg" class="img-circle person" alt="jaykumar loganathan" width="100%" height="100%">
                            <div class="overlay">jaykumar loganathan</div>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div><br /><br /><br /><br /><br />
                <div class="heading"><p>developed by</p></div><br /><br /><br /><br /><br />
                <div class="row" style="padding-bottom: 70px">
                    <div class="col-sm-4" align="center">
                        <div class="container_pics">
                            <img src="images/naveen.jpg" class="img-circle person" alt="naveen bandarupally" width="100%" height="100%">
                            <div class="overlay">naveen bandarupally</div>
                        </div>
                    </div>
                    <div class="col-sm-4" align="center">
                        <div class="container_pics">
                            <img src="images/yash.PNG" class="img-circle person" alt="yaswanth koppisetty" width="100%" height="100%">
                            <div class="overlay">yaswanth koppisetty</div>
                        </div>
                    </div>
                    <div class="col-sm-4" align="center">
                        <div class="container_pics">
                            <img src="images/img4.jpg" class="img-circle person" alt="prudhvi nimmala" width="100%" height="100%">
                            <div class="overlay">prudhvi nimmala</div>
                        </div>
                    </div>
                </div><br /><br /><br /><br /><br />
<!--
                <div class="heading"><p>supporting faculty</p></div><br /><br /><br /><br /><br />
                <div class="row" style="padding-bottom: 70px">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4" align="center">
                        <div class="container_pics">
                            <img src="images/guitar.jpg" class="img-circle person" alt="d radharani" width="100%" height="100%">
                            <div class="overlay">d radharani</div>
                        </div>
                    </div>
                    <div class="col-sm-4" align="center">
                        <div class="container_pics">
                            <img src="images/img3.jpg" class="img-circle person" alt="s radharani" width="100%" height="100%">
                            <div class="overlay">s radharani</div>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div><br /><br /><br /><br /><br />
-->
            </div>
        </div>
        <div class="modal fade" id="login" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" style="color:white;" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align: center; font-weight: bold; text-transform:uppercase;">PLEASE ENTER YOUR CREDENTIALS</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="loginform" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="uid">user id:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="uid" placeholder="Enter user id" name="uid" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">password:</label>
                                <div class="col-sm-10">          
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
                                </div>
                            </div>     
                            <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="login_btn" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>