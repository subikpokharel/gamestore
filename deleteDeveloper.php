<?php	
	require_once('admin_header.php');
?>


<br/>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-3"style="margin-top:10px;">    			
		<a target="_blank" href="https://github.com/subikpokharel/gamestore/blob/master/deleteDeveloper.php">
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
              <h2 class="box-title pull-left"><strong>Developer Delete</strong></h2>
</div>
<br/>
<form method="post" id="deleteDeveloperForm" name="developer_delete" >
	<div id ="deleteError" class="alert alert-danger" style="display:none">Developer could not be Deleted!!</div>
	<div id ="deleteSuccess" class="alert alert-success" style="display:none">Developer Successfully Deleted. Congratulation!!</div>
	<div class="row">
		<div class="col-sm-3 pull-right">
		<button type="submit" class="btn btn-danger btn-block btn-flat">Delete Selected Developers</button>
		</div>
	</div>
	<div id="box-body">
		<div class="row">
			<table class="table table-bordered table-hover dataTable pull-center" id ="developer_table">
			</table>
		</div>
	</div>
	<input type="hidden" class="form-control" name = "action" value="delete_developers">
</form>
<script type="text/javascript">

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
		var out  = "<tr><th>Sl.No</th>" +
			"<th>Developers Id</th>" +
			"<th>Developers Name</th>" +
			"<th>Select to Delete Developers</th></tr>";
		for ( i = 0; i < arr.length; i++ ) {
			out += "<tr><td>" + (i+1) + 
			"</td><td>" + arr[i].Dev_ID +
			"</td><td>" +"<a href ='viewDeveloper.php?id="+ arr[i].Dev_ID +"&action=viewDeveloper'><span><strong>"+ arr[i].DeveloperName +"</strong></span></a>"+
			"</td><td align='left'>"+"<input type='checkbox' name='developerId[]' value='"+arr[i].Dev_ID +"'/"+">" + 
			"</td></tr>";
		}
		out += "</table>"
		document.getElementById( "developer_table" ).innerHTML = out;
	}

	$("#deleteDeveloperForm").submit(function(e) {
		var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Add.cgi";
		//window.location.reload();
		$.ajax({
			type: "POST",
		        url: url,
	           	data: $("#deleteDeveloperForm").serialize(), // serializes the form's elements.
	           	success:function(data)
	           	{    
				var arr = JSON.parse( data );
				//alert(arr[0]);		
	                	if(arr[0].status=='success'){
                        		$('#deleteSuccess').show();
					$('#deleteSuccess').fadeOut(5000); 
					document.developer_delete.reset();  
					setTimeout(location.reload.bind(location), 1000);     
                		}else{
                        		$('#deleteError').show();  
					$('#deleteError').fadeOut(5000);  
					document.developer_delete.reset();          
                		}
           		}
		});
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});

</script>

<?php
	require_once('footer.php');
?>
