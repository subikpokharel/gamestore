<?php	
	require_once('admin_header.php');

?>
<br/>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-3"style="margin-top:10px;">    			
		<a target="_blank" href="https://github.com/subikpokharel/gamestore/blob/master/addDeveloper.php">
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
<div class="row">
	<!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Add Developer</h3>
		</div><!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="get" id="addDeveloper" name="add_developer">
			<input type="hidden" id="ASIN"  value="<?php echo($_GET['asin']); ?>">
			<input type="hidden" id="ACTION" value="viewDevelopers">
			<div id ="addError" class="alert alert-danger" style="display:none">Developer Could not be Added!!</div>
			<div id ="addSuccess" class="alert alert-success" style="display:none">Developer Added Successfully!!</div>
			<input type="hidden" class="form-control" name = "asin" value="<?php echo($_GET['asin']); ?>">
			<input type="hidden" class="form-control" name = "action" value="<?php echo($_GET['action']); ?>">
			<div class="box-body">
				<div class="form-group">
					<label for="asin">ASIN</label>
					<div id="name-asin"></div>
				</div>
				<div class="form-group">
					<label for="title">Game Title</label><div id="name-title"></div>
				</div>
				<div class="form-group">
					<label for="price">Game Title</label><div id="name-price"></div>
				</div>
				<div class="form-group">
					<label for="price">Developers</label><div id="name-developer"></div>
				</div>

				 <!-- Select multiple-->
				<div class="form-group">
					<label>Select Developers for the Game</label>
						<br/>Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.
					<select multiple class="form-control" name = "dev"  id="developer_list" multiple='multiple' required>
						
					</select>
                		</div>
			</div><!-- /.box-body -->
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
         </div><!-- /.box -->
</div>

<script type="text/javascript">
$("#addDeveloper").submit(function(e) {
    var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/View.cgi";
    $.ajax({
           type: "GET",
           url: url,
           data: $("#addDeveloper").serialize(), // serializes the form's elements.
           success:function(data)
           {    var arr = JSON.parse( data );
		//alert(arr[0].status);
                if(arr[0].status=='success'){
			$('#addSuccess').show();
			$('#addSuccess').fadeOut(5000); 
			document.add_developer.reset();
			//window.location.reload(true); 
			setTimeout(location.reload.bind(location), 1000);
                }else{
                        $('#addError').show();
			$('#addError').fadeOut(5000);   
			document.add_developer.reset();
                }
           }
		
         });
    e.preventDefault(); // avoid to execute the actual submit of the form.
});

</script> 
<script >
	var ASIN = document.getElementById('ASIN').value;
	var action = document.getElementById('ACTION').value;
	var xmlhttp = new XMLHttpRequest( );
	var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/View.cgi?action="+action+"&asin="+ASIN ;
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
		document.getElementById('name-asin').innerHTML =arr[0].ASIN;
		document.getElementById('name-title').innerHTML=arr[0].TITLE;
		document.getElementById('name-price').innerHTML=arr[0].Price;
		var el = arr[0].Developers;
		var out = "";
		for ( i = 0; i < el.length; i++ ) {
			out += "Developer "+(i+1)+": <a href ='viewDeveloper.php?id="+el[i].Developer_ID+"&action=viewDeveloper'><span><strong>"+ el[i].Developer_Name +"</strong></span></a><br>" +"";
		}
		document.getElementById('name-developer').innerHTML=out;
		//alert(arr[0].List);
		var list = arr[0].List;
		var dev_list = "";
		for (i=0; i < list.length; i++){
			dev_list += "<option value = '"+ list[i].Developer_ID +"'>"+ list[i].Developer_Name +"</option> ";
		}
		document.getElementById( "developer_list" ).innerHTML = dev_list;
	}

</script>

<?php
	require_once('footer.php');
?>

