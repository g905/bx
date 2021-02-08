<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$params = [];
$params["userId"] = intval($_REQUEST["ufilter_select"] != null ? $_REQUEST["ufilter_select"] : 0);
$params["discId"] = intval($_REQUEST["dfilter_select"] != null ? $_REQUEST["dfilter_select"] : 0);


$discs = $this->getDisciplines();
foreach($discs as $i => $r) {
    $arResult["DISCIPLINES_ALL"][$i] = $r;
}

$sort = array("DISCIPLINE_ID" => "DESC", "SCORE" => "ASC");
$all = $this->getAllScores($sort);

?>
<pre>
<?php
foreach($all as $a) {
    //echo $a->getUser()->getName() . "<br>";
}
?>
</pre>
<?php
$res = $this->getScoresByUserAndDiscipline($params["userId"], $params["discId"]);
foreach($res as $i => $r) {
    $arResult["DISCIPLINES"][$i] = $r;
}

$discs = $this->getDisciplines($params["discId"]);
foreach($discs as $i => $r) {
    //$arResult["DISCIPLINES"][$i] = $r;
}
//$userName = $this->getUserNameById($userId);
//echo "<br>" . $userName . "<br>";
/*
$discs = $this->getDisciplines();
foreach($discs as $i => $r) {
    $arResult["DISCIPLINES"][$i] = $r;
}

$res = $this->getScoresByUser($userId);
foreach($res as $r) {
    echo $r->getDiscipline()->getName() . ": " . $r->getScore() . "<br>";
}

$res = $this->getScoresByUserAndDiscipline($userId, 3);
foreach($res as $r) {
    //echo $r->getDiscipline()->getName() . ": " . $r->getScore() . "<br>";
}

echo "<h3>Рейтинг</h3>";
$sort = array('SCORE' => 'DESC');
$res = $this->getAllScores($sort);
foreach($res as $r) {
    echo $r->getUser()->getName() . ": " . $r->getDiscipline()->getName() . " - " . $r->getScore() . "<br>";
}

echo "<h3>Пользователи</h3>";*/



$this->includeComponentTemplate();
?>
