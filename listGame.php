<?php	
	require_once('admin_header.php');
	
?>


<br/><br/><br/>
<!-- This is game list page.-->
<div class="box-header">
              <h2 class="box-title">List of Games Table</h2>
</div>
<br/>
<div id="box-body">
	<div class="row">
		<table class="table table-bordered table-hover dataTable pull-center" id ="game_table">

	</div>
</div>
<script>
	var xmlhttp = new XMLHttpRequest( );
	var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/ListGame.cgi";
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
		var i;
		var out  = "<tr><th>Sl.No</th>" +
			"<th>ASIN</th>" +
			"<th>Title</th>" +
			"<th>Price</th>" +
			"<th>Developers Name</th>" +
			"<th>Action</th></tr>";
		for ( i = 0; i < arr.length; i++ ) {
			out += "<tr><td>" + (i+1) + 
			"</td><td>"+ arr[i].ASIN +
			"</td><td>" + "<a href ='viewGame.php?asin="+arr[i].ASIN+"&action=viewGame'><span>"+ arr[i].TITLE +"</span></a>" +
			"</td><td>" + arr[i].Price +
			"</td><td>" + "<a href ='test.php/"+arr[i].Developer_ID+"/?action=view_developer'><span>"+ arr[i].Developer_Name +"</span></a>" +
			"</td><td>" + "<a href='test.php/"+arr[i].ASIN+"/?action=add' class='btn btn-primary'>Add Developers</a>"+ 
			"</td></tr>";
		}
		out += "</table>"
		document.getElementById( "game_table" ).innerHTML = out;
	}
</script>


<?php
	require_once('footer.php');
?>
