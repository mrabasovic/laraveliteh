@extends('master')

@section('title','Recipe')

<style>
  /*
-------------- Basic Reset Css ----------
 */
* {
	margin: 0px auto;
	padding: 0px;
	text-align: center;
	font-family: "Open Sans", sans-serif;
}

/* -------- ----------- */
.cont_principal {
	position: absolute;
	width: 100%;
	height: 100%;
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fbfaf6+9,d4cebf+74,d4cebf+74,d4cebf+100 */
	background: rgb(251, 250, 246); /* Old browsers */
	background: -moz-linear-gradient(
		-45deg,
		rgba(251, 250, 246, 1) 9%,
		rgba(212, 206, 191, 1) 74%,
		rgba(212, 206, 191, 1) 74%,
		rgba(212, 206, 191, 1) 100%
	); /* FF3.6-15 */
	background: -webkit-linear-gradient(
		-45deg,
		rgba(251, 250, 246, 1) 9%,
		rgba(212, 206, 191, 1) 74%,
		rgba(212, 206, 191, 1) 74%,
		rgba(212, 206, 191, 1) 100%
	); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(
		135deg,
		rgba(251, 250, 246, 1) 9%,
		rgba(212, 206, 191, 1) 74%,
		rgba(212, 206, 191, 1) 74%,
		rgba(212, 206, 191, 1) 100%
	); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fbfaf6', endColorstr='#d4cebf',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
}

.cont_central {
	position: absolute;
	width: 100%;
	top: 50%;
	margin-top: -200px;
}

.cont_modal {
	position: relative;
	width: 300px;
	height: 400px;
	-webkit-transition: all 0.5s;
	-o-transition: all 0.5s;
	transition: all 0.5s;
	transition-delay: 0.7s;
	-webkit-transition-delay: 0.7s;
	-o-transition-delay: 0.7s;
	transition-delay: 0.7s;
}

.cont_photo {
	position: relative;
	width: 300px;
	height: 440px;
	overflow: hidden;
	background-color: #eee;
	border-radius: 5px;
	top: -20px;
	float: left;
	z-index: 2;
	-webkit-transition: all 0.5s;
	-o-transition: all 0.5s;
	transition: all 0.5s;
	transition: all 0.5s;
	box-shadow: 1px 1px 20px -5px rgba(0, 0, 0, 0.5);
}

.cont_img_back {
	position: absolute;
	width: 100%;
	height: 100%;
	overflow: hidden;
	border-radius: 5px;
}
.cont_img_back > img {
	height: 100%;
	opacity: 0.7;
	-webkit-transition: all 0.5s;
	-o-transition: all 0.5s;
	transition: all 0.5s;
	transition: all 1s;
}

.cont_img_back:hover > img {
	transform: scale(1.5);
}

.cont_text_ingredients {
	position: absolute;
	width: 0px;
	top: 0px;
	left: 290px;
	margin-left: 10px;
	height: 400px;
	float: left;
	border-radius: 5px;
	z-index: 3;
	box-shadow: 1px 1px 20px -5px rgba(0, 0, 0, 0.2);

	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fbf9f9+28,e8eaed+100 */
	background: rgb(251, 249, 249); /* Old browsers */
	background: -moz-linear-gradient(
		-45deg,
		rgba(251, 249, 249, 1) 28%,
		rgba(232, 234, 237, 1) 100%
	); /* FF3.6-15 */
	background: -webkit-linear-gradient(
		-45deg,
		rgba(251, 249, 249, 1) 28%,
		rgba(232, 234, 237, 1) 100%
	); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(
		135deg,
		rgba(251, 249, 249, 1) 28%,
		rgba(232, 234, 237, 1) 100%
	); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fbf9f9', endColorstr='#e8eaed',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
	-webkit-transition: all 0.5s;
	-o-transition: all 0.5s;
	transition: all 0.5s;
	transition-delay: 0.7s;
	-webkit-transition-delay: 0.7s;
	-o-transition-delay: 0.7s;
	transition-delay: 0.7s;
}

.cont_mins {
	position: relative;
	float: left;
	width: 100%;
}

