<?php	
	require_once('admin_header.php');
?>


<br/>

<div class="row">
	<div class="col-sm-2 pull-left"style="margin-top:10px;"> 
		<form role="form" method="get" id="resetForm">
		<button type="submit" class="btn btn-danger btn-block btn-flat">Reset The System</button>			
		
	</div><div class="col-sm-5"></div>
	<div class="col-sm-2"style="margin-top:10px;">    			
		<a target="_blank" href="https://github.com/subikpokharel/gamestore/blob/master/listGame.php">
			<span class="hidden-xs btn btn-default btn-block btn-flat">View HTML Source</span>
		</a>
	</div>
	<div class="col-sm-3 pull-right"style="margin-top:10px;">    			
		<a target="_blank" href="http://people.aero.und.edu/~spokharel/cgi-bin/513/1/viewSource.pl?interface=listGame">
			<span class="hidden-xs btn btn-default btn-block btn-flat">View CGI/Perl/JAVA Source</span>
		</a>
	</div>
</div>

<br/>
<!-- This is game list page.-->
<div class="box-header with-border">
              <h2 class="box-title"><strong>List of Games Table</strong></h2>
</div>
<br/>
<div id="box-body">
	<div class="row">
		<table class="table table-bordered table-hover dataTable pull-center" id ="game_table"> </table>

	</div>
</div>
<script>
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
		var i,j;
		var out  = "<tr><th>Sl.No</th>" +
			"<th>ASIN</th>" +
			"<th>Title</th>" +
			"<th>Price</th>" +
			"<th>Developers Name</th>" +
			"<th>Action</th></tr>";
		for ( i = 0; i < arr.length; i++ ) {
			out += "<tr><td>" + (i+1) + 
			"</td><td>"+ arr[i].ASIN +
			"</td><td>" + "<a href ='viewGame.php?asin="+arr[i].ASIN+"&action=viewGame'><span><strong>"+ arr[i].TITLE +"</strong></span></a>" +
			"</td><td>" + arr[i].Price +"</td><td>";
			
			var el = arr[i].Developers;
			var tmp = "";
			for ( j = 0; j < el.length; j++ ) {
				tmp += "Dev "+(j+1)+": <a href ='viewDeveloper.php?id="+el[j].Developer_ID+"&action=viewDeveloper'><span><strong>"+ el[j].Developer_Name +"</strong></span></a><br>" +"";
			}
			out += tmp;
			out += "</td><td>" + "<a href='addDeveloper.php?asin="+arr[i].ASIN+"&action=addDeveloper' class='btn btn-primary'>Add Developers</a>"+ 
			"</td></tr>";
		}
		//out += "</table>"
		document.getElementById( "game_table" ).innerHTML = out;
	}
</script>
<script type="text/javascript">

	$("#resetForm").submit(function(e) {
		var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Listing.cgi?action=reset_database";
		$.ajax({
			type: "GET",
		        url: url,
	           	data: $("#insertGameForm").serialize(), // serializes the form's elements.
	           	success:function(data)
	           	{    
				var arr = JSON.parse( data );		
	                	if(arr[0].status=='success'){
                        		window.location.reload(true); 
                		}
           		}
		});
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});

</script>

<?php
	require_once('footer.php');
?>
