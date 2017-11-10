<?php
	require_once('admin_header.php');
	
?>
<br/>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-3"style="margin-top:10px;">    			
		<a target="_blank" href="https://github.com/subikpokharel/gamestore/blob/master/enterGame.php">
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
			<h3 class="box-title"><strong>Enter Games</strong></h3>
		</div><!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="post" id="insertGameForm" name="game_insert">
			<div id ="insertError" class="alert alert-danger" style="display:none">Game could not be Inserted!!</div>
			<div id ="insertSuccess" class="alert alert-success" style="display:none">Game Successfully Inserted. Congratulation!!</div>
			<div class="box-body">
				<div class="form-group">
					<label for="gameAsin">ASIN<strong>*</strong></label>
					<input type="text" class="form-control" id="gameAsin" name = "asin"  placeholder="Enter ASIN for the Game" required>
				</div>
				<div class="form-group">
					<label for="gameTitle">Game Title<strong>*</strong></label>
					<input type="text" class="form-control" id="gameTitle" name = "title"  placeholder="Enter the Game Title" required>
				</div>
				<div class="form-group">
					<label for="gamePrice">Game Price<strong>*</strong></label>
					<input type="number" min="0.00" step="0.01" class="form-control" name = "price" id="gamePrice" placeholder="Enter the Price for the Game" required>
				</div>

				 <!-- Select multiple-->
				<div class="form-group">
					<label>Select Developers for the Game<strong>*</strong></label>
						<br/>Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.
					<select multiple class="form-control" name = "dev"  id="developer_list" multiple='multiple' required>
						
					</select>
                		</div>
			</div><!-- /.box-body -->
			<input type="hidden" class="form-control" name = "action" value="add_game">
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Add Game</button>
				<button type="reset" class="btn btn-danger pull-right">Reset Data</button>
			</div>
		</form>
         </div><!-- /.box -->
</div>
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
		var out  = "";
			for ( i = 0; i < arr.length; i++ ) {
			out += "<option value = '"+ arr[i].Dev_ID +"'>"+ arr[i].DeveloperName +"</option> ";
		}
		document.getElementById( "developer_list" ).innerHTML = out;
	}


	$("#insertGameForm").submit(function(e) {
		var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Add.cgi";
		$.ajax({
			type: "POST",
		        url: url,
	           	data: $("#insertGameForm").serialize(), // serializes the form's elements.
	           	success:function(data)
	           	{    
				var arr = JSON.parse( data );		
	                	if(arr[0].status=='success'){
                        		$('#insertSuccess').show();
					$('#insertSuccess').fadeOut(5000); 
					document.game_insert.reset();       
                		}else{
                        		$('#insertError').show();  
					$('#insertError').fadeOut(5000);  
					document.game_insert.reset();          
                		}
           		}
		});
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});

</script>


<?php
	require_once('footer.php');
?>
	  
	



