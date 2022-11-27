<html>
	<head>
		<title>Quiz</title>
		<link rel="stylesheet" type="text/css" href="./styles.css">
	</head>
	
	<body>
	<?php include '../menu.php';?>
        <div class= "main-containor col-md-12 col-lg-12">
        <br>
        <br>
        <br>
		<ul class="list-group">
			<li class="list-group-item black"  onclick="window.location.href = './quiztruefalse.php';">True & False</li>
			<li class="list-group-item black"  onclick="window.location.href = './quizmcq.php';">MCQs</li>
		</ul>	
			<button type="button" class="home-button btn btn-success" onclick="window.location.href = '../index.php';">Home</button>
				
		</div>
		<?php include '../footer.php';?>
	</body>
</html>