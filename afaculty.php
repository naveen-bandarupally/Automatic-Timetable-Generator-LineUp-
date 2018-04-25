<?php
    session_start();
    if(!isset($_SESSION["login"]))
    {
        $url = "index.php";
        header('Location:'.$url);
    }
    if($_SESSION["role"] == 'ADMIN')
        header('Location:admin.php');
    $con = mysqli_connect("localhost","root","","lineup");
    $fid = $_SESSION['userid'];
    $q = "select fname,img from faculty where fid = '$fid'";
    $e = mysqli_query($con,$q);
    $r = mysqli_fetch_assoc($e);
    $GLOBALS['name'] = $r['fname'];
    $GLOBALS['img'] = $r['img'];
    $q1 = "select * from faculty where fid= $fid";
    $e1 = mysqli_query($con,$q1);
    $r1 = mysqli_fetch_assoc($e1);
    $GLOBALS['fname'] = $r1['fname'];
    $GLOBALS['phone'] = $r1['phone'];
    $GLOBALS['role'] = $r1['role'];
    $GLOBALS['dept'] = $r1['department'];
    $q2 = "select count(sno) as lc from teaches as t, subject as s where s.sid = t.sid and t.fid = $fid and s.stype in ('LAB')";
    $e2 = mysqli_query($con,$q2);
    $r2 = mysqli_fetch_assoc($e2);
    $GLOBALS['lc'] = $r2['lc'];
    $q3 = "select count(sno) as tc from teaches as t, subject as s where s.sid = t.sid and t.fid = $fid and s.stype in ('THEORY','TLAB','SEMINAR')";
    $e3 = mysqli_query($con,$q3);
    $r3 = mysqli_fetch_assoc($e3);
    $GLOBALS['tc'] = $r3['tc'];
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
                overflow-y: scroll;
            }
            .nav-tabs > li {
                float:none;
                display:inline-block;
                zoom:1;
            }
            .nav-tabs {
                text-align:center;
            }
            .tab-content{
                text-align: center;
            }
            body{
                background: #212f3d;
                color: white;
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
                border-spacing: 4px 4px;
            }
            a{
                color: white;
                text-transform: uppercase;
                font-weight: bold;
            }
            a:hover{
                color: #2e4053;
                text-transform: uppercase;
                font-weight: bold;
                box-shadow: 0px 0px 10px white;
            }
            .navbar .navbar-nav > .active a{
                color: #2e4053;
                background: white;
                box-shadow: 0px 0px 10px white;
                border-radius: 3px;
            }
            span{
                font-weight: bolder; 
                text-transform:uppercase;
            }
            input{
                text-align: center;
            }
            .heading{
                padding: 10px 10px 10px 10px;
                background-color: #bfc9ca;
                color: #34495e;
                text-align: center;
                font-weight: bold;
                font-variant: small-caps;
                border-radius: 4px;
                font-size: 18px;
            }
            select{
                text-align: center;
            }
            .control-label{
                text-align: center; 
                font-weight: bold; 
                text-transform:uppercase;
            }
            .card {
                box-shadow: 0px 0px 30px white;
                text-align: center;
                font-weight: bold;
                text-transform: uppercase;
                font-variant: small-caps;
                font-size: 16px;
                width: 350px;
            }
            #proimg{
                display: block;
            }
            .card:hover #proimg{
                opacity: 0.6;
                -webkit-filter: blur(2px);
                filter: blur(2px);
            }
            .card:hover .overlay{
                cursor: pointer;
                opacity: 1;
            }
            #imgcard{
                box-shadow: 0px 0px 30px white;
            }
            .name{
                text-transform: uppercase;
                font-size: 26px;
            }
            .title {
              color: grey;
              font-size: 16px;
            }
            .links{
              text-decoration: none;
              font-size: 20px;
            }
            .links:hover{
              opacity: 0.7;
            }
            #propic{
                width: 50px;
                height: 50px;
                border-radius: 50%;
                box-shadow: 0px 5px 10px #363535;
            }
            #proimgdis{
                position:absolute;
            }
            #propic:hover{
                cursor:pointer;
            }
            .opt{
                padding: 10px 30px 10px 30px;
                background-color: #34495e;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
                list-style-type: none;
            }
            .opt:hover{
                background-color: white;
                color: #34495e;
                cursor: pointer;
                box-shadow: 0px 0px 20px white;
            }
            .dropdown {
                position: relative;
                display: block;
            }
            .dropdown-content{
                display:none;
                position: absolute;
                z-index: 1;
            }
            .dropdown:hover .dropdown-content{
                display:block;
            }
            .overlay{
                padding: 10px 10px 10px 10px;
                background-color: grey; 
                border-radius:2px;
                box-shadow: 0px 0px 20px white;
                bottom: 0;
                width: inherit;
                position:absolute;
                opacity: 0;
                color: white;
            }
            .modal {

               top: 45%;
               margin-top: -150px;
               color: black;
            }
            .modal-content{
                background-color: #2e4053;
                color: white;
            }
            select{
                text-align: center;
            }
            #ntfpane a {
                position: fixed;
                left: -190px;
                transition: 0.3s;
                padding:4px 0px 4px 20px;
                width: 230px;
