<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <meta name="google" value="notranslate">


    <title>NinjaERP Business Intelligence</title>



<style>

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-weight: 300;
}
body {
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  font-weight: 300;

}
body ::-webkit-input-placeholder {
  /* WebKit browsers */
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  font-weight: 300;
}
body :-moz-placeholder {
  /* Mozilla Firefox 4 to 18 */
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  opacity: 1;
  font-weight: 300;
}
body ::-moz-placeholder {
  /* Mozilla Firefox 19+ */
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  opacity: 1;
  font-weight: 300;
}
body :-ms-input-placeholder {
  /* Internet Explorer 10+ */
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  font-weight: 300;
}
.wrapper {
  background: #d00c0c;
  background: -webkit-linear-gradient(top left, #940e0e 0%, #FB8C00 100%);
  background: linear-gradient(to bottom right, #ec971f 20%, #FB8C00  100%);
  position: absolute;

  left: 0;
  width: 100%;
  height: 100%;

  overflow: hidden;
}
.dis1{
	color: #fff;
}
.wrapper.form-success .container h1 {
  -webkit-transform: translateY(85px);
      -ms-transform: translateY(85px);
          transform: translateY(85px);
}
.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 80px 0;
  height: 400px;
  text-align: center;
}
.container h1 {
  font-size: 40px;
  -webkit-transition-duration: 1s;
          transition-duration: 1s;
  -webkit-transition-timing-function: ease-in-put;
          transition-timing-function: ease-in-put;
  font-weight: 200;
}
form {
  padding: 20px 0;
  position: relative;
  z-index: 2;
}
.hover {
  padding: 20px 0;
  position: relative;
  z-index: 2;
}
.headg{
	z-index: 2;
}
.hoverf {
  padding: 20px 0;
  position: relative;
  z-index: 3;
}
form input {
  appearance: none;
  outline: 0;
  border: 1px solid rgba(255, 255, 255, 0.4);
  background-color: rgba(255, 255, 255, 0.2);
  width: 250px;
  border-radius: 3px;
  padding: 10px 15px;
  margin: 0 auto 10px auto;
  display: block;
  text-align: center;
  font-size: 18px;
  color: white;
  -webkit-transition-duration: 0.25s;
          transition-duration: 0.25s;
  font-weight: 300;
}
form select {
  appearance: none;
  outline: 0;
  border: 1px solid rgba(255, 255, 255, 0.4);
  background-color: rgba(255, 255, 255, 0.2);
  width: 250px;
  border-radius: 3px;
  padding: 10px 15px;
  margin: 0 auto 10px auto;
  display: block;
  text-align: center;
  font-size: 18px;
  color: white;
  -webkit-transition-duration: 0.25s;
          transition-duration: 0.25s;
  font-weight: 300;
}
form input:hover {
  background-color: rgba(255, 255, 255, 0.4);
}
form input:focus {
  background-color: white;
  width: 300px;
  color: #9e0707;
}
form button {
  appearance: none;
  outline: 0;
  background-color: white;
  border: 0;
  padding: 10px 15px;
  color: #9e0707;
  border-radius: 3px;
  width: 250px;
  cursor: pointer;
  font-size: 18px;
  -webkit-transition-duration: 0.25s;
          transition-duration: 0.25s;
}
form button:hover {
  background-color: #f5f7f9;
}
.bg-bubbles {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.bg-bubbles li {
  position: absolute;
  list-style: none;
  display: block;
  width: 40px;
  height: 40px;
  background-color: rgba(255, 255, 255, 0.15);
  bottom: -160px;
  -webkit-animation: square 25s infinite;
  animation: square 25s infinite;
  -webkit-transition-timing-function: linear;
  transition-timing-function: linear;
}
.bg-bubbles li:nth-child(1) {
  left: 10%;
}
.bg-bubbles li:nth-child(2) {
  left: 20%;
  width: 80px;
  height: 80px;
  -webkit-animation-delay: 2s;
          animation-delay: 2s;
  -webkit-animation-duration: 17s;
          animation-duration: 17s;
}
.bg-bubbles li:nth-child(3) {
  left: 25%;
  -webkit-animation-delay: 4s;
          animation-delay: 4s;
}
.bg-bubbles li:nth-child(4) {
  left: 40%;
  width: 60px;
  height: 60px;
  -webkit-animation-duration: 22s;
          animation-duration: 22s;
  background-color: rgba(255, 255, 255, 0.25);
}
.bg-bubbles li:nth-child(5) {
  left: 70%;
}
.bg-bubbles li:nth-child(6) {
  left: 80%;
  width: 120px;
  height: 120px;
  -webkit-animation-delay: 3s;
          animation-delay: 3s;
  background-color: rgba(255, 255, 255, 0.2);
}
.bg-bubbles li:nth-child(7) {
  left: 32%;
  width: 160px;
  height: 160px;
  -webkit-animation-delay: 7s;
          animation-delay: 7s;
}
.bg-bubbles li:nth-child(8) {
  left: 55%;
  width: 20px;
  height: 20px;
  -webkit-animation-delay: 15s;
          animation-delay: 15s;
  -webkit-animation-duration: 40s;
          animation-duration: 40s;
}
.bg-bubbles li:nth-child(9) {
  left: 25%;
  width: 10px;
  height: 10px;
  -webkit-animation-delay: 2s;
          animation-delay: 2s;
  -webkit-animation-duration: 40s;
          animation-duration: 40s;
  background-color: rgba(255, 255, 255, 0.3);
}
.bg-bubbles li:nth-child(10) {
  left: 90%;
  width: 160px;
  height: 160px;
  -webkit-animation-delay: 11s;
          animation-delay: 11s;
}
@-webkit-keyframes square {
  0% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
  }
  100% {
    -webkit-transform: translateY(-700px) rotate(600deg);
            transform: translateY(-700px) rotate(600deg);
  }
}
@keyframes square {
  0% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
  }
  100% {
    -webkit-transform: translateY(-700px) rotate(600deg);
            transform: translateY(-700px) rotate(600deg);
  }
}

    </style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
