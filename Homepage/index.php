<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">

  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

  <link rel="stylesheet" href="index.js">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
  <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet' />
  <script src="https://kit.fontawesome.com/0d339bdd70.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="shortcut icon" type="image/png" href="./images/favicon.png"/>
  <title>StudentSpace</title>
</head>

<body>
    <header class="header">

    <?php
          session_start();
      
          // If the session variable is empty, this
          // means the user is yet to login
          // User will be sent to 'login.php' page
          // to allow the user to login
          if(isset($_SESSION['type'])) {
              $_SESSION['msg'] = "You have to log in first";
              if($_SESSION['type'] == 'admin')
                include "../files/navbar_admin.php";
              else{
                include "../files/nav_logout.php";
              }
          }else{
            include "../files/navbar.php";
          }
          
    ?>


      <div class="ticker-wrapper-h">
        <div class="heading">Current Notices</div>

        <ul class="news-ticker-h">
          <li>II periodical tests to commence for all classes from 21st March to 26 March, 2022. </li>
          <li>|</li>
          <li>The process for admissions of new students for the academic year 2022 has started. </li>
          <li>|</li>
          <li>Google Developer Student Clubs is actively recruiting students for its design team. </li>
          <li>|</li>
          <li>LeanIn Banasthali to organise a Q/A event with ex-interns from different companies on 8th March, 2022.
          </li>
          <li>|</li>
        </ul>
      </div>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./images/background-image.png" class="w-100" alt="...">
        </div>
      </div>
    </header>

    <!--Department-->

    <section>
      <br>
      <h3 style="font-size:55px; font-weight: bold; color: #19386b; margin-left: 60px;"><i class="fas fa-grip-lines-vertical"></i>DEPARTMENTS</h3>
      <br>
      <br>
      <div class="carousel" data-flickity='{ "autoPlay": true }'>
        <div class="carousel-cell"><img src="./images/CS.jpg" alt="">
          <p class="para">Computer Science is the core of Faculty of Mathematics and Computing. The department operates
            from the building "ICICI Centre for Advanced Studies in Computer Science". The institute acts as a backbone
            to
            provide campuswide LAN and internet connectivity. These are in addition to large number of stand-alone PCs
            for
            regular development work.</p>
        </div>

        <div class="carousel-cell"><img src="./images/AT.jpg" alt="">
          <p class="para">The School of Automation at Banasthali is quintessence of the University's relentless pursuit
            of
            excellence. It was developed in collaboration with the Bajaj Group, one of the most distinguished business
            houses of India. The students would not only be trained hands on in real- life engineering tools but also
            learn multi- disciplinary approach.</p>
        </div>

        <div class="carousel-cell"><img src="./images/img1.jpg" alt="">
          <p class="para">Biotechnology is a multi-disciplinary course and various programmes have been developed to
            meet
            the growing demand for trained manpower. Banasthali University has emerged as a leading center for education
            and research in biotechnology and allied disciplines. The programmes expose students to recent exciting
            developments in the area of Biotechnology/ Bioscience/ Microbiology/ Bioinformatics.</p>
        </div>

        <div class="carousel-cell"><img src="./images/vigyan.jpg" alt="">
          <p class="para">Chemical Engineering Department is one of the premier engineering departments of Banasthali
            University. The Department offers instructions at undergraduate level leading to a 4 year B.Tech degree.
            Infrastructural facilities, pilot plant sized equipment as well as advanced instruments are available.</p>
        </div>

        <div class="carousel-cell"><img src="./images/urja.jpg" alt="">
          <p class="para">The Department of Physical Sciences is one of the oldest in the Vidyapith. The PG programme in
            Physics as M.Sc.(Physics) started in 2005. The courses are reviewed every year by Board of Studies and the
            faculty members. The faculty has recently recommended revision to give more visibility to Nanoscience and
            Technology.This has been implemented from the session 2008-09.</p>
        </div>

      </div>
    </section>

    <section class="campus-life">
    </section>

    <!--Clubs-->
    <section>
      <br>
      <h3 style="font-size:55px; font-weight: bold; color: #19386b; margin-left: 60px;"><i class="fas fa-grip-lines-vertical"></i>CLUBS</h3>
      <br>
      <br>
      <div class="carousel" data-flickity='{ "autoPlay": true }'>
        <div class="carousel-cell"><img src="./images/logos.jpg" alt="logosbv">
          <br>
          <p class="para"><a href="https://instagram.com/logos_bv?utm_medium=copy_link"><i
                class="fa fa-instagram"></i></a>&nbsp;&nbsp;
            <a href="https://www.linkedin.com/company/logosbv"><i class="fa fa-linkedin"></i></a>
          </p>
        </div>

        <div class="carousel-cell"><img src="./images/LeanIn.jpg" alt="meraki">
          <p class="para"><a href="https://instagram.com/leanin_bv?utm_medium=copy_link"><i
                class="fa fa-instagram"></i></a>&nbsp;&nbsp;
            <a href=" https://www.linkedin.com/company/lean-in-banasthali-vidyapith"><i class="fa fa-linkedin"></i></a>
          </p>
        </div>

        <div class="carousel-cell"><img src="./images/samarthya.jpg" alt="samarthya">
          <p class="para"><a href="https://instagram.com/team.samarthya?utm_medium=copy_link"><i
                class="fa fa-instagram"></i></a>&nbsp;&nbsp;
            <a href=" https://www.linkedin.com/company/samarthyateam"><i class="fa fa-linkedin"></i></a>
          </p>
        </div>

        <div class="carousel-cell"><img src="./images/team_corona.jpg" alt="team_corona">
          <p class="para"><a href="https://instagram.com/team__corona?utm_medium=copy_link"><i
                class="fa fa-instagram"></i></a>&nbsp;&nbsp;
            <a href=" https://www.linkedin.com/company/corona-imaginationtoinnovation"><i
                class="fa fa-linkedin"></i></a>
          </p>
        </div>

        <div class="carousel-cell"><img src="./images/dsc.jpg" alt="dsc-banasthali-vidyapith">
          <p class="para"><a href="https://www.instagram.com/dsc_banasthalividyapith/?igshid=r5jdmygo8ych"><i
                class="fa fa-instagram"></i></a>&nbsp;&nbsp;
            <a href="https://www.linkedin.com/company/dsc-banasthali-vidyapith"><i class="fa fa-linkedin"></i></a>
          </p>
        </div>

        <div class="carousel-cell"><img src="./images/meraki.jpg" alt="meraki">
          <p class="para"><a href="https://www.instagram.com/team._meraki/"><i
                class="fa fa-instagram"></i></a>&nbsp;&nbsp;
            <a href="https://www.linkedin.com/in/iwsc-banasthali-71b215217/"><i class="fa fa-linkedin"></i></a>
          </p>
        </div>

        <div class="carousel-cell"><img src="./images/aayam.jpg" alt="">
          <p class="para"><a href="https://www.instagram.com/aayam_i_think_therefore_i_am/"><i
                class="fa fa-instagram"></i></a>&nbsp;&nbsp;
            <a href=""><i class="fa fa-linkedin"></i></a>
          </p>
        </div>

        <div class="carousel-cell"><img src="./images/innovocation.jpg" alt="">
          <p class="para"><a href="https://instagram.com/team_innovacation?utm_medium=copy_link"><i
                class="fa fa-instagram"></i></a>&nbsp;&nbsp;
            <a href="https://www.linkedin.com/company/innovacation"><i class="fa fa-linkedin"></i></a>
          </p>
        </div>

        <div class="carousel-cell"><img src="./images/hackerearth.jpg" alt="">
          <p class="para"><a href="https://instagram.com/hackerearth.bv?utm_medium=copy_link"><i
                class="fa fa-instagram"></i></a>&nbsp;&nbsp;
            <a href="https://www.linkedin.com/company/hackerearth-hub-banasthali-vidyapith"><i
                class="fa fa-linkedin"></i></a>
          </p>
        </div>

      </div>
    </section>


    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


    <div class="weather" style="background-color:#cfd9e5; height:40px;">
      <h3 id="temp" style="font-size:25px; color:black; float:right; padding-right:10px;">On Campus: </h3>
      <script src="script.js"></script>
    </div>

    <!--Footer-->
    <footer id="footer" class="footer-1">
      <div class="main-footer widgets-dark typo-light">
        <div class="container">
          <div class="row">

            <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="widget subscribe no-box">
                <h5 class="widget-title">BANASTHALI <br>VIDYAPITH<span></span></h5>
                <img src="./images/logo.png" width="100px" height="100px">
                <p>Vanasthali Road, Dist, Vanasthali, Rajasthan 304022</p>
              </div>
            </div>


            <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="widget no-box">
                <h5 class="widget-title">Quick Links<span></span></h5>
                <ul class="thumbnail-widget">
                  <li>
                    <div class="thumb-content"><a
                        href="http://localhost/studentSpace/Homepage/index.php">&nbsp;Home</a></div>
                  </li>
                  <li>
                    <div class="thumb-content"><a href="http://localhost/studentSpace/login/login.php">&nbsp;Login</a>
                    </div>
                  </li>
                  <li>
                    <div class="thumb-content"><a
                        href="http://localhost/studentSpace/notice/display.php">&nbsp;Notices</a></div>
                  </li>
                  <li>
                    <div class="thumb-content"><a
                        href="http://localhost/studentSpace/contact/contact_list.php">&nbsp;Contact List</a></div>
                  </li>
                </ul>
              </div>
            </div>



            <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="widget no-box">
                <h5 class="widget-title">Follow up<span></span></h5>
                <a href="https://www.facebook.com/banasthali.org/"> <i class="fa fa-facebook"> </i> </a>
                <a href="https://twitter.com/banasthali_vid"> <i class="fa fa-twitter"> </i> </a>
                <a href="https://www.linkedin.com/school/banasthali-vidyapith/"> <i class="fa fa-linkedin"> </i> </a>
              </div>
            </div>
            <br>
            <br>


            <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="widget no-box">
                <h5 class="widget-title">Contact Us<span></span></h5>
                <p>inashastri@banasthali.in</p>
                <p>01438- 228787</p>

              </div>

            </div>
          </div>
        </div>

        <div class="footer-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <p> © 2021. All rights reserved.</p>
              </div>
            </div>
          </div>
        </div>
    </footer>

    <script type="text/javascript" src="../files/script.js">

    </script>

  </body>

</html>