/*                height: 56px;*/
                text-decoration: none;
                font-size: 20px;
                color: white;
                text-align: center;
                border-radius: 0 5px 5px 0;
            }
            #ntfpane a:hover{
                left: 0;
            }
            #ntf{
                top: 70px;
                background-color: #4CAF50;
            }
            #pntf{
                top: 120px;
                background-color: #407fe5;
            }
            a:hover{
                cursor: pointer;
            }
            #notif,#addnotif{
                height: 100%;
                width: 0px;
                position: fixed;
                z-index: 1;
                top: 0;
                right: 0;
                background-color: #111;
                overflow-x: hidden;
                padding-top: 60px;
                box-shadow: 0px 0px 20px black;
                transition:0.5s;
            }
            #close,#aclose{
                cursor: pointer;
                padding: 10px 10px 10px 10px;
                background-color: #407fe5;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
                width: 50%;
                transition:0.5s;
            }
            #close:hover,#aclose:hover{
                width:100%;
                transition:0.5s;
            }
            .outer{
                width:100%;
            }
            .inner1{
                width:50%;
                float:left;
                padding: 10px 0px 10px 0px;
                cursor: pointer;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
                transition:0.5s;
            }
            #oldbt{
                background-color: #a70021;
                box-shadow: 0px 0px 10px white;
            }
            #newbt{
                background-color: #f00030;               
            }
            #postmsg{
                padding: 10px 10px 10px 10px;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
                background-color: green;
            }
        </style>
        <script>
            $(document).ready(function(){
                var id = <?php echo $_SESSION['userid']; ?>;
                $.ajax({
                    url:"disindvtt.php",
                    method:"post",
                    data:{id:id},
                    success:function(q){
//                        alert(q);
                        $("#individual").html(q);
                    }
                });
                $.ajax({
                    url:"loadmynotif.php",
                    method:"post",
                    data:{fid:id},
                    success:function(n){
                        $("#mynotifications").html(n);
                    }
                });
                $.ajax({
                    url:"loadnotif.php",
                    method:"post",
                    data:{fid:id},
                    success:function(n){
                        $("#notifications").html(n);
                    }
                });
                $("#compbt").click(function(){
                   $("#regcomp").modal("toggle"); 
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
                $("#regform").submit(function(e){
                    var comp = $("#comptxt").val();
                    var fid = <?php echo $fid; ?>;
                    $.ajax({
                        url:"complaints.php",
                        method:"post",
                        data:{comp:comp,fid:fid},
                        success:function(q){
                            if(q == true)
                                alert("complaint registered");
                            else
                                alert("failed to register complaint");
                        }
                    });
                    e.preventDefault();
                    $("#regcomp").modal("toggle"); 
                    $("#comptxt").val("");
                });
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
                    e.preventDefault();
                });
                $("#propic").hover(
                    function(){
                        $("#proimgdis").fadeIn();
                        $("#maincontainer").fadeOut();
                    },
                    function(){
                        $("#proimgdis").fadeOut();
                        $("#maincontainer").fadeIn();
                    }
                );
                $("#logoutbt").click(function(){
                    window.location.href = "logout.php";
                });
                $("#showprofile").click(function(){
                    $("#one").fadeOut(10);
                    $("#profile").fadeIn(1000);
                });
                $("#homelink").click(function(){
                    $("#profile").fadeOut(10);
                    $("#one").fadeIn(1000);
                });
                $("#ttlink").click(function(){
                    $("#profile").fadeOut(10);
                    $("#one").fadeIn(1000);
                });
                $("#upload").click(function(){
                    $("#uploadimg:hidden").trigger('click');
                });
                $("#uploadimg").change(function(e){
                    var name = e.target.files[0].name;
                    var ext = name.split('.').pop();
                    var file_data = $('#uploadimg').prop('files')[0];   
                    var form_data = new FormData();  
                    var id = <?php echo $fid; ?>;
                    form_data.append('file', file_data);
                    form_data.append('id',id);
                    form_data.append('ext',ext);
                    $.ajax({
                        url: "upload.php",
                        type: "POST",
                        data:  form_data,
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(data){
                            if(data == true)
                            {
                                location.reload(true);
                            }
                            else
                                alert("failed to update the image");
                        }
                    }); 
                });
                $("#ntf").click(function(){
                    $("#addnotif").width("0px");
                    $("#notif").width("100%");
                });
                $("#close").click(function(){
                    $("#notif").width("0px");
                });
                $("#pntf").click(function(){
                    $("#notif").width("0px");
                    $("#addnotif").width("100%");
                });
                $("#aclose").click(function(){
                    $("#addnotif").width("0px");
                });
                $("#newbt").click(function(){
                    $("#postnotification").show();
                    $("#newbt").css("box-shadow","0px 0px 10px white");
                    $("#oldbt").css("box-shadow","0px 0px 0px white");
                    $("#mynotifications").hide();
                });
                $("#oldbt").click(function(){
                    $("#postnotification").hide();
                    $("#oldbt").css("box-shadow","0px 0px 10px white");
                    $("#newbt").css("box-shadow","0px 0px 0px white");
                    $("#mynotifications").show();
                });
                $("#notifform").submit(function(e){
                    var msg = $("#msg").val();
                    var id = <?php echo $fid; ?>;
                    $.ajax({
                        url:"sendnotif.php",
                        method:"post",
                        data:{msg:msg,fid:id},
                        success:function(q){
                            $.ajax({
                                url:"loadmynotif.php",
                                method:"post",
                                data:{fid:id},
                                success:function(n){
                                    $("#mynotifications").html(n);
                                }
                            });
                            $("#msg").val("");
                            $("#postmsg").fadeIn();
                            window.setTimeout( hidemsg, 3000 );
                        }
                    });
                    e.preventDefault();
                });
                function hidemsg(){
                    $("#postmsg").fadeOut();
                }
            });
        </script>
    </head>
    <body>
        
        <!--


            NAVIGATION BAR 


        -->
        
        <nav class="navbar navbar-fixed-top" style="background-color: #2e4053;">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle"  style="background-color:white;" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar" style="background-color:#112d66;"></span>
                <span class="icon-bar" style="background-color:#112d66;"></span>
                <span class="icon-bar" style="background-color:#112d66;"></span>                        
              </button>
              <span class="navbar-brand"><img src="images/icon.png" alt="lineup image" style="width: inhirit; height: 100%; display: inline;">lineup</span>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a id="homelink" data-toggle="tab" href="#home">home</a></li>
                <li><a data-toggle="tab" id="ttlink" href="#timetable">timetable</a></li> 
                <li>&nbsp;<img id="propic" src="images/fac/<?php echo $img; ?>"></li>
                <li class="dropdown" style="width:280px; text-align:center;"><a><?php echo $_SESSION["username"]; ?></a>
                    <ul class="dropdown-content">
                        <li class="opt" id="showprofile">myprofile</li>
                        <li class="opt" id="compbt">register complaint</li>
                        <li class="opt" id="logoutbt">logout</li>
                    </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!--NAVIGATION BAR ENDS -->
        
        
        <div id="ntfpane" class="sidenav">
            <a id="ntf">notifications<img src="images/notifi.png" style="float:right; height:35px;"></a>
            <a id="pntf">post<img src="images/bell.png" style="float:right; height:35px;"></a>
        </div>
        <center><div id="notif">
            <div id="close">close</div><br>
            <div id="notifications">
                
            </div>
        </div></center>
        <center>
            <div id="addnotif">
                <div id="aclose">close</div><br>
                <div class="outer">
                    <div class="inner1" id="oldbt">my old posts</div>
                    <div class="inner1" id="newbt">post new</div>
                </div>
                <div><br><br>
                    <div id="mynotifications">

                    </div>
                    <br>
                    <div id="postnotification" style="display:none">
                        <form id="notifform">
                            <div class="form-group">
                                <textarea style="background-color: #34495e; color:white;" class="form-control" rows="5" id="msg" placeholder="Enter your post here...." required></textarea>
                            </div>
                            <div class="form-group">        
                                <button type="submit" name="notifsubmit" class="btn btn-default">Post Notification</button>
                            </div>
                            <div id="postmsg" style="display:none;">successfully posted</div>
                        </form>
                    </div>
                </div>
            </div>
        </center>
        
