<?php
function pdoConnect(){
    return new PDO('mysql:host=' . $GLOBALS['DB_HOST'] . ';dbname=' . $GLOBALS['DB_NAME'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);
}

function get_http_type()
{
    $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
    return $http_type;
}

function titleChange(){
    $title='';
    if (!empty(getInfo($_GET['page']))) $title = getInfo($_GET['page']) . ' - ';
    $title = $title . getInfo('title');
    return '<script>$(document).attr("title","'.$title.'");</script>';
}

function getInfo($name)
{
    try{
        $pdo = pdoConnect();
        $stmt = $pdo->prepare("select * from loveway_config where name = ?");
        $stmt->bindValue(1,$name);
        if($stmt->execute()){
            $rows = $stmt->fetchAll();
            return $rows[0]['value'];
        } else {
            return 'database connection failed';
        }
    } catch (Exception $e) {
        include('./pages/err.php');
        //echo $e->getMessage();
    }
}

function hideSomethings(){
    echo "<script>";
    echo "$('#appbar').css('display','none');";
    echo "$('#main-drawer').css('display','none');";
    echo "setTimeout(function(){inst.close();},50);";
    echo "</script>";
}
?>