<html>
<head>
	<title>IMAGE STORAGE</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="{{asset('../package/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    	<style>
    	.navbar-default {
    		padding-left:500px;
    		padding-right:500px;
    		width:100%;
    		display:inline-block;
    	}
    	.navbar-collapse {
    		float:right; 		
    	}
    	.container {
        border:1px solid orange;
        margin-bottom:30px;
        padding-bottom:0.5%;
        
    	}
    	.wrap_file {
    		display:none;
    	}
     .errmsg {
        text-align:center;
        font-size:30px;
        font-weight:bold;
     }
     
    	</style>
</head>
<body>
	
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="{{asset('../package/bootstrap/js/bootstrap.min.js')}}"></script>

	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">IMAGE STORAGE</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">
        	<a id="ff">Upload<span class="sr-only">(current)</span></a>
        	<form class="wrap_file" method="post" enctype="multipart/form-data">
        	  <input type="file" id="image_up" name="image_up" class="im_up_con"/>
          </form>   
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="errmsg">
  <?php $messages =  $errors->all('<p style="color:red">:message</p>') ?>
  <?php 
  foreach ($messages as $msg) 
  {
    echo $msg;
  }
  ?>
</div>
<div class="container">
@yield('content')

</div>

<script type="text/javascript">
  $("#ff").click(function() {
  		$("#image_up").click();
  });
  $("#image_up").change(function() {
     $('.wrap_file').submit();
  });
</script>
</body>
</html>	
<?php




?>