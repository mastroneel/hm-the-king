<?php
if(isset($_POST['submit']) && !empty($_POST['submit'])):
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '6Ldyk0wUAAAAAB37-piqRNf_n67130OT_sY8pXG0';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):
            //contact form submission code
            $name = !empty($_POST['name'])?$_POST['name']:'';
            $email = !empty($_POST['email'])?$_POST['email']:'';
            $message = !empty($_POST['message'])?$_POST['message']:'';
            $company = !empty($_POST['company'])?$_POST['company']:'';
            $companytype = !empty($_POST['companytype'])?$_POST['companytype']:'';
            $phone = !empty($_POST['phone'])?$_POST['phone']:'';

            $to = 'hm@brandedspiritsusa.com';
            $from = $_POST['email'];
            $subject = 'New HM The King contact form submission';
            $subject2 = 'Copy of your HM The King contact form submission';
            $htmlContent = "
                <h1>Contact request details</h1>
                <p><b>Name: </b>".$name."</p>
                <p><b>Email: </b>".$email."</p>
                <p><b>Company Name: </b>".$company."</p>
                <p><b>Company Type: </b>".$companytype."</p>
                <p><b>Phone: </b>".$phone."</p>
                <p><b>Message: </b>".$message."</p>
            ";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
            //send email
            @mail($to,$subject,$htmlContent,$headers);
            @mail($from,$subject2,$htmlContent,$headers);

            $succMsg = 'Your contact request have submitted successfully.';
            echo "Mail Sent. Thank you " . $firstname . ", we will contact you shortly.";
        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        echo "Please click on the reCAPTCHA box and try again.";
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
else:
    $errMsg = '';
    $succMsg = '';
