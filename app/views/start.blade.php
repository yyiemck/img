@extends('master')
<style>
    	.col {
    		display:inline-block;
    		margin-top:0.5%;
    		border:1px solid black;
    	}
    	.img {
    		width:374px;
    		height:376px;
    	}
    	#modal_img {
    		width:100%;
    	}
</style>

@section('content')
	<?php
	$imgs = DB::table('imagesTable')->orderBy('id','desc')->get();
	$i=0;
	foreach ($imgs as $img) { ?>
		<div class="col"><img class="img" title="<?php echo $img->title?>" src="../public/images/<?php echo $img->url?>" data-toggle="modal" data-target="#myModal"></div><?php
		$i++;
	}
?> 
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <img id="modal_img"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$('.img').click(function() {
	$('#myModal').show();
	$("#myModalLabel").text($(this).attr('title'));
	$("#modal_img").attr("src", $(this).attr('src'));

})
</script>	
@stop