
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Tolltax Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('mp/assets/js/jquery.scrollUp.min.js')}}"></script>
    <style type="text/css">
      body{font-family:arial;background-color:#fff;margin:0px;padding:0px;}
      .recentcomments a {display:inline !important;padding:0 !important;margin:0 !important;}
      #menu-main li{width:119px;}
      .white_link:link,.white_link:visited{color:#eee;text-decoration:none;margin:10px;padding:10px;font-size:16px;}
      .white_link:hover,.white_link:active{color:#fff;text-decoration:none;margin:10px;padding:10px;}
      /*body{padding:0px; margin:0px;background-color:#eee;}*/
      .container{background-color:#fff;box-shadow:0 0 30px #000; padding:0px 20px 15px 20px;}
      .error{color:red;font-weight:300;}
      .foooter1{padding:30px 0px; margin:0;border-top:2px solid #2d343e; font-size:12px;}
      .foooter1><span{font-size:12px;}
      .icon_social_top{height:30px; margin-top:10px;float:right; margin-right:5px;}
      .li_footer{list-style:none;margin-left:10px;}
      .icon_social_footer{height:22px; margin-bottom:5px;}
      .span_footer{margin-left:10px;}
      .a_footer:link, .a_footer:visited{text-decoration:none; color:#ccc; font-size:13px;}
      .a_footer:hover{text-decoration:none; color:red; font-size:13px;}
      .promo{background-color:transparent; color:#fff; border:0px solid #2d343e; padding:20px;}
      .promo2{color:#fff; padding:25px 3px; text-align:center; height:120px; margin-bottom:30px;}
      .scrollup{width:40px; height:40px; text-indent:-9999px; opacity:0.5; position:fixed;bottom:50px; right:30px; display:none;background: url({{asset("mp/assets/img/icon_top.png")}}) no-repeat;}
      .span_navy{color:blue;}
      .border{border:1px solid #ec868d;}
      .bg{background-color:#ffe5e9;}
      .form:focus{background-color:#c6ffc6;}
      .text-field:focus, input[type='text']:focus, input[type='password']:focus, input[type='int']:focus, input[type='radio']:focus, .ui-selectonemenu:focus, .ui-selectmanymenu:focus, .ui-selectonemenu.ui-state-focus, .ui-selectmanymenu.ui-state-focus, .ui-chkbox-box.ui-state-focus, .ui-chkbox-box:focus, .ui-selectcheckboxmenu-label.ui-state-hover, .ui-inputtextarea.ui-state-hover {background: #c6ffc6 !important;border-color: #ec868d !important;outline: 0;-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);box-shadow: inset 0 1px 1px rgba(0,0,0,0.075), 0 0 8px rgba(102, 175, 233, 0.6);
        }
    </style>
  </head>
  <body style="overflow-x:hidden;">
    <div class="container-fluid" style="padding:0px;">
      <div class="row">
        <div class="col-sm-12">
          <center>
            <img class="img img-responsive" src="{{asset('mp/assets/images/header_home.jpg')}}">
          </center>
        </div>
      </div>
      <div class="row" style="background-color:;color:white;padding:;background-image:url({{asset('mp/assets/images/menu_bg.jpg')}});background-repeat:repeat-x;">
        <div class="col-sm-12" style="height:40px;">
          <!-- <a class="white_link" href="https://mptxtxtx.vahanetaxfilingservices.com/dashboard"><i class="fa fa-home"></i> Home</a>
          <a class="white_link" href="https://mptxtxtx.vahanetaxfilingservices.com/receipt"><i class="fa fa-print"></i> View Receipt</a>
          <a class="white_link" href="https://mptxtxtx.vahanetaxfilingservices.com/logout" target="_blank"><i class="fa fa-sign-out"></i> Logout</a> -->
                  </div>
      </div>
      <!-- <div class="row" style="background-color:#0e8bd3;color:white;padding:5px;font-size:110%;">
        <div class="col-sm-12">
          <marquee width="100%" behavior="alternate" direction="left" scrollamount="10" scrolldelay="100">
            Verify the validity of the receipt by sending sms <font style="color:pink;">VAHAN < STATE CODE > CP < VEHICLE NO ></font> to 7738299899 (e.g. <font style="color:pink;">VAHAN XX CP XXXXXXXXXXX</font>)
          </marquee>
        </div>
      </div>
      <div class="row" style="background-color:#a0d7ff;color:white;padding:5px;font-size:120%;color:red;">
        <div class="col-sm-12">
          <marquee width="100%" behavior="alternate" direction="left" scrollamount="10" scrolldelay="100">
            Select the services name carefully in case you select wrong service and pay the fee/tax, amount will not be refunded or adjusted.
          </marquee>
        </div>
      </div> -->
    </div>  <!--home-->
    <div class="container-fluid" style="margin:30px 10px;overflow-x:hidden;">
      <div class="row">
      	<div class="col-sm-12">
                  </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4 col-xs-12 border" style="padding:20px;background-color:#fff;border-radius:6px;">
        	<center>
            <h3>VEHICLE TAX PAYMENT</h3>
            <h4>Tolltax Login</h4><br/>
            {{-- {{route('user.login.submit.mp')}} --}}
            <form id="form1" name="form1" action="" enctype="multipart/form-data" method="post" onsubmit="return validate();">
                @csrf
                <table class="table table-responsive table-bordered" style="border:0px;width:100%;">
                <tr>
                  <td style="font-size:15px;text-align:right;vertical-align:middle;">User</td>
                  <td style="font-size:15px;">
                    <input class="form-control" type="text" name="email" value="" placeholder="User Id" required/>
                  </td>
                </tr>
                <tr>
                  <td style="font-size:15px;text-align:right;vertical-align:middle;">Password</td>
                  <td style="font-size:15px;">
                    <input class="form-control" type="password" name="password" value="" placeholder="Enter Password" required>
                  </td>
                </tr>
                <tr><td></td><td><input name="submit" type="submit" value="Submit" class="btn btn-danger"/></td></tr>
              </table>
            </form>
          </center>
        </div>
        <div class="col-sm-4"></div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <center>
            <img class="img img-responsive" src="{{asset('mp/assets/images/eseva_new.gif')}}" style="margin:30px;max-height:100px;">
          </center>
        </div>
      </div>
    </div>
  <!-- End home -->    <script type="text/javascript">
      jQuery(document).ready(function(){
      });
    </script>
    <a href="#" class="scrollup" style="display: none;">Scroll</a>
    <script>
      $(document).ready(function(){
        $(window).scroll(function(){
          if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
          } else {
            $('.scrollup').fadeOut();
          }
        });

        $('.scrollup').click(function(){
          $("html, body").animate({ scrollTop: 0 }, 1000);
          return false;
        });
      });
    </script>
    <!--print command-->
    <script type="text/javascript">
      function myFunction(){window.print();}
    </script>
  </body>
</html>
