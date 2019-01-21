<?php
require "Calendar.php";

/* リンクエスケープ処理*/
function h($p){
  return htmlspecialchars($p,ENT_QUOTES,'UTF-8');
}

$call_calss1 = new MyApp\Calendar();//Claendar.php
?>
<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset="utf-8">
<title>Calendar_Plogram/カレンダープログラム</title>
<link href="styles.css" rel="stylesheet">
</head>
<body>
<table>
<thead>
<tr>
<!--Month Link-------------------------------->
<th><a href="/?m=<?php echo h($call_calss1->prev); ?>">&laquo;</a></th>
<th colspan="5"><?php echo h($call_calss1->yearMonth); ?></th>
<th><a href="/?m=<?php echo h($call_calss1->next); ?>">&raquo;</a></th>
</tr>
</thead>
<tbody>
<tr>
<td>Sun</td>
<td>Mon</td>
<td>Tue</td>
<td>Wed</td>
<td>Thu</td>
<td>Fri</td>
<td>Sat</td>
</tr>
<tr>
<!--Dateperiod-------------------------------->
<?php echo $call_calss1->show();?>
<!--<td class="youbi_0">1</td>
<td class="youbi_1">2</td>
<td class="youbi_2">3</td>
<td class="youbi_3">4</td>
<td class="youbi_4 today">5</td>
<td class="youbi_5">6</td>
<td class="youbi_6">7</td>
</tr>
<tr>
<td class="youbi_0">30</td>
<td class="youbi_1">31</td>
<td class="gray">1</td>
<td class="gray">2</td>
<td class="gray">3</td>
<td class="gray">4</td>
<td class="gray">5</td>-->
</tr>
</tbody>
<tfoot>
<tr>
<!--Today Link------------------------------->
<th colspan="7"><a href="/">Today</a></th>
</tr>
</tfoot>
</table>

</body>
</head>
</html>
php -S 192.168.33.30:8000
http://192.168.33.30:8000
