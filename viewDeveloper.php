<?php	
	require_once('admin_header.php');	
	//print_r($_GET);
?>

<br/>
<div class="box-header with-border">
              <h2 class="box-title"><strong>Developer Details</strong></h2>
</div>
<br/>
<div id="box-body">
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-8">
			<form class="form-horizontal" method="post">
				<input type="hidden" id="Developer_Id"  value="<?php echo($_GET['id']); ?>">
				<input type="hidden" id="action" value="<?php echo($_GET['action']); ?>">
			 </form> 
		    </div>
		<div class="col-sm-3"></div>

	</div>
</div>

<script>
	
	var id = document.getElementById('Developer_Id').value;
	var action = document.getElementById('action').value;
	var xmlhttp = new XMLHttpRequest( );
	var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/View.cgi?action="+action+"&id="+id ;
	xmlhttp.onreadystatechange = function( ) {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			//myFunction( xmlhttp.responseText );
			alert(xmlhttp.responseText);
		}
	}

</script>
<?php
	require_once('footer.php');
?>


