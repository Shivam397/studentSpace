<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .btns:hover {
        background-color: #0062cc;
        cursor: pointer;
        text-decoration: none;
    }

    
    .btns {
      width: 80px;
      height: 40px;
      background-color: #19386b;
      border-radius: 8px;
      border: #19386b;
      transition: color 2s;
    }

    .navbar-nav > li > .dropdown-menu a:hover { 
      background-color: #0062cc;
    }
 
  </style>

  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

  <link rel="shortcut icon" type="image/png" href="../../Homepage/images/favicon.png"/>
 
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #19386b;">
      <div class="container-fluid">
        <a class="navbar-brand" style=" color:#fff">StudentSpace</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown"
          aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="http://localhost/studentSpace/Homepage/index.php" style=" color:#fff">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style=" color:#fff" href="#" id="navbarDarkDropdownMenuLink"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Notes
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink"
                style="background-color:#1E4362">
                <li><a class="dropdown-item" href="http://localhost/studentSpace/Notes_cs/display.php">CS</a></li>
                <li><a class="dropdown-item" href="http://localhost/studentSpace/Notes_ece/display.php">EC</a></li>
                <li><a class="dropdown-item" href="http://localhost/studentSpace/Notes_ce/display.php">CE</a></li>
                <li><a class="dropdown-item" href="http://localhost/studentSpace/Notes_mt/display.php">MT</a></li>
                <li><a class="dropdown-item" href="http://localhost/studentSpace/Notes_bt/display.php">BT</a></li>
                <li><a class="dropdown-item" href="http://localhost/studentSpace/Notes_ee/display.php">EE</a></li>
                <li><a class="dropdown-item" href="http://localhost/studentSpace/Notes_ei/display.php">EI</a></li>
                <li><a class="dropdown-item" href="http://localhost/studentSpace/Notes_others/display.php">OTHERS</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style=" color:#fff" href="#" id="navbarDarkDropdownMenuLink"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Time Table
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink"
                style="background-color:#1E4362">
                <li><a class="dropdown-item" href="http://localhost/studentSpace/timeTable/display.php">1st Year</a></li>
                <li><a class="dropdown-item" href="http://localhost/studentSpace/timeTable/display.php">2nd Year</a></li>
                <li><a class="dropdown-item" href="http://localhost/studentSpace/timeTable/display.php">3rd Year</a></li>
                <li><a class="dropdown-item" href="http://localhost/studentSpace/timeTable/display.php">4th Year</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link" style=" color:#fff" href="http://localhost/studentSpace/notice/display.php">
                Notices
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="http://localhost/studentSpace/contact/contact_list.php" style=" color:#fff">Contact List</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link" style=" color:#fff" href="http://localhost/studentSpace/Forum/index.php">
                Forum
              </a>
            </li>
          </ul>

          <form class="d-flex">
            <button class="btns" type="submit"><a href="http://localhost/studentSpace/files/session_destroy.php"
                style=" text-decoration:none; color:#fff">Logout</a></button>
          </form>
        </div>
      </div>
    </nav>
</body>