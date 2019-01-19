<?php
$t = '2019-12';
$thisMonth = new DateTime($t); // 2015-08-01
$yearMonth = $thisMonth->format('F Y');

$tail = '';
$lastDayOfPrevMonth = new DateTime('last day of ' . $yearMonth . ' -1 month');
while ($lastDayOfPrevMonth->format('w') < 6) {
  $tail = sprintf('<td class="gray">%d</td>', $lastDayOfPrevMonth->format('d')) . $tail;
  $lastDayOfPrevMonth->sub(new DateInterval('P1D'));
}

$body = '';
$period = new DatePeriod(
  new DateTime('first day of ' . $yearMonth),
  new DateInterval('P1D'),
  new DateTime('first day of ' . $yearMonth . ' +1 month')
);
foreach ($period as $day) {
  if ($day->format('w') % 7 === 0) { $body .= '</tr><tr>'; }
  $body .= sprintf('<td class="youbi_%d">%d</td>', $day->format('w'), $day->format('d'));
}

$head = '';
$firstDayOfNextMonth = new DateTime('first day of ' . $yearMonth . ' +1 month');
while ($firstDayOfNextMonth->format('w') > 0) {
  $head .= sprintf('<td class="gray">%d</td>', $firstDayOfNextMonth->format('d'));
  $firstDayOfNextMonth->add(new DateInterval('P1D'));
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
<th><a href="#"></a></th>
<th colspan="5">Janualy 2019</th>
<th><a href="#"></a></th>
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
<th colspan="7"><a href="">Today</a></th>
</tr>
</tfoot>
</table>

</body>
</head>
</html>
php -S 192.168.33.30:8000
http://192.168.33.30:8000