<script>
  window.console = window.console || function(t) {};
  window.open = function(){ console.log("window.open is disabled."); };
  window.print   = function(){ console.log("window.print is disabled."); };
</script>



  </head>

  <body>

    <div class="wrapper">

	    <div class="row">
			<div  class="col-md-4">
				<div class="container-fluid" style="margin-top: 20px;">
					<h5 class="dis1"><p>KUDOS ERP</p></h5>
				</div>
			</div>
		    <div  class="col-md-4 offset-md-4">
		   		<div class="container-fluid" style="margin-top: 20px; margin-left: 300px;">
		   			<a href="#" style="text-decoration:none; color: #fff; z-index: 3;">Setup Introduction</a>
		   		</div>
			</div>
	    </div>
	<div class="container">
		<h1 class="dis1">NinjaERP Business Intelligence</h1>
	<!-- <img src="http://kudosinnovation.com/kudos.png"> -->
		<p class="dis1">รหัสผ่านหมดอายุ กรุณาเปลี่ยนรหัสผ่าน</p>
	
			<form >
				<!-- <input class="input" type="password" id="old_pass" name="old_pass" placeholder="Current password"> -->
				<input class="input" type="password" id="new_pass" name="new_pass" placeholder="รหัสผ่านใหม่">
				<input class="input" type="password" id="conf_pass" name="conf_pass" placeholder="ยืนยันรหัสผ่านใหม่">
				<button type="button"  id="login-button">ยืนยัน</button>
			</form>
		
		
	</div>

	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
      <script src="<?php echo base_url();?>dist/js/login.js"></script>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->






<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  </body>

  <script type="text/javascript">
  	$(function(){
  		$("#login-button").click(function() {
  			var status = true;
  			// check value null
  			$('.input').each(function(index, el) {
  				
  				if($(el).val() == ""){
  					$(el).css('border-color', '#FF0000');
  					status = false;
  					return false; 
  				}else{
  					$(el).css('border-color', '');
  				}
  			});
  			// check value null

  			if(status){
  					// check conf_pass
  					var old_pass  = $("#old_pass").val();
  					var new_pass  = $("#new_pass").val();
  					var conf_pass = $("#conf_pass").val();

  					if(new_pass == conf_pass){

  						if(new_pass.length < 8){
  							alert("ต้องไม่น้อยกว่า 8 ตัวอักษร");
  							$("#new_pass").css('border-color', '#FF0000');
  						}else{
  							 $.post('<?=base_url() ?>auth/changepass_json', {password: new_pass}, function() {
                   /*optional stuff to do after success */
                 }).done(function(data){
                      try{
                        var json_data = jQuery.parseJSON(data);

                        if(json_data.status){
                            window.location.href = "<?=base_url() ?>auth/logout";
                        }else{
                          alert( "change password error" );
                        }
                      }catch(e){
                        console.log(data);
                      }
                 });
  						}


  					}else{
  						alert("pass ไม่ตรงกัน");
  						$("#new_pass").css('border-color', '#FF0000');
  						$("#conf_pass").css('border-color', '#FF0000');
  					}
  					// check conf_pass

  			}else{
  				alert("กรอกข้แมูลไม่ครบ");
  			}

  		});
  	});
  </script>
</html>
