<html><head><meta charset="utf-8">
		<meta content="initial-scale=1.0, width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<meta content="initial-scale=1.0, width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  		  <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="email=no">
    <meta name="format-detection" content="address=no;">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
<title>leoshen</title>
<meta name="description" content="">
<meta name="keywords" content="">
<style>


.form_login {
max-width: 640px;
margin: auto;
text-align: center;
padding-top: 100px;
}


.form-group {
width: 355px;
margin: 0 auto;
height: 50px;
margin-bottom: 20px;
}


.form-group .fa {
display: block;
width: 50px;
height: 50px;
float: left;
}


.form-group .form-control {
display: block;
width: 300px;
height: 48px;
float: left;
border: 1px solid #ccc;
padding: 0;
margin-left: 0;
text-indent: 1em;
themeColor: #00a988;
}


.form-group .form-control:hover {
border: 1px solid #0160A0;
}


.form-group .checkfont {
color: #666;
}


.form-group .btn {
width: 350px;
height: 50px;
background-color: #0160A0;
border: 0px;
color: #fff;
font-size: 14px;
}


.fa-user {
background: url(https://s3.lgjuzi.com/user.png) no-repeat center;
}


.fa-key {
background: url(https://s3.lgjuzi.com/pw.png) no-repeat center;
}


.scl_form_footer {
margin-top: 100px;
font-size: 14px;
color: #5B809A;
}

/*设置IOS页面长按不可复制粘贴，但是IOS上出现input、textarea不能输入，因此将使用-webkit-user-select:auto;*/
*{
  -webkit-touch-callout:none; /*系统默认菜单被禁用*/
  -webkit-user-select:none; /*webkit浏览器*/
  -khtml-user-select:none; /*早期浏览器*/
  -moz-user-select:none;/*火狐*/
  -ms-user-select:none; /*IE10*/
  user-select:none;
}
input,textarea {
  -webkit-user-select:auto; /*webkit浏览器*/
  margin: 0px;
  padding: 0px;
  outline: none;
}
.form_logo{font-size:26px;}a{color:gray}
</style>
</head>
<body>
<br><br>
<center><h1>登录</h1></center>
<p class="main">
</p><div class="form-group">
<p></p><form name="myform" action="/admin_v2/login/check" method="post">
<input name="goto" value="" hidden="">
<i class="fa fa-user"></i><input class="form-control" type="text" name="username" autocomplete="off"><p></p>
</div><div class="form-group">
<i class="fa fa-key"></i><input class="form-control" type="password" name="password" autocomplete="off"><p></p>
</div>
<div class="form-group">
<button class="btn btn-primary btn-block btn-login" type="submit" name="submit" value="登录">登录</button>
</div></form>
<center>
<br><br>
<div class="scl_form_footer">© 2019 LeoShen</div>
</center>
</body></html>