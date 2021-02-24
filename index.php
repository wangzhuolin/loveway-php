<?php
// [未知表白墙]
// Copyright (C) 2021， 吴先森
// 本程序是一个自由软件，你可以重新分发它，可以修改它，但要遵守GPL 2.0版本或者后续其他版本。
// 我们希望本程序是有用的，但是我们不保证它能用，不保证它好用，我们不提供任何保证。
// 更多请见GPL全文，如果理解不了，找人话版看看。
// 按道理你在得到本软件时，应该已经得到一份GPL，如果你没找到，写信给自由软件基金会（FSF）：
// 51 Franklin Street, Fifth Floor, Boston, MA 02110‐1301, USA
// i@mr-wu.top
include('./config.php');
include('./includes/function.php');
error_reporting(0);
if ($REWRITE) {
    $pageName = explode("/", $_GET['uri'])[1];
    if ($pageName == "card") {
        $cardID = explode("/", $_GET['uri'])[2];
    }
    parse_str($_GET['args'], $QueryArr);
} else {
    $pageName = $_GET['page'];
}
if (empty($QueryArr)) {
    $QueryArr = $_GET;
}
$templateMode = empty($QueryArr['_pjax']);
$siteTitle = getInfo('title');
switch ($pageName) {
    case "":
        include('./pages/homepage.php');
        listActive('home');
        break;
    case "submit":
        include('./pages/submit.php');
        listActive('submit');
        break;
    case "more":
        include('./pages/more.php');
        listActive('more');
        break;
    case "about":
        include('./pages/about.php');
        listActive('about');
        break;
    case "card":
        include('./pages/card.php');
        hideSomethings();
        break;
    case "admin":
        if ($_COOKIE['loveway_token'] == md5($ADMIN_USER . $ADMIN_PASS . 'KAGAMINE WORLD!' . date('Y-m-d', time()))) {
            include('./pages/admin.php');
        } else {
            include('./pages/login.php');
        }
        break;
    default:
        $templateMode = false;
        include('./pages/404.php');
}
echo titleChange();
if ($templateMode) {
    include('./includes/footer.php');
}
