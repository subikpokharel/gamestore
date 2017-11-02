<?php	
	require_once('admin_header.php');	
	//print_r($_GET);
?>

<br/>
<div class="box-header">
              <h2 class="box-title">Game Details</h2>
</div>
<br/>
<div id="box-body">
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-8">
			   
			   <form class="form-horizontal" method="post">
				<input type="hidden" id="ASIN"  value="<?php echo($_GET['asin']); ?>">
				<input type="hidden" id="ACTION" value="<?php echo($_GET['action']); ?>">
				<div class="form-group">
				    <label for="ISBN">ASIN </label>
				   <div id="name-asin"></div>
			 	 </div>
			 	  <div class="form-group">
				    <label for="title">Title</label>
				    <div id="name-title"></div>
			 	 </div>
			 	 <div class="form-group">
				    <label for="price">Price</label>
				    <div id="name-price"></div>
			 	 </div>
				<div class="form-group">
				    <label for="developers">Developers</label>
				    <div id="name-developer"></div>		   
			 	 </div>
				<input type="hidden" name="action" value="addDeveloper">
				<br><br><br>
			 	</form> 
		    </div>
			    </form>
		<div class="col-sm-3"></div>

	</div>
</div>

<script>
	
	var ASIN = document.getElementById('ASIN').value;
	var action = document.getElementById('ACTION').value;
	var xmlhttp = new XMLHttpRequest( );
	var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/View.cgi?action="+action+"&asin="+ASIN ;
	xmlhttp.onreadystatechange = function( ) {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			myFunction( xmlhttp.responseText );
			alert(xmlhttp.responseText);
		}
	}
	xmlhttp.open( "GET", url, true );
	xmlhttp.send( );
	function myFunction( response ) {
		var arr = JSON.parse( response );
		document.getElementById('name-asin').innerHTML =arr[0].ASIN;
		document.getElementById('name-title').innerHTML=arr[0].TITLE;
		document.getElementById('name-price').innerHTML=arr[0].Price;
		/*var i,x="";
		
		for (i in arr[0].Developer_Name) {
			if(arr[0].Developer_Name[i] == ",")
    				x += "<br>";
    			else
    				x += arr[0].Developer_Name[i] ;
		}
		
		
		document.getElementById('name-developer').innerHTML=x;*/

		document.getElementById('name-developer').innerHTML=arr[0].Developer_Name;


	}

</script>
<?php
	require_once('footer.php');
	//"<a href ='viewGame.php?asin="+arr[i].ASIN+"&action=viewGame'><span>"+ arr[i].TITLE +"</span></a>" +
?>


