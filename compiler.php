<?php
include 'db.php';
$query_question = "SELECT * FROM questions LIMIT 1";
$results = mysqli_query($conn, $query_question);
while ($row = mysqli_fetch_assoc($results)) {
    $question = $row['question'];
    $hash = $row['hash'];
    $query_option = "SELECT * FROM options WHERE hash='$hash'";
    $results_option = mysqli_query($conn, $query_option);
    while ($row1 = mysqli_fetch_assoc($results_option)) {
        $option1 = $row1['option1'];
        $option2 = $row1['option2'];
        $option3 = $row1['option3'];
    }
}

$array = array($option1, $option2, $option3);

?>
<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js"> </script>
        <script src="bootstrap-3.3.7/js/bootstrap.js"> </script>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"
     type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.8.20/jquery-ui.min.js"
     type="text/javascript"></script>
    <script src="http://jquery-ui.googlecode.com/svn/tags/latest/external/jquery.bgiframe-2.1.2.js"
        type="text/javascript"></script>
    <script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/minified/i18n/jquery-ui-i18n.min.js"
        type="text/javascript"></script>
    <style>
        .textarea{background: #fff;}
        .dragitems{width: 20%; float: left; background: #f1f1f1;}
        .dropitems{width: 70%;float: left;background: #f1f1f1;
                   margin-left: 20px;padding:5px 5px 5px 5px;}
        .dragitems ul{list-style-type: none;padding-left: 5px;
                   display: block;}
        #content{height: 400px;width: 650px;}
    </style>
    <script language="javascript" type="text/javascript">
        $(function() {
            $("#allfields li").draggable({
                appendTo: "body",
                helper: "clone",
                cursor: "select",
                revert: "invalid"
            });
            initDroppable($("#TextArea1"));
            function initDroppable($elements) {
                $elements.droppable({
                    hoverClass: "textarea",
                    accept: ":not(.ui-sortable-helper)",
                    drop: function(event, ui) {
                        var $this = $(this);
 
                        var tempid = ui.draggable.text();
                        var dropText;
                        dropText = "" + tempid + "\n";
                        var droparea = document.getElementById('TextArea1');
                        var range1 = droparea.selectionStart;
                        var range2 = droparea.selectionEnd;
                        var val = droparea.value;
                        var str1 = val.substring(0, range1);
                        var str3 = val.substring(range1, val.length);
                        droparea.value = str1 + dropText + str3;
                    }
                });
            }
        });
    </script>





</head>
<body>


<div class="split left">
<div class="centered">

<div class="row">
  <div class="col-sm-12">
  <nav class="shadow navbar navbar-inverse navbar-fixed-top nbar">
    <div class="navbar-header">
      <a class="navbar-brand lspace" href="index.php">RUET OJ</a>
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
    </div>
    <div class="collapse navbar-collapse navbar-menubuilder">
    <ul class="nav navbar-nav">
      <li class="space"><a href="compiler.php"><i class="fa fa-code ispace"></i>Compiler</a></li>
      <li class="space"><a href="archive.php"><i class="fa fa-archive ispace"></i>Problem Archive</a></li>
      <li class="space"><a href="contest.php"><i class="fa fa-cogs ispace"></i>Contests</a></li>
      <li class="space"><a href="#"><i class="fa fa-check-square ispace"></i>Debug</a></li>
      
      
    </ul>
    </div>
</nav>
</div>
</div>


<div class="row log">
<div class="col-sm-10">
<div class=""><h3 style="text-align:center;"><?php echo $question; ?></h3></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>




<div class="row cspace">
<div class="col-sm-8">
<div class="form-group">
<form action="compile.php" name="f2" method="POST">
<label for="language">Choose Language</label>

<select class="form-control" name="language">
<option value="c">C</option>
<option value="cpp">C++</option>
<option value="cpp11">C++11</option>
<option value="java">Java</option>

	

</select><br><br>
<form id="form1" runat="server">
    <div id="content">
     
        <div class="dragitems">
            <h3>
                <span>Options</span></h3>
            <ul id="allfields" runat="server">
            
                <li id="node1"><?php echo htmlspecialchars($option1);?></li>
                <li id="node2"><?php echo $option2;?></li>
                <li id="node3"><?php echo $option3;?></li>
               
            </ul>
        </div>
            <span>Subject: </span>
            
        
     <div class="dropitems">
      
    <label for="ta">Write Your Code</label>
<textarea id="TextArea1" runat="server" class="form-control" name="code" rows="10" cols="50"></textarea><br><br>
<input type="submit" class="btn btn-success" value="Run Code"><br><br><br>

</div>
    </div>
    </form>
    

</div>
</div>


</div>
</div>
<br><br><br>
<div class="area">
<div class="well foot">
<div class="row area">
<div class="col-sm-3">
<!-- BEGIN: Powered by Supercounters.com -->
<center><script type="text/javascript" src="http://widget.supercounters.com/online_i.js"></script><script type="text/javascript">sc_online_i(1360839,"ffffff","e61c1c");</script><br><noscript><a href="http://www.supercounters.com/">Free Online Counter</a></noscript>
</center>
<!-- END: Powered by Supercounters.com -->

</div>

<div class="col-sm-5">


<div class="fm">

<b>Beta Version-2016</b><br>
<b>Developed By <a href="https://github.com/kushagraagent47">Tarun Nahak And Kushagraagent47</a></b>

</div>
</div>


<div class="col-sm-4">
<?php
date_default_timezone_set("Asia/Dhaka");
 $t=date("H:i:s");
echo"<b>Server Time:  $t</b>";

?>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="split right">
  <div class="centered">
    <img src="img_avatar.png" alt="Avatar man">
    <h2>John Doe</h2>
    <p>Some text here too.</p>
  </div>
</div>
</body>
</html>


