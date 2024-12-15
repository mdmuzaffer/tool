{{-- <link href="{{asset('th/sbap/css/styles.css?v='.uniqid())}}" rel="stylesheet" /> --}}



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link type="text/css" rel="stylesheet" href="{{asset('css/style.css?v='.uniqid())}}" />
<title>RTO Rajasthan</title>
</head>

<body>
<div id="top-panel">
<div style="max-height:100px; width:100%;">
<div style="float:left;"><img src="{{asset('images/logo.png')}}" style="margin:5px;" /></div>
<div style="text-align: center; padding-top: 10px;">
<div class="top-heading">ministry of road transport and highways</div>
<div class="top-sub-heading">Government of India</div>
</div>
</div>
</div>
<div id="heading-tp">Vehicle Tax Payment</div>
<div id="middle-panel">
<div id="middle-panel-heading">Login Here</div>
<div id="middle-panel-body">
<form name="form1" role="form" method="POST" action="{{route('user.login.submit.pb')}}"  id="form1">
    @csrf
          <table style="margin:42px auto; text-align:right;">
          <tr>
          <td style="color:#243B7F;font-weight:  bold;">User Name</td>
          <td>
            <input name="email" id="UserName" autocomplete="off"  type="text" />
          </tr>
          <tr>
          <td style="color:#243B7F;font-weight:  bold;">Password</td>
          <td>
            <input name="password" id="txtPassword" autocomplete="off" onpaste="return false"  type="password" />
          </tr>

          <tr>
          <td></td>
          <td style="text-align:left;"><input name="LoginButton" value="LogIn"  id="LoginButton" class="btnImg" cursor="hand"  type="submit" /></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align:left; color:red;"></td>
          </tr>
          </table>
    </form>
</div>
</div>
<div id="footer-panel">
Powered by National Informatics Centre. All Rights Reserved.
</div>
</body>
</html>