.sub_mins {
	position: relative;
	float: left;
	width: 60px;
	height: 60px;
	background-color: rgba(255, 253, 112, 0.8);
	border-radius: 50%;
	margin: 16px;
	margin-bottom: 0px;
	opacity: 0;
	-webkit-transition: all 0.5s;
	-o-transition: all 0.5s;
	transition: all 0.5s;
	transition: all 0.5s;
	transition-delay: 1s;
	-webkit-transition-delay: 1s;
	-o-transition-delay: 1s;
	transition-delay: 1s;
}

.sub_mins > h3 {
	font-size: 24px;
	margin-top: 7px;
	margin-bottom: -15px;
}

.sub_mins > span {
	font-size: 9px;
	font-weight: 700;
}

.cont_servings {
	position: relative;
	float: left;
	width: 60px;
	height: 60px;
	background-color: rgba(255, 253, 112, 0.8);
	border-radius: 50%;
	margin: 16px;
	opacity: 0;
	-webkit-transition: all 0.5s;
	-o-transition: all 0.5s;
	transition: all 0.5s;
	transition-delay: 0.7s;
	-webkit-transition-delay: 0.7s;
	-o-transition-delay: 0.7s;
	transition-delay: 0.7s;
}

.cont_servings > h3 {
	font-size: 24px;
	margin-top: 5px;
	margin-bottom: -15px;
}

.cont_servings > span {
	font-size: 9px;
	font-weight: 700;
}
.cont_icon_right {
	position: relative;
	float: right;
	margin-top: 16px;
}
.cont_icon_right > a {
	margin: 16px;
	margin-top: 16px;
	color: #fff;
}

.cont_detalles {
	position: absolute;
	bottom: -185px;
	height: 200px;
	border-radius: 5px;
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+100,000000+101&0+0,0.65+68 */
	background: -moz-linear-gradient(
		top,
		rgba(0, 0, 0, 0) 0%,
		rgba(0, 0, 0, 0.65) 68%,
		rgba(0, 0, 0, 0.65) 100%,
		rgba(0, 0, 0, 0.65) 101%
	); /* FF3.6-15 */
	background: -webkit-linear-gradient(
		top,
		rgba(0, 0, 0, 0) 0%,
		rgba(0, 0, 0, 0.65) 68%,
		rgba(0, 0, 0, 0.65) 100%,
		rgba(0, 0, 0, 0.65) 101%
	); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(
		to bottom,
		rgba(0, 0, 0, 0) 0%,
		rgba(0, 0, 0, 0.65) 68%,
		rgba(0, 0, 0, 0.65) 100%,
		rgba(0, 0, 0, 0.65) 101%
	); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a6000000',GradientType=0 ); /* IE6-9 */

	width: 100%;
	-webkit-transition: all 0.5s;
	-o-transition: all 0.5s;
	transition: all 0.5s;
	transition-delay: 1.2s;
	-webkit-transition-delay: 0.7s;
	-o-transition-delay: 0.7s;
	transition-delay: 0.7s;
}

button.dugme:focus {
    outline: none;
}

button {
    cursor: pointer;
}

button:focus {
    outline: none;
}
.cont_detalles > h3 {
	margin-top: 50px;
	color: #fff;
	font-size: 24px;
}

.cont_detalles > p {
	color: #fff;
	width: 80%;
	text-align: left;
	font-size: 14px;
}

/* ---------------- Css Tabs -------- */

.cont_tabs {
	position: relative;
	float: left;
	width: 410px;
	height: 60px;
	border-bottom: 3px solid #ededec;
}

.cont_tabs > ul {
	width: 300px;
	background-color: #eee;
}

.cont_tabs > ul > li {
	position: relative;
	float: left;
	width: 50%;
	list-style: none;
}

.cont_tabs > ul > li > a {
	border-top: 7px solid #ed346c;
	position: relative;
	display: block;
	float: left;
	padding-top: 15px;
	color: #241c3e;
	text-decoration: none;
	margin-left: 15px;
	font-size: 14px;
}

.cont_tabs > ul > li:first-child > a {
	border-top: 7px solid rgba(237, 52, 108, 0);
	margin-top: 0px;
	color: #9a96a4;
	-webkit-transition: all 0.5s;
	-o-transition: all 0.5s;
	transition: all 0.5s;
	transition: all 0.2s;
}

.cont_tabs > ul > li:first-child > a:hover {
	border-top: 7px solid #ed346c;
	padding-top: 15px;
	color: #241c3e;
	margin-top: 0px;
}

