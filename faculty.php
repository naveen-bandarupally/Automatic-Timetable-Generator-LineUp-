<?php
    session_start();
    if(!isset($_SESSION["login"]))
    {
        $url = "index.php";
        header('Location:'.$url);
    }
    if($_SESSION["role"] == 'ADMIN')
        header('Location:admin.php');
    $_SESSION['msgto'] = "none";
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
            #propic, .chatpics{
                width: 50px;
                height: 50px;
                border-radius: 50%;
                box-shadow: 0px 5px 10px #363535;
            }
            
            #proimgdis{
                position:absolute;
            }
            #propic:hover, .reschatpics:hover, .chatpics:hover{
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
                left: -196px;
                transition: 0.4s;
                padding:4px 0px 4px 20px;
                width: 235px;
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
            #comp{
                top: 170px;
                background-color: teal;
            }
            #chat{
                top: 220px;
                background-color: #38ccb0;
            }
            a:hover{
                cursor: pointer;
            }
            #notif,#addnotif,#complaints,#chats{
                height: 100%;
                width: 0px;
                position: fixed;
                z-index: 1;
                top: 0;
                right: 0;
                background-color: #2e4053;
                padding-top: 60px;
                box-shadow: 0px 0px 20px black;
                max-width: 400px;
                transition:1s;
            }
            #chats{
                max-width: 100%;
            }
            .notifi {
                background-color: #445d76;
                border-radius: 5px;
                min-height: 85px;
                word-wrap: break-word;
                padding-left: 10px;
                padding-right: 10px;
            }
            .notifi img {
                float: left;
                max-width: 50px;
                max-height: 50px;
                height: 100%;
                width: 100%;
                border-radius: 50%;
            }
            #close,#aclose,#cclose,#chatclose{
                cursor: pointer;
                padding: 10px 10px 10px 10px;
                background-color: #407fe5;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
                width: 50%;
                transition:0.5s;
            }
            #close:hover,#aclose:hover,#cclose:hover,#chatclose:hover{
                width:100%;
                transition:0.5s;
            }
            #outer{
                max-height: 100vh;
                min-height: 100vh;
                overflow-y: scroll;
            }
            .inner1{
                padding: 10px 0px 10px 0px;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
            }
            #notifications{
                height: 100vh;
                overflow: scroll;
            }
            #oldbt{
                top: 0px;
                position: sticky;
                background-color: #40a8a4;
                width: 100%;
            }
            .delnotfbt{
                padding: 10px 10px 10px 10px;
                width: 88px;
                background-color: #26aab5;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
                border-radius: 5px;
                cursor: pointer;
            }
            .delcompbt, .delnotfbt, .resbt{
                padding: 10px 10px 10px 10px;
                width: 88px;
                background-color: #26aab5;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
                border-radius: 5px;
                cursor: pointer;
            }
            .delnotfbt:hover{
                background-color: #e20707;
                box-shadow: 0px 0px 10px white;
            }
            .resbt:hover{
                background-color: #218991;
                box-shadow: 0px 0px 10px white;
            }
            .delcompbt:hover, .delnotfbt:hover{
                background-color: #e20707;
                box-shadow: 0px 0px 10px white;
            }
            .ntfmsg{
                background-color: #2e4965;
                border-radius: 10px;
                padding: 5px 5px 5px 5px;
            }
            .verifytxt{
                background-color: #273c52;
                border-radius: 10px;
                padding: 10px 25px 10px 25px;
            }
            #newbt{
                background-color: #4b9dbc;   
                width: 100%;
            }
            #top,#bottom{
                width: inherit;
                max-width: 400px;
            }
            .not{
                padding: 0px 35px 0px 35px;
                height: 100vh;
            }
            #postmsg{
                padding: 10px 10px 10px 10px;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
                background-color: green;
            }
            ::-webkit-scrollbar {
                width: 5px;
                height: 2px;
                background: transparent;
            }
            ::-webkit-scrollbar-track {
                background: #f1f1f1; 
                background: transparent;
            }
            ::-webkit-scrollbar-thumb {
                background: #75b5b5; 
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #449191;
            }
            #sbox{
                background: transparent;
                border-color: #448996;
                border-radius: 5px;
                color: white;
                background: url("images/search.png") right no-repeat;
            }
            .msgbox{
                background: transparent;
                border-color: #448996;
                border-radius: 5px;
                color: white;
                width: 80%;
            }
            #people{
                height: 70vh;
                overflow-y: scroll;
            }
            .full{
                position: relative;
                width: 90%;
                left: 10px;
                top: 10px;
                height: 70px;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #338181;
                box-shadow: 0px 0px 20px black;
            }
            .headfull{
                position: relative;
                width: 100%;
                left: 10px;
                top: 5px;
                height: 60px;
            }
            .full:hover{
                cursor: pointer;
            }
            .left{
                width: 30%;
                height: 100%;
                float: left;
                padding-left: 15px;
            }
            .right{
                width: 70%;
                height: 100%;
                float: left;
            }
            #chatbox{
                width: 100%;
                height: 63vh;
                box-shadow: 0px 0px 5px #4b9dbc;
            }
            #chatheader{
                width: 100%;
                height: 15%;
                background-color: cornflowerblue;
            }
            #displaychats{
                width: 100%;
                height: 68%;
                overflow-y: scroll;
                background: url("images/chat.jpg");
            }
            #sendmsg{
                width: 100%;
                height: 15%;
            }
            #recents{
                width: 100%;
                max-height: 60px;
                white-space: nowrap; 
                overflow-x: auto;
            }
            .block{
                display: inline-block;
                width: 60px;
                max-width: 150px;
                height: 60px;
                padding-left: 40px;
                padding-right: 30px;
                z-index: 9999;
            }
            .reschatpicsout{
                width: 60px;
                height: 60px;
                position: relative;
                left: -20px;
            }
            .reschatpics{
                width: 50px;
                height: 50px;
                border-radius: 50%;
                box-shadow: 0px 5px 10px #363535;
            }
            .chatcount{
                width: 15px;
                height: 15px;
                border-radius: 50%;
                color: white;
                text-align: center;
                position: absolute;
                font-size: 12px;
                font-weight: bold;
                top: 0;
                right: 0;
                background-color: green;
            }
            .chatname{
                color: white;
            }
