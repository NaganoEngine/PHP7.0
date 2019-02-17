<?php
namespace Database;
class PDO{
public $PDO;
public $All;

public function __construct(){
$this->PDO=$this->PDO();
$this->All=$this->TOP0();
}//Construct_END

const DB_DATABASE='';
const DB_USERNAME='';
const DB_PASSWORD='';
const DB_HOST='';
const DB_PORT='port=3306';
const PDO_DSN='';

public function PDO(){
/*Open Data Base*/
  try{
    //connect
     $con=new \PDO(self::PDO_DSN,self::DB_USERNAME,self::DB_PASSWORD,array(
     \PDO::ATTR_PERSISTENT=>true
     ));
     $con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
   }catch(\PDOException $e){
      print "接続エラーです。".$e->getMessage()."<br>";
     }
     return $con;
}//Method_PDO_END

public function STMTS(){
// select all
$con=$this->PDO();
$stmt = $con->query("select * from asset_all_data");
$stmts = $stmt->fetchAll();
return $stmts;
}//Method_STMTS_END

public function TOP0(){
$stmts=$this->STMTS();
$key=array_keys($stmts);
for($i=0;$i<=count($key)-1; $i++){
switch($key[$i]){
case $i:
$Top = $stmts[$i]['Date'].$stmts[$i]['Day']."  ".$stmts[$i]['Title']." ".$stmts[$i]['Category'];
$Art = $stmts[$i]['texthtml'];
$File1 = $stmts[$i]['file1'];
$File1 = "data:image/jpg;base64,".base64_encode($File1);
$File2 = $stmts[$i]['file2'];
$File2 = "data:image/jpg;base64,".base64_encode($File2);
$File3 = $stmts[$i]['file3'];
$File4 = $stmts[$i]['file4'];
$File5 = $stmts[$i]['file5'];

if(isset($File1) && !empty($File1) && isset($File2) && empty($File2) && isset($File3) && empty($File3) && isset($File4) && empty($File4) && isset($File5) && empty($File5)){
echo $this->All='<dl>'.
'<dt id="Top_'.$i.'">'.$Top.'</dt>'.
'<dd>'.$Art.'</dd>'.
'<dd><img src="'.$File1.'"></dd>'.
'<dd id="sharebuttons_'.$i.'" class="share_length"></dd>'.
'</dl>'.'<br><br>';
}
elseif(isset($File1) && !empty($File1) && isset($File2) && !empty($File2) && isset($File3) && empty($File3) && isset($File4) && empty($File4) && isset($File5) && empty($File5)){
echo $this->All='<dl>'.
'<dt id="Top_'.$i.'">'.$Top.'</dt>'.
'<dd>'.$Art.'</dd>'.
'<dd><img src="'.$File1.'"><img src="'.$File2.'"></dd>'.
'<dd id="sharebuttons_'.$i.'" class="share_length"></dd>'.
'</dl>'.'<br><br>';
}
elseif(isset($File1) && !empty($File1) && isset($File2) && !empty($File2) && isset($File3) && !empty($File3) && isset($File4) && empty($File4) && isset($File5) && empty($File5)){
echo $this->All='<dl>'.
'<dt id="Top_'.$i.'">'.$Top.'</dt>'.
'<dd>'.$Art.'</dd>'.
'<dd><img src="'.$File1.'"><img src="'.$File2.'"></dd>'.
'<dd><img src="'.$File3.'"></dd>'.
'<dd id="sharebuttons_'.$i.'" class="share_length"></dd>'.
'</dl>'.'<br><br>';
}
else if(isset($File1) && !empty($File1) && isset($File2) && !empty($File2) && isset($File3) && !empty($File3) && isset($File4) && !empty($File4) && isset($File5) && empty($File5)){
echo $this->All='<dl>'.
'<dt id="Top_'.$i.'">'.$Top.'</dt>'.
'<dd>'.$Art.'</dd>'.
'<dd><img src="'.$File1.'"><img src="'.$File2.'"></dd>'.
'<dd><img src="'.$File3.'"><img src="'.$File4.'"></dd>'.
'<dd id="sharebuttons_'.$i.'" class="share_length"></dd>'.
'</dl>'.'<br><br>';
}
else if(isset($File1) && !empty($File1) && isset($File2) && !empty($File2) && isset($File3) && !empty($File3) && isset($File4) && !empty($File4) && isset($File5) && !empty($File5)){
echo $this->All='<dl>'.
'<dt id="Top_'.$i.'">'.$Top.'</dt>'.
'<dd>'.$Art.'</dd>'.
'<dd><img src="'.$File1.'"><img src="'.$File2.'"></dd>'.
'<dd><img src="'.$File3.'"><img src="'.$File4.'"></dd>'.
'<dd><img src="'.$File5.'"></dd>'.
'<dd id="sharebuttons_'.$i.'" class="share_length"></dd>'.
'</dl>'.'<br><br>';
}
else{
echo $this->All='<dl>'.
'<dt id="Top_'.$i.'">'.$Top.'</dt>'.
'<dd>'.$Art.'</dd>'.
'<dd id="sharebuttons_'.$i.'" class="share_length"></dd>'.
'</dl>'.'<br><br>';
}
break;
}//switch
}//for
}//Method_TOP0_END

public function __destruct(){
$connection=$this->PDO();
foreach($connection as $con){
unset($con);//Connecction_End
}
}//Destruct_END

}//class_end

?>

