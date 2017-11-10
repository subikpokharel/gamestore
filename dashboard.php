<?php

	require_once('customer_header.php');
?>
<div class="row">
	<div class="col-sm-3 pull-left"style="margin-top:10px;">    			
		<a target="_blank" href="https://github.com/subikpokharel/gamestore/blob/master/dashboard.php">
			<span class="hidden-xs btn btn-default btn-block btn-flat">View HTML Source</span>
		</a>
	</div>
	<div class="col-sm-3 pull-right"style="margin-top:10px;">    			
		<a target="_blank" href="http://people.aero.und.edu/~spokharel/cgi-bin/513/1/viewSource.pl?interface=dashboard">
			<span class="hidden-xs btn btn-default btn-block btn-flat">View CGI/Perl/JAVA Source</span>
		</a>
	</div>
</div>
<br/>
<br/>

<div class = "row">
	<div class = "col-md-2"></div>
	<div class="box-tools ">
		<form method="post" id="Search_Bar">
			<input type="hidden" class="form-control" name = "action" value="viewGameUsingDeveloper">
			<div class="input-group input-group-lg col-md-8 ">
                		<input type="text" name="searchBar" class="form-control" placeholder="Search For Games using Developer Name..."/>
				<div class="input-group-btn">
					<button type="submit" class="btn btn-default"><i>Submit</i></button>
                  		</div>
                	</div>
		</form>
	</div>
	<div class = "col-md-2"></div>
</div>




<!-- This is game list page.-->
<div class="box-header with-border" id="header" style="display:none">
              <h2 class="box-title"><strong>List of Games Table</strong></h2>
</div>
<br/>
<div id="box-body" style="display:none">
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


<script type="text/javascript">
$("#Search_Bar").submit(function(e) {
		var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Search.cgi";
		$.ajax({
			type: "POST",
		        url: url,
	           	data: $("#Search_Bar").serialize(), // serializes the form's elements.
	           	success:function(data)
	           	{    
				var arr = JSON.parse( data );
				//alert(data);		
	                	var i,j;
				var out  = "<tr><th>Sl.No</th>" +
					"<th>Title</th>" +
					"<th>Price</th>" +
					"<th>Purchase Game</th>" +
					"<th>Quantity</th></tr>";
				for ( i = 0; i < arr.length; i++ ) {
					out += "<tr><td>" + (i+1) + 
					"</td><td>" + "<a href ='viewTitle.php?asin="+arr[i].ASIN+"&action=viewGame'><span><strong>"+ arr[i].TITLE +"</strong></span></a>"+
					"</td><td>" + arr[i].PRICE +
					"</td><td>" + "<input type='checkbox' class='checkbox' name='purchaseAsin[]' value='"+arr[i].ASIN +"'/"+">" +
					"</td><td>" + "<input type=number min='0.00' class='field' name='quantity[]' value='0'/"+">"+ 
					"</td></tr>";
				}
				out += "</table>"
				document.getElementById( "game_table" ).innerHTML = out;
				$('#box-body').show();
				$('#header').show();

           		}
		});
		e.preventDefault(); // avoid to execute the actual submit of the form.
	});

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
