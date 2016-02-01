<div align="center">
<img src="plasma_logo.gif">
</div>

<div align=center>

<?php

// include MySQL-processing classes

require_once 'mysql.php';


// connect to MySQL

//$db=new PDO('localhost','root','','PICSimulations');
$db = new PDO('mysql:host=localhost;dbname=PICSimulations;charset=utf8', 'root', '');

//$searchQ = 'Lampe';
$keyword='Silva';
//$keyword = filter_input(INPUT_POST, 'searchterm', FILTER_SANITIZE_STRING);
$keyword = filter_input(INPUT_POST | INPUT_GET, 'searchterm');
$minrange =  filter_input(INPUT_POST | INPUT_GET, 'minrange');
$maxrange =  filter_input(INPUT_POST | INPUT_GET, 'maxrange');
//$keyword= $_POST['searchterm'];

//foreach($db->query('SELECT * FROM Shock WHERE Reference ') as $row) {
//    echo '   <html><br></html >  config = '.$row['Config'].'  ref= '.$row['Reference'] ,PHP_EOL; //etc...
//    //fwrite([output text]."\n");
    //echo [output text]."<br>";
//    echo "\r\n";
//}

echo ('<table><tr>');

$sql="SELECT * FROM `Shock` WHERE `Reference` LIKE :keyword  ;";
$sql="SELECT * FROM `Shock` WHERE `Reference` LIKE :keyword  OR WHERE CAST(`Gamma` AS DECIMAL) BETWEEN CAST(:minrange AS DECIMAL) AND CAST(:maxrange  AS DECIMAL);";
$sql="SELECT * FROM `Shock` WHERE CAST(`Gamma` AS DECIMAL) BETWEEN CAST(:minrange AS DECIMAL) AND CAST(:maxrange  AS DECIMAL);";
$q=$db->prepare($sql);
//$q->bindValue(':keyword','%'.$keyword.'%');
$q->bindValue(':minrange',$minrange);
$q->bindValue(':maxrange',$maxrange);
$q->execute();
echo " You searched for  $keyword in range between $minrange and $maxrange";
while ($r=$q->fetch(PDO::FETCH_ASSOC)) {
//    echo"<pre>".print_r($r,true)."</pre>";
 echo('<tr>');
    echo '   <td>  config = '.$r['Config'].'  </td > <td>ref= '.$r['Reference'].' </td><td>gam= '.$r['Gamma'].'</td>' ,PHP_EOL; //etc...
     echo('</tr>');
}

echo ('</table>');
?>

</div>
