<?php

	require_once('customer_header.php');
?>

<div class="row">
	<div class="col-sm-3 pull-left"style="margin-top:10px;">    			
		<a target="_blank" href="https://github.com/subikpokharel/gamestore/blob/master/devDetails.php">
			<span class="hidden-xs btn btn-default btn-block btn-flat">View HTML Source</span>
		</a>
	</div>
	<div class="col-sm-3 pull-right"style="margin-top:10px;">    			
		<a target="_blank" href="http://people.aero.und.edu/~spokharel/cgi-bin/513/1/viewSource.pl?interface=devDetails">
			<span class="hidden-xs btn btn-default btn-block btn-flat">View CGI/Perl/JAVA Source</span>
		</a>
	</div>
</div>
<br/>
<div class="box-header with-border">
              <h2 class="box-title"><strong>Developers Details</strong></h2>
</div>
<br/>
<div id="box-body">
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-8">
			<form class="form-horizontal" method="get" action="http://people.aero.und.edu/~spokharel/513/1/addDeveloper.php">
				<input type="hidden" id="DEVELOPER"  value="<?php echo($_GET['id']); ?>">
				<input type="hidden" id="ACTION" value="<?php echo($_GET['action']); ?>">
			 	<table class="table table-bordered table-hover dataTable pull-center" id ="game_table">

			
			 </form> 
		    </div>
		<div class="col-sm-3"></div>

	</div>
</div>

<script>
	var id = document.getElementById('DEVELOPER').value;
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
		var out  = "<tr><th>Sl.No</th>" +
			"<th>Developer Name</th>" +
			"<th>Games Developed</th></tr>";
		out += "<tr><td>" + 1 + 
			"</td><td>" + arr[0].Name ;
			var el = arr[0].Games;
			var tmp = "</td><td>";
			for ( i = 0; i < el.length; i++ ) {
				tmp += "Game "+(i+1)+": <a href ='viewTitle.php?asin="+el[i].GameAsin+"&action=viewGame'><span><strong>"+ el[i].GameName +"</strong></span></a><br>" +"";
			}
		out += tmp;
			"</td></tr> </table>";
		
		document.getElementById('game_table').innerHTML=out;

	}

</script>
<?php

	require_once('footer.php');

?>
