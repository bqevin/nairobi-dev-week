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
            <h5>Apply to attend</h5>
        </div>
    </section>
<?php
require_once 'core/init.php';
ini_set('display_errors',1);
error_reporting(E_ALL);
//var_dump(Token::check(Input::get('token')));
if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        //echo "I have been run <br>";
        //echo Input::get('username');
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            //NB:Fiels matches field names in DB
            'fname' => array(
                'required' => true,
                'min' => 2
                ),
            'lname' => array(
                'required' => true,
                'min' => 2
                ),
            'company' => array(
                'required' => true,
                'min' => 2
                ),
            'email' => array(
                'required' => true,
                //table name to check if value already exists
                'unique' => 'users'
                ),
            'gender' => array(
                'required' => true
                ),
            'phone' => array(
                'required' => true,
                'min' => 7
                ),
            'country' => array(
                'required' => true,
                )
            // 'password_again' => array(
            //     'required' => true,
            //     'matches' => 'password'
            //     )
            ));
        if ($validation->passed()) {
            $user = new User();
            $salt = Hash::salt(32);// Db is 32 length
            // die();
            try{
                //DB names
                $user->create(array(
                        'fname' => Input::get('fname'),
                        'lname' => Input::get('lname'),
                        'company' => Input::get('company'),
                        'job_title' => Input::get('job_title'),
                        'category_desc' => Input::get('category_desc'),
                        'app_name' => Input::get('app_name'),
                        'app_link_main' => Input::get('app_link_main'),
                        'app_name_extra' => Input::get('app_name_extra'),
                        'app_link_extra' => Input::get('app_link_extra'),
                        'email' => Input::get('email'),
                        'gender' => Input::get('gender'),
                        'phone' => Input::get('phone'),
                        'joined' => date('Y-m-d H:i:s'),
                        'country' => Input::get('country')
                    ));
                Session::flash('home', 'You have been registered and can now log in');
               Redirect::to('checkout.php');
            }catch(Exception $e){
                die($e->getMessage());
                //Alternative is rediect user to a failure page
            }
            //echo "Passed!";
            // Session::flash('success', 'You  have registered succefully!');

        }else{
            //State Errors
            foreach($validation->errors() as $error){
                echo $error, '<br>';
                //echo Input::get('username');
            };
        }
    }
}
?>
    <section class="form-content">
        <div class="container">
            <form class="form form-vertical" method="post" id="application" action="">
               <!--  <input type="hidden" name="_token" value="a5c0db72d2bb83ee681e58d9eb08d531700a17d6b73bb5472a923aa73f0ce8a0">
                <input type="hidden" id="facebook_id" name="application[facebook_id]" value="0"> -->
                <fieldset>
                    <p>Fill out the form below to apply for Nairobi Developers Week. 
                        <span class="tip"
                              data-tip="Our T&amp;C is attached on this application form">
                            Agree to terms</span> before registering.</p>

                    <div class="form-group" id="facebook-button-group">
                        <label for="fb-register-button">Nairobi Developers Week Terms &amp; Conditions.</label>
                        <!-- <button class="btn btn-fbAuth" id="fb-register-button"><i class="fb-logo"></i> Log in with
                            Facebook
                        </button> 
                        <br>-->
                        <a href="" id="btn-register-with-email">For registration <span>click here to proceed</span>.</a>
                        <!-- <button class="btn btn-success facebook-login-success">Logged in with Facebook</button> 
                        <p class="notice-text notice-text-large facebook-login-success">We pre-filled some info from
                            your Facebook profile. Please tell us a little bit more about you.</p>-->
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group register-form">
                        <label for="firstName"> Howdy, Dev!</label>
                        <div class="row-fluid">
                            <input type="text" class="form-control span6" id="firstName" placeholder="First name"
                                   value="<?php echo escape(Input::get('fname'));?>" name="fname">
                            <input type="text" class="form-control span6" id="lastName" placeholder="Last name"
                                   value="<?php echo escape(Input::get('lname'));?>" name="lname">
                        </div>
                        <div class="help-text">Please enter a valid first and lastname.</div>
                    </div>
                    <div class="form-group register-form">
                        <label for="emailAddress">Your email address</label>
                        <div class="row-fluid">
                            <input type="email" class="form-control span12" id="emailAddress" name="email"
                                   value="<?php echo escape(Input::get('email'));?>">
                        </div>
                        <div class="help-text">Please enter a valid email address.</div>
                    </div>
                    <div class="form-group register-form">
                        <label for="phone">Your phone number</label>
                        <div class="row-fluid">
                            <input type="tel" class="form-control span12" id="phone" name="phone"
                                   value="<?php echo escape(Input::get('phone'));?>">
                        </div>
                        <div class="help-text">Please enter a valid phone number.</div>
                    </div>
                    <div class="form-group register-form">
                        <label for="companyName">Your company name</label>
                        <div class="row-fluid">
                            <input type="text" class="form-control span12" id="companyName"
                                   name="company" value="<?php echo escape(Input::get('company'));?>">
                        </div>
                        <div class="help-text">Please enter a valid company name.</div>
                    </div>
                    <div class="form-group register-form">
                        <label for="jobTitle">Your job title</label>
                        <div class="row-fluid">
                            <select class="form-control span12" id="jobTitle" name="job_title">
                                <option value="" disabled selected>Select an option...</option>
                                <option value="Publisher">Publisher</option>
                                <option value="Developer">Developer</option>
                                <option value="Student">Student</option>
                                <option value="CEO">CEO</option>
                                <option value="VP of Eng, CTO, CIO">VP of Eng, CTO, CIO</option>
                                <option value="Dev Ops">Dev Ops</option>
                                <option value="Data Analyst">Data Analyst</option>
                                <option value="Product Manager">Product Manager</option>
                                <option value="Marketer">Marketer</option>
                                <option value="Designer">Designer</option>
                                <option value="Growth Hacker">Growth Hacker</option>
                                <option value="Business Development">Business Development</option>
                                <option value="Software Engineer">Software Engineer</option>
                                <option value="Chief Revenue Officer">Chief Revenue Officer</option>
                                <option value="Other">Other</option>
                                <option value="I prefer not to disclose">I prefer not to disclose</option>
                            </select>
                        </div>
                        <div class="help-text">Please select an option.</div>
                    </div>
                    <div class="form-group register-form">
                        <div class="row-fluid">
                            <div class="span6">
                                <label for="country">Your country</label>
                                <select class="form-control" id="country" name="country">
                                    <option value="" disabled selected>Select an option...</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BA">Bosnia and Herzegowina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="BN">Brunei Darussalam</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo, the Democratic Republic of the</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Cote d'Ivoire</option>
                                    <option value="HR">Croatia (Hrvatska)</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="TP">East Timor</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="FX">France, Metropolitan</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard and Mc Donald Islands</option>
                                    <option value="VA">Holy See (Vatican City State)</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran (Islamic Republic of)</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                    <option value="KR">Korea, Republic of</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Lao People's Democratic Republic</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libyan Arab Jamahiriya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macau</option>
                                    <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia, Federated States of</option>
                                    <option value="MD">Moldova, Republic of</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Reunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russian Federation</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint LUCIA</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia (Slovak Republic)</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SH">St. Helena</option>
                                    <option value="PM">St. Pierre and Miquelon</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syrian Arab Republic</option>
                                    <option value="TW">Taiwan, Province of China</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania, United Republic of</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="US">United States</option>
                                    <option value="UM">United States Minor Outlying Islands</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Viet Nam</option>
                                    <option value="VG">Virgin Islands (British)</option>
                                    <option value="VI">Virgin Islands (U.S.)</option>
                                    <option value="WF">Wallis and Futuna Islands</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="YU">Yugoslavia</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                            </div>
                            <!-- <div class="span6">
                                <label for="zipCode">Your zip code</label>
                                <input type="text" class="form-control" id="zipCode" name="zipcode"
                                       value="">
                            </div> -->
                        </div>
                        <div class="help-text">Please select an option.</div>
                    </div>
                </fieldset>

                <fieldset class="register-form">
                    <p>We’ll be using the following questions to ensure we have a diverse group of attendees with a wide
                        variety of apps represented.</p>
                    <div class="form-group break-early">
                        <label for="appName">Do you work on any apps?</label>
                        <div class="row-fluid">
                            <input type="text" class="form-control span6" id="appName" name="app_name"
                                   placeholder="App name" value="<?php echo escape(Input::get('app_name'));?>">
                            <input type="text" class="form-control span6" id="appLink"
                                   placeholder="Link to App Store or Google Play" name="app_link_main" value="<?php echo escape(Input::get('app_link_main'));?>">
                        </div>
                    </div>
                    <div class="form-group extra-app">
                        <label for="appName">Do you work on another app?</label>
                        <div class="row-fluid">
                            <input type="text" class="form-control span6" id="appNameExtra" name="app_name_extra"
                                   placeholder="App name" value="<?php echo escape(Input::get('app_name_extra'));?>">
                            <input type="text" class="form-control span6" id="appLinkExtra"
                                   placeholder="Link to App Store or Google Play" name="app_link_extra" value="<?php echo escape(Input::get('app_link_extra'));?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category">Which of these best describes you?</label>
                        <div class="row-fluid">
                            <select class="form-control span12" id="category" name="category_desc">
                                <option value="" disabled selected>Select an option...</option>
                                <option value="Freelance Developer">Freelance Developer</option>
                                <option value="Bootstrapped or early stage startup">Bootstrapped or early stage
                                    startup
                                </option>
                                <option value="Full time employed developer">Full time employed developer</option>
                                <option value="VC or accelerator backed startup with funding">VC or accelerator backed
                                    startup with funding
                                </option>
                                <option value="Established company ­ Non Developer">Established company ­ Non Developer</option>
                                <option value="I prefer not to disclose.">Other.</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="register-form">
                    <p>Just one last thing to finalize...</p>
                    <div class="form-group">
                        <div class="row-fluid">
                            <div class="span6">
                                <label for="gender">Your gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="" disabled selected>Select an option...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Gender Non-conforming/Transgender">Gender
                                        Non-conforming/Transgender
                                    </option>
                                </select>
                            </div>
                            <!-- <div class="span6">
                                <label for="ethnicity">Your ethnicity</label>
                                <select class="form-control" id="ethnicity" name="meta[demographics-ethnicity]">
                                    <option value="" disabled selected>Select an option...</option>
                                    <option value="Asian">Asian</option>
                                    <option value="Black or African American">Black or African American</option>
                                    <option value="Hispanic or Latino">Hispanic or Latino</option>
                                    <option value="Native American or Alaska Native">Native American or Alaska Native
                                    </option>
                                    <option value="Native Hawaiian or Pacific Islander">Native Hawaiian or Pacific
                                        Islander
                                    </option>
                                    <option value="White">White</option>
                                    <option value="Two or more">Two or more</option>
                                    <option value="I prefer not to disclose.">I prefer not to disclose.</option>
                                </select>
                            </div> -->
                        </div>
                        <div class="help-text">Please select an option.</div>
                    </div>
                </fieldset>

                <fieldset class="register-form">
                    <p class="notice-text">The Nairobi Developers Week event will be streamed and captured in photos, audio, and/or video
                        recordings. It is possible that event attendees may be incidentally photographed or recorded.
                        These recordings may be used publicly to promote Nairobi Developers Week and its products, online or in any
                        other media, anywhere in the world. If you do not wish to be recorded, you should view the event
                        online rather than attend in person.</p>
                    <p class="notice-text">By submitting this form, you agree to receive marketing related electronic
                        communications from Nairobi Developers Week, including news, updates, and promotional emails. You may withdraw
                        your consent and unsubscribe from such emails at any time.</p>
                    <p class="notice-text">By submitting this form, you also agree to the <a
                            href="#" target="_blank">Nairobi Developers Week Code of Conduct</a>.</p>

                    <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                    <!-- <input class="btn btn-primary" type="submit" value="Submit"> -->
                    <button class="btn btn-primary" type="submit" id="submit-application" >Submit</button>
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
<script src="../assets/themes/fbf8-live/js/register.js"></script>
<script>
    WebFont.load({custom: {families: ['Graphik-Regular']}});
    $(function () {
        window.F8_app.init();
    });
</script>
</body>
</html>
<!-- Localized -->
