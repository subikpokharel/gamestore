<?php	
	require_once('admin_header.php');
?>
<br/>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-3"style="margin-top:10px;">    			
		<a target="_blank" href="https://github.com/subikpokharel/gamestore/blob/master/viewGame.php">
			<span class="hidden-xs btn btn-default btn-block btn-flat">View HTML Source</span>
		</a>
	</div>
	<div class="col-sm-3"style="margin-top:10px;">    			
		<a href="">
			<span class="hidden-xs btn btn-default btn-block btn-flat">View Java Source</span>
		</a>
	</div>
	<div class="col-sm-3"style="margin-top:10px;">    			
		<a href="">
			<span class="hidden-xs btn btn-default btn-block btn-flat">View Perl Source</span>
		</a>
	</div>
</div>
<br/>
<div class="box-header with-border">
              <h2 class="box-title"><strong>Game Details</strong></h2>
</div>
<br/>
<div id="box-body">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<form class="form-horizontal" method="get" action="http://people.aero.und.edu/~spokharel/513/1/addDeveloper.php">
				<input type="hidden" id="ASIN"  value="<?php echo($_GET['asin']); ?>">
				<input type="hidden" id="ACTION" value="<?php echo($_GET['action']); ?>">
				<div id="box-body">
					<div class="row">
						<table class="table borderless table-hover dataTable pull-center" id ="game_table"></table>

					</div>
				</div>

				<input type="hidden" class="form-control" name = "asin" value="<?php echo($_GET['asin']); ?>">
				<input type="hidden" class="form-control" name = "action" value="addDeveloper">
				<div class="box-footer pull-right with-border">
					<button type="submit" class="btn btn-primary">Add New Developer to Game</button>
				</div>

			
			 </form> 
		    </div>
		<div class="col-sm-2"></div>

	</div>
</div>

<script>
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
		var out  = "<tr><th>Game Asin</th>" +
			"<th>Title</th>" +
			"<th>Price</th>" +
			"<th>List of Developers</th></tr>";
		out += "<tr><td>" + arr[0].ASIN + 
			"</td><td>"+arr[0].TITLE +
			"</td><td>"+arr[0].Price +
			"</td><td>";
		var el = arr[0].Developers;
		var tmp = "";
		for ( i = 0; i < el.length; i++ ) {
			tmp += "Developer "+(i+1)+": <a href ='viewDeveloper.php?id="+el[i].Developer_ID+"&action=viewDeveloper'><span><strong>"+ el[i].Developer_Name +"</strong></span></a><br>" +"";
		}
		out += tmp+"</td><tr>";

		document.getElementById( "game_table" ).innerHTML = out;

	}

</script>
<?php
	require_once('footer.php');
?>


