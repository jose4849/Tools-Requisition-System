<!DOCTYPE html>
<html>
  <head>
    <title>STORE Manager</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <link href="<?php echo base_url(); ?>additional/resources/css/jquery-ui-themes.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>additional/resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>additional/data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>additional/styles.css" type="text/css" rel="stylesheet"/>   
  </head>
  <body>
    <div id="base" class="">

      <!-- Unnamed (Shape) -->
      <div id="u0" class="ax_shape">
        <img id="u0_img" class="img " src="<?php echo base_url(); ?>additional/images/store_manager/u0.png"/>
        <!-- Unnamed () -->
        <div id="u1" class="text">
          <p><span>&nbsp;</span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u2" style="top:23px;" class="ax_h1">
       
        <!-- Unnamed () -->
        <div id="u3" class="text">
          <p><span>STORE MANAGER</span></p><br><br>
        </div>
      </div>
<form action="<?php echo base_url(); ?>login/loginuser" method="post" autocomplete="on" />
      <!-- Unnamed (Shape) -->
      <div id="u4" style="top:150px" class="ax_paragraph">
        
        <!-- Unnamed () -->
        <div id="u5" class="text">
          <p><span>Username:</span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u6" style="top:188px" class="ax_paragraph">
        
        <!-- Unnamed () -->
        <div id="u7" class="text">
          <p><span>Password:</span></p>
        </div>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u8"  class="ax_text_field">
        <input id="u8_input" name="username" type="text" value="user@bitac.com" />
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u9" class="ax_text_field">
        <input id="u9_input" name="password" type="text" value="1"/>
      </div>

      <!-- Unnamed (Droplist) -->
      <div id="u10" class="ax_droplist">
        <select id="u10_input" name="usertype" onchange="myFunction()">
          <option value="0">None</option>
          <option value="1">Officer</option>
          <option value="2">Store</option>
          <option value="3">Purchase</option>
          <option value="4">Executive</option>
          <option value="5">Director</option>
        </select>
      </div>

      <!-- Unnamed (Shape) -->
      <div style="top:222px"  id="u11" class="ax_paragraph">
       
        <!-- Unnamed () -->
        <div id="u12" class="text">
          <p><span>User Type:</span></p>
        </div>
      </div>

      <!-- Unnamed (HTML Button) -->
      <div id="u13" class="ax_html_button">
        <input id="u13_input" type="submit" value="Submit"/>
      </div>
<form>
	  </div>
  </body>
</html>
