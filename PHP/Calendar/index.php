<?php
/* リンクエスケープ処理*/
function h($p){
  return htmlspecialchars($p,ENT_QUOTES,'UTF-8');
}

/* URLパラメータ抽出 */
try {
 if (!isset($_GET['m']) || !preg_match('/\A\d{4}-\d{2}\z/',$_GET['m'])){
  throw new Exception();
}
$thisMonth = new DateTime($_GET['m']);//当月
}catch(Exception $e){
$thisMonth = new DateTime('first day of this month');
}
//var_dump($thisMonth);
//exit;
$yearMonth = $thisMonth->format('F Y');

/*リンクのタイムスタンプ処理*/
$dt = clone $thisMonth;
$next = $dt->modify('+1 month')->format('Y-m');
$dt = clone $thisMonth;
$prev = $dt->modify('-1 month')->format('Y-m');


/*  前月末週のフォーマット */
$tail = '';
$lastDayOfPrevMonth = new DateTime('last day of ' . $yearMonth . ' -1 month');
while ($lastDayOfPrevMonth->format('w') < 6) {
  $tail = sprintf('<td class="gray">%d</td>', $lastDayOfPrevMonth->format('d')) . $tail;
  $lastDayOfPrevMonth->sub(new DateInterval('P1D'));//sub()=Intervalから減算出力
}

/* 当月のDatePeriod*/
$body = '';
$period = new DatePeriod(
  new DateTime('first day of ' . $yearMonth),//('first day of this month')=当月
  new DateInterval('P1D'),
  new DateTime('first day of ' . $yearMonth . ' +1 month')//(first day of next month)=来月
);
/*当月のフォーマット*/
$today = new DateTime('today');
foreach ($period as $day) {
  if ($day->format('w') % 7 === 0) { $body .= '</tr><tr>'; }//折り返し処理
  $todayClass = ($day->format('Y-m-d') === $today->format('Y-m-d'))? 'today':'';//当日の強調表示のための三項演算
  $body .= sprintf('<td class="youbi_%d %s">%d</td>', $day->format('w'), $todayClass,$day->format('d'));//%s(string型式)の置換処理
}

/*来月のフォーマット*/
$head = '';
$firstDayOfNextMonth = new DateTime('first day of ' . $yearMonth . ' +1 month');
while ($firstDayOfNextMonth->format('w') > 0) {
  $head .= sprintf('<td class="gray">%d</td>', $firstDayOfNextMonth->format('d'));
  $firstDayOfNextMonth->add(new DateInterval('P1D'));//add()=Intervalに加算出力
}

$html = '<tr>' . $tail . $body . $head . '</tr>';
?>
<!DOCTYPE html>
<html lang ="ja">
<head>
<meta charset="utf-8">
<title>Calendar_Plogram カレンダープログラム</title>
<link href="styles.css" rel="stylesheet">
</head>
<body>

<table>
<thead>
<tr>
<!--Month Link-------------------------------->
<th><a href="/?m=<?php echo h($prev); ?>">&laquo;</a></th>
<th colspan="5"><?php echo $yearMonth?></th>
<th><a href="/?m=<?php echo h($next); ?>">&raquo;</a></th>
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
<?php echo $html;?>
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