endif;
?>




    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/app.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- scripts necessary for store locator -->
        <script
          src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAQpg38og1BS2K1lEWm7TVPSwq-DgWbsLU"></script>
        <script
          src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js">
        </script>
        <script src="store-locator/store-locator.min.js"></script>
        <script src="store-locator/bevmo-store-locator.js"></script>
        <script src="store-locator/panel.js"></script>
        <script>
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-12846745-20']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' === document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
        <!-- end of store locator scripts -->
        <script type="text/javascript" src="js/ageVerify.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <title>HM the King</title>
      </head>
      <body>

        <!-- age gate modal -->
        <div id="agemodal" class="agemodal">
          <div class="overlay"></div>
            <div class="message">
              <div class="message-inner">
                <h1>Welcome</h1>
                <p>You have to be over 21 to enter this site</p>
                <form id="agegate" method="post" action="">
                <div class="birthday">
                    <!-- <label class="day" for="day">Birthday:</label> -->
                    <select id="day" name="day">
                        <option value="notset">DD</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <select id="month" name="month">
                        <option value="notset">MM</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <select id="year" name="year">
                        <option value="notset">YYYY</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                        <option value="1979">1979</option>
                        <option value="1978">1978</option>
                        <option value="1977">1977</option>
                        <option value="1976">1976</option>
                        <option value="1975">1975</option>
                        <option value="1974">1974</option>
                        <option value="1973">1973</option>
                        <option value="1972">1972</option>
                        <option value="1971">1971</option>
                        <option value="1970">1970</option>
                        <option value="1969">1969</option>
                        <option value="1968">1968</option>
                        <option value="1967">1967</option>
                        <option value="1966">1966</option>
                        <option value="1965">1965</option>
                        <option value="1964">1964</option>
                        <option value="1963">1963</option>
                        <option value="1962">1962</option>
                        <option value="1961">1961</option>
                        <option value="1960">1960</option>
                        <option value="1959">1959</option>
                        <option value="1958">1958</option>
                        <option value="1957">1957</option>
                        <option value="1956">1956</option>
                        <option value="1955">1955</option>
                        <option value="1954">1954</option>
                        <option value="1953">1953</option>
                        <option value="1952">1952</option>
                        <option value="1951">1951</option>
                        <option value="1950">1950</option>
                        <option value="1949">1949</option>
                        <option value="1948">1948</option>
                        <option value="1947">1947</option>
                        <option value="1946">1946</option>
                        <option value="1945">1945</option>
                        <option value="1944">1944</option>
                        <option value="1943">1943</option>
                        <option value="1942">1942</option>
                        <option value="1941">1941</option>
                        <option value="1940">1940</option>
                        <option value="1939">1939</option>
                        <option value="1938">1938</option>
                        <option value="1937">1937</option>
                        <option value="1936">1936</option>
                        <option value="1935">1935</option>
                        <option value="1934">1934</option>
                        <option value="1933">1933</option>
                        <option value="1932">1932</option>
                        <option value="1931">1931</option>
                        <option value="1930">1930</option>
                        <option value="1929">1929</option>
                        <option value="1928">1928</option>
                        <option value="1927">1927</option>
                        <option value="1926">1926</option>
                        <option value="1925">1925</option>
                        <option value="1924">1924</option>
                        <option value="1923">1923</option>
                        <option value="1922">1922</option>
                        <option value="1921">1921</option>
                        <option value="1920">1920</option>
                        <option value="1919">1919</option>
                        <option value="1918">1918</option>
                        <option value="1917">1917</option>
                        <option value="1916">1916</option>
                        <option value="1915">1915</option>
                        <option value="1914">1914</option>
                        <option value="1913">1913</option>
                    </select>
                </div>
                <div class="remember">
                    <input type="checkbox" id="remember" /><label for="remember">Remember Me</label>
                </div>
                <div class="submit">
                    <a id="formsubmit" class="formsubmit" data-submit="post">OK</a>
                </div>
            </form>
            <img src="img/white-logo.png">
          </div>
        </div>
    </div>

    <!-- Changes text to white after selecting an option -->
    <script type="text/javascript">
      var daySelect = document.getElementById('day');
      daySelect.onchange = function () {
        daySelect.className = 'whiteText';
      }

      var monthSelect = document.getElementById('month');
      monthSelect.onchange = function () {
        monthSelect.className = 'whiteText';
      }

      var yearSelect = document.getElementById('year');
      yearSelect.onchange = function () {
        yearSelect.className = 'whiteText';
      }
    </script>

    <!-- end age modal -->




        <!-- mobile nav -->
        <nav class="site-navbar">
          <input type="checkbox" id="toggle_menu" class="toggle-menu-checkbox" />
          <label for="toggle_menu" class="toggle-menu-label uppercase"></label>
          <input type="checkbox" id="toggle_overlay" class="toggle-overlay-checkbox" />
          <label for="toggle_menu" class="toggle-overlay-label uppercase"></label>
          <ul class="site-menu">
            <li class="site-menu-item"><a href="#home">Home</a></li>
            <li class="site-menu-item"><a href="#about">About</a></li>
            <li class="site-menu-item"><a href="pages/assets.html">Press & Trade</a></li>
            <li class="site-menu-item"><a href="#cocktails">Cocktails</a></li>
            <li class="site-menu-item"><a href="#locations">Locations</a></li>
            <li class="site-menu-item"><a href="#contact">Contact</a></li>
          </ul>
        </nav>
        <!-- end mobile nav -->

        <!-- desktop nav -->
        <nav class="nav-desktop">
          <div class="row">
            <div class="col-xs-3">
              <img src="img/white-logo.png">
            </div>
            <div class="col-xs-9">
              <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="pages/assets.html">Press & Trade</a></li>
                <li><a href="#cocktails">Cocktails</a></li>
                <li><a href="#locations">Locations</a></li>
                <li><a href="#contact">Contact</a></li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- end desktop nav -->

        <!-- nav link scroll point -->
        <a name="home"></a>

        <!-- hero -->
        <div class="hero">
          <div class="row">
            <div class="col-xs-12 col-md-6">
              <h2>The perfect <br>blended scotch</h2>
            </div>
            <div class="col-xs-12 col-md-6">
              <img src="img/bottle.png">
            </div>
          </div>
        </div>
        <!-- end hero -->

        <!-- scroll to top button and script -->
        <div>
          <a id="toTop" class="scroll-to-top" href="#home"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
        </div>

        <script>
          $(window).scroll(function() {
              if ($(this).scrollTop()) {
                  $('#toTop').fadeIn();
              } else {
                  $('#toTop').fadeOut();
              }
          });
        </script>
        <!-- end of scroll to top button and script -->

        <!-- nav link scroll point -->
        <a name="about"></a>

        <!-- about section -->
        <div class="about">
          <div class="row">
            <div class="col-xs-12">
              <h1>About</h1>
              <img src="img/underline.png">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <p>
                HM the King is an exquisite blend of Highland single malts and grain whiskies from around Scotland.
                 HM the King’s unique, balanced blend was carefully
                  selected by Scotch Whisky connoisseurs who have worked for Scotland’s most storied houses,
                   including The Dalmore, Jura and The Highland Queen.
              </p>
              <br>
              <p>
                Mellow vanilla and honey notes on the palate give way to a smooth and round
                 aftertaste with subdued smoke and late peat. The beautiful bottle, a winner
                  of Queen Elizabeth’s Award for Design, mirrors the extraordinary Scotch
                   Whisky within.
              </p>
            </div>
          </div>
        </div>
        <!-- end about section -->

    <!-- nav link scroll point -->
    <a name="cocktails"></a>

    <!-- cocktails section -->
    <div class="cocktails">
      <div class="row">
        <div class="col-xs-12">
          <h1>Cocktails</h1>
        </div>
      </div>
      <div class="row cocktail-row">
        <div class="col-xs-6 col-sm-3">
          <div class="cocktail-pic-1" data-toggle="modal" data-target="#modal1">
            <div class="image-overlay">
              <p>Northern Lights</p>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <h2>Northern Lights</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('modal8')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/northern-lights.jpg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal2')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>1.5 oz Ice Fox Vodka</li>
                        <li>.25 oz HM The King Scotch</li>
                        <li>.75 oz Honey syrup (one part honey, one part water)</li>
                        <li>.75 oz Lemon juice</li>
                        <li>1.5 oz Brewed green tea</li>
                        <li>Lemon twist for garnish</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Add all the ingredients to a Collins glass and fill with ice. Stir, and garnish with a lemon twist.</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal2')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/black-logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-3">
          <div class="cocktail-pic-2" data-toggle="modal" data-target="#modal2">
            <div class="image-overlay">
              <p>HM Spice</p>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <h2>HM Spice</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('modal1')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/hm-spice.jpg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal3')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>1½ oz HM The King</li>
                        <li>¾ oz cinnamon syrup</li>
                        <li>½ oz Meyer lemon juice </li>
                        <li>2 dashes Peychaud's bitters</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Combine ingredients in a shaker full of ice and shake for 15–20 seconds. Strain into chilled cocktail glass. Garnish with a cinnamon stick if desired.</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal3')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/black-logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-3">
          <div class="cocktail-pic-3" data-toggle="modal" data-target="#modal3">
            <div class="image-overlay">
              <p>Sovereign Cocktail</p>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <h2>Sovereign Cocktail</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('modal2')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/sovereign.jpg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal4')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>1½ oz HM The King</li>
                        <li>1 oz Irish whisky</li>
                        <li>½ oz lemon juice</li>
                        <li>Dash of bitters</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Combine all the ingredients in a shaker filled with ice, stir well and pour into a martini glass.</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal4')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/black-logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-3">
          <div class="cocktail-pic-4" data-toggle="modal" data-target="#modal4">
            <div class="image-overlay">
              <p>Ginger King</p>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <h2>Ginger King</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('modal3')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/ginger-king.jpg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal5')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>2 oz HM The King</li>
                        <li>Ginger ale</li>
                        <li>Club soda</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Add HM The King to a Collins glass and fill with ice. Fill with equal amounts of ginger ale and soda.</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal5')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/black-logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-3">
          <div class="cocktail-pic-5" data-toggle="modal" data-target="#modal5">
            <div class="image-overlay">
              <p>HM Sunrise</p>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <h2>HM Sunrise</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('modal4')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/hm-sunrise.jpg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal6')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>3/4 oz HM The King</li>
                        <li>3/4 oz cherry brandy</li>
                        <li>3/4 oz sweet vermouth</li>
                        <li>3/4 oz orange juice</li>
                        <li>Orange slice for garnish</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Pour the ingredients into a shaker filled with ice and shake well. </li>
                        <li>Strain into a chilled cocktail glass and garnish with an orange slice.</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal6')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/black-logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-3">
          <div class="cocktail-pic-6" data-toggle="modal" data-target="#modal6">
            <div class="image-overlay">
              <p>HM Mac Daddy</p>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <h2>HM Mac Daddy</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('modal5')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/mac-daddy.jpg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal7')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>1.5oz HM the King Scotch</li>
                        <li>1 squeeze of lemon and drop it into the shaker tin</li>
                        <li>½ oz agave nectar (not agave juice) or simple syrup</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Shake hard with ice and pour all into a 10oz highball</li>
                        <li>Top with .75oz Lagunitas IPA (or whatever IPA you have)</li>
                        <li>Garnish with the squeezed lemon</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal7')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/black-logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-3">
          <div class="cocktail-pic-7" data-toggle="modal" data-target="#modal7">
            <div class="image-overlay">
              <p>HM's Bell Pepper</p>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="modal7" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <h2>HM's Bell Pepper</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('modal6')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/hm-bell-pepper.jpg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal8')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>1oz. Lemon juice</li>
                        <li>1 tbsp. Sugar</li>
                        <li>Pinch of Maldon salt</li>
                        <li>4 small red peppers</li>
                        <li>3/4oz Cointreau</li>
                        <li>3/4oz Gran Classico</li>
                        <li>2 oz. HM scotch</li>
                        <li>1 egg white</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Combine lemon juice, sugar, salt and peppers.</li>
                        <li>Muddle peppers down.</li>
                        <li>Add Cointreau, Gran Classico, HM, and egg white.</li>
                        <li>Dry shake for 7 seconds (without ice).</li>
                        <li>Add ice and shake for 7 seconds.</li>
                        <li>Double strain into rocks glass with a king cube and garnish with mint sprig.</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal8')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/black-logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

        <div class="col-xs-6 col-sm-3">
          <div class="cocktail-pic-8" data-toggle="modal" data-target="#modal8">
            <div class="image-overlay">
              <p>HM's Blood and Sand</p>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="modal8" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <div class="col-xs-12">
                      <h2>HM's Blood and Sand</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-1">
                      <button class="prev-next prev" type="button" onclick="showModal('modal7')"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5 image">
                      <img src="img/blood-and-sand.jpg">
                    </div>
                    <div class="col-xs-1 prev-next-sm-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal1')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-10 col-md-5">
                      <h5>Ingredients:</h5>
                      <ul>
                        <li>1.5oz HM the King Scotch</li>
                        <li>1 measure of freshly squeezed orange juice</li>
                        <li>1 measure of sweet vermouth</li>
                        <li>1.5 measure of cherry liqueur</li>
                        <li>Orange rind twist, to decorate</li>
                      </ul>
                      <h5>Instructions:</h5>
                      <ol>
                        <li>Shake all ingredients with ice and strain into a chilled rocks glass.</li>
                        <li>Rub orange rind twist around edge of glass and then place in the drink as garnish.</li>
                      </ol>
                    </div>
                    <div class="col-xs-1 prev-next-lg-screens">
                      <button class="prev-next next" type="button" onclick="showModal('modal1')"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <img class="logo" src="img/black-logo.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->
        </div>

      </div>
    </div>

    <!-- script for previous and next buttons -->
    <script>
      function showModal(id) {
        $(".modal").modal('hide');
        $("#" + id).modal();
      }
    </script>
    <!-- end cocktails section -->

        <!-- nav link scroll point -->
        <a name="locations"></a>

        <!-- locations section -->
        <div class="locations">
          <div class="row">
            <div class="col-xs-12">
              <h1>Where You Can Find Us</h1>
              <img src="img/underline.png">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div id="map-canvas"></div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div id="panel"></div>
              <div class="show-more">
                <a href="#">Show more</a>
              </div>
            </div>
          </div>
        </div>

        <!-- script for show more button -->
        <script>

          $( document ).ready(function() {
            $(document).on("click", ".show-more a", function(e) {
            		e.preventDefault();
                if($(this).text() == "Show more"){
                    $(this).text("Show less")
                    $('#panel').addClass('tall')
                    $('li.store:nth-of-type(4)').addClass('visible')
                    $('li.store:nth-of-type(5)').addClass('visible')
                    $('li.store:nth-of-type(6)').addClass('visible')
                    $('li.store:nth-of-type(7)').addClass('visible')
                    $('li.store:nth-of-type(8)').addClass('visible')
                    $('li.store:nth-of-type(9)').addClass('visible')
                    $('li.store:nth-of-type(10)').addClass('visible')
                } else {
                    $(this).text("Show more")
                    $('#panel').removeClass('tall')
                    $('li.store:nth-of-type(4)').removeClass('visible')
                    $('li.store:nth-of-type(5)').removeClass('visible')
                    $('li.store:nth-of-type(6)').removeClass('visible')
                    $('li.store:nth-of-type(7)').removeClass('visible')
                    $('li.store:nth-of-type(8)').removeClass('visible')
                    $('li.store:nth-of-type(9)').removeClass('visible')
                    $('li.store:nth-of-type(10)').removeClass('visible')
                };

                $this.text(linkText);
            });
          });

        </script>
        <!-- end locations section -->

        <!-- nav link scroll point -->
        <a name="contact"></a>

        <!-- contact section -->
        <div class="contact">
          <div class="row">
            <div class="col-xs-12">
              <h1>Contact Us</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <form action="" method="POST">
                <p>Your Name*</p>
                <input type="text" name="name" value="" pattern=".{5,}\w*[a-zA-Z]\w*" required title="5 characters minimum" />
                <p>Company Name*</p>
                <input type="text" name="company" value="" pattern=".{3,}\w*[a-zA-Z]\w*" required title="3 characters minimum"  />
                <p>Company Type*</p>
                <select class="small-input" name="companytype" value="" required />
                    <option value="" selected="selected">Select</option>
                    <option value="Retailer">Retailer</option>
                    <option value="Distributor">Distributor</option>
                    <option value="Individual/Customer">Individual/Customer</option>
                    <option value="Press/Media">Press/Media</option>
                    <option value="Other">Other</option>
                </select>
                <p>Email Address*</p>
                <input type="email" name="email" value="" pattern=".{5,}" required title="5 characters minimum"  />
                <p>Phone Number*</p>
                <input type="tel" name="phone" value="" pattern=".{10,}" required title="Please enter a 10 digit phone number"  />
                <p>Message*</p>
                <input type="text" name="message" pattern=".{15,}\w*[a-zA-Z]\w*" required title="15 characters minimum" maxlength="400" />
                <p></p>
                <div class="g-recaptcha" data-sitekey="6Ldyk0wUAAAAAMYGyuIrI-pGxlHpgseVDDEPWg36"></div>
                <p></p>
                <input class="submit-button" type="submit" name="submit" value="submit">
            </form>
        <style>
        .contact input.submit-button {
          background-color: #232323;
          border: 1px solid #232323;
          border-radius: 3px;
          color: #fff;
          font-family: avenir,sans-serif;
          font-size: 22px;
          font-weight: 700;
          text-transform: uppercase;
          letter-spacing: 1px;
          font-family: 'avenir', sans-serif;
        }
        </style>
            </div>
            <div class="col-xs-12 col-sm-4 address">
              <h3>Address</h3>
              <p>
                500 Sansome Street #600
                <br>
                San Francisco, CA 94111
                <br>
                +1 415-813-5045
                <br>
                hm@brandedspiritsusa.com
              </p>
              <div class="office-map" style="overflow: hidden;">
                  <iframe style="position:relative; top:-50px; border:none;" src="https://www.google.com/maps/d/embed?mid=1MMQhdWelzSPPP1iyYGn66LwRDD4" width="300" height="300"></iframe>
              </div>
            </div>
          </div>
        </div>
        <!-- end contact section -->

        <!-- footer -->
        <div class="footer">
          <div class="row">
            <div class="col-xs-12">
              <img src="img/white-logo.png">
              <br>
              <a class="facebook" href="https://www.facebook.com/HM-The-King-Scotch-200228151263/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a class="facebook" href="https://www.instagram.com/hmthekingscotch/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a class="facebook" href="https://twitter.com/HMtheKingUS"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a class="facebook" href="https://www.linkedin.com/company/branded-spirits-usa-ltd"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
              <p>Crafted in California</p>
              <p>© 2017 <a href="http://brandedspiritsusa.com/">Branded Spirits USA Ltd.</a></p>
            </div>
          </div>
        </div>

        <script
              src="https://code.jquery.com/jquery-3.2.1.min.js"
              integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
              crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="js/animateScroll.js"></script>



  </body>
</html>
