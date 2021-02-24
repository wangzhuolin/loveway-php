<?php
header('content-type:application/json');
include('../config.php');
include('../includes/function.php');
$confessor = htmlspecialchars($_POST['name']);
$contact = intval(htmlspecialchars($_POST['contact']));
$ta = htmlspecialchars($_POST['taName']);
$image = htmlspecialchars($_POST['image']);
$introduction = htmlspecialchars($_POST['introduceTA']);
$content = htmlspecialchars($_POST['toTA']);
$timestamp = intval(htmlspecialchars($_POST['timestamp']));
if (empty($confessor) || empty($contact) || empty($ta) || empty($introduction) || empty($content)) {
    exit('{"code":-3,"msg":"表单未填写完整或存在错误！"}');
}

if ($timestamp - time() > 5 || time() - $timestamp > 5) {
    exit('{"code":-5,"msg":"提交失败！请检查您的系统时间！"}');
}

$all = 'Kagamine Yes!' . strval($contact) . $confessor . $ta . $image . $introduction . $content . strval($timestamp);
if (md5($all) != $_POST['key']) {
    exit('{"code":-5,"msg":"出现了一个未知错误！请联系管理员！"}');
}

try {
    $pdo = pdoConnect();
    $stmt = $pdo->prepare("insert into loveway_data(id,confessor,contact,time,to_who,introduction,content,image)values(?,?,?,?,?,?,?,?)");
    $stmt->bindValue(1, rand(100000000, 999999999));
    $stmt->bindValue(2, $confessor);
    $stmt->bindValue(3, $contact);
    $stmt->bindValue(4, date("Y-m-d H:i:s", time()));
    $stmt->bindValue(5, $ta);
    $stmt->bindValue(6, $introduction);
    $stmt->bindValue(7, $content);
    $stmt->bindValue(8, $image);
    if ($stmt->execute()) {
        exit('{"code":1,"msg":"success"}');
    } else {
        exit('{"code":-2,"msg":"抱歉，出现了一个未知错误！请与管理员联系！"}');
    }
} catch (PDOException $e) {
    exit('{"code":-1,"msg":"抱歉，出现了一个致命错误！请与管理员联系！"}');
}