.cont_btn_open_dets {
	position: absolute;
	right: -15px;
	top: 50%;
}
.cont_btn_open_dets > a {
	display: block;
	padding-top: -5px;
	width: 30px;
	height: 30px;
	background-color: #ed2460;
	border-radius: 50%;
	color: #fff;
	box-shadow: 0px 0px 20px -2px rgba(237, 36, 96, 1);
	-webkit-transition: all 0.5s;
	-o-transition: all 0.5s;
	transition: all 0.5s;
	transition: all 0.5s;
	transform: rotate(180deg);
}

.cont_btn_open_dets > a > i {
	margin-top: 4px;
}

.cont_title_preparation {
	position: relative;
	float: left;
	margin: 10px 0px;
	width: 410px;
}
.cont_title_preparation > p {
	font-weight: 700;
	font-size: 14px;
	margin-left: 40px;
	text-align: left;
	color: #36354e;
}

.cont_info_preparation {
	position: relative;
	float: left;
}
.cont_info_preparation > p {
	margin: 5px 0px;
	margin-left: 50px;
	border-left: 2px solid #e3e3e3;
	font-size: 12px;
	padding: 20px 0px;
	padding-left: 20px;
	text-align: left;
	padding-right: 15px;
	color: #565656;
}

.cont_btn_mas_dets {
	position: absolute;
	bottom: 0px;
	left: 50%;
}
.cont_btn_mas_dets > a {
	color: #36354e;
}

.cont_over_hidden {
	position: relative;
	float: left;
	width: 100%;
	height: 400px;
	overflow: hidden;
}

.cont_text_det_preparation {
	position: relative;
	width: 410px;
}

.cont_modal_active > .cont_text_ingredients > .cont_btn_open_dets > a {
	transform: rotate(0deg);
}
.cont_modal_active > .cont_text_ingredients {
	width: 410px;
	left: 285px;
	z-index: 1;
	box-shadow: 15px 20px 70px -5px rgba(0, 0, 0, 0.2);
}
.cont_modal_active {
	width: 700px;
}

.cont_modal_active > .cont_photo {
	box-shadow: 25px 10px 70px -5px rgba(0, 0, 0, 0.3);
}

.cont_modal_active > .cont_photo > .cont_mins > .sub_mins {
	opacity: 1;
}

.cont_modal_active > .cont_photo > .cont_servings {
	opacity: 1;
}

.cont_modal_active > .cont_photo > .cont_detalles {
	bottom: 0px;
}

</style>

@section('content')


<div class="cont_principal">
    <div class="cont_central">
      <div class="cont_modal cont_modal_active">
      <div class="cont_photo">
    <div class="cont_img_back">
        <img src="{{$recipe->url}}" alt="" />
        </div>
    <div class="cont_mins">


        </div>

    <div class="cont_detalles">
        <h3>{{$recipe->name}}</h3>
    <p>{{$recipe->description}}</p>
        </div>
        </div>
    <div class="cont_text_ingredients">
    <div class="cont_over_hidden">

      <div class="cont_tabs">
      <ul>

        <li><a href="#"><h4>Recipe Details</h4></a></li>
      </ul>
      </div>

      <div class="cont_text_det_preparation">
      <div class="cont_title_preparation">
        <p>{{$recipe->name}}</p>
        </div>
      <div class="cont_info_preparation">
        <p>{{$recipe->description}}</p>
        <p>Preparation time -> {{$recipe->time}} min</p>
        <p>Created by -> {{$recipe->author}}</p>
        </div>

    </div>

      <div class="cont_btn_mas_dets">
      <button style="border: none;"><i class="material-icons">&#xE313;</i></button>
      </div>

      </div>
      <div class="cont_btn_open_dets">
      <button class="dugme" style="cursor: pointer; border-radius: 15px; background-color: pink; border: none;" onclick="open_close()"><i class="material-icons">&#xE314;</i></buton>
      </div>

        </div>
       </div>
    </div>
  </div>

  <script>
      window.onload = function(){
document.querySelector('.cont_modal').className = "cont_modal";
}
var c = 0;
function open_close(){
  if(c % 2 == 0){
document.querySelector('.cont_modal').className = "cont_modal cont_modal_active";
c++;
  }else {
document.querySelector('.cont_modal').className = "cont_modal";
c++;
  }
}

    </script>

@endsection
