<?php

	require_once('customer_header.php');
	print_r($_POST);
?>
			
<div class = "row">
	<div class = "col-md-2"></div>
	<div class="box-tools ">
		<form method="post" action="">
			<div class="input-group input-group-lg col-md-8 ">
                		<input type="text" name="searchBar" class="form-control" placeholder="Search"/>
				<div class="input-group-btn">
					<button type="submit" class="btn btn-default"><i>Submit</i></button>
                  		</div>
                	</div>
		</form>
	</div>
	<div class = "col-md-2"></div>
</div>
<?php

	require_once('footer.php');

?>
