<?php

	require_once('customer_header.php');
?>

<br/>
<!-- This is game list page.-->
<div class="box-header with-border">
              <h2 class="box-title"><strong>Your Previous Orders</strong></h2>
</div>
<br/>
<div id="box-body">
	<input type="hidden" id="userId"  value="<?php echo $userId; ?>">
	<table class="table table-bordered table-hover dataTable pull-center" id ="game_table">
	<div class=" box-footer"><label> <div class="btn bg-navy btn-flat disabled " id="amount-spent" style="display:none"></div></label></div>
				   
	
	
</div>

<script>
	var id = document.getElementById('userId').value;
	var xmlhttp = new XMLHttpRequest( );
	var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/View.cgi?action=viewOrder&id="+id ;
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
			"<th>Game Title</th>" +
			"<th>Quantity Purchased</th></tr>";
		for ( i = 0; i < arr.length; i++ ) {
			out += "<tr><td>" + (i+1) + 
			"</td><td>" + "<a href ='viewTitle.php?asin="+arr[i].Asin+"&action=viewGame'><span><strong>"+ arr[i].TITLE +"</strong></span></a>"+
			"</td><td>" + arr[i].Quantity +
			"</td></tr>";
		}
		out += "</table>"
		document.getElementById( "game_table" ).innerHTML = out;
		var amt = "Total Amount Spent:  $"+arr[0].Amount;
		document.getElementById( "amount-spent" ).innerHTML = amt;
		$('#amount-spent').show();
		//alert(arr[0].Amount);
	}
</script>
<?php

	require_once('footer.php');

?>
