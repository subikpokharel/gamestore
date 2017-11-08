<?php

	require_once('customer_header.php');
	//print_r($_POST);
?>

<br/>
<!-- This is game list page.-->
<div class="box-header with-border">
              <h2 class="box-title"><strong>List of Games Table</strong></h2>
</div>
<br/>
<div id="box-body">
	<form method="post" id="purchaseGameForm" name="purchase_game" action="http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Customer.cgi">
		<input type="hidden" class="form-control" name = "action" value="purchase_game">
		<input type="hidden" class="form-control" name = "userid" value="<?php  echo ucfirst($userId);?>">
		<div class="row">
			<table class="table table-bordered table-hover dataTable pull-center" id ="game_table">

		</div>
		<div class="row">
			<div class="col-sm-3 pull-right">
			<button type="submit" class="btn btn-primary btn-block btn-flat">Purchase Selected Games</button>
			</div>
		</div>
	</form>
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
		var i,j;
		var out  = "<tr><th>Sl.No</th>" +
			"<th>Title</th>" +
			"<th>Developers Name</th>" +
			"<th>Price</th>" +
			"<th>Purchase Game</th>" +
			"<th>Quantity</th></tr>";
		for ( i = 0; i < arr.length; i++ ) {
			out += "<tr><td>" + (i+1) + 
			"</td><td>" + "<a href ='viewGame.php?asin="+arr[i].ASIN+"&action=viewGame'><span><strong>"+ arr[i].TITLE +"</strong></span></a>"+"</td><td>";
			var el = arr[i].Developers;
			var tmp = "";
			for ( j = 0; j < el.length; j++ ) {
				tmp += "Developer "+(j+1)+": <a href ='viewDeveloper.php?id="+el[j].Developer_ID+"&action=viewDeveloper'><span><strong>"+ el[j].Developer_Name +"</strong></span></a><br>" +"";
			}
			out += tmp;
			out += "</td><td>" + arr[i].Price ;
			out += "</td><td>" + "<input type='checkbox' class='checkbox' name='purchaseAsin[]' value='"+arr[i].ASIN +"'/"+">" ;
			out += "</td><td>" + "<input type=number min='0.00' class='field' name='quantity[]' value='0'"+ 
			"</td></tr>";
		}
		out += "</table>"
		document.getElementById( "game_table" ).innerHTML = out;
	}
</script>



<?php

	require_once('footer.php');

?>
