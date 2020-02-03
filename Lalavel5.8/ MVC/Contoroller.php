<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class My_controller extends Controller
{

public function show() {
$con_arr = [" | トップページ",];
return view('Gets.show' , compact('con_arr') );
}

// ------------
public function login() {
$con_arr = [" | ログイン",];
return view('Gets/in.login' , compact('con_arr'));
}
public function remake_pw() {
$con_arr = [" | パスワード再設定",];
return view('Gets/in.remake_pw' , compact('con_arr'));
}
public function remake_confirm() {
$con_arr = [" | パスワード再設定用のメール送信",];
return view('Gets/in.remake_confirm', compact('con_arr'));
}

// ------------
public function new_registration() {
$con_arr = [" | 新規会員登録",];
return view('Gets/regist.new_registration' , compact('con_arr'));
}
public function new_registration_resend_mail() {
$con_arr = [" | 会員登録メールの再送",];
return view('Gets/regist.new_registration_resend_mail' , compact('con_arr'));
}
public function new_registration_complete() {
$con_arr = [" | 会員登録完了と認証メールの送信",];
return view('Gets/regist.new_registration_complete' , compact('con_arr'));
}

// ------------
public function _view(){
$con_arr = [" | 注目の",];
return view('Gets/search._view' , compact('con_arr'));
}
public function _search(){
$con_arr = [" | 絞り込み検索",];
return view('Gets/search._search' , compact('con_arr'));
}
public function _search_map(){
$con_arr = [" | マップ",];
return view('Gets/search._search_map' , compact('con_arr'));
}
public function _search_list(){
$con_arr = [" | リスト",];
return view('Gets/search._search_list', compact('con_arr'));
}

// ------------
public function member_info(){
$con_arr = [" | ユーザー情報",];
return view('Gets/user.member_info' , compact('con_arr'));
}
public function member_offer(){
$con_arr = [" | 申し込み",];
return view('Gets/user.member_offer' , compact('con_arr'));
}
public function member_offer_check(){
$con_arr = [" | 申し込みの内容確認",];
return view('Gets/user.member_offer_check' , compact('con_arr'));
}
public function member_offer_complete(){
$con_arr = [" | 申し込み完了",];
return view('Gets/user.member_offer_complete', compact('con_arr'));
}




}//My_controller_end
