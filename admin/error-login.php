<?php
// Warning Error To Login Admin Page
$error_login = "Maaf, Username & Password Salah!";

// View Error Message To Browser
echo '
<div id="rt-error-body">
  <div class="rt-container">
    <div class="component-content">
      <div class="rt-grid-12">
        <div class="rt-block">
          <div class="rt-error-box custom-404">
            <div>
            <h1 class="error-title title">Error Login</h1>
            <h2 class="error-message">'.$error_login.'</h2>
            <div class="error-content">
            <p><a href="index.html"><span>Return to the Login Page</span></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
';
?>
