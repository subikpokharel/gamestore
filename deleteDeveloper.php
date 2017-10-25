<?php	
	require_once('admin_header.php');
	print_r($_POST);
	//http://people.aero.und.edu/~spokharel/cgi-bin/513/1/DeleteDeveloper.cgi
?>



<br/>
<!-- This is game list page.-->
<div class="box-header">
              <h2 class="box-title pull-left">Developer Delete</h2>
</div>
<br/>
<form method="post" action="">
	
<div id="box-body">
	<div class="row">
		<table class="table table-bordered table-hover dataTable pull-center" id ="developer_table">
		</table>
	</div>
</div>
<button type="submit" class="btn btn-danger btn-block btn-flat">Delete Selected Developers</button>
</form>
<script>

	var xmlhttp = new XMLHttpRequest( );
	var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/List.cgi";
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
		var check = "<input type=";
		var inp="checkbox";
		var out  = "<tr><th>Sl.No</th>" +
			"<th>Developers Name</th>" +
			"<th>Developers Id</th>" +
			"<th>Select to Delete Developers</th></tr>";
		for ( i = 0; i < arr.length; i++ ) {
			out += "<tr><td>" + (i+1) + 
			"</td><td>" + arr[i].DeveloperName +
			"</td><td>" + arr[i].Dev_ID +
			"</td><td align='left'>"+"<input type='checkbox' name='developerId[]' value='"+arr[i].Dev_ID +"'/"+">" + 
			"</td></tr>";
		}
		//out += "</table>"
		
		document.getElementById( "developer_table" ).innerHTML = out;
	}
	

</script>

<?php
	require_once('footer.php');/*
$( ".check" ).append( "<p>Test</p>" );
$('td').append($('<input/>',{'type':'checkbox'}));

<td><a href="<?php echo base_url() ?>food/edit/<?php echo $fl->id ?>" class="btn btn-success" > Edit </a>   
<a href="<?php echo base_url() ?>food/delete/<?php echo $fl->id?>" class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</a></td>*/
?>
