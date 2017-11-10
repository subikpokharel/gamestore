<?php

	require_once('admin_header.php');
?>
<br/>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-3"style="margin-top:10px;">    			
		<a target="_blank" href="https://github.com/subikpokharel/gamestore/blob/master/cusDetails.php">
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
<!-- This is game list page.-->
<div class="box-header with-border">
              <h2 class="box-title"><strong>Orders</strong></h2>
</div>
<br/>
<div id="box-body">
	<input type="hidden" id="ID"  value="<?php echo($_GET['id']); ?>">
	<input type="hidden" id="ACTION" value="<?php echo($_GET['action']); ?>">
	<div class="form-group"><label> <div class="btn bg-info btn-flat text-capitalize" style="display:none" id="cus-name"></div></label></div>
	<table class="table table-bordered table-hover dataTable pull-center" id ="game_table"></table>
	<div class=" box-footer pull-right"><label> <div class="btn bg-navy btn-flat disabled " style="display:none" id="amount-spent"></div></label></div>
				   
	
	
</div>

<script>
	var id = document.getElementById('ID').value;
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
		var i;
		var out  = "<tr><th>Sl.No</th>" +
			"<th>Game Title</th>" +
			"<th>Quantity Purchased</th></tr>";
		for ( i = 0; i < arr.length; i++ ) {
			out += "<tr><td>" + (i+1) + 
			"</td><td>" + "<a href ='viewGame.php?asin="+arr[i].Asin+"&action=viewGame'><span><strong>"+ arr[i].TITLE +"</strong></span></a>"+
			"</td><td>" + arr[i].Quantity +
			"</td></tr>";
		}
		document.getElementById( "game_table" ).innerHTML = out;
		var nam = "Customer Name :  "+arr[0].Name;
		document.getElementById( "cus-name" ).innerHTML = nam;
		var amt = "Total Amount Spent :"+arr[0].Amount;
		document.getElementById( "amount-spent" ).innerHTML = amt;
		$('#cus-name').show();
		$('#amount-spent').show();
	}
</script>
<?php

	require_once('footer.php');

?>
