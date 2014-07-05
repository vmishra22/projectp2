
<!DOCTYPE html>
<html>
<head>

	<title>xkcd Password Generator</title>
	<meta charset='utf-8'>
	
	<meta name='viewport' content='width=device-width, initial-scale=1'>

	<link href='//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css' rel="stylesheet">

	<?php require 'logic.php'; ?>
	
	<style>
	
		.container {
			text-align:center;
		}
			
		.password {
			text-align:center;
			font-size:3rem;
			margin-bottom:25px;
			color:#f39c12;
			font-family:consolas,courier;
			background-color:#eee;
			display:inline-block;
			padding:15px;
			font-weight:800;
		}
		
		#number_of_words {
			width:40px;
		}
				
		.details {
			margin-top:25px;
		}
		
		.comic {
			width:75%;
			max-width:500px;
		}
		
	
	</style>

		
</head>
<body>


	<div class='container'>
		<h1>xkcd Password Generator</h1>
	
		<p class='password'>
			<?php echo $passwordString ?>	</p>
		
		<form method='POST' action='index.php'>
			<p class='options'>
			
				<label for='number_of_words'># of Words</label>
				<input maxlength=1 type='text' name='number_of_words' id='number_of_words' value='<?php echo $numWords?>'>  (Max 9)
				<br>
					
				<input type='checkbox' name='add_number' id='add_number' <?php if($addNumberOption) {?> CHECKED <?php }?> > 
				<label for='add_number'>Add a number</label>
				<br>
				<input type='checkbox' name='add_symbol' id='add_symbol' <?php if($addSymbolOption) {?> CHECKED <?php }?> > 
				<label for='add_symbol'>Add a symbol</label>
			</p>
		
			<input type='submit' class='btn btn-default' value='Gimme Another'>
					
		</form>
		
		<p class='details'>
			<a href='http://xkcd.com/936/'>xkcd password strength</a><br>
		
			<a href='http://xkcd.com/936/'>
				<img class='comic' src='http://imgs.xkcd.com/comics/password_strength.png' alt='xkcd style passwords'>
			</a>
			<br>
		</p>
			
	</div>
	
	<script src='//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'></script>
	
</body>
</html>