/*
            #chatswindow{
                width: 100%;
                height: 80vh;
                overflow-y: scroll;
            }
*/
            
            .chatcontainer {
                background-color: rgba(72, 110, 149, 0.5);
                border-radius: 5px;
                padding: 10px;
                margin: 10px;
                word-wrap: break-word;
            }

            .darker {
                background-color: rgba(46, 73, 101, 0.5);
            }
            
            .chatcontainer img {
                float: left;
                max-width: 30px;
                width: 100%;
                margin-right: 20px;
                border-radius: 50%;
            }

            .chatcontainer img.imgright {
                float: right;
                margin-left: 20px;
                margin-right:0;
            }

            .time-right {
                position: relative;
                top: -10px;
                float: right;
                color: #aaa;
            }

            .time-left {
                position: relative;
                top: -10px;
                float: left;
                color: #999;
            }
            .error{
                background-color: #dd2121;
                padding: 10px 10px 10px 10px;
                font-variant: small-caps;
                text-align: center;
                font-weight:bold;
                border-radius:4px;
                box-shadow: 3px 0px 20px red;
                transition: box-shadow 0.5s;
                position: relative;
                top: 10px;
            }
            
        </style>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
                // code to disable right click in browser   
                
//                $(document).bind("contextmenu",function(e) {
//                    e.preventDefault();
//                });
                var id = <?php echo $_SESSION['userid']; ?>;
                $.ajax({
                    url:"disindvtt.php",
                    method:"post",
                    data:{id:id},
                    success:function(q){
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
                var ismsgses = "<?php echo $_SESSION['msgto']; ?>";
                if(ismsgses == "none")
                    $(".msgbox").attr("disabled",true);
                $.ajax({
                    url:"loadnotif.php",
                    method:"post",
                    data:{fid:id},
                    success:function(n){
                        $("#notifications").html(n);
                    }
                });
                $.ajax({
                    url:"loadmycomp.php",
                    method:"post",
                    data:{fid:id},
                    success:function(n){
                        $("#compl").html(n);
                    }
                });
                $.ajax({
                    url:"search.php",
                    method:"post",
                    data:{name:name,id:id},
                    success:function(e){
                        $("#people").html(e);
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
                var s = null;
                var t = 500;
                var i=1;
                var flag = true;
                var a = setInterval(checkBlink,1000);
                function checkBlink(){
                    if(flag)
                    {
                        $.ajax({
                            url:"blink.php",
                            method:"post",
                            success:function(e){
                                if(e)
                                {
                                    s = setInterval(blink,t);
                                    flag = false;
                                }
                            }
                        });
                    }
                }
                function blink(){
                    if(i%2 == 0)
                        $("#chat").css("background-color","red");
                    else
                       $("#chat").css("background-color","#38ccb0");
                    i++;
                }
                $("#chat").click(function(){
                    clearInterval(s);
                    $("#chat").css("background-color","#38ccb0");
                });
                $("#chatclose").click(function(){
                   flag = true; 
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
                    $("#complaints").width("0px");
                    $("#addnotif").width("0px");
                    $("#chats").width("0px"); 
                    $("#notif").width("100vw");
                });
                $(document).on({
                    mouseenter: function(){
                        $(this).find("div").fadeIn();
                    },
                    mouseleave: function(){
                        $(this).find("div").fadeOut();
                    }
                }, '[class^=notifi]');
                $("#close").click(function(){
                    $("#notif").width("0px");
                });
                $("#pntf").click(function(){
                    $("#notif").width("0px");
                    $("#complaints").width("0px");
                    $("#chats").width("0px"); 
                    $("#addnotif").width("100%");
                });
                $("#chat").click(function(){
                    $("#notif").width("0px");
                    $("#complaints").width("0px");
                    $("#addnotif").width("0px");
                    $("#chats").width("100%"); 
                });
                $("#comp").click(function(){
                    var id = <?php echo $_SESSION['userid']; ?>;
                    $.ajax({
                        url:"loadmycomp.php",
                        method:"post",
                        data:{fid:id},
                        success:function(n){
                            $("#compl").html(n);
                            $("#notif").width("0px");
                            $("#addnotif").width("0px");
                            $("#chats").width("0px"); 
                            $("#complaints").width("100vw");
                        }
                    });
                });
                $("#chatclose").click(function(){
                    $("#chats").width("0px"); 
                });
                $("#aclose").click(function(){
                    $("#addnotif").width("0px");
                });
                $("#cclose").click(function(){
                    $("#complaints").width("0px");
                });
                $(document).on('click','[class^=delnotfbt]',function(){
                    var nid = $(this).attr("id");
                    var id = <?php echo $_SESSION['userid']; ?>;
                    $.ajax({
                        url:"delmynotf.php",
                        method:"post",
                        data:{nid:nid},
                        success:function(){
                            $.ajax({
                                url:"loadmynotif.php",
                                method:"post",
                                data:{fid:id},
                                success:function(n){
                                    $("#mynotifications").html(n);
                                }
                            });
                        }
                    });
                });
                $(document).on('click','[class^=delcompbt]',function(){
                    var nid = $(this).attr("id");
                    var id = <?php echo $_SESSION['userid']; ?>;
                    $.ajax({
                        url:"delmycomp.php",
                        method:"post",
                        data:{nid:nid},
                        success:function(){
                            $.ajax({
                                url:"loadmycomp.php",
                                method:"post",
                                data:{fid:id},
                                success:function(n){
                                    $("#compl").html(n);
                                }
                            });
                        }
                    });
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
                $("#sbox").keyup(function(){
                    var name = $("#sbox").val();
                    var id = <?php echo $_SESSION['userid']; ?>;
                    if(name[0] == " ")
                    {
                        name="";
                        $("#people").html("<div class='error'>please remove the whitespaces before name</div><br>");
                        $.ajax({
                            url:"search.php",
                            method:"post",
                            data:{name:name,id:id},
                            success:function(e){
                                $("#people").append(e);
                            }
                        });
                    }
                    else
                    {
                        $.ajax({
                            url:"search.php",
                            method:"post",
                            data:{name:name,id:id},
                            success:function(e){
                                $("#people").html(e);
                            }
                        });
                    }
                });
                $(document).on('click','[class^=full]',function(){
                    var tid = $(this).attr("id");
                    var toid = "t"+tid;
                    var fid = <?php echo $_SESSION['userid']; ?>;
                    $.ajax({
                        url:"chatwithheader.php",
                        method:"post",
                        data:{tid:tid},
                        success:function(e){
                            $("#chatheader").html(e);
                        }
                    });
                    $.ajax({
                        url:"setchatsess.php",
                        method:"post",
                        data:{tid:tid},
                        success:function(){
                            $(".msgbox").attr("id",toid);
                            $(".msgbox").attr("disabled",false);
                            $("#displaychats").load("loadchat.php",scrolldown);
                        }
                    });
                });
                setInterval(currchat,1000);
                function currchat(){
                    $.ajax({
                        url:"loadcurrchat.php",
                        method:"post",
                        success:function(e){
                            if(e != "yes")
                            {
                                $("#displaychats").append(e);
                            }
                        }
                    });
                }
                $(document).on('click','[class^=block]',function(){
                    var tid = $(this).attr("id");
                    var toid = "f"+tid;
                    var fid = <?php echo $_SESSION['userid']; ?>;
                    $.ajax({
                        url:"chatwithheader.php",
                        method:"post",
                        data:{tid:tid},
                        success:function(e){
                            $("#chatheader").html(e);
                        }
                    });
                    $.ajax({
                        url:"setchatsess.php",
                        method:"post",
                        data:{tid:tid},
                        success:function(){
                            $(".msgbox").attr("id",toid);
                            $(".msgbox").attr("disabled",false);
                            $("#displaychats").load("loadchat.php",scrolldown);
                        }
                    });
                });
                function scrolldown(){
                    $('#displaychats').scrollTop($('#displaychats')[0].scrollHeight);
                }
                setInterval(checkmsg,1000);
                function checkmsg(){
                    $("#recents").load("checknewmsg.php");
                }
                $(".msgbox").keyup(function(e){
                    if(e.keyCode == 13)
                    {
                        var msg = $(".msgbox").val();
                        var fid = <?php echo $_SESSION['userid']; ?>;
                        var id = $(".msgbox").attr("id");
                        var l = id.length;
                        var tid = id.slice(1,l);
                        $.ajax({
                            url:"sendmsg.php",
                            method:"post",
                            data:{msg:msg,fid:fid,tid:tid},
                            success:function(e){
                                $("#displaychats").append(e);
                                $(".msgbox").val("");
                            }
                        });
                    }
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
            <a id="comp">my complaints<img src="images/mycomp.png" style="float:right; height:35px;"></a>
            <a id="chat">chats<img src="images/chat.png" style="float:right; height:35px;"></a>
        </div>
        <div id="notif">
            <center><div id="close">close</div><br></center>
            <div id="notifications" class="not">

            </div>
        </div>
        <div id="complaints">
            <center><div id="cclose">close</div><br></center>
            <div id="compl" class="not">

            </div>
        </div>
        <center>
            <div id="addnotif">
                <div id="aclose">close</div><br>
                <div id="outer">
                    <div id="top">
                        <div class="inner1" id="newbt">post new notification</div><br>
                        <div id="postnotification">
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
                    </div><br>
                    <div id="bottom">
                        <div class="inner1" id="oldbt">my old posts</div>
                        <div id="mynotifications"></div>
                    </div>
                </div>
            </div>
        </center>
        <div id="chats"><br>
            <center><div id="chatclose">close</div><br></center>
            <div class="container">
                <div class="row" id="chatswindow">
                    <div class="col-sm-4">
                        <input type="text" id="sbox" class="form-control" placeholder="Search.."><br>
                        <div id="people">
                            
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div id="recents">
                            
                        </div><br>
                        <div id="chatbox">
                            <div id="chatheader">
                            
                            </div>
                            <div id="displaychats">
                                <div style="position:relative; top:45%;"><center><h3>click on chats at left to start a conversation</h3></center></div>
                            </div>
                            <div id="sendmsg"><br>
                                <center><input type="text" class="msgbox form-control" id="" placeholder="Enter your message here...."></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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