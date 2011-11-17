<?php


$db = array();
$db['host'] = 'localhost'; 
$db['user'] = 'root'; // utilisateur
$db['pass'] = ''; //password
$db['base'] = 'techn2'; //nom de la base de donnee


if($_SERVER['SERVER_NAME'] != 'localhost'){
	$db['host'] = 'xxxx'; 
	$db['user'] = 'xxxx'; // utilisateur
	$db['pass'] = 'xxxxx'; //password
	$db['base'] = 'xxxx'; //nom de la base de donnee
}


function database_connect($db){
	$link = mysql_connect($db['host'],$db['user'],$db['pass']);
	if(!$link) die("erreur de connexion a la base de donnee".mysql_error());
	if(!mysql_select_db($db['base'])) die ("selection de la vase impossible");
	return $link;
}


function database_disconnect($link){
	mysql_close($link);
}
$link = database_connect($db);


$sql = 'SELECT * FROM quiz';
$result = mysql_query($sql);
if(!$result){
	die('erreur dans la requete : ' . mysql_error());
}

var_dump($_POST);

$row = mysql_fetch_array($result, MYSQL_ASSOC);
$array = array($_POST);

foreach($array as $element){
	foreach($element as $cle => $element2){
	
		$question = 'SELECT id_quiz, question, reponse
		FROM quiz
		WHERE id_quiz='.$cle;
		$result_question = mysql_query($question);
		$row_question = mysql_fetch_array($result_question, MYSQL_ASSOC);
		
		echo 'La question est : '.$row_question['question'].'<br />';
		echo 'Vous avez répondu : ' . $element2.'<br />'; //echo 'Vous avez répondu : [' . $cle . ']' . $element2;
		$verif_reponse = mysql_num_rows(mysql_query('SELECT id_quiz FROM quiz WHERE reponse="'.$element2.'"'));
		if($verif_reponse == 0){
		echo' C\'est une mauvaise réponse !
		La bonne réponse est : '. $row_question['reponse'].'<br /><br />';
		}
		else{echo' C\'est une bonne réponse !<br /><br />';}
	}
}

/*
$array = array($_POST); 
echo $array[0][1].'<br />';
echo $array[0][2].'<br />';
echo $array[0][3].'<br />';
echo $array[0][4].'<br />';
echo $array[0][5].'<br />';
echo $array[0][6].'<br />';
echo $array[0][7].'<br />';
echo $array[0][8].'<br />';
echo $array[0][9].'<br />';
echo $array[0][10].'<br /><br /><br />';

var_dump($_POST);
if (isset ($_POST['submit'])) {

	if($_POST['1']){
	$q1 = $_POST['1'];
	echo $q1.'<br />';
	}
	
	if($_POST['2']){
	$q2 = $_POST['2'];
	echo $q2.'<br />';
	}
	if($_POST['3']){
	$q3 = $_POST['3'];
	echo $q3.'<br />';
	}
	if($_POST['4']){
	$q4 = $_POST['4'];
	echo $q4.'<br />';
	}
	if($_POST['5']){
	$q5 = $_POST['5'];
	echo $q5.'<br />';
	}
	if($_POST['6']){
	$q6 = $_POST['6'];
	echo $q6.'<br />';
	}
	if($_POST['7']){
	$q7 = $_POST['7'];
	echo $q7.'<br />';
	}
	if($_POST['8']){
	$q8 = $_POST['8'];
	echo $q8.'<br />';
	}
	if($_POST['9']){
	$q9 = $_POST['9'];
	echo $q9.'<br />';
	}
	if($_POST['10']){
	$q10 = $_POST['10'];
	echo $q10;
	}
}	
	else{
	echo'echo submit';
	}
*/
/*
while($row = mysql_fetch_assoc($result, MYSQL_ASSOC)) {
        $note_totale = 0; // on initialise la note        




        // if $idQuiz = $value
        if ( $_POST['id_quiz'] == $_POST['reponse'] )
        {
            $note_totale = $note_totale + 1;
			echo $_POST["reponse"].' '.$_POST["id_quiz"]. ': Réponse juste.<br />'.$row["explication"].' de la réponse.';
        }
		else { 
			echo 'Question 1: Réponse mauvaise. Bonne réponse: <br />'.$row["explication"].' de la réponse.';
		}

		
		
	}
 

 
       
        ?>
<p>
    Ta note : <?php echo $note_totale ; ?><br />

</p>
 */
   
?>