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
	<form method="post" id="purchaseGameForm" name="purchase_game">
		<input type="hidden" class="form-control" name = "action" value="purchase_game">
		<input type="hidden" class="form-control" name = "userid" value="<?php  echo ucfirst($userId);?>">
		<div id ="purchaseError" class="alert alert-danger" style="display:none">Sorry we could not process your Purchase !!</div>
		<div id ="purchaseSuccess" class="alert alert-success" style="display:none">Your Purchase Was Successful. Congratulation!!</div>
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
			"<th>Price</th>" +
			"<th>Purchase Game</th>" +
			"<th>Quantity</th></tr>";
		for ( i = 0; i < arr.length; i++ ) {
			out += "<tr><td>" + (i+1) + 
			"</td><td>" + "<a href ='test.php?asin="+arr[i].ASIN+"&action=viewGame'><span><strong>"+ arr[i].TITLE +"</strong></span></a>"+
			"</td><td>" + arr[i].Price +
			"</td><td>" + "<input type='checkbox' class='checkbox' name='purchaseAsin[]' value='"+arr[i].ASIN +"'/"+">" +
			"</td><td>" + "<input type=number min='0.00' class='field' name='quantity[]' value='0'/"+">"+ 
			"</td></tr>";
		}
		out += "</table>"
		document.getElementById( "game_table" ).innerHTML = out;
	}
</script>

<script type="text/javascript">
$("#purchaseGameForm").submit(function(e) {
		var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Customer.cgi";
		$.ajax({
			type: "POST",
		        url: url,
	           	data: $("#purchaseGameForm").serialize(), // serializes the form's elements.
	           	success:function(data)
	           	{    
				var arr = JSON.parse( data );
				//alert(data);		
	                	if(arr[0].status=='success'){
                        		$('#purchaseSuccess').show();
					$('#purchaseSuccess').fadeOut(5000); 
					document.purchase_game.reset();       
                		}else{
                        		$('#purchaseError').show();  
					$('#purchaseError').fadeOut(5000);  
					document.purchase_game.reset();          
                		}
           		}
		});
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});

</script>


<?php

	require_once('footer.php');

?>
