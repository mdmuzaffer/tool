<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head id="j_idt4">
    <link type="text/css" rel="stylesheet" href="{{ asset('newAssets/checkpost/faces/javax.faces.resource/theme.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('newAssets/checkpost/faces/javax.faces.resource/fa/font-awesome.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('newAssets/checkpost/faces/javax.faces.resource/layout.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('newAssets/checkpost/faces/javax.faces.resource/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('newAssets/checkpost/faces/javax.faces.resource/grid-css.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('newAssets/checkpost/faces/javax.faces.resource/eff-common.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('newAssets/checkpost/faces/javax.faces.resource/flexslider.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('newAssets/checkpost/faces/javax.faces.resource/components.css') }}">

    <script type="text/javascript" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/jquery/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/jquery/jquery-plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/core.js') }}"></script>
    <script type="text/javascript" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/components.js') }}"></script>
    <script type="text/javascript" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/jsf.js') }}"></script>
    <script type="text/javascript">if(window.PrimeFaces){PrimeFaces.settings.locale='en_US';PrimeFaces.settings.projectStage='Development';}</script>
    <title>Checkpost ~181~6</title>
    <link rel="icon" href="{{ asset('newAssets/checkpost/faces/vahan-icon.png') }}" sizes="16x16" type="image/png" />
    <script type="text/javascript" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/commonvalidation.js') }}"></script>

    <title>Online Tax Payment Portal</title>
    <link rel="icon" href="{{ asset('newAssets/checkpost/faces/vahan-icon.png') }}" sizes="16x16" type="image/png" />
    <script type="text/javascript" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/login.js') }}"></script>
    <script type="text/javascript" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/md5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/sha256.js') }}"></script>
    <script type="text/javascript" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/jquery.marquee.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/jquery.flexslider-min.js') }}"></script>
    <script type="text/javascript">
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "fade",
                slideshowSpeed: 7000,
                animationSpeed: 800,
                controlNav: false,
                directionNav: false,
                start: function (slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
</head><body>

    <div class="container-fluid topbar-menu">
        <div class="mar-bot">
            <div>
                <div class="row">
                    <div class="col-md-6 left-position">
                        <div class="marquee marquee-top mar-common-f">
                            <div>
                                <span>Please pay tax in advance to avoid any last minute hassle.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 right-position top-pad-top">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-default navigation-background hide-header" role="navigation">
        <div class="ui-grid ui-grid-responsive">
            <div class="ui-grid-row">
                <div class="ui-grid-col-2 left_logo">
                    <a class="top-space inline-section"><img id="j_idt39" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/checkpost-logo.png') }}" alt="Check Post Logo" />
                    </a>
                </div>
                <div class="ui-grid-col-8">
                    <div class="heading_w center-position top-space"><img id="j_idt41" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/emblem-logo.png') }}" class="emblem-logo" alt="State Emblem of India" />
                        <div class="font-bold text-welcome-heading welcome-heading-size text-uppercase">ministry of road transport and highways</div>
                        <div class="font-bold text-welcome-heading welcome-sub-heading-size">Government of India</div>
                    </div>
                </div>
                <div class="ui-grid-col-2 right_logo">
                    <a class="top-space inline-section"><img id="j_idt43" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/e-vahan-logo.png') }}" alt="e-Vahan Logo" />
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <nav class=" navbar-default navigation-background" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navigation-background-nav" id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="{{route('all-booking')}}"> <span class="glyphicon glyphicon-print"></span> All Booking </a>
                </li>
                <li><a href="{{route('user.logout')}}"> <span class="glyphicon glyphicon-log-out"></span> Logout </a>
                </li>
                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" rendered=""><span class="glyphicon glyphicon-user"></span> Border Tax Payment<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-arrow-right"></span> Tax Payment</a>
                        </li>
                        <li><a href="#"><span class="glyphicon glyphicon-arrow-right"></span> Check Pending Transaction</a>
                        </li>
                        <li><a href="#"><span class="glyphicon glyphicon-arrow-right"></span> Reverify Failed Transaction </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" rendered=""><span class="glyphicon glyphicon-print"></span> Reports<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-arrow-right"></span> Print Payment Receipt</a>
                        </li>
                        <li><a href="#"><span class="glyphicon glyphicon-arrow-right"></span> Print Permit Receipt</a>
                        </li>
                        <li><a href="#"><span class="glyphicon glyphicon-arrow-right"></span> Check Receipt Details</a>
                        </li>
                    </ul>
                </li>-->
                <!--                        &lt;li&gt;
                                            &lt;h:link value="" title="" outcome="/public/usermanuals/UserManuals.xhtml"&gt; &lt;span class="glyphicon glyphicon-eye-open"&gt;&lt;/span&gt; User Manuals&lt;/h:link&gt;
                                        &lt;/li&gt;-->
                <!--                        &lt;li&gt;
                                            &lt;h:link value="" title="" outcome="/public/contactus/Contactus.xhtml"&gt; &lt;span class="glyphicon glyphicon-phone-alt"&gt;&lt;/span&gt; Contact Us &lt;/h:link&gt;
                                        &lt;/li&gt;-->
            </ul>
        </div>
    </nav>
    <div class="main_news_w">
        <div class="news_w">
            <div data-direction="left" class="marquee-with-options">
                <marquee scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();" direction="left" behavior="alternate">
                    Verify the validity of the receipt by sending sms <font color="#ff83dc">VAHAN &lt;STATE CODE&gt; CP &lt;VEHICLE NO&gt; </font> to 7738299899 (e.g. <font color="#ff83dc">VAHAN XX CP XXXXXXXXXX</font>)
                </marquee>
            </div>
        </div>
    </div>

    <div><div id="popup" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container center-position ui-resizable" role="dialog" aria-labelledby="popup_title" aria-describedby="popup_content" aria-hidden="true" aria-modal="true" style="width: auto; height: auto;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="popup_title" class="ui-dialog-title"></span></div><div class="ui-dialog-content ui-widget-content" id="popup_content" style="height: auto;"><div id="j_idt41" class="ui-messages ui-widget" aria-live="polite"></div><button id="j_idt42" name="j_idt42" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){mojarra.ab('j_idt42',event,'click',0,'publicsignup popup')},function(event){PrimeFaces.ab({s:&quot;j_idt42&quot;,f:&quot;master_Layout_form&quot;,onco:function(xhr,status,args){PF('dlg1').hide();;}});return false;}]);" type="submit" role="button" aria-disabled="false"><span class="ui-button-text ui-c">Ok</span></button></div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div></div>
        <div class="container">
            <div class="ui-grid ui-grid-responsive">
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12 center-position">
                        <h1 class="header-main">BORDER TAX PAYMENT </h1>
                        <h1>Total Payment :- {{ $total_amunt }} </h1>
                    </div>
                </div>
                <form name="form1" role="form" method="POST" action="{{route('select-state')}}"  id="form1">
                    @csrf
                <div class="ui-grid-row">

                    <div class="ui-grid-col-12">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div id="publicsignup" class="ui-panel ui-widget ui-widget-content ui-corner-all" data-widget="widget_publicsignup"><div id="publicsignup_header" class="ui-panel-titlebar ui-widget-header ui-helper-clearfix ui-corner-all"><span class="ui-panel-title">Select State Name for Tax Payment</span></div><div id="publicsignup_content" class="ui-panel-content ui-widget-content">
                                <div class="ui-grid-row">

                                    <div class="ui-grid-col-1 resp-blank-height"></div>
                                    <div class="ui-grid-col-5 mar-right">
                                        <label class="field-label resp-label-section">
                                            <h3 class="top-space">Select Visiting State Name</h3>
                                        </label>
                                        <select class="form-control" name="state">
                                            <option value="">Please select State</option>
                                            @if(@count($state) > 0)
                                                @foreach($state as $states)
                                                    <option value="{{ $states->id }}">{{ $states->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="ui-grid-col-5">
                                        <label class="field-label resp-label-section">
                                            <h3 class="top-space">Service Name</h3>
                                        </label>
                                        <select class="form-control" name="service">
                                            <option value="">Please select Service Name</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ui-grid-row top-space">
                                    <div class="ui-grid-col-12 center-position"><button id="j_idt51" name="j_idt51" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" type="submit" role="button" aria-disabled="false"><span class="ui-button-icon-left ui-icon ui-c ui-icon-seek-next"></span><span class="ui-button-text ui-c">Go</span></button>
                                    </div>
                                </div>

                            </div></div><br><div id="j_idt55" class="ui-panel ui-widget ui-widget-content ui-corner-all" style="font-size: 11pt;" data-widget="widget_j_idt55"><div id="j_idt55_header" class="ui-panel-titlebar ui-widget-header ui-helper-clearfix ui-corner-all"><span class="ui-panel-title">Follow these steps to initiate tax payment...</span></div><div id="j_idt55_content" class="ui-panel-content ui-widget-content">
                                <ol>
                                    <li>  Select the state where you want to go from <font class="dialog-highlight-text">'Select State'</font> combo box.</li>
                                    <li>  Select service Name from <font class="dialog-highlight-text">'Service Name'</font> combo box.</li>
                                    <ol type="i">
                                        <li type="i">  Select <font class="dialog-highlight-text">'VEHICLE TAX COLLECTION (OTHER STATE)'</font> in case you do not have NCR permit.</li>
                                        <li type="i">  Select <font class="dialog-highlight-text">'VEHICLE TAX COLLECTION (NCR)'</font> in case you have NCR permit.</li>
                                    </ol>
                                    <li>  Click <font class="dialog-highlight-text">'Go'</font> button to open the vehicle details form.</li>
                                    <li>  Enter <font class="dialog-highlight-text">'Vehicle No.'</font> and click <font class="dialog-highlight-text">'Get Details'</font> button to fill the details.</li>
                                    <li>  Fill rest of the fields which are not filled automatically.</li>
                                    <li>  In case fields are not filled automatically then enter the details manually.</li>
                                    <li>  Click <font class="dialog-highlight-text">'Calculate Tax'</font> button to calculate the tax according to state notification.</li>
                                    <li>  Click <font class="dialog-highlight-text">'Pay Tax'</font> button to pay the calculated tax.</li>
                                    <li>  It opens the payment gateway of VAHAN.</li>
                                    <li>  Choose payment gateway and click on <font class="dialog-highlight-text">'Continue'</font> button.</li>
                                    <li>  And then follow the screen to pay tax.</li>
                                    <li>  After paying tax bank will redirect to the Checkpost application.</li>
                                    <li>  In case payment is success Checkpost application will generate the success receipt.</li>
                                    <li>  Print the receipt.</li>
                                </ol></div></div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/jquery.bootstrap.newsbox.min.js?ln=side-js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $(".demo2").bootstrapNews({
                newsPerPage: 5,
                autoplay: true,
                pauseOnHover: true,
                navigation: false,
                direction: 'down',
                newsTickerInterval: 2500,
                onToDo: function () {
                    //console.log(this);
                }
            });
        });
    </script><div id="payment_dialog1" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container" style="background-color: #d6e7ff;font-size: 11pt;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="payment_dialog1_title" class="ui-dialog-title">Process of paying road tax for other state...</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div><div class="ui-dialog-content ui-widget-content" id="payment_dialog1_content">
            <ol>
                <li>  Select the <font class="dialog-highlight-text">'Tax Payment'</font> from <font class="dialog-highlight-text">'Payment'</font> menu on home screen.</li><br />
                <li>  Select the state where you want to go from <font class="dialog-highlight-text">'Select State'</font> drop down menu.</li><br />
                <li>  Select service name from <font class="dialog-highlight-text">'Service Name'</font> drop down menu.</li><br />
                <li>  Click <font class="dialog-highlight-text">'Go'</font> button to open the vehicle details form.</li><br />
                <li>  Enter <font class="dialog-highlight-text">'Vehicle No.'</font> and click <font class="dialog-highlight-text">'Get Details'</font> button to fill the details.</li><br />
                <li>  Fill rest of the fields which are not filled automatically.</li><br />
                <li>  In case fields are not filled automatically then enter the details manually.</li><br />
                <li>  Click <font class="dialog-highlight-text">'Calculate Tax'</font> button to calculate the tax according to state notification.</li><br />
                <li>  Click <font class="dialog-highlight-text">'Pay Tax'</font> button to pay the calculated tax.</li><br />
                <li>  It opens the payment gateway of VAHAN.</li><br />
                <li>  Choose payment gateway and click on <font class="dialog-highlight-text">'Continue'</font> button.</li><br />
                <li>  And then follow the screen to pay tax.</li><br />
                <li>  After paying tax bank will redirect to the Checkpost application.</li><br />
                <li>  In case your transaction is Success it will show the successful receipt.</li><br />
                <li>  In case your transaction is Fail it will show the failure message. Now you can again initiate the payment.</li><br />
                <li>  Print the receipt.</li>
            </ol>
            <div class="ui-grid-row top-space bottom-space">
                <div class="ui-grid-col-12 center-position"><button id="j_idt161" name="j_idt161" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){PF('process1').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt161&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit"><span class="ui-button-text ui-c">Close</span></button><script id="j_idt161_s" type="text/javascript">$(function(){PrimeFaces.cw("CommandButton","widget_j_idt161",{id:"j_idt161"});});</script>
                </div>
            </div></div></div><script id="payment_dialog1_s" type="text/javascript">$(function(){PrimeFaces.cw("Dialog","process1",{id:"payment_dialog1",resizable:false,modal:true,width:"600",height:"500",closeOnEscape:true});});</script><div id="payment_dialog2" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container" style="background-color: #d6e7ff;font-size: 11pt;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="payment_dialog2_title" class="ui-dialog-title">Process to check your pending transaction of single vehicle..</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div><div class="ui-dialog-content ui-widget-content" id="payment_dialog2_content">
            <ol>
                <li>  Select the <font class="dialog-highlight-text">'Check Pending Transaction'</font> from <font class="dialog-highlight-text">'Payment'</font> menu on home screen.</li><br />
                <li>  It will show <font class="dialog-highlight-text">'Check Pending Transaction'</font> screen.</li><br />
                <li>  Enter Vehicle No. and click <font class="dialog-highlight-text">'Get Details'</font> button to fill the details.</li><br />
                <li>  Click the button available in <font class="dialog-highlight-text">'Check Status'</font> column of below table.</li><br />
                <li>  It will print the receipt according to the status sent by bank.</li><br />
                <li>  In case your transaction is Success it will show the successful receipt.</li><br />
                <li>  In case your transaction is Fail it will show the failure message. Now you can again initiate the payment.</li>
            </ol>
            <div class="ui-grid-row top-space bottom-space">
                <div class="ui-grid-col-12 center-position"><button id="j_idt165" name="j_idt165" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){PF('process2').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt165&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit"><span class="ui-button-text ui-c">Close</span></button><script id="j_idt165_s" type="text/javascript">$(function(){PrimeFaces.cw("CommandButton","widget_j_idt165",{id:"j_idt165"});});</script>
                </div>
            </div></div></div><script id="payment_dialog2_s" type="text/javascript">$(function(){PrimeFaces.cw("Dialog","process2",{id:"payment_dialog2",resizable:false,modal:true,width:"600",height:"500",closeOnEscape:true});});</script><div id="payment_dialog3" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container" style="background-color: #d6e7ff;font-size: 11pt;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="payment_dialog3_title" class="ui-dialog-title">Process to recheck the fail transaction of single vehicle..</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div><div class="ui-dialog-content ui-widget-content" id="payment_dialog3_content">
            <ol>
                <li>  Select the <font class="dialog-highlight-text">'Reverify Fail Transaction'</font> from <font class="dialog-highlight-text">'Payment'</font> menu on home screen.</li><br />
                <li>  It will show <font class="dialog-highlight-text">'Reverify Fail Transaction'</font> screen.</li><br />
                <li>  Choose desired state from <font class="dialog-highlight-text">'From State Name'</font> combo box for which you have done the payment.</li><br />
                <li>  Enter <font class="dialog-highlight-text">'Vehicle No.'</font> and click <font class="dialog-highlight-text">'Get Details'</font> button to fill the details of the vehicle.</li><br />
                <li>  Choose the correct <font class="dialog-highlight-text">'Payment id'</font> click the button available in <font class="dialog-highlight-text">'Reverify'</font> column of below table.</li><br />
                <li>  It will print the receipt according to the status sent by bank.</li><br />
                <li>  In case your transaction is Success it will show the successful receipt.</li><br />
                <li>  In case your transaction is Fail it will show the failure message. Now you can again initiate the payment.</li>
            </ol>
            <div class="ui-grid-row top-space bottom-space">
                <div class="ui-grid-col-12 center-position"><button id="j_idt168" name="j_idt168" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){PF('process3').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt168&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit"><span class="ui-button-text ui-c">Close</span></button><script id="j_idt168_s" type="text/javascript">$(function(){PrimeFaces.cw("CommandButton","widget_j_idt168",{id:"j_idt168"});});</script>
                </div>
            </div></div></div><script id="payment_dialog3_s" type="text/javascript">$(function(){PrimeFaces.cw("Dialog","process3",{id:"payment_dialog3",resizable:false,modal:true,width:"600",height:"500",closeOnEscape:true});});</script><div id="payment_dialog4" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container" style="background-color: #d6e7ff;font-size: 11pt;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="payment_dialog4_title" class="ui-dialog-title">Process to signup for tax payment of more then one vehicle in single transaction..</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div><div class="ui-dialog-content ui-widget-content" id="payment_dialog4_content">
            <ol>
                <li>  Click link shown in login box as <font class="dialog-highlight-text">'Signup here'</font> </li><br />
                <li>  It will open User Registration form to create user.</li><br />
                <li>  Select state name where you belongs to.</li><br />
                <li>  Enter desired <font class="dialog-highlight-text">'User id.'</font></li><br />
                <li>  Fill all data with correct <font class="dialog-highlight-text">'Mobile No.'</font> to get OTP, without OTP you are unable to register.</li><br />
                <li>  Click on <font class="dialog-highlight-text">'Generate OTP'</font> button to get OTP on mobile.</li><br />
                <li>  Enter <font class="dialog-highlight-text">'OTP'</font> and desired <font class="dialog-highlight-text">'Password'</font>.</li><br />
                <li>  Enter captcha shown on the box.</li><br />
                <li>  Click <font class="dialog-highlight-text">'Save'</font> button to create user id.</li><br />
                <li>  It will open message box that shows <font class="dialog-highlight-text">'User ID'</font>.</li><br />
                <li>  Please note down your <font class="dialog-highlight-text">'User ID'</font> to login.</li><br />
            </ol>
            <div class="ui-grid-row top-space bottom-space">
                <div class="ui-grid-col-12 center-position"><button id="j_idt171" name="j_idt171" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){PF('process4').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt171&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit"><span class="ui-button-text ui-c">Close</span></button><script id="j_idt171_s" type="text/javascript">$(function(){PrimeFaces.cw("CommandButton","widget_j_idt171",{id:"j_idt171"});});</script>
                </div>
            </div></div></div><script id="payment_dialog4_s" type="text/javascript">$(function(){PrimeFaces.cw("Dialog","process4",{id:"payment_dialog4",resizable:false,modal:true,width:"600",height:"500",closeOnEscape:true});});</script><div id="payment_dialog5" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container" style="background-color: #d6e7ff;font-size: 11pt;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="payment_dialog5_title" class="ui-dialog-title">Process to pay other state road tax of more then one vehicle..</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div><div class="ui-dialog-content ui-widget-content" id="payment_dialog5_content">
            <ol>
                <li>  Enter <font class="dialog-highlight-text">'User ID'</font> and <font class="dialog-highlight-text">'Password'</font> generated with <font class="dialog-highlight-text">'Signup here'</font> link.</li><br />
                <li>  Enter captcha as shown in the image.</li><br />
                <li>  Select the <font class="dialog-highlight-text">'Tax Payment'</font> from <font class="dialog-highlight-text">'Select Menu'</font> drop down menu.</li><br />
                <li>  Select service Name from <font class="dialog-highlight-text">'Service Name'</font> drop down menu.</li><br />
                <li>  Click <font class="dialog-highlight-text">'Go'</font> button to open the vehicle details form.</li><br />
                <li>  Enter <font class="dialog-highlight-text">'Vehicle No.'</font> and click <font class="dialog-highlight-text">'Get Details'</font> button to fill the details.</li><br />
                <li>  Fill rest of the fields which are not filled automatically.</li><br />
                <li>  In case fields are not filled automatically then enter the details manually.</li><br />
                <li>  Click on <font class="dialog-highlight-text">'Calculate Tax'</font> button to calculate the tax according to state notification.</li><br />
                <li>  Click on <font class="dialog-highlight-text">'Add to Cart'</font> button.</li><br />
                <li>  If you want to pay tax for more than one vehicle follow the steps from 6 to 10.</li><br />
                <li>  If you have added all the vehicles(for which you want to make payment) to the cart then click on <font class="dialog-highlight-text">'Pay Tax'</font> button to pay tax.</li><br />
                <li>  It opens the payment gateway of VAHAN.</li><br />
                <li>  Choose payment gateway and click on <font class="dialog-highlight-text">'Continue'</font> button.</li><br />
                <li>  And then follow the screen to pay tax.</li><br />
                <li>  After paying tax bank will redirect to the Checkpost application.</li><br />
                <li>  In case your transaction is Success it will show the successful receipt.</li><br />
                <li>  In case your transaction is Fail it will show the failure message. Now you can again initiate the payment.</li><br />
                <li>  Print the receipt.</li>
            </ol>
            <div class="ui-grid-row top-space bottom-space">
                <div class="ui-grid-col-12 center-position"><button id="j_idt175" name="j_idt175" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){PF('process5').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt175&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit"><span class="ui-button-text ui-c">Close</span></button><script id="j_idt175_s" type="text/javascript">$(function(){PrimeFaces.cw("CommandButton","widget_j_idt175",{id:"j_idt175"});});</script>
                </div>
            </div></div></div><script id="payment_dialog5_s" type="text/javascript">$(function(){PrimeFaces.cw("Dialog","process5",{id:"payment_dialog5",resizable:false,modal:true,width:"600",height:"500",closeOnEscape:true});});</script><div id="payment_dialog6" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-shadow ui-hidden-container" style="background-color: #d6e7ff;font-size: 11pt;"><div class="ui-dialog-titlebar ui-widget-header ui-helper-clearfix ui-corner-top"><span id="payment_dialog6_title" class="ui-dialog-title">Process to Generate Memo and pay fee of ODC..</span><a href="#" class="ui-dialog-titlebar-icon ui-dialog-titlebar-close ui-corner-all" aria-label="Close"><span class="ui-icon ui-icon-closethick"></span></a></div><div class="ui-dialog-content ui-widget-content" id="payment_dialog6_content">
            <ol>
                <li>Select the <font class="dialog-highlight-text">'Tax Payment'</font> from <font class="dialog-highlight-text">'Payment'</font> menu on home screen.</li>
                <li>Select the state where you want to go from 'Select State' drop down menu.</li>
                <li>Select service name from <font class="dialog-highlight-text">'Service Name'</font> as <font class="dialog-highlight-text">'ADVANCE PAYMENT OF ODC EXEMPTION FEE'</font> from drop down menu.</li>
                <li>Click <font class="dialog-highlight-text">'Go'</font> button to open the vehicle details form.</li>
                <li>Enter <font class="dialog-highlight-text">'Vehicle No.'</font> and click <font class="dialog-highlight-text">'Get Details'</font> button to fill the details.</li>
                <!--                &lt;li&gt;Fill rest of the fields which are not filled automatically.&lt;/li&gt;-->
                <li>In case fields are not filled automatically then enter the details manually.</li>
                <li>In case nature of goods of your vehicle is <font class="dialog-highlight-text">'INDIVISIBLE'</font> then first generate memo. And you have two options.
                    <ol>
                        <li type="A">You can pay the fee at the same time by clicking on <font class="dialog-highlight-text">'Pay Fee'</font> button.
                            <ol>
                                <li type="i">It opens the payment gateway of <font class="dialog-highlight-text">VAHAN</font>.</li>
                                <li type="i">Choose payment gateway and click on <font class="dialog-highlight-text">'Continue'</font> button.</li>
                                <li type="i">And then follow the screen to Pay Fee.</li>
                                <li type="i">After paying fee bank will redirect to the Checkpost application.</li>
                                <li type="i">In case your transaction is <font class="dialog-highlight-text">Success</font> it will show the successful receipt.</li>
                                <li type="i">In case your transaction is <font class="dialog-highlight-text">Fail</font> it will show the failure message. Now you can again initiate the payment.</li>
                                <li type="i">Print the Memo receipt.</li>
                                <li type="i">Print the Fees receipt.</li>
                            </ol>
                        </li>
                        <li type="A">Or if you want to make payment later then note down your memo no and follow below steps
                            <ol>
                                <li type="i">Select the <font class="dialog-highlight-text">'Tax Payment'</font> from <font class="dialog-highlight-text">'Payment'</font> menu on home screen.</li>
                                <li type="i">Select the state where you want to go from <font class="dialog-highlight-text">'Select State'</font> drop down menu.</li>
                                <li type="i">Select service name from <font class="dialog-highlight-text">'Service Name'</font> as <font class="dialog-highlight-text">'PAYMENT OF PENDING ODC EXEMPTION FEE'</font> from drop down menu.</li>
                                <li type="i">Type the Memo no in text field.</li>
                                <li type="i">Click <font class="dialog-highlight-text">'Get Details'</font> button to fill the details.</li>
                                <li type="i">Click <font class="dialog-highlight-text">'Pay Fee'</font> button to pay the calculated Fee.</li>
                                <li type="i">It opens the payment gateway of <font class="dialog-highlight-text">VAHAN</font>.</li>
                                <li type="i">Choose payment gateway and click on <font class="dialog-highlight-text">'Continue'</font> button.</li>
                                <li type="i">And then follow the screen to Pay Fee.</li>
                                <li type="i">After paying fee bank will redirect to the Checkpost application.</li>
                                <li type="i">In case your transaction is <font class="dialog-highlight-text">Success</font> it will show the successful receipt.</li>
                                <li type="i">In case your transaction is <font class="dialog-highlight-text">Fail</font> it will show the failure message. Now you can again initiate the payment.</li>
                                <li type="i">Print the Fee receipt.</li>
                            </ol>
                        </li>
                    </ol>
                </li>
            </ol>
            <div class="ui-grid-row top-space bottom-space">
                <div class="ui-grid-col-12 center-position"><button id="j_idt180" name="j_idt180" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" onclick="PrimeFaces.bcn(this,event,[function(event){PF('process6').hide();},function(event){PrimeFaces.ab({s:&quot;j_idt180&quot;,f:&quot;master_Layout_form&quot;});return false;}]);" type="submit"><span class="ui-button-text ui-c">Close</span></button>
                    <script id="j_idt180_s" type="text/javascript">$(function(){PrimeFaces.cw("CommandButton","widget_j_idt180",{id:"j_idt180"});});</script>
                </div>
            </div></div></div>
    <script id="payment_dialog6_s" type="text/javascript">$(function(){PrimeFaces.cw("Dialog","process6",{id:"payment_dialog6",resizable:false,modal:true,width:"600",height:"500",closeOnEscape:true});});</script>
    </div><div id="j_idt187" class="ui-blockui-content ui-widget ui-widget-content ui-corner-all ui-helper-hidden ui-shadow"><img id="j_idt188" src="{{ asset('newAssets/checkpost/faces/javax.faces.resource/ajax_loader_blue.gif?ln=images')}}" alt="" /></div>
    <script id="j_idt187_s" type="text/javascript">$(function(){PrimeFaces.cw("BlockUI","masterLayoutVar",{id:"j_idt187",block:"master_Layout_form"});});</script><input type="hidden" name="javax.faces.ViewState" id="j_id1:javax.faces.ViewState:0" value="1168780093040411243:-452930263442976215" autocomplete="off" />
</form></body>
</html>
