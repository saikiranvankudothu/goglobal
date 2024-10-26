<?php 
//session_start(); // Start the session if it's not started already
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $loggedin = true;
} else {
    $loggedin = false;
}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/harrytut/tried">isecure</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/harrytut/tried/welcome.php">HOME<span class="sr-only">(current)</span></a>
            </li>';

if(!$loggedin){
    echo '<li class="nav-item active">
            <a class="nav-link" href="/harrytut/tried/login.php">LOGIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/harrytut/tried/signup.php">SIGN UP</a>
          </li>';
}

if($loggedin){
    echo '<li class="nav-item">
            <a class="nav-link" href="/harrytut/tried/logout.php">LOG OUT</a>
          </li>';
}

echo '</ul>
      </div>
    </nav>';
?>
