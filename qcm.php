<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >

<head>
<title>Qcm</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/accordeon.js" type="text/javascript"></script>


</head>


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

$tabReponses = array();
while($row = mysql_fetch_assoc($result, MYSQL_ASSOC))
{
        $tabReponses[] = array ($row['id_quiz'], $row['question'], $row['reponse'], $row['reponse_mauvaise1'],  $row['reponse_mauvaise2']);
}

?>
<h4 class="accordionButton">Quizz</h4>


<form class="accordionContent" method="post" action="qcmreponse.php"> 
<?php

if (!empty ($tabReponses) && is_array($tabReponses))
{
        foreach  ($tabReponses as $tabTemp)
        {       
                ?>
                <p>
				
                <?php
                $idQuiz = $tabTemp[0];
                $question = $tabTemp[1];
                $tabReponseAuHazard = array ($tabTemp[2], $tabTemp[3], $tabTemp[4]);
                shuffle ($tabReponseAuHazard);
				
				echo $question; ?><br /> <?php
				
				
                for ($i=0; $i<count($tabReponseAuHazard); $i++)
                {
                        $value = $tabReponseAuHazard[$i];
                        $texte = $tabReponseAuHazard[$i];
                        ?>
                        <label> 
                            <input type="radio" name="<?php echo $idQuiz; ?>" value="<?php echo $value; ?>" /> <?php echo $texte; ?>
                        </label>
                        <br />
						
						<?php
                }
                ?>  
                </p>
                <?php
                
        }
}
?>
<input type="submit" value="Envoyer" name="submit" />
</form>

</html>