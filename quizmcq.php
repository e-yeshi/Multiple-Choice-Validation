quizmcq.php
<html>
	<head>
		<title>Practicum 2</title>
		<link rel="stylesheet" type="text/css" href="./styles.css">
	</head>
	
	<body>
	<?php include '../menu.php';?>
	<?php
	$q01 = array();
	$q02 = array();
	$q03 = array();
	$q01Ans = array();
	$q02Ans = array();
	$q03Ans = array();
	$q01CorrectAns = '';
	$q02CorrectAns = '';
	$q03CorrectAns = '';

	if(sizeof($_POST)>0 ? true : false ){
		$submittedq1 = $_POST['q1'];
    $submittedq2 = $_POST['q2'];
    $submittedq3 = $_POST['q3'];
	}

	function classColor($grade){
		$class = 'green';
		if($grade > 80) 
			$class = 'green';
		elseif($grade > 60) 
			$class = 'yellow';
		elseif($grade > 50) 
			$class = 'red';
		else
			$class = 'black';
		
		return $class;
	}

	function calculateGrade($submittedq1, $submittedq2 , $submittedq3 , $q01CorrectAns, $q02CorrectAns , $q03CorrectAns){
		$ans1 = $submittedq1 == $q01CorrectAns? 100:0;
		$ans2 = $submittedq2 == $q02CorrectAns? 100:0;
		$ans3 = $submittedq3 == $q03CorrectAns? 100:0;
		$average = (($ans1+ $ans2 + $ans3) /300)*100 ;
		return $average;
	}
	
	if (($handle = fopen("questionsmcq.txt", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
			{
				if($data[0] == 'q01'){
					array_push($q01 ,$data[1]);
					$q01CorrectAns = $data[2];
				}
				if($data[0] == 'q02'){
					array_push($q02 ,$data[1]);
					$q02CorrectAns = $data[2];
				}
				if($data[0] == 'q03'){
					array_push($q03 ,$data[1]);
					$q03CorrectAns = $data[2];
				}

			}
			fclose($handle);
		}
		if (($handle = fopen("answersoptionsmcq.txt", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ":")) !== FALSE)
				{
					if($data[0] == 'q01'){
						$q01Ans[$data[1]] = $data[2];
					}
					if($data[0] == 'q02'){
						$q02Ans[$data[1]] = $data[2];
					}
					if($data[0] == 'q03'){
						$q03Ans[$data[1]] = $data[2];
					}
				}
				fclose($handle);
			}

	?>



    <div class= "col-md-12 col-lg-12 main-containor">
		<h2 class="buttons center">Online Quiz</h2>
      <form action="quizmcq.php" method="post">
        <div class="head row">
          <div class="middle-container">
            <br />
						<h6><?php echo "1. $q01[0]";?><h6/> 
						<br />
						<?php
							$key =  key($q01Ans);
							foreach($q01Ans as $element) {							
								echo "<input type='radio' name='q1' value =" .$key ." > ". $key.". ". $element. "</input><br>";
								$key =  key($q01Ans);
								next($q01Ans);
							}
						?>
            <br />
            <br />
						<h6><?php echo "2. $q02[0]";?><h6/> 
						<br />
						<?php
							$key =  key($q02Ans);
							foreach($q02Ans as $element) {
								echo "<input type='radio' name='q2' value =" .$key ." > ". $key.". ". $element. "</input><br>";
								$key =  key($q02Ans);
								next($q02Ans);
							}
						?>
            <br />
            <br />
						<h6><?php echo "3. $q03[0]";?><h6/> 
						<br />
						<?php
							$key =  key($q03Ans);
							foreach($q03Ans as $element) {
								echo "<input type='radio' name='q3' value =" .$key ." > ". $key.". ". $element. "</input><br>";
								$key =  key($q03Ans);
								next($q03Ans);
							}
						?>
					</div>
					

        </div>
        <div class="buttons col-md-12 col-lg-12">
					<input type="submit" value="Submit quiz">
					<input type="reset" value="Clear"
        </div>
				<?php
					if(sizeof($_POST)>0?true: false){
						$grade = calculateGrade($submittedq1, $submittedq2 , $submittedq3 , $q01CorrectAns, $q02CorrectAns , $q03CorrectAns);
						echo "<div class='center'><h4 class ='".classColor($grade)."'>You scored a " . round($grade, 2) ." in the quiz<h4></div>";
					}
						
					?>
        
      </form>
      <button type="button" class="practica-button btn btn-warning" onclick="window.location.href = './index.php';">Practicum Main</button>
			<button type="button" class="home-button btn btn-success" onclick="window.location.href = '../index.php';">Home</button>
				
		</div>
		<?php include '../footer.php';?>
	</body>
</html>
