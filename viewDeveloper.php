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
				<input type="hidden" id="DEVELOPER"  value="<?php echo($_GET['id']); ?>">
				<input type="hidden" id="ACTION" value="<?php echo($_GET['action']); ?>">
				<div class="form-group"> <label>Developer Id:</label><div id="name-id"></div></div>
			 	<div class="form-group"><label>Developer Name </label><div id="name-name"></div></div>
				<div class="form-group"><label>Developed Games </label><div id="name-game"></div></div>
			 </form> 
		    </div>
		<div class="col-sm-3"></div>

	</div>
</div>

<script>
	
	var id = document.getElementById('DEVELOPER').value;
	var action = document.getElementById('ACTION').value;
	var xmlhttp = new XMLHttpRequest( );
	var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/View.cgi?action="+action+"&id="+id ;
	xmlhttp.onreadystatechange = function( ) {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			myFunction( xmlhttp.responseText );
			//alert(xmlhttp.responseText);
		}
	}
	xmlhttp.open( "GET", url, true );
	xmlhttp.send( );
	function myFunction( response ) {
		var arr = JSON.parse( response );
		document.getElementById('name-id').innerHTML =arr[0].ID;
		document.getElementById('name-name').innerHTML=arr[0].Name;

	}

</script>
<?php
	require_once('footer.php');
?>


