<?php	
	require_once('admin_header.php');	
	//print_r($_GET);
?>
<br/><br/><br/>
<!-- This is game list page.-->
<div class="box-header with-border">
              <h2 class="box-title"><strong>List of Customers using the System</strong></h2>
</div>
<br/>
<div id="box-body">
	<div class="row">
		<table class="table table-bordered table-hover dataTable pull-center" id ="customer_table">

	</div>
</div>
<script>
	var xmlhttp = new XMLHttpRequest( );
	var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/ListCustomer.cgi";
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
			"<th>Customer Name</th>" +
			"<th>Customer Username</th>" +
			"<th>Games Purchased</th>" +
			"<th>Game Quantity</th>" +
			"<th>Total Amount Spent</th></tr>";
		for ( i = 0; i < arr.length; i++ ) {
			out += "<tr><td>" + (i+1) + 
			"</td><td>"+ arr[i].NAME +
			"</td><td>" + "<a href ='cusDetails.php?id="+arr[i].ID+"&action=viewOrder'><span><strong>"+ arr[i].USERNAME +"</strong></span></a>" +
			"</td><td>"; //+ arr[i].Price +"</td><td>";
			//alert(arr[i].Game_Details);
			var el = arr[i].Game;
			//alert(el[0].ASIN);
			var tmp = "";
			for ( j = 0; j < el.length; j++ ) {
				tmp += "Game "+(j+1)+": <a href ='viewGame.php?asin="+el[j].ASIN+"&action=viewGame'><span><strong>"+ el[j].TITLE +"</strong></span></a><br>" +"";
			}
			out += tmp+
				"</td><td>";
			tmp = "";
			for ( j = 0; j < el.length; j++ ) {
				tmp += "Qty :<span><strong>"+ el[j].Quantity +"</strong></span></a><br>" +"";
			}
			out += tmp+
				"</td><td>";
			out +=  arr[i].AMOUNT + 
			"</td></tr>";
		}
		out += "</table>"
		document.getElementById( "customer_table" ).innerHTML = out;
	}
</script>


<?php
	require_once('footer.php');
?>


