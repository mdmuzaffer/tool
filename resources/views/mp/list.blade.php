
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Check Receipt Print</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('mp/assets/js/jquery.scrollUp.min.js')}}"></script>
    <style type="text/css">
      body{font-family:arial;background-color:#fff;margin:0px;padding:0px;text-transform:;}
      .recentcomments a {display:inline !important;padding:0 !important;margin:0 !important;}
      #menu-main li{width:119px;}
      .white_link:link,.white_link:visited{color:#666;text-decoration:none;margin:10px;padding:10px;font-size:14px;}
      .white_link:hover,.white_link:active{color:#bf0400;text-decoration:none;margin:10px;padding:10px;}
    </style>
    <style type='text/css'>
      /*body{padding:0px; margin:0px;background-color:#eee;}*/
      .container{background-color:#fff;box-shadow:0 0 30px #000; padding:0px 20px 15px 20px;}
      .error{color:red;font-weight:300;}
      .foooter1{padding:30px 0px; margin:0;border-top:2px solid #ec868d; font-size:12px;}
      .foooter1><span{font-size:12px;}
      .icon_social_top{height:30px; margin-top:10px;float:right; margin-right:5px;}
      .li_footer{list-style:none;margin-left:10px;}
      .icon_social_footer{height:22px; margin-bottom:5px;}
      .span_footer{margin-left:10px;}
      .a_footer:link, .a_footer:visited{text-decoration:none; color:#ccc; font-size:13px;}
      .a_footer:hover{text-decoration:none; color:red; font-size:13px;}
      .promo{background-color:transparent; color:#fff; border:0px solid #ec868d; padding:20px;}
      .promo2{color:#fff; padding:25px 3px; text-align:center; height:120px; margin-bottom:30px;}
      .scrollup{width:40px; height:40px; text-indent:-9999px; opacity:0.5; position:fixed;bottom:50px; right:30px; display:none;background: url('https://mptxtxtx.vahanetaxfilingservices.com/assets/img/icon_top.png') no-repeat;}
      .span_navy{color:blue;}
      .border{border:1px solid #ec868d;border-radius:8px;padding:10px;}
      .bg{background-color:#ffe5e9;}
      .bg2{background-color:#ffefe8;}
      .text_red{color:#bf0400;font-weight:700;}
      .text_blue{color:#0b4a8f;font-weight:700;}
      .form:focus{background-color:#c6ffc6;}
      .text-field:focus, input[type='text']:focus, input[type='password']:focus, input[type='int']:focus, input[type='radio']:focus, .ui-selectonemenu:focus, .ui-selectmanymenu:focus, .ui-selectonemenu.ui-state-focus, .ui-selectmanymenu.ui-state-focus, .ui-chkbox-box.ui-state-focus, .ui-chkbox-box:focus, .ui-selectcheckboxmenu-label.ui-state-hover, .ui-inputtextarea.ui-state-hover {background: #c6ffc6 !important;border-color: #1682ba !important;outline: 0;-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);box-shadow: inset 0 1px 1px rgba(0,0,0,0.075), 0 0 8px rgba(102, 175, 233, 0.6);
        }
        input,select{border:1px solid #1682ba;text-transform:uppercase;}
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
              <div class="row" style="background-color:;color:;padding:;background-image:url({{asset('mp/assets/images/menu_bg.jpg')}});background-repeat:repeat-x;">
          <div class="col-sm-12" style="height:40px;padding:10px">
              <a class="white_link" href="{{route('user.booking.mp')}}"><i class="fa fa-home"></i> Home</a>
            <a class="white_link" href="{{route('user.apply.list.mp')}}"><i class="fa fa-print"></i> View Receipt</a>
              <a class="white_link" href="{{route('select-state')}}"><i class="fa fa-file"></i> Change State</a>
              <a class="white_link" href="{{route('all-booking')}}"><i class="fa fa-print"></i> All Booking</a>
            <a class="white_link" href="{{route('user.logout.mp')}}"><i class="fa fa-sign-out"></i> Logout</a>
          <span style="float:right;text-transform:;margin-right:20px;">Welcome {{$u->email}}</span>

          </div>
        </div>
            <!-- <div class="row" style="background-color:#0e8bd3;color:white;padding:5px;font-size:100%;">
        <div class="col-sm-12">
          <marquee width="100%" behavior="alternate" direction="left" scrollamount="10" scrolldelay="100">
            Verify the validity of the receipt by sending sms <font style="color:pink;">VAHAN < STATE CODE > CP < VEHICLE NO ></font> to 7738299899 (e.g. <font style="color:pink;">VAHAN XX CP XXXXXXXXXXX</font>)
          </marquee>
        </div>
      </div>
      <div class="row" style="background-color:#a0d7ff;color:white;padding:5px;font-size:100%;color:red;">
        <div class="col-sm-12">
          <marquee width="100%" behavior="alternate" direction="left" scrollamount="10" scrolldelay="100">
            Select the services name carefully in case you select wrong service and pay the fee/tax, amount will not be refunded or adjusted.
          </marquee>
        </div>
      </div> -->
    </div>  <!--home-->
    <div class="container-fluid" style="margin:30px 10px;">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-responsive table-responsive table-bordered" style="border:1px solid #1682ba;margin-top:10px;">
              <tr style="background-color:#ccc;border-bottom:1px solid #ccc;">
                  <th colspan="9" style="text-align: right">Total Amount</th>
                  <th style="text-align: left">{{$total_amunt}}</th>

              </tr>
            <tr class="border bg">
              <th style="border:1px solid #1682ba;">Receipt No.</th>
              <th style="border:1px solid #1682ba;">Vehicle No.</th>
              <th style="border:1px solid #1682ba;">Owner Name</th>
              <th style="border:1px solid #1682ba;">From State</th>
              <th style="border:1px solid #1682ba;">Tax Mode</th>
              <th style="border:1px solid #1682ba;">Tax From</th>
              <th style="border:1px solid #1682ba;">Tax Upto</th>
              <th style="border:1px solid #1682ba;">Mobile</th>
              <th style="border:1px solid #1682ba;">Amount</th>
              <th style="border:1px solid #1682ba;">Action</th>
            </tr>

              @foreach ($applyrecp as $rec)
              <tr>
                  <td style="padding: 10px;">{{$rec->receipt_no}}</td>
                  <td style="padding: 10px;">{{$rec->vehicleno}}</td>
                  <td style="padding: 10px;">{{$rec->ownername}}</td>
                  <td style="padding: 10px;">{{$rec->from_state}}</td>
                  <td style="padding: 10px;">{{$rec->txt_no_of_weeks}}</td>
                  <td style="padding: 10px;">{{$rec->tax_from}}</td>
                  <td style="padding: 10px;">{{$rec->tax_upto}}</td>
                  <td style="padding: 10px;">{{$rec->mobile}}</td>
                  <td style="padding: 10px;">{{$rec->total_tax_amount}}</td>
                  <td style="padding: 10px;">
                      <a target="_blank"
                         href="{{ route('user.Recpt.print.mp',['rec'=>$rec->receipt_no]) }}">{{$rec->receipt_no_gen}}</a>
                  </td>
              </tr>
              @endforeach

              {{-- <tr>
                <td>9920941982873</td>
                <td>78787887</td>
                <td>ASA</td>
                <td></td>
                <td>2020-10-14 19:19:04</td>
                <td>2020-10-22 23:59:59</td>
                <td>42</td>
                <td><a href="https://mptxtxtx.vahanetaxfilingservices.com/print-receipt?receiptno=9920941982873" target="_blank">Print</a></td>
              </tr> --}}

                      </table>
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
