<?php
    session_start();
    if(!isset($_SESSION["login"]))
    {
        $url = "index.php";
        header('Location:'.$url);
    }
    if($_SESSION["role"] == 'FACULTY')
        header('Location:faculty.php');
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
                text-transform: uppercase;
                font-weight: bold;
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
            .pop:hover, .fixsub:hover{
                background-color:#bfc9ca;
                cursor: pointer;
                box-shadow: 0px 0px 10px #ffffff;
            }
            .navbar .navbar-nav > .active a{
                color: #2e4053;
                background: white;
                box-shadow: 0px 0px 10px white;
                border-radius: 3px;
            }
            #createlink, #concreatelink, #deletelink{
                text-decoration: none;
                padding:10px 10px 10px 10px; 
                background-color: #229954; 
                width:300px; 
                font-variant: small-caps; 
                font-weight:bold; 
                font-size:18px; 
                border-radius:5px;
                color: white;
            }
            #createlink:hover, #concreatelink:hover, #deletelink:hover{
                cursor: pointer;
                background-color: #2e4053;
                color: white;
                box-shadow: 0px 0px 10px white;
            }
            span{
                font-weight: bolder; 
                text-transform:uppercase;
            }
            input{
                text-align: center;
            }
            #facform, #subform{
                width: 60%;
                padding-top: 100px;
                z-index: 999px;
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
            .control-label{
                text-align: center; 
                font-weight: bold; 
                text-transform:uppercase;
            }
            .subj:hover{
                background:white;
                color: #2e4053;
                cursor: pointer;
            }
            #loader {
                border: 16px solid #f3f3f3;
                border-radius: 50%;
                border-top: 16px solid teal;
                border-bottom: 16px solid teal;
                width: 120px;
                height: 120px;
                -webkit-animation: spin 2s linear infinite;
                animation: spin 2s linear infinite;
            }

            @-webkit-keyframes spin {
                0% { -webkit-transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                margin: auto;
                text-align: center;
                font-weight: bold;
                text-transform: uppercase;
                font-variant: small-caps;
                font-size: 16px;
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
            .white-tooltip + .tooltip > .tooltip-inner {
                background-color: white;
                color:black;
                font-size: 15px;
            }
            .tooltip.bottom .tooltip-arrow{
                border-bottom-color: #ffffff;
            }
            .notifi {
                background-color: #34495e;
                border-radius: 5px;
                min-height: 85px;
                width: 50%;
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
            .ntfmsg{
                background-color: #3f5e7e;
                border-radius: 10px;
                padding: 5px 5px 5px 5px;
            }
            .cbt{
                padding: 10px 10px 10px 10px;
                width: 88px;
                background-color: #26aab5;
                text-transform: uppercase;
                font-weight: bold;
                color: white;
                border-radius: 5px;
                cursor: pointer;
            }
            .cbt:hover{
                background-color: #118e98;
                box-shadow: 0px 0px 10px white;
            }
        </style>
        <script>
            $(document).ready(function(){
                $("#loaderdiv").hide();
                $("#loaderdiv1").hide();
                $('[data-toggle="tooltip"]').tooltip();
                $("#addfaculty").submit(function(e){
                    var uid = $("#adduid").val();
                    var pwd = $("#addpassword").val();
                    var name = $("#addname").val();
                    var phone = $("#addphone").val();
                    var dept = $("#adddept").val();
                    var role = $("#addrole").val();
                    $.ajax({
                        url:"addfac.php",
                        method:"post",
                        data:{uid:uid,pwd:pwd,name:name,phone:phone,dept:dept,role:role},
                        success:function(result){
                            alert(result);
                        }
                    });
                    e.preventDefault();
                });
                $(document).on('click','[class^=cbt]',function(){
                    var id = $(this).attr("id");
                    $.ajax({
                        url:"verifycomp.php",
                        method:"post",
                        data:{id:id},
                        success:function(q){
                            if(q)
                            {
                                alert("verified successfully");
                                $("#complaints").load("loadcomplaints.php"); 
                            }
                            else
                                alert("something went wrong");
                        }
                    });
                });
                $("#delfaculty").submit(function(e){
                    var id1 = document.getElementById("deluid1").value;
                    var id2 = document.getElementById("deluid2").value;
                    if(validate(id1,id2)){
                        $.ajax({
                            url:"delfac.php",
                            method:"post",
                            data:{uid:id1},
                            success:function(result){
                                alert(result);
                            }
                        });
                    }
                    e.preventDefault();
                });
                $("#addsubject").submit(function(e){
                    var sid = $("#addsid").val();
                    var name = $("#addsname").val();
                    var year = $("#addsyear").val();
                    var sem = $("#addssem").val();
                    var type = $("#addstype").val();
                    var lhpw = $("#addslhpw").val();
                        $.ajax({
                            url:"addsub.php",
                            method:"post",
                            data:{addsid:sid,addsname:name,addsyear:year,addssem:sem,addstype:type,addslhpw:lhpw},
                            success:function(result){
                                alert(result);
                            }
                        });
                    e.preventDefault();
                });
                $("#delsubject").submit(function(e){
                    var id1 = document.getElementById("delsid1").value;
                    var id2 = document.getElementById("delsid2").value;
                    if(validateSub(id1,id2)){
                        $.ajax({
                            url:"delsub.php",
                            method:"post",
                            data:{sid:id1},
                            success:function(result){
                                alert(result);
                            }
                        });
                    }
                    e.preventDefault();
                });
                $("#modfacsubyear").change(function(){
                    var year = $("#modfacsubyear").val();
                    if(year==2)
                    {
                        $(".sect").removeAttr("disabled");
                    }
                    if(year==3)
                    {
                        $(".sect").removeAttr("disabled");
                        $("#f").attr("disabled", true);
                        $("#g").attr("disabled", true);
                    }
                    if(year==4)
                    {
                        $(".sect").removeAttr("disabled");
                        $("#c").attr("disabled", true);
                        $("#d").attr("disabled", true);
                        $("#e").attr("disabled", true);
                        $("#f").attr("disabled", true);
                        $("#g").attr("disabled", true);
                    }
                });
                $("#modfacsubyear").change(function(){
                    $('.sect').prop('checked', false);
                    var id = $("#modfacid").val();
                    var year = $("#modfacsubyear").val();
                    var sem = $("#modfacsubsem").val();
                    if(id!="" || sem!=null)
                    {
                        $.ajax({
                            url:"loadaddsub.php",
                            method:"post",
                            data:{year:year,sem:sem},
                            success:function(result){
                                var len = result.length;
                                var r = result.slice(2,len-1);
                                var re_arr = r.split(",");
                                var l = re_arr.length;                
                                $("#modfacsub").empty();
                                $("#modfacsub").append("<option selected disabled>select subject</option>");
                                if(!re_arr[0]=="")
                                {
                                    for(var i=0; i<l; i++){
                                        $("#modfacsub").append("<option>"+re_arr[i]+"</option>");
                                    }
                                }
                            }
                        });
                    }
                    
                });
                $("#modfacsubsem").change(function(){
                    var id = $("#modfacid").val();
                    var year = $("#modfacsubyear").val();
                    var sem = $("#modfacsubsem").val();
                    if(id!="" || sem!=null)
                    {
                        $.ajax({
                            url:"loadaddsub.php",
                            method:"post",
                            data:{year:year,sem:sem},
                            success:function(result){
                                var len = result.length;
                                var r = result.slice(2,len-1);
                                var re_arr = r.split(",");
                                var l = re_arr.length;                
                                $("#modfacsub").empty();
                                $("#modfacsub").append("<option selected disabled>select subject</option>");
                                if(!re_arr[0]=="")
                                {
                                    for(var i=0; i<l; i++){
                                        $("#modfacsub").append("<option>"+re_arr[i]+"</option>");
                                    }
                                }
                            }
                        });
                    }
                    
                });
                $("#modfacultysub").submit(function(e){
                    var id = $("#modfacid").val();
                    var year = $("#modfacsubyear").val();
                    var section = [];
                    $.each($("input[name='sec']:checked"), function(){            
                        section.push($(this).val());
                    });
                    var sec = JSON.stringify(section);
                    var sub = $("#modfacsub").val();
                    $.ajax({
                        url:"modfacsub.php",
                        method:"post",
                        data:{id:id,year:year,sec:sec,sub:sub},
                        success:function(result){
                            alert(result);
                            $('.sect').prop('checked', false);
                        }
                    });
                    e.preventDefault();
                });
                $("#modfacdelid").change(function(){
                    var id = $("#modfacdelid").val();
                    if(id=="")
                        alert("Please enter the id");
                    else
                    {
                        $.ajax({
                            url:"loaddelsub.php",
                            method:"post",
                            data:{id:id},
                            success:function(result){
                                $("#modfacdelsub").empty();
                                $("#modfacdelsub").append("<option selected disabled>select subject</option>");
                                if(result == "faculty doesn't exist")
                                    alert("faculty doesn't exist");
                                else
                                {
                                    var len = result.length;
                                    var r = result.slice(2,len-1);
                                    var re_arr = r.split(",");
                                    var l = re_arr.length;
                                    if(!re_arr[0]=="")
                                    {
                                        for(var i=0; i<l; i=i+3){
                                            $("#modfacdelsub").append("<option>"+re_arr[i]+"&nbsp;("+re_arr[i+1]+"&nbsp;"+re_arr[i+2]+")"+"</option>");
                                        }
                                    }
                                }
                            }
                        });
                    }
                });
                $("#modfacultydel").submit(function(e){
                    var id = $("#modfacdelid").val();
                    var s = $("#modfacdelsub").val();
                    var pos = s.indexOf("\(");
                    var sub = s.slice(0,pos-1);
                    var year = s.slice(pos+1,pos+2);
                    var sec = s.slice(pos+3,pos+4);
                    $.ajax({
                        url:"delfacsub.php",
                        method:"post",
                        data:{id:id,sub:sub,year:year,sec:sec},
                        success:function(result){
                            alert(result);
                            $("#modfacdelid").val("");
                            $("#modfacdelsub").empty();
                            $("#modfacdelsub").append("<option selected disabled>select subject</option>");
                        }
                    });
                    e.preventDefault();
                });
                $("#modfacup").submit(function(e){
                    var id = $("#modfacupid").val();
                    if(!isNaN(id)){
                    $.ajax({
                        url:"getfac.php",
                        method:"post",
                        data:{id:id},
                        dataType:"json",
                        success:function(q){
                            if(Object.keys(q).length==1)
                                alert("sorry..! user doesn't exist");
                            else
                            {
                                $("#updatefac").modal('show');
                                $("#updatefacid").val(id);
                                $("#updatefacname").val(q.name);
                                $("#updatefacphn").val(q.phone);
                                $("#updatefacdept").val(q.dept);
                                $("#updatefacrole").val(q.role);
                            }
                        }
                    });
                    }
                    else
                        alert("Enter a valid id");
                    e.preventDefault();
                });
                $("#modfacupdate").submit(function(e){
                    var id = $("#updatefacid").val();
                    var name = $("#updatefacname").val();
                    var phone = $("#updatefacphn").val();
                    var dept = $("#updatefacdept").val();
                    var role = $("#updatefacrole").val();
                    $.ajax({
                        url:"updatefac.php",
                        method:"post",
                        data:{id:id,name:name,phone:phone,dept:dept,role:role},
                        success:function(q){
                            alert(q);
                            $("#updatefac").modal('hide');
                        }
                    });
                    e.preventDefault();
                });
                $("#modsubup").submit(function(e){
                    var id = $("#modsubupid").val();
                    $.ajax({
                        url:"getsub.php",
                        method:"post",
                        data:{id:id},
                        dataType:"json",
                        success:function(q){
                            if(Object.keys(q).length==1)
                                alert("sorry..! subject doesn't exist");
                            else
                            {
                                $("#updatesub").modal('show');
                                $("#updatesubid").val(id);
                                $("#updatesubname").val(q.sname);
                                $("#updatesubtype").val(q.type);
                                $("#updatesubyear").val(q.year);
                                $("#updatesubsem").val(q.sem);
                                $("#updatesublhpw").val(q.lhpw);
                            }
                        }
                    });
                    e.preventDefault();
                });
                $("#updatesubject").submit(function(e){
                    var id = $("#updatesubid").val();
                    var name = $("#updatesubname").val();
                    var type = $("#updatesubtype").val();
                    var year = $("#updatesubyear").val();
                    var sem = $("#updatesubsem").val();
                    var lhpw = $("#updatesublhpw").val();
                    $.ajax({
                        url:"updatesub.php",
                        method:"post",
                        data:{id:id,name:name,type:type,year:year,sem:sem,lhpw:lhpw},
                        success:function(q){
                            alert(q);
                            $("#updatesub").modal('hide');
                        }
                    });
                    e.preventDefault();
                });
                $("#fixslotsbt").click(function(){
                    $("#fixslots").modal('hide');
                    $("#fixslotsdisplay").load("loadfixslots.php");
                });
                $(document).on('click','[class^=fixsub]',function(){
                    var id = $(this).attr("id");
                    var year = id.slice(0,1);
                    var sec = id.slice(1,2);
                    $.ajax({
                        url:"loadfixsub.php",
                        method:"post",
                        data:{loc:id,year:year},
                        success:function(q){
                            $("#fixsub").modal('show');
                            $("#loadsubarea").html(q);
                        }
                    });
                });
                $(document).on('click','[class^=subj]',function(){
                    var id = $(this).attr("id");
                    var year = id.slice(0,1);
                    var sec = id.slice(1,2);
                    var day = id.slice(2,3);
                    var hour = id.slice(3,4);
                    var id1 = year+sec+day+(--hour);
                    var id0 = year+sec+day+(--hour);
                    hour++;
                    hour++;
                    pre0 = $("#"+id0).text();
                    pre1 = $("#"+id1).text();
//                    alert(pre0);
//                    alert(pre1);
                    var pre = $("#"+id).text();
//                    alert(pre);
                    var sub = $(this).text();
                    if(sub == "remove subject")
                    {
                        $.ajax({
                            url:"rmvsub.php",
                            method:"post",
                            data:{year:year,sec:sec,day:day,hour:hour,pre:pre,pre0:pre0,pre1:pre1},
                            success:function(q){
                                $("#fixslotsdisplay").load("loadfixslots.php");
                                $("#fixsub").modal('hide');
                            }
                        });
                    }
                    else if(pre != sub){
                        $.ajax({
                            url:"setsub.php",
                            method:"post",
                            data:{year:year,sec:sec,day:day,hour:hour,sub:sub,pre:pre},
                            success:function(q){
                                if(q == "nope")
                                    alert("sorry..! max number of hours added");
                                else if(q == "no")
                                    alert("sorry..! max number of hours added per day");
                                else if(q == "nsp")
                                    alert("sorry..! lab cannot be inserted here");
                                else if(q == "cant")
                                    alert("sorry..! remove the previous subject");
                                $("#fixslotsdisplay").load("loadfixslots.php");
                                $("#fixsub").modal('hide');
                            }
                        });
                    }
                    else
                        alert("same subject");
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
                $("#combt").click(function(){
                   $("#complaints").load("loadcomplaints.php"); 
                });
                $("#deletelink").click(function(){
                    var x = confirm("By doing this your timetable will be losy permanently. Do you really want to continue.?");
                    if(x)
                    {
                        $("#loaderdiv1").show();
                        $.ajax({
                            url:"deletett.php",
                            method:"post",
                            success:function(q){
                                if(q){
                                    alert("deleted successfully");
                                    $("#fixslotsdisplay").html("<div style='padding-top:15%;'><center><span data-toggle='modal' data-target='#fixslots' id='createlink'>click here to create timetable</span></center></div>");
                                }  
                                else
                                    alert("something went wrong");
                            },
                            complete:function(q){
                                $("#loaderdiv1").hide();
                            }
                        });
                    }
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
//                    $("#tt").show();
                    e.preventDefault();
                });
                $(document).on('click','[id^=concreatelink]',function(){
                    $.ajax({
                        url:"checkfix.php",
                        method:"post",
                        success:function(q){
                            if(q)
                            {
                                $("#fixslotsdisplay").hide();
                                $("#loaderdiv").show();
                                $.ajax({
                                    url:"fix.php",
                                    method:"post",
                                    success:function(q){
                                        $("#fixslotsdisplay").load("loadfixslots.php");
                                    },
                                    complete:function(q){
                                        $("#loaderdiv").hide();
                                        $("#fixslotsdisplay").show();
                                    }
                                });
                            }
                            else
                                alert("please fill all the subjects");
                        }
                    });
                });
            });
            function validate(id1,id2)
            {
                
                if(isNaN(id1) || isNaN(id2))
                {
                    alert("Id must not contain charecters");
                    return false;
                }
                else if(id1==id2)
                    return true;
                else
                {
                    alert("Please fill same id in both the fields");
                    return false;
                }
            }
            function validateSub(id1,id2)
            {
                if(id1==id2)
                    return true;
                else
                {
                    alert("Please fill same id in both the fields");
                    return false;
                }
            }
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
<!--                <li><a data-toggle="tab" href="#home">home</a></li>-->
                <li class="active"><a data-toggle="tab" href="#faculty">faculty</a></li>
                <li><a data-toggle="tab" href="#subject">subject</a></li>
                <li><a data-toggle="tab" href="#timetable">timetable</a></li>
                <li><a data-toggle="tab" id="combt" href="#complaints">complaints</a></li>
                <li><a data-toggle="tooltip" data-placement="bottom" title="click to logout" class="white-tooltip" href="logout.php"><span class="glyphicon glyphicon-user"></span><?php echo " ".$_SESSION["username"]; ?> </a></li>
              </ul>
            </div>
          </div>
        </nav>
        
        <!--NAVIGATION BAR ENDS -->
        <?php
            $con = mysqli_connect("localhost","root","","lineup");
            $fid = $_SESSION['userid'];
            $q = "select fname,img from faculty where fid = '$fid'";
            $e = mysqli_query($con,$q);
            $r = mysqli_fetch_assoc($e);
            $GLOBALS['name'] = $r['fname'];
            $GLOBALS['img'] = $r['img'];
        ?>
        <div class="tab-content container-fluid">
<!--
            <div id="home" class="tab-pane fade in active" style="padding-top: 70px;">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <img src="images/<?php echo $img ?>" alt="fac image" style="width:100%">
                            <p class="name"><?php echo $name ?></p>
                            <p class="title">Asst. Professor</p> 
                            <p>Vignan's University</p>
                        </div>
                    </div>
                    <div class="col-sm-9">
                    
                    </div>
                </div>
            </div>
-->
            <div id="faculty" class="container-fluid tab-pane fade  in active" style="padding-top: 70px;">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#add">ADD</a></li>
                    <li><a data-toggle="tab" href="#delete">DELETE</a></li>
                    <li><a data-toggle="tab" href="#modify">MODIFY</a></li>
                </ul>

            <div class="tab-content">
                <div id="add" class="tab-pane fade in active">
                    <div class="row">
                    <center>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                        <div id="facform">
                            <form id="addfaculty" class="form-horizontal" method="post">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" id="adduid" placeholder="Enter user id" name="adduid" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" class="form-control" id="addpassword" placeholder="Enter password" name="addpassword" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                                    <input type="text" class="form-control" id="addname" placeholder="Enter name" name="addname" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <input type="text" class="form-control" id="addphone" placeholder="Enter phone number" name="addphone" >
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">Department</span>
                                    <select class="form-control" id="adddept" name="adddept" required>
                                        <option selected disabled>select department</option>
                                        <option>CSE</option>
                                        <option>ECE</option>
                                        <option>EEE</option>
                                        <option>MECH</option>
                                        <option>IT</option>
                                        <option>BIOTECH</option>
                                        <option>CIVIL</option>
                                        <option>AGRICULTURE</option>
                                    </select>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">role</span>
                                    <select class="form-control" id="addrole" name="addrole" required>
                                        <option selected disabled>select Role</option>
                                        <option>ADMIN</option>
                                        <option>FACULTY</option>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">        
                                    <input type="submit" value="submit" id="addfacdetsubmit" class="btn btn-default">
                                </div>
                            </form>
                        </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </center>
                    </div>
                </div>
                <div id="delete" class="tab-pane fade">
                    <div class="row">
                    <center>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                        <div id="facform">
                            <form id="delfaculty" class="form-horizontal" method="post">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" id="deluid1" placeholder="Enter user id" name="deluid1" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" id="deluid2" placeholder="Re-enter user id" name="deluid2" required>
                                </div>
                                <br>
                                <div class="form-group">        
                                    <input type="submit" value="submit" id="delfacdetsubmit" class="btn btn-default">
                                </div>
                            </form>
                        </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </center>
                    </div>
                </div>
                <div id="modify" class="tab-pane fade">
                    <div class="row">
                        <center>
                            <div class="col-sm-4" style="height:100%;">
                                <div id="facform">
                                    <div class="heading">
                                        <p>add subject</p>
                                    </div>
                                    <br>
                                    <form id="modfacultysub" class="form-horizontal" method="post">
                                        <div class="input-group">
                                            <span class="input-group-addon">user id</span>
                                            <input type="text" class="form-control" id="modfacid" placeholder="Enter user id" name="modfacid" required>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon">year</span>
                                            <select class="form-control" id="modfacsubyear" name="modfacsubyear" required>
                                                <option selected disabled>select year</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon">sem</span>
                                            <select class="form-control" id="modfacsubsem" name="modfacsubsem" required>
                                                <option selected disabled>select semester</option>
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <center><span>section</span></center><br />
                                            <div class="row">
                                            <div class="col-sm-3">
                                            <label><input type="checkbox" name="sec" id="a" class="sect" value="A" disabled>A</label>
                                            <label><input type="checkbox" name="sec" id="b" class="sect" value="B" disabled>B</label>
                                            </div>
                                            <div class="col-sm-3">
                                            <label><input type="checkbox" name="sec" id="c" class="sect" value="C" disabled>C</label>
                                            <label><input type="checkbox" name="sec" id="d" class="sect" value="D" disabled>D</label>
                                            </div>
                                            <div class="col-sm-3">
                                            <label><input type="checkbox" name="sec" id="e" class="sect" value="E" disabled>E</label>
                                            <label><input type="checkbox" name="sec" id="f" class="sect" value="F" disabled>F</label>
                                            </div>
                                            <div class="col-sm-3">
                                            <label><input type="checkbox" name="sec" id="g" class="sect" value="G" disabled>G</label>
                                            <label><input type="checkbox" name="sec" id="any" class="sect" value="ANY" disabled>ANY</label>
                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon">subject</span>
                                            <select class="form-control" id="modfacsub" name="modfacsub" required>
                                                <option selected disabled>select subject</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-group">        
                                            <button type="submit" id="modfacsubsubmit" class="btn btn-default">ADD</button>
                                        </div>
                                    </form>
                                </div> 
                            </div>
                            <div class="col-sm-4" style="height:100%;">
                                <div id="facform">
                                    <div class="heading">
                                        <p>delete subject</p>
                                    </div>
                                    <br>
                                    <form id="modfacultydel" class="form-horizontal" method="post">
                                        <div class="input-group">
                                            <span class="input-group-addon">user id</span>
                                            <input type="text" class="form-control" id="modfacdelid" placeholder="Enter user id" name="modfacdelid" required>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon">subject</span>
                                            <select class="form-control" id="modfacdelsub" name="modfacdelsub" required>
                                                <option selected disabled>select subject</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-group">        
                                            <button type="submit" id="modfacsubdelsubmit" class="btn btn-default">DELETE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-4" style="height:100%;">
                                <div id="facform">
                                    <div class="heading">
                                        <p>update details</p>
                                    </div>
                                    <br>
                                    <form name="modfacup" id="modfacup" class="form-horizontal">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="text" class="form-control" id="modfacupid" placeholder="Enter user id" name="modfacupid" required>
                                        </div>
                                        <br>
                                        <div class="form-group">        
                                            <button type="submit" name="modfacupsubmit" class="btn btn-default">SUBMIT</button>
                                        </div>  
                                    </form>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
              </div>
            </div>
            
            
            
            
            
            
            <div id="subject" class="container-fluid tab-pane fade" style="padding-top: 70px;">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#sadd">ADD</a></li>
                    <li><a data-toggle="tab" href="#sdelete">DELETE</a></li>
                    <li><a data-toggle="tab" href="#smodify">MODIFY</a></li>
                </ul>

            <div class="tab-content">
                <div id="sadd" class="tab-pane fade in active">
                    <div class="row">
                    <center>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                        <div id="subform">
                            <form id="addsubject" class="form-horizontal" method="post">
                                <div class="input-group">
                                    <span class="input-group-addon">id</span>
                                    <input type="text" class="form-control" id="addsid" placeholder="Enter subject id" name="addsid" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">name</span>
                                    <input type="text" class="form-control" id="addsname" placeholder="Enter subject name" name="addsname" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">year</span>
                                    <select class="form-control" id="addsyear" name="addsyear" required>
                                        <option selected disabled>select year</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">sem</span>
                                    <select class="form-control" id="addssem" name="addssem" required>
                                        <option selected disabled>select semester</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">type</span>
                                    <select class="form-control" id="addstype" name="addstype" required>
                                        <option selected disabled>select type</option>
                                        <option>THEORY</option>
                                        <option>LAB</option>
                                        <option>TLAB</option>
                                        <option>MINOR</option>
                                        <option>ELECTIVE</option>
                                        <option>OPEN ELECTIVE</option>
                                        <option>DEPT ELECTIVE</option>
                                        <option>SEMINAR</option>
                                    </select>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">hours</span>
                                    <input type="text" class="form-control" id="addslhpw" placeholder="Number of hours/week" name="addslhpw" required>
                                </div>
                                <br>
                                <div class="form-group">        
                                    <button type="submit" id="addsubdetsubmit" class="btn btn-default">Submit</button>
                                </div>
                            </form>
                        </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </center>
                    </div>
                </div>
                <div id="sdelete" class="tab-pane fade">
                    <div class="row">
                    <center>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                        <div id="subform">
                            <form id="delsubject" class="form-horizontal" method="post">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" id="delsid1" placeholder="Enter subject id" name="delsid1" required>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" id="delsid2" placeholder="Re-enter subject id" name="delsid2" required>
                                </div>
                                <br>
                                <div class="form-group">        
                                    <input type="submit" id="delsubdetsubmit" class="btn btn-default">
                                </div>
                            </form>
                        </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </center>
                    </div>
                </div>
                <div id="smodify" class="tab-pane fade">
                    <div class="row">
                        <center>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4" style="height:100%;">
                                <div id="subform">
                                    <form name="modsubup" id="modsubup" class="form-horizontal" method="post">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="text" class="form-control" id="modsubupid" placeholder="Enter subject id" name="modsubupid" required>
                                        </div>
                                        <br>
                                        <div class="form-group">        
                                            <button type="submit" name="modsubupsubmit" class="btn btn-default">SUBMIT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-4"></div>
                        </center>
                    </div>
                </div>
              </div>
            </div>
            
<!--    code to display time table    -->
            
            <div id="timetable" class="tab-pane fade" style="padding-top: 70px;">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#display">DISPLAY</a></li>
                    <li><a data-toggle="tab" href="#create">CREATE</a></li>
                    <li><a data-toggle="tab" href="#deletett">DELETE</a></li>
                </ul>
                <div class="tab-content">
                    <div id="display" class="tab-pane fade in active" style="padding-top:100px;">
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
                        <div id="tt" class="table-responsive" style="padding-bottom:100px;">

                        </div>
                    </div>
                    <div id="create" class="tab-pane fade">
                        <div class="container-fluid" id="loaderdiv" style="padding-top: 150px;">
                            <center><div id="loader"></div></center>
                        </div>
                        <div class='container-fluid' id="fixslotsdisplay">
                            <div style="padding-top:15%;">
                            <center><span data-toggle="modal" data-target="#fixslots" id="createlink">click here to create timetable</span></center>
                            </div>
                        </div>
                    </div>
                    <div id="deletett" class="tab-pane fade">
                        <div class="container-fluid" id="loaderdiv1" style="padding-top: 150px;">
                            <center><div id="loader"></div></center>
                        </div>
                        <div class="container-fluid">
                            <div style="padding-top:15%;">
                                <center><div id="deletelink">click here to delete timetable</div></center>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
            <div id="complaints" class="tab-pane fade" style="padding-top: 70px;">
            
            </div>
        </div>
        <div class="modal fade" id="updatefac" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" style="color:white;" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align: center; font-weight: bold; text-transform:uppercase;">ENTER DETAILS</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="modfacupdate" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="updatefacid">user id: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="updatefacid" placeholder="Enter user id" name="updatefacid" required disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="updatefacname">name: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="updatefacname" placeholder="Enter Name" name="updatefacname" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="updatefacphn">phone:</label>
                                <div class="col-sm-10">          
                                    <input type="text" class="form-control" id="updatefacphn" placeholder="Enter phone number" name="updatefacphn" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="updatefacdept">Department: </label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="updatefacdept" name="updatefacdept" required>
                                        <option selected disabled>select department</option>
                                        <option value="CSE">CSE</option>
                                        <option value="ECE">ECE</option>
                                        <option value="EEE">EEE</option>
                                        <option value="MECH">MECH</option>
                                        <option value="IT">IT</option>
                                        <option value="BIOTECH">BIOTECH</option>
                                        <option value="CIVIL">CIVIL</option>
                                        <option value="AGRICULTURE">AGRICULTURE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <lable class="control-label col-sm-2" for="updatefacrole">role: </lable>
                                <div class="col-sm-10">
                                    <select class="form-control" id="updatefacrole" name="updatefacrole" required>
                                        <option selected disabled>select Role</option>
                                        <option value="ADMIN">ADMIN</option>
                                        <option value="FACULTY">FACULTY</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="updatesub" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" style="color:white;" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align: center; font-weight: bold; text-transform:uppercase;">ENTER SUBJECT DETAILS</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="updatesubject">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="updatesubid">id: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="updatesubid" placeholder="Enter subject id" name="updatesubid" required disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="updatesubname">name: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="updatesubname" placeholder="Enter Name" name="updatesubname" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="updatesubtype">type:</label>
                                <div class="col-sm-10">          
                                    <select class="form-control" id="updatesubtype" name="updatesubtype" required>
                                        <option selected disabled>select type</option>
                                        <option>THEORY</option>
                                        <option>LAB</option>
                                        <option>TLAB</option>
                                        <option>MINOR</option>
                                        <option>ELECTIVE</option>
                                        <option>OPEN ELECTIVE</option>
                                        <option>DEPT ELECTIVE</option>
                                        <option>SEMINAR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="updatesubyear">year:</label>
                                <div class="col-sm-10">          
                                    <select class="form-control" id="updatesubyear" name="updatesubyear" required>
                                        <option selected disabled>select year</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="updatesubsem">sem:</label>
                                <div class="col-sm-10">          
                                    <select class="form-control" id="updatesubsem" name="updatesubsem" required>
                                        <option selected disabled>select semster</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="updatesublhpw">hours:</label>
                                <div class="col-sm-10">          
                                    <input type="text" class="form-control" id="updatesublhpw" placeholder="Number of hours/week" name="updatesublhpw" required>
                                </div>
                            </div> 
                            <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="fixslots" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" style="color:white;" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="text-align: center; font-weight: bold; text-transform:uppercase;">click on the cells to display the subjects that are to be fixed manually</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <center><button id="fixslotsbt" class="btn btn-default" style="font-weight: bold; text-transform:uppercase;">okay got it!</button></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="fixsub" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" style="color:white;" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="text-align: center; font-weight: bold; text-transform:uppercase;">select a subject</h4>
                    </div>
                    <div class="modal-body" id="loadsubarea">  
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>