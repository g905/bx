<style>
table, td {
    border: 1px solid black;
    border-collapse: collapse;
}
td, th {
    padding: 5px;
}
</style>

<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
    $params["userId"] = $_GET["ufilter_select"] != null ? $_GET["ufilter_select"] : null;
    $params["discId"] = $_GET["dfilter_select"] != null ? $_GET["dfilter_select"] : null;
?>

<div class="ufilter">
    <form action="/" method="get" class="ufilter_form">
        <select name="ufilter_select">
            <option value="0" name="all">Все</option>
            <?php
                foreach($arResult["USERS_ALL"] as $r) {
                    echo "<option value=\"" . $r->getId() . "\"";
                    if($r->getId() == $params["userId"]) {
                       echo "selected";
                    }
                    echo ">";
                    echo $r->getName();
                    echo "</option>";
                }
            ?>
        </select>
        <select name="dfilter_select">
            <option value="0" name="all">Все</option>
            <?php
                foreach($arResult["DISCIPLINES_ALL"] as $r) {
                    echo "<option value=\"" . $r->getId() . "\"";
                    if($r->getId() == $params["discId"]) {
                       echo "selected";
                    }
                    echo  ">";
                    echo $r->getName();
                    echo "</option>";
                }
            ?>
        </select>
        <input type="submit" value="Показать">
    </form>
</div>


<div class="disciplines">
<h3>Предметы</h3>

<table>
    <tr>
        <th>Имя</th>
        <th>Предмет</th>
        <th>Балл</th>
        <th>Рейтинг пользователя</th>
        <th>Рейтинг результата</th>
    </tr>
<?php
foreach($arResult["DISCIPLINES"] as $d) {
?>
    <tr>
        <td>
            <?php echo $d->getUser()->getName(); ?>
        </td>
        <td>
            <?php echo $d->getDiscipline()->getName(); ?>
        </td>
        <td>
            <?php echo $d->getScore(); ?>
        </td>
        <td></td>
        <td></td>
    </tr>
<?php
}
?>
</table>
</div>

