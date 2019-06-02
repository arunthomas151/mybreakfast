<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">

<head>
    <title>Payment</title>
    @include('User.header')
    {{-- @yield('header') --}}
    <!-- Site Title-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Card Payment Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="Payment/css/style1.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="Payment/css/creditly.css" type="text/css" media="all" />
<link rel="stylesheet" href="Payment/css/font-awesome.css">
</head>

<body>
    <!-- Page Header-->
    <header class="page-header page-header-secondary">
        @include('User.usermenu')
    </header>
    <section class="section-sm row bg-white row">
        <div class="text-center">
        
            <table>
                    <tr>
                        <th></th>
                        <th>Starting Date</th>
                        <th>No Of Persons</th>
                        <th>Amount</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>{{ $pay[0]->pbdate}}</td>
                        <td>{{ $pay[0]->pnop }}</td>
                        <td>{{ $pay[0]->rent }}</td>
                        <td>
                            <?php 
                            $total = 0;
                            $total = $total + $pay[0]->rent;
                            ?>
                        </td>
                    </tr>
                        <tr>
                                <td colspan="5"></td>
                            </tr>
                            <tr>
                                    <td colspan="2"></td>
                                    <td>Total Amount</td>
                            <td>{{ $total }}</td>
                            </tr>
                            <tr>
                                <td colspan="6"><a class="button button-icon button-primary payment2" href="#" data-toggle="modal"
                                data-target="#payment" data-roid="{{ $pay[0]->pbid }}"><span>Make Payement</span><span class="icon material-icons-chevron_right"></span>
                                    </a></td>
                            </tr>
                    
                </table>
        </div>
    </section>

    @include('User.footer')
</body>

</html>


    <!-- //js -->
    <!-- credit-card -->
        <script type="text/javascript" src="Payment/js/creditly.js"></script>
        <script type="text/javascript">
            $(function() {
              var creditly = Creditly.initialize(
                  '.creditly-wrapper .expiration-month-and-year',
                  '.creditly-wrapper .credit-card-number',
                  '.creditly-wrapper .security-code',
                  '.creditly-wrapper .card-type');
    
            //   $(".creditly-card-form .submit").click(function(e) {
            //     e.preventDefault();
            //     var output = creditly.validate();
            //     if (output) {
            //       // Your validated credit card output
            //       console.log(output);
            //     }
            //   });
            });
        </script> 
<div class="main modal" id="payment">	
        
        <div id="myAccordion" class="nl-accordion">
            <ul>
                <li>
                    <input type="radio" id="nl-radio-1" name="nl-radio" class="nl-radio" checked="checked"/>
                    <label class="nl-label" for="nl-radio-1">Payment Card</label>
                    <div class="nl-content">
                        <div class="agileits_w3layouts_tab1 agileits_w3layouts_tab">
                        <form action="/uppayment" method="post" class="creditly-card-form agileinfo_form">
                            @csrf
                            <input type="hidden" name="pkid" id="pkid">
                            <section class="creditly-wrapper wthree w3_agileits_wrapper" style="width: 525px;">
                                    <div class="first-row form-group">
                                        <div class="controls">
                                            <label class="control-label">Name on Card</label>
                                            <input class="billing-address-name form-control" type="text" name="name" onkeyup="this.value=this.value.toUpperCase();" placeholder="ARUN THOMAS" required="">
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Card Number</label>
                                            <input class="number credit-card-number form-control" type="text" name="cardno"inputmode="numeric" autocomplete="cc-number" autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;" required="">
                                        </div>
                                        <div class="w3_agileits_card_number_grids">
                                            <div class="w3_agileits_card_number_grid_left">
                                                <div class="controls">
                                                    <label class="control-label">Expiration Date</label>
                                                    <input class="expiration-month-and-year form-control date" type="text" name="expydt" placeholder="MM / YY" required="">
                                                </div>
                                            </div>
                                            <div class="w3_agileits_card_number_grid_right">
                                                <div class="controls">
                                                    <label class="control-label">CVV</label>
                                                    <input class="security-code form-control" Â·inputmode="numeric" maxlength="3" type="text" name="ccv" placeholder="&#149;&#149;&#149;" required="">
                                                </div>
                                            </div>
                                            <div class="clear"> </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="submit"><span>Make a payment <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></button>
                            </section>
                        </form>
                        </div>	
                    </div>
                </li>
                <li>
                    <input type="radio" id="nl-radio-2" name="nl-radio" class="nl-radio" />
                    <label class="nl-label" for="nl-radio-2">PayPal</label>
                    <div class="check w3ls"></div>
                    <div class="nl-content">
                        <div class="agileits_w3layouts_tab2 agileits_w3layouts_tab">
                            <h3>Don't Have an Account <a href="#">Register here</a></h3>
                            <form action="#" method="post">
                                <div class="creditly-wrapper wthree" style="width: 525px;">
                                    <input type="email" name="Email" placeholder="Email" required="">
                                    <input type="password" name="Password" placeholder="Password" required="">
                                    <input type="submit" value="Login">
                                </div>	
                            </form>
                        </div>				
                    </div>
                </li>
            </ul>
        </div>   
    </div>
    
    </div>
<script>
    $(".payment2").on("click", function () {
        $pbid = $(this).data("roid");
        $("#pkid").val($pbid);
    });
    </script>
