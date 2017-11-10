<?php	
	require_once('admin_header.php');
?>

<br/>

<div class="row">
	<div class="col-sm-3 pull-left"style="margin-top:10px;">    			
		<a target="_blank" href="https://github.com/subikpokharel/gamestore/blob/master/updatePrice.php">
			<span class="hidden-xs btn btn-default btn-block btn-flat">View HTML Source</span>
		</a>
	</div>
	<div class="col-sm-3 pull-right"style="margin-top:10px;">    			
		<a target="_blank" href="http://people.aero.und.edu/~spokharel/cgi-bin/513/1/viewSource.pl?interface=updatePrice">
			<span class="hidden-xs btn btn-default btn-block btn-flat">View CGI/Perl/JAVA Source</span>
		</a>
	</div>
</div>

<br/>
<div class="box-header with-border">
              <h2 class="box-title"><strong>List of Games Table</strong></h2>
</div>

<br/>
<form method="post" id="updatePriceForm" name="update_price">
	<div id ="updateError" class="alert alert-danger" style="display:none">Sorry Price Could not be Updated!!</div>
	<div id ="updateSuccess" class="alert alert-danger" style="display:none">Price Successfully Updated!!</div>
	<input type="hidden" class="form-control" name = "action" value="update_price">
	
	<div class="row">
		<div class="col-sm-4 pull-right">
			<button type="submit" class="btn btn-success btn-block btn-flat">Update Game Price</button>
		</div>
	</div>
	<div id="box-body">
		<div class="row">
			<table class="table table-bordered table-hover dataTable pull-center" id ="update_table"></table>

		</div>
	</div>
</form>
<script type="text/javascript">
	var xmlhttp = new XMLHttpRequest( );
	var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Listing.cgi?action=list_game";
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
			"<th>New Price</th>" +
			"</tr>";
		for ( i = 0; i < arr.length; i++ ) {
			out += "<tr><td>" + (i+1) + 
			"</td><td>"+ arr[i].ASIN +
			"</td><td>" + "<a href ='viewGame.php?asin="+arr[i].ASIN+"&action=viewGame'><span><strong>"+ arr[i].TITLE +"</strong></span></a>" +
			"</td><td>" +"<input type=number min='0.00'step='0.01' name='prices[]' value="+arr[i].Price+">" +"<input type=hidden name='asins[]' value="+arr[i].ASIN+">" +
			"</td></tr>";
		}
		document.getElementById( "update_table" ).innerHTML = out;
	}



	$("#updatePriceForm").submit(function(e) {
		var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Add.cgi";
		//window.location.reload();
		$.ajax({
			type: "POST",
		        url: url,
	           	data: $("#updatePriceForm").serialize(), // serializes the form's elements.
	           	success:function(data)
	           	{    
				
				var arr = JSON.parse( data );	
				//alert(arr[0].status);	
	                	if(arr[0].status=='success'){
					location.href = 'http://people.aero.und.edu/~spokharel/513/1/listGame.php';    
                        		     
                		}else{
					alert(arr[0].status);
                        		$('#updateError').show();  
					$('#updateError').fadeOut(5000);  
					document.update_price.reset();          
                		}
           		}
		});
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});
</script>

<?php
	require_once('footer.php');
?>

