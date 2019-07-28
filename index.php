<!DOCTYPE HTML>
<html>  
<head>
    <title>Сервис</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="description" content="равнение цен косметики."/>
    <meta name="description" content="равнение цен косметики."/>
    <style> 
        body{
            font-size: 120%;
            text-align: center;
            color: pink;
        }
        input[type="text"]{
            width: 500px;
            height: 20px;
        }
        input[type="submit"]{
            width: 120px;
            height: 26px;
            
        }
 
    </style>
</head>
<body>
    <h1>Сравнение цен на косметику</h1>
    <form name="form" action="/" method="post">
            <input type="text" name="a" />
            <input type="submit" name="button" value="Сравнить цены" />
    </form>
</body>
</html>


<?php
//header ("Content-Type: text/html; charset=utf-8");
    function printResult ($result_set) 
    {
        while ($row = $result_set->fetch_assoc())
        { 
            echo $row["CompanyName"]." ".$row["ProductName"]." ".$row["ProductPrice"]."руб.<br />";
            echo "<br />";
            
        }
        //echo "Всего найдено записей -".$result_set->num_rows;   
    }

    $mysqli = new mysqli ("localhost","root",'',"mybase");
    $mysqli->query ("SET NAMES 'utf8'");
    //$result_set =$mysqli->query ("SELECT * FROM `company`");
   // printResult($result_set);
    if (isset($_POST["button"])) {
    $str=$_POST["a"];
    
    }

    $result_set = $mysqli->query("SELECT products.name AS ProductName, products.price AS ProductPrice, companies.name AS CompanyName FROM products INNER JOIN companies ON products.company_id = companies.id WHERE products.name LIKE '%$str%'");
    echo "<br /><br /><br />";
    printResult($result_set);
    
//require_once 'phpQuery-master/phpQuery/phpQuery.php';
/*$url='https://shop.rivegauche.ru/';
// Сайт Летуаля https://www.letu.ru/
// Сайт Элипса http://www.ellips.biz/
// Сайт Рив Гоша  https://shop.rivegauche.ru/
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
$site=curl_exec($curl);
var_dump($site);
//preg_match_all('#<a.+?href="(.+?)".+?#',$site,$res);
//var_dump($res[1]);
*/
?>

