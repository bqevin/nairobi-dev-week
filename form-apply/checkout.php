<?php
require_once 'core/init.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <meta charset="utf-8">
    <title>Developer Week Nairobi 2016</title>
    <meta content=
    "Developer Week Nairobi 2016 is East Africa's newest tech event series focused on creating world class
    applications."
    name="description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  user-scalable=0"/>
    <link href="images/DWN Icon.ico" rel="shortcut icon">
    <link href="images/DWN Icon.ico" rel="icon" type="image/x-icon">

    <link href="../assets/themes/fbf8-live/css/app.css" rel="stylesheet" type="text/css"/>
    <!--[if lte IE 9]>
    <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<!--[if lte IE 9 ]>
<body class="ie register"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<body class="register"> <!--<![endif]-->

    <script>
      var e = document.createElement("script");
      e.async = true;
      e.src = "https://ad.atdmt.com/m/a.js;m=11002203288872;cache=" + Math.random() +
        "?applicant=''";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(e, s);
    </script>
    <noscript>
    <iframe
      style="display:none;"
      src="https://ad.atdmt.com/m/a.html?applicant=">
    </iframe>
    </noscript>

<div class="root">

    <section class="masthead">
        <header>
            <div class="container">
                <a href="../index.html"><i class="f8-logo-b">Nairobi Developers Week</i></a>
                <nav>
                    <ul>
                       <li><a href="../#how-it-works">Learn more</a></li>
                        <li><a href="../#events">Events</a></li>
                        <li><a href="../#speakers">Speakers</a></li>
                        <li><a href="../#sponsors">Sponsors</a></li>
                        <li><a href="mailto:hello@nairobideveloperweek.com?subject=[web enquiry]">Chat with us</a></li>
                        <li class="active"><a href="#">Register</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="step-label">
            <h5>Select your ticket</h5>
        </div>
    </section>
    <section class="form-content">
        <div class="container">
            <form class="form form-vertical" method="post" id="application" action="pesapal-iframe.php">
               <!--  <input type="hidden" name="_token" value="a5c0db72d2bb83ee681e58d9eb08d531700a17d6b73bb5472a923aa73f0ce8a0">
                <input type="hidden" id="facebook_id" name="application[facebook_id]" value="0"> -->
                <fieldset>
                    <p>Please select your ticket</p>
                </fieldset>
                <fieldset>
                    <div class="form-group register-form">
                        <label for="jobTitle">Your ticket option</label>
                        <div class="row-fluid">
                            <select class="form-control span12" id="jobTitle" name="ticket_option">
                                <option value="" disabled selected>Select an option...</option>
                                <option value="5050, Scrum Workshop">Scrum Workshop</option>
                                <option value="7550, All Access Pass">All Access Pass</option>
                                <option value="5050, Developer Workshops">Developer Workshops</option>
                                <option value="2025, Daily Workshop">Daily Workshop</option>
                                <option value="1010, Tech Hiring Mixer">Tech Hiring Mixer</option>
                                <option value="1010, Twitter #HelloWorld Tour">Twitter #HelloWorld Tour</option>
                                <option value="1010, Friday Afterparty">Friday Afterparty</option>
                            </select>
                        </div>
                        <!-- <div class="help-text">Please select an option.</div> -->
                    </div>
                   
                </fieldset>
                <fieldset class="register-form">
                    <p class="notice-text">All your credit card information provided herein is secure</p>
                   
                   
                    <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                    <!-- <input class="btn btn-primary" type="submit" value="Submit"> -->
                    <button class="btn btn-primary" type="submit" id="submit-application" >Order ticket</button>
                    <div class="form-group" id="submit-process">
                        <a class="btn btn-processing" href="#">Processing your application</a>
                    </div>

                </fieldset>

            </form>
        </div>
    </section>

</div><!-- end root -->

<footer>
    <section class="primary">
        <div class="container">
            <hr>
        </div>
        <div class="container">
            <div class="footer-logo">
                <a href="../" class="abs-mark"><i class="f8-mark-b">Nairobi Developers Week</i></a>
                <h4 class="strong">Nairobi Dev Week 2016</h4>
                <h4>Kenya National Theatre, Nairobi</h4>
                <h4>April 25 - May 1, 2016</h4>
                <div class="fb-share-button" data-href="http://nairobideveloperweek.com/" data-layout="button_count"></div>
            </div>
            <nav>
                <ul>
                    <li><a href="../#how-it-works">Learn more</a></li>
                    <li><a href="../#events">Events</a></li>
                    <li><a href="../#speakers">Speakers</a></li>
                    <li><a href="../#sponsors">Sponsors</a></li>
                    <li><a href="mailto:hello@nairobideveloperweek.com?subject=[web enquiry]">Chat with us</a></li>
                    <li class="active"><a href="#">Register</a></li>
                </ul>
            </nav>
        </div>
    </section>
    <section class="secondary">
        <div class="container">
            <div class="dib pull-left footer-body">
                <span class="fb-dev">&copy; 2016 Nairobi Developers Week</span>
                <span class="dev-links"><a href="https://www.whitehatdev.co">White Hat DEV Team</a> / <a
                        href="#">Facebook Page</a></span>
                <div class="footer-info-links pull-right">
                    <a href="#" class="dib footer-link">FAQs</a>
                    <a href="#" class="dib footer-link">Terms</a>
                    <a href="#" class="dib footer-link">Privacy</a>
                </div>
            </div>
        </div>
    </section>
</footer>

<div class="burger">
    <div class="inner">
        <i class="bar-1"></i>
        <i class="bar-2"></i>
        <i class="bar-3"></i>
    </div>
</div>

<div class="mobile-nav">
    <div class="container">
        <div class="mast">
            <a href="../index.html">
                <i class="f8-mark-w">F8 Facebook Developers Conference</i>
            </a>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="../#how-it-works">Learn more</a></li>
            <li><a href="../#events">Events</a></li>
            <li><a href="../#speakers">Speakers</a></li>
            <li><a href="../#sponsors">Sponsors</a></li>
            <li><a href="mailto:hello@nairobideveloperweek.com?subject=[web enquiry]">Chat with us</a></li>
            <li class="active"><a href="#">Register</a></li>
        </ul>
    </nav>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/assets/themes/fbf8-live/js/jquery-1.11.1.js"><\/script>')</script>
<script src="../assets/themes/fbf8-live/js/vendor.js"></script>
<script src="../assets/themes/fbf8-live/js/app.js"></script>
<script src="../assets/themes/fbf8-live/js/checkout.js"></script>
<script>
    WebFont.load({custom: {families: ['Graphik-Regular']}});
    $(function () {
        window.F8_app.init();
    });
</script>
</body>
</html>
<!-- Localized -->
