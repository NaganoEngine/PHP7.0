document.addEventListener("DOMContentLoaded",
function Class_Asset() {

class Asset{

constructor($area,$class,$i,$class_change,$meta_name,$Sns_Property,$position,$Make_Share,$sns_icons_cahange){
this.$area=this.$area();
this.$class=this.$class();
this.$i =this.$i();
this.$class_change=this.$class_change();
this.$meta_name=this.$meta_name();
this.$Sns_Property=this.$Sns_Property();
this.$position=this.$Sns_Property_Position();
this.$Make_Share=this.$Make_Share();
this.$sns_icons_cahange = this.$sns_icons_cahange();
}

$area(){
const $area = document.getElementById('Category_area');
return $area;
}

$class(){
const $class = Array.prototype.slice.call(document.getElementsByClassName('category'));
return $class;
}

$i(){
const $i=0;
return $i;
}

$class_change(){
for (this.$i=0; this.$i<=this.$class.length; this.$i++){
if(this.$class[this.$i]===undefined){continue;}
this.$class[this.$i].onmouseover = function() {
this.className=(this.className === 'category') ? 'new_category':'category';
}
this.$class[this.$i].onmouseout = function() {
this.className=(this.className === 'new_category') ? 'category':'new_category';
 }
}//for_END
}//Method_$mouseover_End

$meta_name(){
const $meta_name=document.getElementsByTagName('link');
return $meta_name;
}

$Sns_Property(){
const $Sns_Property = '<meta property="og:url" content="URL" />'+
'<meta property="og:title" content="タイトル" />'+
'<meta property="og:description" content="抜粋" />'+
'<meta property="og:image" content="画像のURL" />'+
'<meta property="og:type" content="タイプ">'+
'<meta property="og:site_name" content="サイト名" />'+
'<meta property="og:locale" content="ja_JP(ページの言語)" />'+
'<meta name="twitter:card" content="Twitterに表示するカードの種類" />'+
'<meta name="twitter:site" content="Twitterのユーザー名(@xxxx)" />';
return $Sns_Property;
}

$Sns_Property_Position(){
const $position = this.$meta_name[0].insertAdjacentHTML('beforebegin',this.$Sns_Property);
return $position;
}

$Make_Share(){
for(this.$i=0; this.$i<=0 ; this.$i++){
this.$title_text='Top_'+this.$i;
this.$share='sharebuttons_'+this.$i;
try{
this.$sns_text=document.getElementById(this.$title_text).textContent;
this.$set_button=document.getElementById(this.$share);

}catch($e){
$e.message;
}
this.$url =encodeURI('http://antiraser.info/asset/index.php');
this.$via_user_name ='NaganoEngine';
this.$related='TrendWebDesign';
this.$hashtags='web,webdesign';
this.$icon_image_twitter='material/twitter.jpg';
this.$icon_image_facebook='material/facebook.jpg';
this.$icon_image_google='material/googleplus.jpg';
this.$icon_image_hatebu='material/hatena.jpg';
this.$icon_image_tumblr='material/tumble.jpg';
this.$icon_image_pinterest='material/pinterrest.jpg';
this.$icon_image_line='material/line.jpg';

this.$Twitter_Share='<a href="https://twitter.com/share?'+
    'url='+this.$url+'&'+
    'via='+this.$via_user_name+'&'+
    'related='+this.$related+'&'+
    'hashtags='+this.$hashtags+'&'+
    'text='+this.$sns_text+'&'+
    'rel="nofollow"'+
     ' '+
    'target="_blank">'+
    '<img class="sns_icons" src="'+this.$icon_image_twitter+'"></a>';

this.$Facebook_Share ='<a href="http://www.facebook.com/sharer.php?'+
  'u='+this.$url+'" '+
  'target="_blank">'+
  '<img class="sns_icons" src="'+this.$icon_image_facebook+'"></a>';


this.$Googleplus_Share ='<a href="https://plus.google.com/share?'+
  'url='+this.$url+'" '+
  'target="_blank">'+
  '<img class="sns_icons" src="'+this.$icon_image_google+'"></a>';

this.$Hatebu_Share ='<a href="http://b.hatena.ne.jp/add?mode=confirm&'+
  'url='+this.$url+'&'+
  'title='+this.$title_text+'" '+
  'target="_blank">'+
  '<img class="sns_icons" src="'+this.$icon_image_hatebu+'">'+
  '</a>';

this.$Tumblr_Share='<a href="http://www.tumblr.com/share/link?'+
  'url='+this.$url+'&'+
  'name='+this.$title_text+'&'+
  'description='+this.$title_text+'" '+
  'target="_blank">'+
  '<img class="sns_icons" src="'+this.$icon_image_tumblr+'">'+
  '</a>';

this.$Pinterest_Share ='<a href="//jp.pinterest.com/pin/create/button/?'+
  'url='+this.$url+'&'+
  'media='+'エンコード（サムネイル画像URL）'+'&'+
  'description='+'エンコード（紹介文）'+'" '+
  'target="_blank">'+
  '<img class="sns_icons" src="'+this.$icon_image_pinterest+'">'+
  '</a>';

this.$Line_Share ='<a href="https://timeline.line.me/social-plugin/share?'+
  'url='+this.$url+'" '+
  'target="_blank">'+
  '<img class="sns_icons" src="'+this.$icon_image_line+'"></a>';

this.$Share_Variable = this.$Twitter_Share+' '+this.$Facebook_Share+' '+this.$Googleplus_Share+' '+this.$Hatebu_Share+' '+this.$Tumblr_Share+' '+this.$Pinterest_Share+' '+this.$Line_Share;
this.$set_button.insertAdjacentHTML('afterbegin',this.$Share_Variable);
}//for_end
}//$Make_Share_End

$sns_icons_cahange(){
this.$sns_icons=Array.prototype.slice.call(document.getElementsByClassName('sns_icons'));
this.$sns_icons.forEach((item)=>{
item.addEventListener('mouseover', ()=>{
item.classList.replace('sns_icons','new_icons');
});
item.addEventListener('mouseout', ()=>{
item.classList.replace('new_icons','sns_icons');
});
});//forEach
}//$sns_icons_cahange_End

}//Class_End


$a=new Asset();
// console.log($a.$sns_icons_cahange);


});//DOMContentLoaded_END
