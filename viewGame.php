<?php	
	require_once('admin_header.php');	
	//print_r($_GET);
?>

<br/>
<div class="box-header with-border">
              <h2 class="box-title"><strong>Game Details</strong></h2>
</div>
<br/>
<div id="box-body">
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-8">
			<form class="form-horizontal" method="get" action="http://people.aero.und.edu/~spokharel/513/1/addDeveloper.php">
				<input type="hidden" id="ASIN"  value="<?php echo($_GET['asin']); ?>">
				<input type="hidden" id="ACTION" value="<?php echo($_GET['action']); ?>">
				<div class="form-group"> <label>ASIN </label>
					<div id="name-asin"></div>
			 	</div>
			 	<div class="form-group"><label>Title</label>
				 	<div id="name-title"></div>
			 	</div>
			 	<div class="form-group"><label>Price</label>
					<div id="name-price"></div>
			 	</div>
				<div class="form-group"><label>Developers</label>
					<div id="name-developer"></div>		   
			 	</div>
				<input type="hidden" class="form-control" name = "asin" value="<?php echo($_GET['asin']); ?>">
				<input type="hidden" class="form-control" name = "action" value="addDeveloper">
				<div class="box-footer pull-right with-border">
					<button type="submit" class="btn btn-primary">Add New Developer to Game</button>
				</div>

			
			 </form> 
		    </div>
		<div class="col-sm-3"></div>

	</div>
</div>

<script>
	//<a href='addDeveloper.php?asin="+arr[i].ASIN+"&action=addDeveloper' class='btn btn-primary'>Add Developers</a>"
	var ASIN = document.getElementById('ASIN').value;
	var action = document.getElementById('ACTION').value;
	var xmlhttp = new XMLHttpRequest( );
	var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/View.cgi?action="+action+"&asin="+ASIN ;
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
		document.getElementById('name-asin').innerHTML =arr[0].ASIN;
		document.getElementById('name-title').innerHTML=arr[0].TITLE;
		document.getElementById('name-price').innerHTML=arr[0].Price;
		var el = arr[0].Developers;
		var out = "";
		for ( i = 0; i < el.length; i++ ) {
			out += "Developer "+(i+1)+": <a href ='viewDeveloper.php?id="+el[i].Developer_ID+"&action=viewDeveloper'><span><strong>"+ el[i].Developer_Name +"</strong></span></a><br>" +"";
		}
		document.getElementById('name-developer').innerHTML=out;

	}

</script>
<?php
	require_once('footer.php');
	//<input type="hidden" name="action" value="addDeveloper">
?>


