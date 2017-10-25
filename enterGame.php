<?php
	require_once('admin_header.php');
	print_r($_POST);
	
?>
<div class="row">
	<!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Enter Games</h3>
		</div><!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="post" action="">
			<div class="box-body">
				<div class="form-group">
					<label for="asin">ASIN</label>
					<input type="text" class="form-control" id="asin" name = "asin"  placeholder="Enter ASIN for the Game" required>
				</div>
				<div class="form-group">
					<label for="title">Game Title</label>
					<input type="text" class="form-control" id="title" name = "title"  placeholder="Enter the Game Title" required>
				</div>
				<div class="form-group">
					<label for="price">Game Title</label>
					<input type="number" min="0.00" step="0.01" class="form-control" name = "price" id="price" placeholder="Enter the Price for the Game" required>
				</div>

				 <!-- Select multiple-->
				<div class="form-group">
					<label>Select Developers for the Game</label>
						<br/>Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.
					<select multiple class="form-control" name = "dev[ ]" required>
						<option value="1">Developer 1</option>
						<option value="2">Developer 2</option>
						<option value="3">Developer 3</option>
						<option value="4">Developer 4</option>
						<option value="5">Developer 5</option>
					</select>
                		</div>
			</div><!-- /.box-body -->
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
         </div><!-- /.box -->
</div>


<?php
	require_once('footer.php');
?>
	  
	