<!--    home page code    -->
        <div id="proimgdis" class="container-fluid" style="padding-top: 70px; width:100%; display:none;">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div id="imgcard" class="card">
                        <img src="images/fac/<?php echo $img ?>" alt="fac image" style="width:100%">
                        <p class="name"><?php echo $name ?></p>
                        <p class="title">Asst. Professor</p> 
                        <p>Vignan's University</p>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        <div id="maincontainer">
        <div id="profile" class="container" style="display:none; padding-top: 70px;">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <center><div class="card">
                                <img id="proimg" class="image-responsive" src="images/fac/<?php echo $img ?>" alt="fac image" style="width:100%; height:100%;">
                                <div id="upload" class="overlay"><span class="glyphicon glyphicon-edit"> change pic</span></div>
                                <div>
                                    <input id="uploadimg" style="display:none" type="file"/>
                                </div>
                            </div></center>
                        </div>
                        <div class="col-sm-4"></div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class='table borderless'>
                                <thead>
                                    <tr><th colspan="2">personal info</th></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>id</td>
                                        <td><?php echo $fid ?></td>
                                    </tr>
                                    <tr>
                                        <td>name</td>
                                        <td><?php echo $fname ?></td>
                                    </tr>
                                    <tr>
                                        <td>phone number</td>
                                        <td><?php echo $phone ?></td>
                                    </tr>
                                    <tr>
                                        <td>role</td>
                                        <td><?php echo $role ?></td>
                                    </tr>
                                    <tr>
                                        <td>department</td>
                                        <td><?php echo $dept ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class='table borderless'>
                                <thead>
                                    <tr><th colspan="2">acedemic info</th></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Number of labs</td>
                                        <td><?php echo $lc ?></td>
                                    </tr>
                                    <tr>
                                        <td>Number of theory subjects</td>
                                        <td><?php echo $tc ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><br><br><br><br><br><br>
                </div>
        <div id="one" class="tab-content container">
            <div id="home" class="tab-pane fade in active" style="padding-top: 70px;">
                <div id="main">
                    <div id="individual">
                        
                    </div>
                </div>
            </div>
            
<!--     code to display timetable        -->
            
            <div id="timetable" class="tab-pane fade" style="padding-top: 70px;">
                    <div style="padding-top:50px;">
                        <div class="heading"><p>enter year & section to display time table</p></div>
                        <div class="row" style="padding-top: 20px;">
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
                        <div id="tt" style="padding-bottom:100px;">
                            
                        </div>                        
                    </div>
            </div>
        </div>
        </div>
        <div id="regcomp" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" style="color:white;" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="text-align: center; font-weight: bold; text-transform:uppercase;">enter your complaint</h4>
                    </div>
                    <div class="modal-body">
                        <form id="regform">
                            <div class="form-group">
                                <textarea id="comptxt" class="form-control" rows="5" id="comment" required></textarea>
                            </div>
                            <div class="form-group">        
                                <button type="submit" name="regsubmit" class="btn btn-default">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>