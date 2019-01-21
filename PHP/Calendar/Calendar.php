<?php
namespace MyApp;

class Calendar{
public $prev;
public $yearMonth;
public $next;
private $_thisMonth;

public function __construct(){
  /* URLパラメータ抽出 */
  try {
   if (!isset($_GET['m']) || !preg_match('/\A\d{4}-\d{2}\z/',$_GET['m'])){
    throw new \Exception();
  }
  $this->_thisMonth = new \DateTime($_GET['m']);//当月
  }catch(\Exception $e){
  $this->_thisMonth = new \DateTime('first day of this month');
  }
$this->prev = $this->_createPrevLink();
$this->next = $this->_createNextLink();
$this->yearMonth = $this->_thisMonth->format('F Y');
}//construct_end

private function _createPrevLink() {
    $dt = clone $this->_thisMonth;
    return $dt->modify('-1 month')->format('Y-m');
  }

private function _createNextLink() {
    $dt = clone $this->_thisMonth;
    return $dt->modify('+1 month')->format('Y-m');
  }
/*-----------------------------Show()-----------------------------------------------------*/
public function show(){
$tail= $this->_getTail();
$body= $this->_getBody();
$head= $this->_getHead();
$html = '<tr>' . $tail . $body . $head . '</tr>';
echo $html;
}//show_end

private function _getTail(){
  /*  前月末週のフォーマット */
 $tail .="";
  $lastDayOfPrevMonth = new \DateTime('last day of ' . $this->yearMonth . ' -1 month');
  while ($lastDayOfPrevMonth->format('w') < 6) {
  $tail = sprintf('<td class="gray">%d</td>', $lastDayOfPrevMonth->format('d')) . $tail;
  $lastDayOfPrevMonth->sub(new \DateInterval('P1D'));//sub()=Intervalから減算出力
  }
return   $tail;
}//_getTail_end

private function _getBody(){
  /* 当月のDatePeriod*/
  $body = '';
  $period = new \DatePeriod(
    new \DateTime('first day of ' . $this->yearMonth),//(PHP相対書式)=当月
    new \DateInterval('P1D'),
    new \DateTime('first day of ' . $this->yearMonth . ' +1 month')//(PHP相対書式)=来月
  );
  /*当月のフォーマット*/
  $today = new \DateTime('today');//(PHP相対書式)
  foreach ($period as $day) {
  switch ($day->format('w')) {
    case 0:
    $body .= '</tr><tr>';
    $todayClass = ($day->format('Y-m-d') === $today->format('Y-m-d'))? 'today':'';
    $body .= sprintf('<td class="youbi_%d %s">'.'(%d)'.'</td>', $day->format('w'),$todayClass,$day->format('d'));
    break;
    case 1:
    $todayClass = ($day->format('Y-m-d') === $today->format('Y-m-d'))? 'today':'';
    $body .= sprintf('<td class="youbi_%d %s">%d</td>', $day->format('w'),$todayClass,$day->format('d'));
    break;
    case 2:
    $todayClass = ($day->format('Y-m-d') === $today->format('Y-m-d'))? 'today':'';
    $body .= sprintf('<td class="youbi_%d %s">%d</td>', $day->format('w'),$todayClass,$day->format('d'));
    break;
    case 3:
    $todayClass = ($day->format('Y-m-d') === $today->format('Y-m-d'))? 'today':'';
    $body .= sprintf('<td class="youbi_%d %s">%d</td>', $day->format('w'),$todayClass,$day->format('d'));
    break;
    case 4:
    $todayClass = ($day->format('Y-m-d') === $today->format('Y-m-d'))? 'today':'';
    $body .= sprintf('<td class="youbi_%d %s">%d</td>', $day->format('w'),$todayClass,$day->format('d'));
    break;
    case 5:
    $todayClass = ($day->format('Y-m-d') === $today->format('Y-m-d'))? 'today':'';
    $body .= sprintf('<td class="youbi_%d %s">%d</td>', $day->format('w'),$todayClass,$day->format('d'));
    break;
    case 6:
    $todayClass = ($day->format('Y-m-d') === $today->format('Y-m-d'))? 'today':'';
    $body .= sprintf('<td class="youbi_%d %s">[%d]</td>', $day->format('w'),$todayClass,$day->format('d'));
    break;
  }//switch_end
}//_foreah_end
return  $body;
}//_getBody_end

private function _getHead(){
  /*来月のフォーマット*/
  $head = '';
  $firstDayOfNextMonth = new \DateTime('first day of ' . $this->yearMonth . ' +1 month');
  while ($firstDayOfNextMonth->format('w') > 0) {
    $head .= sprintf('<td class="gray">%d</td>', $firstDayOfNextMonth->format('d'));
    $firstDayOfNextMonth->add(new \DateInterval('P1D'));//add()=Intervalに加算出力
  }
return $head;
}//_grtHead_end

}//Class&Propaty_end
 ?>
