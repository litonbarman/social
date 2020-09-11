<?php
  session_start();
  
  if(!isset($_SESSION['userSession'])){   // user not login
     if(isset($_POST['user']) && isset($_POST['email']) && isset($_POST['password'])){
		// user sent login data 
        

	 }
	 elseif( isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['pass1']) && isset($_POST['pass2']) ){
        // user sent signup data


	 }
	 else{   // send check Device and login page 
		    	
				if(isset($_POST['if1']) && isset($_POST['if2']) && isset($_POST['if3'])){
                     // manipulate device identification and send login/signup page	
			         
					 if( ($_POST['if1']==1 || $_POST['if1']== 2 || $_POST['if1']==4) && $_POST['if2']==false){
				          // for pc
				          login_signup_pc();

			         }
			         elseif( $_POST['if1']==3 && $_POST['if2']==false && $_POST['if3']==1){
				          // android PC 
				          login_signup_pc();
				
			         }
			         elseif($_POST['if1']==4 && $_POST['if2']==true){
				          // phone
				          login_signup_phone();
				
			         }
			         elseif($_POST['if1']==3 && $_POST['if2'] ==true){
				          // phone
				          login_signup_phone();
			         }
			         elseif($_POST['if1']==4 && $_POST['if2']==false && $_POST['if3']==2){
				          // pc
				          login_signup_pc(); 
			         }
			         else{
				          // pc
				          login_signup_pc();
			         }
			  
	            }
	            else{
		            // send device identificaion page
?>
		        <!DOCTYPE html>
<html>
 <head>
    <style>
	 #loader{
	  position:absolute;
	 }
	</style>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"></meta>
    <script type="text/javascript">

        function moveLoader(){
                 let loader = document.getElementById("loader");
                 loader.style.top = window.innerHeight/2 -25;
                 loader.style.left = window.innerWidth/2 -25;
                 setTimeout(function(){detectDeviceTyoe();},2000);
        }


        function detectDeviceTyoe(){

              let userType = navigator.userAgent.toLowerCase();

              let f1 = document.forms["deviceinformation"]["if1"], f2 = document.forms["deviceinformation"]["if2"], f3 = document.forms["deviceinformation"]["if3"];

              if(userType.indexOf("windows")>-1){
                    f1.value = 1;
              }
              else if(userType.indexOf("mac OS")> -1){
                    f1.value = 2;
              }
              else if(userType.indexOf("android")>-1){
                    f1.value = 3;
              }
              else{
                    f1.value = 4;
              }


              function detectPlatform(){
                    const items = [/Android/i, /webOS/i, /iPhone/i, /iPad/i, /iPod/i, /BlackBerry/i, /Windows Phone/i];

	              return items.some((tomatch) => {return navigator.userAgent.match(tomatch);
	              });
              }

              f2.value = detectPlatform();

              if(window.innerHeight<window.innerWidth){
                    f3.value = 1;
              }
              else{
                    f3.value = 2;
              }

              document.forms["deviceinformation"].submit();
        }

</script>
 </head>
 <body bgcolor="#000" onload="moveLoader()">

    <svg id ="loader" width="51px" height="50px" viewBox="0 0 51 50">
      <rect x="0" y="0" width="13" height="50" fill="#f30">
        <animate attributeName="height" values="50;0;50" begin="0.2s" dur="1s" repeatCount="indefinite"/>
      </rect>
      <rect x="19" y="0" width="13" height="50" fill="#0f0">
        <animate attributeName="height" values="50;0;50" begin="0.4s" dur="1s" repeatCount="indefinite"/>
      </rect>
      <rect x="38" y="0" width="13" height="50" fill="#00f">
        <animate attributeName="height" values="0;50;0" begin="0.2s" dur="1s" repeatCount="indefinite"/>
      </rect>
    </svg>

    <form action="index.php" name="deviceinformation" method="post">
       <input type="hidden" name="if1" value="" />
       <input type="hidden" name="if2" value="" />
       <input type="hidden" name="if3" value="" />
    </form>
 </body>
</html>

<?php
				} 
	    }
	  
  }else{
	  // user login already
	  echo"<h1/>User already login</h1>";
	  
  }















//   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 function login_signup_pc(){
	//require_once(dirname(__FILE__)."/html_aCodes/loginPC.php");
	//echo"Working";
?>


<html><head>
  <style>
   body{
     background-image:url(<?php echo "http://".$_SERVER['SERVER_NAME']."/develop/html_aCodes/social_template_img/4index_login.jpg"; ?>);
     background-size: cover;
     background-repeat:no-repeat;
   }
    #login_canvas{
    }
   .signup_images{
      position:absolute;
      top:250px;
      left:280px;
      opacity:1;
      z-index:3;
    }
   #inne{

   }
   .inputs{
     height:35px;
     width:250px;
     margin:5px 0px 5px 0px;
     padding-left:10px;
     color:#b8e3e9;
     border:1px solid rgba(16,35,54,1);
     color:rgba(16,35,54,1);
     border-radius:8px;
   }
   .inputs:focus{
     border-radius:8px;
     border:1px solid #fff;
     outline-style:none;
     background:rgba(16,35,54,1);
     color:white;
    }

    #header{
      height:90px;
      width:100%;
      background:-webkit-linear-gradient(rgb(10,29,48),rgb(16,35,54),rgb(26,45,64),rgb(36,55,74),rgb(56,75,94),rgb(66,85,104));
      position:fixed;
      top:0px;
      left:0px;
      z-index:999 ;
      color:rgba(240,255,240,1);
      padding-left:10%;
      padding-top:1%;
      font-size:400%;
    }
    #header span{
      font-size: 15%;
      color:rgba(204,255,204,1);
    }
    #footer{
      height:20;
      width:100%;
      background:rgba(16,35,54,1);
      position:fixed;
      bottom:0px;
      left:0px;
      z-index:999 ;
      color:rgba(240,255,240,1);
      padding-left:10%;
      padding-top:1%;
      font-size:100%;
    }
  </style>
</head><body style="overflow:hidden;" onresize="setPosition()" onload="setPosition()">
<div id="header">Alice<span>Get Social</span></div>



 <div id="login_canvas" style="visibility:visible;height:600px;width:600px;position:absolute;overflow:visible;">


  <form method="post" action="index.php" onsubmit="return validateLogin()" name="loginform">
    <div style="position:absolute;top:100px;left:150px;height:400px;width:300px;background-color:rgba(93,136,197,0.6);color:rgba(255,255,255,1);border:1px solid rgba(0,0,0,1);z-index:5;border-radius:10px;">
      <div style="cursor:default;height:100px;padding:0px 0px 0px 0px;width:250px;position:absolute;top:20px;left:25px;"><h1 style="margin:0px 0px 10px 0px;">Login</h1> and experience the amazing world of college life
        <div id="errorReporting" style="color:rgba(255,0,0,1);font-size:16px;font-weight:bold;position:absolute;bottom:-16px;left:2px;"></div>
      </div>
      <div style="height:240;width:250px;position:absolute;top:140px;left:25px;">
        <input value="" id="loginD1" type="text" class="inputs" name="user" placeholder="user name" required />
        <input value="" id="loginD2" type="text" class="inputs" name="email" placeholder="email id" required />
        <input value="" id="loginD3" type="password" class="inputs" name="password" placeholder="password" required />
        <input type="submit" class="inputs" onclick="validateLogin()" style="cursor:pointer;padding-left:0px;color:#fff;font-size:16;margin-top:40px;background:rgba(16,35,54,1);" value="Login"/>
      </div>

      <div style="position:absolute;bottom:14px;right:26px;font-size:12px;cursor:pointer;" onclick="changeuserType(0)">SignUp / Create New Account</div>

    </div>
  </form>
 </div>




  <div id="signup_canvas" style="visibility:hidden;height:600px;width:600px;position:absolute;overflow:visible;">

<form method="post" action="index.php" name="signupform" onsubmit="return validateSignup()">
  <div id="inne" style="position:absolute;top:100px;left:150px;height:400px;width:300px;background-color:rgba(93,136,197,0.6);color:rgba(255,255,255,1);border:1px solid rgba(0,0,0,1);z-index:5;border-radius:10px;">
    <div style="cursor:default;height:100px;padding:0px 0px 0px 0px;width:250px;position:absolute;top:20px;left:25px;"><h1 style="margin:0px 0px 10px 0px;">SignUp</h1> to start your journey of wonderful college life
        <div id="errorReporting2" style="color:rgba(255,0,0,1);font-size:16px;font-weight:bold;position:absolute;bottom:-16px;left:2px;"></div>
    </div>

    <div style="height:240;width:250px;position:absolute;top:140px;left:25px;">
      <input id="signD1" type="text" class="inputs" name="fname" placeholder="first name" />
      <input id="signD2" type="text" class="inputs" name="lname" placeholder="last name"  />
      <input id="signD3" type="text" class="inputs" name="username" placeholder="username"  />
      <div class="inputs" onclick="next()" style="cursor:pointer;color:#fff;font-size:18;margin-top:40px;padding-top:8px;padding-left:0px;height:25px;background:rgba(16,35,54,1);text-align: center;">Next</div>
    </div>
    <div style="position:absolute;bottom:14px;right:26px;font-size:12px;cursor:pointer;" onclick="changeuserType(1)">Login</div>
  </div>

  <div id="inne2"  style="visibility:hidden;transform:rotateY(0deg);position:absolute;top:100px;left:150px;height:400px;width:300px;background-color:rgba(93,136,197,0.6);border:1px solid rgba(0,0,0,1);z-index:4;border-radius:10px;color:rgba(255,255,255,1);">

    <div onclick="signupBack()" style="font-size:12px;position:absolute;bottom:14px;left:25px;cursor:pointer;">Back</div>

    <div style="height:100px;padding:0px 0px 0px 0px;width:250px;position:absolute;top:20px;left:25px;cursor:default;"><h3 style="margin:0px 0px 10px 0px;">Caution</h3>Use strong password <br/> followed by upper, lower, special character and longer then 8 character
       <div id="errorReporting3" style="color:rgba(255,0,0,1);font-size:16px;font-weight:bold;position:absolute;bottom:-16px;left:2px;"></div>
    </div>

    <div style="height:240;width:250px;position:absolute;top:140px;left:25px;">
      <input id="signD4" type="text" class="inputs" name="email" placeholder="email id" />
      <input id="signD5" type="number" class="inputs" name="number" placeholder="id number" />
      <input id="signD6" type="password" class="inputs" name="pass1" placeholder="password" />
      <input id="signD7" type="password" class="inputs" name="pass2" placeholder="re-type password" />
      <input onsubmit="return validateSignup()" type="submit" class="inputs" style="color:#fff;font-size:15;margin-top:10px;padding-left:0px;background:rgba(16,35,54,1);cursor:pointer;" name="SignUp" value="SignUp"/>
    </div>
    <div style="position:absolute;bottom:14px;right:26px;font-size:12px;cursor:pointer;" onclick="changeuserType(1)">Login</div>
  </div>

</form>
</div>


<div id="footer"></div>
</body>
</html>
<script>

window.onload = function(){animate("login_canvas");}

function animate(canS){
  var login_imgs = ["http://localhost/develop/html_aCodes/social_template_img/1.svg","http://localhost/develop/html_aCodes/social_template_img/3.svg","http://localhost/develop/html_aCodes/social_template_img/4.svg","http://localhost/develop/html_aCodes/social_template_img/5.svg","http://localhost/develop/html_aCodes/social_template_img/6.svg","http://localhost/develop/html_aCodes/social_template_img/7.svg","http://localhost/develop/html_aCodes/social_template_img/8.svg","http://localhost/develop/html_aCodes/social_template_img/9.svg","http://localhost/develop/html_aCodes/social_template_img/10.svg","http://localhost/develop/html_aCodes/social_template_img/11.svg","http://localhost/develop/html_aCodes/social_template_img/0.svg",];
  var login_t = 1,login_x;

  for(x=0; x<11; x++){
    var login_temp = new Image();
    login_temp.src = login_imgs[login_x];
  }

function randomImage(a=280,b=250){
    var image = document.createElement("img");
    var canvas = document.getElementById(canS);

    image.className = "signup_images";
    image.height = "40";
    image.style.top = b+"px";
    image.style.left = a+"px";


    image.src = login_imgs[Math.round(Math.random()*10)];
    canvas.appendChild(image);

    var dirX = Math.round(Math.random()), dirY = Math.round(Math.random()), y=b, x=a, opacity = 1;
    var interTx, interTy;
    interx = setInterval(function(){
      if(dirX==1){x+=1;}else{x-=1;}
      image.style.left = x+"px";

},Math.round(Math.random()*100+50));

    interTy = setInterval(function(){
      if(dirY==1){y+=1;}else{y-=1;}
      image.style.top = y+"px";


      if(Math.sqrt(Math.pow((a-x),2)+Math.pow((b-y),2))>(Math.random()*150)){opacity-=0.005;image.style.opacity=opacity;}
      if(Math.sqrt(Math.pow((a-x),2)+Math.pow((b-y),2))>400){clearInterval(interTy);canvas.removeChild(image);image.remove();}
    },Math.round(Math.random()*100+50));
}

setInterval(function(){randomImage(Math.round(Math.random()*(window.innerWidth/2))+20,Math.round(Math.random()*(window.innerHeight/2))+20);},1203);

}

var a = 0, time;

function rotate(){
  var can = document.getElementById("inne");
  var can2 = document.getElementById("inne2");
  can.style.transform = "rotateY("+a+"deg)";
  can2.style.transform = "rotateY("+(a+180)+"deg)";


  if(a==360){a=0;}else{a++;}
  if(a==180){clearInterval(time);}
  if(a==90){can.style.visibility = "hidden";can2.style.visibility = "visible";can.style.zIndex = 4;can2.style.zIndex = 5; document.forms["signupform"]["email"].focus();}
  if(a==270){can.style.visibility = "visible";can2.style.visibility = "hidden";can.style.zIndex = 5;can2.style.zIndex = 4;}
}

function rotateback(){
  var can = document.getElementById("inne");
  var can2 = document.getElementById("inne2");
  can.style.transform = "rotateY("+a+"deg)";
  can2.style.transform = "rotateY("+(a+180)+"deg)";


  if(a<=180){a--;}else{a=0;}
  if(a==0){clearInterval(time);}
  if(a==90){can2.style.visibility = "hidden";can.style.visibility = "visible";can.style.zIndex = 4;can2.style.zIndex = 5;document.forms["signupform"]["fname"].focus();}
  if(a==270){can2.style.visibility = "visible";can.style.visibility = "hidden";can.style.zIndex = 5;can2.style.zIndex = 4;}
}

function signupBack(){
  time = setInterval(function(){rotateback();},2);
}

function next(){
  time = setInterval(function(){rotate();},2);
}


function setPosition(){
  var hold2 = document.getElementById("signup_canvas"), hold1 = document.getElementById("login_canvas");

  hold1.style.right = (window.innerWidth/2-300)+"px";
  hold1.style.top = (window.innerHeight/2-300)+"px";
  hold2.style.right = (window.innerWidth/2-300)+"px";
  hold2.style.top = (window.innerHeight/2-300)+"px";

}

setPosition();

function changeuserType(con){
  var login = document.getElementById("login_canvas"), signup = document.getElementById("signup_canvas");

  var a=0, t;

  if(con==0){
     t = setInterval(function(){change1();},2);
  }else{
     t = setInterval(function(){change3();},2);
  }


  function change1(){
    a++;
    login.style.transform = "rotateX("+a+"deg)";
    if(a==90){
      clearInterval(t);
      login.style.visibility = "hidden";
      signup.style.transform = "rotateX(90deg)";
      signup.style.visibility = "visible";
      signupFocus();
      animate("signup_canvas");
      t = setInterval(function(){change2();},2);
    }
  }
  function change2(){
    a--;
    signup.style.transform = "rotateX("+a+"deg)";
    if(a==0){
      clearInterval(t);
    }
  }

  function change3(){
    a++;
    signup.style.transform = "rotateX("+a+"deg)";
    if(a==90){
      clearInterval(t);
      signup.style.visibility = "hidden";
      login.style.transform = "rotateX(90deg)";
      login.style.visibility = "visible";
      t = setInterval(function(){change4();},2);
    }
  }
  function change4(){
    a--;
    login.style.transform = "rotateX("+a+"deg)";
    if(a==0){
      loginFocus();
      clearInterval(t);
    }
  }
}

function validateData(temp, item){
  var x, hold = temp.split("");

  for(x=0; x<hold.length; x++){
     if(hold[x]==item){
       return 1;
     }
  }
  return 0;
}

function validateDataUpper(temp, item){
  var x,y, hold = temp.split("");

  for(x=0; x<hold.length; x++){
     for(y=0; y<item.length; y++){
       if(hold[x]==item[y]){
         return 0
       }
     }
  }
  return 1;
}


function validateLogin(){
  var d1 = document.forms["loginform"]["user"].value, d2 = document.forms["loginform"]["email"].value, d3 = document.forms["loginform"]["password"].value;

  var special = ['!','%','#','$','%','^','&','*','(',')','_','-','+','=','|','\\',':',';','\"','\'','?','/','<','@'];
  var upper = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

  if((d1=="") || (d2=="") || (d3=="")){
    error("Error: Invalid information");
    return false;
  }
  else{
      if(validateDataUpper(d2,upper)){
          if(validateData(d2,"@")){
               holdon = d2.split("");

               if(holdon[holdon.length-4]=="."){
                  for(et=0; et<holdon.length; et++){
                      for(wt=0; wt<special.length-1; wt++){
                          if(holdon[et]==special[wt]){
                                  error("Error: Invalid email");
                                  return false;
                          }
                      }
                  }
                  if((holdon[holdon.length-3] != "c") || (holdon[holdon.length-2] != "o") || (holdon[holdon.length-1] != "m")){
                    error("Error: Invalid email");
                    return false;
                  }
                  if(!validateDataUpper(d1, special)){
                        error("Error: Special character in username");
                        return false;
                   }

                  var sizeOfD3 = d3.split("");


                  if(sizeOfD3.length<8 || sizeOfD3.length>16){
                        error("Error: Invalid password size");
                        return false;
                  }

                  return true;
               }
               error("Error: Invalid email"); return false;
          }
          else{
               error("Error: Invalid email"); return false;
          }
      }
      else{
          error("Error: Invalid email"); return false;
      }
  }
  return true;
}

 function error(error){
   loginReset();
   document.getElementById("errorReporting").innerHTML = error;
   loginFocus();
 }

 function error2(error){
   signupReset();
   document.getElementById("errorReporting2").innerHTML = error;
   document.getElementById("errorReporting3").innerHTML = error;
   signupFocus();
 }
 function loginReset(){
   document.forms["loginform"]["user"].value = null;
   document.forms["loginform"]["email"].value = null;
   document.forms["loginform"]["password"].value = null;
 }

 function signupReset(){
   document.forms["signupform"]["fname"].value = null;
   document.forms["signupform"]["lname"].value = null;
   document.forms["signupform"]["username"].value = null;
   document.forms["signupform"]["email"].value = null;
   document.forms["signupform"]["number"].value = null;
   document.forms["signupform"]["pass1"].value = null;
   document.forms["signupform"]["pass2"].value = null;
 }

 function loginFocus(){
   document.forms["loginform"]["user"].focus();
 }
// signup focus
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 function signupFocus(){
   document.forms["signupform"]["fname"].focus();
 }


// vallidate signup
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

 function validateSignup(){
   var d1 = document.forms["signupform"]["fname"].value, d2 = document.forms["signupform"]["lname"].value, d3 = document.forms["signupform"]["username"].value, d4 = document.forms["signupform"]["email"].value, d5 = document.forms["signupform"]["number"].value;
   var d6 = document.forms["signupform"]["pass1"].value, d7 = document.forms["signupform"]["pass2"].value;

   var special = ['!','%','#','$','%','^','&','*','(',')','_','-','+','=','|','\\',':',';','\"','\'','?','/','<','@'];
   var upper = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];


   if((d1=="") || (d2=="") || (d3=="") || (d4=="") || (d5=="") || (d6=="") || (d7=="")){
    alert("Error: Invalid information");
     return false;
   }

  // for fname
   if(!validateDataUpper(d1, special)){
     alert("invalid fname");
     return false;
   }
   if(validateData(d1," ")){
     error2("Error: Invalid space in fname");
     return false;
   }
   // for lname
   if(!validateDataUpper(d2, special)){
     error2("Error: Invalid lname");
     return false;
   }
   if(validateData(d2," ")){
     error2("Error: Invalid space in lname");
     return false;
   }
   // for username
   if(!validateDataUpper(d3, special)){
     error2("Error: Invalid username");
     return false;
   }

   // for email id

   var holdon, wt, et;

   if(validateDataUpper(d4,upper)){
       if(validateData(d4,"@")){
            holdon = d4.split("");

            if(holdon[holdon.length-4]=="."){
               for(et=0; et<holdon.length; et++){
                   for(wt=0; wt<special.length-1; wt++){
                       if(holdon[et]==special[wt]){
                               error2("Error: Invalid email");
                               return false;
                       }
                   }
               }
               if((holdon[holdon.length-3] != "c") || (holdon[holdon.length-2] != "o") || (holdon[holdon.length-1] != "m")){
                 error2("Error: Invalid email");
                 return false;
               }
            }
            else{
              error2("Error: Invalid email");
              return false;
            }
       }else{
         error2("Error: Invalid email");
         return false;
       }
    }
    else{
      error2("Error: Invalid email");
      return false;
    }


   if(d6 != d7){
     alert("Error: Password not equal");
     return false;
   }
// not validating id number
  return false;
}

</script>





<?php	
 }
 function login_signup_phone(){
	 //require_once(dirname(__FILE__)."/html_aCodes/loginMOB.php");
?>


<html><head>
  <style>
   body{
     background-image:url(<?php echo "http://".$_SERVER['SERVER_NAME']."/develop/html_aCodes/social_template_img/5index_login.jpg"; ?>);
     background-size: cover;
     background-repeat:no-repeat;
   }
    #login_canvas{
    }
   .signup_images{
      position:absolute;
      top:250px;
      left:280px;
      opacity:1;
      z-index:3;
    }
   #inne{

   }
   .inputs{
     height:90px;
     width:510px;
     margin:15px 0px 15px 0px;
     margin-left:20px;
     padding-left:20px;
     color:#b8e3e9;
     border:1px solid rgba(16,35,54,1);
     color:rgba(16,35,54,1);
     border-radius:8px;
     font-size:180%;
   }
   .inputs:focus{
     border-radius:8px;
     border:1px solid #fff;
     outline-style:none;
     background:rgba(16,35,54,1);
     color:white;
    }

    #header{
      height:90px;
      width:100%;
/*      background:rgba(16,35,54,1); */
background:-webkit-linear-gradient(rgb(10,29,48),rgb(16,35,54),rgb(26,45,64),rgb(36,55,74),rgb(56,75,94),rgb(66,85,104)); /* rgb(96,105,134)*/

      position:fixed;
      top:0px;
      left:0px;
      z-index:999 ;
      color:rgba(240,255,240,1);
      padding-left:10%;
      padding-top:1%;
      font-size:400%;
    }
    #header span{
      font-size: 15%;
      color:rgba(204,255,204,1);
    }
    #footer{
      height:20;
      width:100%;
      background:rgba(16,35,54,1);
      position:fixed;
      bottom:0px;
      left:0px;
      z-index:999 ;
      color:rgba(240,255,240,1);
      padding-left:10%;
      padding-top:1%;
      font-size:100%;
    }
  </style>
</head><body style="overflow:hidden;" onresize="setPosition()" onload="setPosition()">
<div id="header">Alice<span>Get Social</span></div>



 <div id="login_canvas" style="visibility:visible;height:600px;width:600px;position:absolute;overflow:visible;">


  <form onsubmit="return validateLogin()" name="loginform">
    <div style="position:absolute;top:100px;left:150px;height:800px;width:600px;background-color:rgba(93,136,197,0.6);color:rgba(255,255,255,1);border:1px solid rgba(0,0,0,1);z-index:5;border-radius:10px;">
      <div style="font-size:16px;cursor:default;height:120px;padding:0px 0px 0px 0px;width:545px;position:absolute;top:20px;left:25px;"><h1 style="margin:0px 0px 10px 0px;">Login</h1> and experience the amazing world of college life
        <div id="errorReporting" style="color:rgba(255,0,0,1);font-size:16px;font-weight:bold;position:absolute;bottom:16px;left:2px;"></div>
      </div>
      <div style="height:240;width:250px;position:absolute;top:140px;left:25px;">
        <input value="" id="loginD1" type="text" class="inputs" name="user" placeholder="user name" required />
        <input value="" id="loginD2" type="text" class="inputs" name="email" placeholder="email id" required />
        <input value="" id="loginD3" type="password" class="inputs" name="password" placeholder="password" required />
        <input type="submit" class="inputs" onclick="validateLogin()" style="cursor:pointer;padding-left:0px;color:#fff;margin-top:70px;background:rgba(16,35,54,1);" value="Login"/>
      </div>

      <div style="position:absolute;bottom:14px;right:26px;font-size:25px;cursor:pointer;" onclick="changeuserType(0)">SignUp / Create New Account</div>

    </div>
  </form>
 </div>




  <div id="signup_canvas" style="visibility:hidden;height:600px;width:600px;position:absolute;overflow:visible;">

<form name="signupform" onsubmit="return validateSignup()">
  <div id="inne" style="position:absolute;top:100px;left:150px;height:800px;width:600px;background-color:rgba(93,136,197,0.6);color:rgba(255,255,255,1);border:1px solid rgba(0,0,0,1);z-index:5;border-radius:10px;">
    <div style="font-size:16px;cursor:default;height:125px;padding:0px 0px 0px 0px;width:545px;position:absolute;top:20px;left:25px;"><h1 style="margin:0px 0px 10px 0px;">SignUp</h1> to start your journey of wonderful college life
        <div id="errorReporting2" style="color:rgba(255,0,0,1);font-size:16px;font-weight:bold;position:absolute;bottom:16px;left:2px;"></div>
    </div>

    <div style="height:240;width:250px;position:absolute;top:140px;left:25px;">
      <input id="signD1" type="text" class="inputs" name="fname" placeholder="first name" />
      <input id="signD2" type="text" class="inputs" name="lname" placeholder="last name"  />
      <input id="signD3" type="text" class="inputs" name="username" placeholder="username"  />
      <div class="inputs" onclick="next()" style="height:70px;width:546px;cursor:pointer;color:#fff;margin-top:60px;padding-left:0px;padding-top:26px;background:rgba(16,35,54,1);text-align: center;font-size:180%;">Next</div>
    </div>
    <div style="position:absolute;bottom:14px;right:26px;font-size:25px;cursor:pointer;" onclick="changeuserType(1)">Login</div>
  </div>

  <div id="inne2"  style="visibility:hidden;transform:rotateY(0deg);position:absolute;top:100px;left:150px;height:800px;width:600px;background-color:rgba(93,136,197,0.6);border:1px solid rgba(0,0,0,1);z-index:4;border-radius:10px;color:rgba(255,255,255,1);">

    <div onclick="signupBack()" style="font-size:25px;position:absolute;bottom:14px;left:25px;cursor:pointer;">Back</div>

    <div style="font-size:16px;height:120px;padding:0px 0px 0px 0px;width:545px;position:absolute;top:20px;left:25px;cursor:default;"><h2 style="margin:0px 0px 10px 0px;">Caution</h2>Use strong password <br/> followed by upper, lower, special character and longer then 8 character
       <div id="errorReporting3" style="color:rgba(255,0,0,1);font-size:16px;font-weight:bold;position:absolute;bottom:16px;left:2px;"></div>
    </div>

    <div style="height:240;width:250px;position:absolute;top:140px;left:25px;">
      <input id="signD4" type="text" class="inputs" name="email" placeholder="email id" />
      <input id="signD5" type="number" class="inputs" name="number" placeholder="id number" />
      <input id="signD6" type="password" class="inputs" name="pass1" placeholder="password" />
      <input id="signD7" type="password" class="inputs" name="pass2" placeholder="re-type password" />
      <input onsubmit="return validateSignup()" type="submit" class="inputs" style="color:#fff;margin-top:10px;padding-left:0px;background:rgba(16,35,54,1);cursor:pointer;" name="SignUp" value="SignUp"/>
    </div>
    <div style="position:absolute;bottom:14px;right:26px;font-size:25px;cursor:pointer;" onclick="changeuserType(1)">Login</div>
  </div>

</form>
</div>


<div id="footer"></div>
</body>
</html>
<script>



//<button style="height:100px;width:100px;position:absolute;top:20%;" onclick="loginFocus()"></button>
window.onload = function(){animate("login_canvas");}

function animate(canS){
  var login_imgs = ["social_template_img/1.svg","social_template_img/3.svg","social_template_img/4.svg","social_template_img/5.svg","social_template_img/6.svg","social_template_img/7.svg","social_template_img/8.svg","social_template_img/9.svg","social_template_img/10.svg","social_template_img/11.svg","social_template_img/0.svg",];
  var login_t = 1,login_x;

  for(x=0; x<11; x++){
    var login_temp = new Image();
    login_temp.src = login_imgs[login_x];
  }

function randomImage(a=280,b=250){
    var image = document.createElement("img");
    var canvas = document.getElementById(canS);

    image.className = "signup_images";
    image.height = "70";
    image.style.top = b+"px";
    image.style.left = a+"px";


    image.src = login_imgs[Math.round(Math.random()*10)];
    canvas.appendChild(image);

    var dirX = Math.round(Math.random()), dirY = Math.round(Math.random()), y=b, x=a, opacity = 1;
    var interTx, interTy;
    interx = setInterval(function(){
      if(dirX==1){x+=1;}else{x-=1;}
      image.style.left = x+"px";

  //    if(Math.sqrt(Math.pow((280-x),2)+Math.pow((250-y),2))>100){opacity-=0.005;image.style.opacity=opacity;}
//      if(Math.sqrt(Math.pow((280-x),2)+Math.pow((250-y),2))>400){clearInterval(interTx);canvas.removeChild(image);}
},Math.round(Math.random()*100+50));

    interTy = setInterval(function(){
      if(dirY==1){y+=1;}else{y-=1;}
      image.style.top = y+"px";


      if(Math.sqrt(Math.pow((a-x),2)+Math.pow((b-y),2))>(Math.random()*150)){opacity-=0.005;image.style.opacity=opacity;}
      if(Math.sqrt(Math.pow((a-x),2)+Math.pow((b-y),2))>400){clearInterval(interTy);canvas.removeChild(image);image.remove();}
    },Math.round(Math.random()*100+50));
}

setInterval(function(){randomImage(Math.round(Math.random()*(window.innerWidth/2))+20,Math.round(Math.random()*(window.innerHeight/2))+20);},1203);

}

var a = 0, time;

function rotate(){
  var can = document.getElementById("inne");
  var can2 = document.getElementById("inne2");
  can.style.transform = "rotateY("+a+"deg)";
  can2.style.transform = "rotateY("+(a+180)+"deg)";


  if(a==360){a=0;}else{a++;}
  if(a==180){clearInterval(time);}
  if(a==90){can.style.visibility = "hidden";can2.style.visibility = "visible";can.style.zIndex = 4;can2.style.zIndex = 5; document.forms["signupform"]["email"].focus();}
  if(a==270){can.style.visibility = "visible";can2.style.visibility = "hidden";can.style.zIndex = 5;can2.style.zIndex = 4;}
}

function rotateback(){
  var can = document.getElementById("inne");
  var can2 = document.getElementById("inne2");
  can.style.transform = "rotateY("+a+"deg)";
  can2.style.transform = "rotateY("+(a+180)+"deg)";


  if(a<=180){a--;}else{a=0;}
  if(a==0){clearInterval(time);}
  if(a==90){can2.style.visibility = "hidden";can.style.visibility = "visible";can.style.zIndex = 4;can2.style.zIndex = 5;document.forms["signupform"]["fname"].focus();}
  if(a==270){can2.style.visibility = "visible";can.style.visibility = "hidden";can.style.zIndex = 5;can2.style.zIndex = 4;}
}

function signupBack(){
  time = setInterval(function(){rotateback();},2);
}

function next(){
  time = setInterval(function(){rotate();},2);
}


function setPosition(){
  var hold2 = document.getElementById("signup_canvas"), hold1 = document.getElementById("login_canvas");

  hold1.style.right = (window.innerWidth/2-150)+"px";
  hold1.style.top = (window.innerHeight/2-460)+"px";
  hold2.style.right = (window.innerWidth/2-150)+"px";
  hold2.style.top = (window.innerHeight/2-460)+"px";

}

setPosition();

function changeuserType(con){
  var login = document.getElementById("login_canvas"), signup = document.getElementById("signup_canvas");

  var a=0, t;

  if(con==0){
     t = setInterval(function(){change1();},2);
  }else{
     t = setInterval(function(){change3();},2);
  }


  function change1(){
    a++;
    login.style.transform = "rotateX("+a+"deg)";
    if(a==90){
      clearInterval(t);
      login.style.visibility = "hidden";
      signup.style.transform = "rotateX(90deg)";
      signup.style.visibility = "visible";
      signupFocus();
      animate("signup_canvas");
      t = setInterval(function(){change2();},2);
    }
  }
  function change2(){
    a--;
    signup.style.transform = "rotateX("+a+"deg)";
    if(a==0){
      clearInterval(t);
    }
  }

  function change3(){
    a++;
    signup.style.transform = "rotateX("+a+"deg)";
    if(a==90){
      clearInterval(t);
      signup.style.visibility = "hidden";
      login.style.transform = "rotateX(90deg)";
      login.style.visibility = "visible";
      t = setInterval(function(){change4();},2);
    }
  }
  function change4(){
    a--;
    login.style.transform = "rotateX("+a+"deg)";
    if(a==0){
      loginFocus();
      clearInterval(t);
    }
  }
}

// for validation
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function validateData(temp, item){
  var x, hold = temp.split("");

  for(x=0; x<hold.length; x++){
     if(hold[x]==item){
       return 1;
     }
  }
  return 0;
}

function validateDataUpper(temp, item){
  var x,y, hold = temp.split("");

  for(x=0; x<hold.length; x++){
     for(y=0; y<item.length; y++){
       if(hold[x]==item[y]){
         return 0
       }
     }
  }
  return 1;
}


function validateLogin(){
  var d1 = document.forms["loginform"]["user"].value, d2 = document.forms["loginform"]["email"].value, d3 = document.forms["loginform"]["password"].value;

  var special = ['!','%','#','$','%','^','&','*','(',')','_','-','+','=','|','\\',':',';','\"','\'','?','/','<','@'];
  var upper = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

  if((d1=="") || (d2=="") || (d3=="")){
    error("Error: Invalid information");
    return false;
  }
  else{
      // for email
      if(validateDataUpper(d2,upper)){
          if(validateData(d2,"@")){
               holdon = d2.split("");

               if(holdon[holdon.length-4]=="."){
                  for(et=0; et<holdon.length; et++){
                      for(wt=0; wt<special.length-1; wt++){
                          if(holdon[et]==special[wt]){
                                  error("Error: Invalid email");
                                  return false;
                          }
                      }
                  }
                  if((holdon[holdon.length-3] != "c") || (holdon[holdon.length-2] != "o") || (holdon[holdon.length-1] != "m")){
                    error("Error: Invalid email");
                    return false;
                  }
                  // for username
                  if(!validateDataUpper(d1, special)){
                        error("Error: Special character in username");
                        return false;
                   }

                  // for password
                  var sizeOfD3 = d3.split("");


                  if(sizeOfD3.length<8 || sizeOfD3.length>16){
                        error("Error: Invalid password size");
                        return false;
                  }


              //    alert("an email"); don't report
                  return true;
               }
               error("Error: Invalid email"); return false;
          }
          else{
               error("Error: Invalid email"); return false;
          }
      }
      else{
          error("Error: Invalid email"); return false;
      }
  }
  return true;
}

// Error reporting
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

 function error(error){
   loginReset();
   document.getElementById("errorReporting").innerHTML = error;
   loginFocus();
 }

 function error2(error){
   signupReset();
   document.getElementById("errorReporting2").innerHTML = error;
   document.getElementById("errorReporting3").innerHTML = error;
   signupFocus();
 }
//  reset forms
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 function loginReset(){
   document.forms["loginform"]["user"].value = null;
   document.forms["loginform"]["email"].value = null;
   document.forms["loginform"]["password"].value = null;
 }

 function signupReset(){
   document.forms["signupform"]["fname"].value = null;
   document.forms["signupform"]["lname"].value = null;
   document.forms["signupform"]["username"].value = null;
   document.forms["signupform"]["email"].value = null;
   document.forms["signupform"]["number"].value = null;
   document.forms["signupform"]["pass1"].value = null;
   document.forms["signupform"]["pass2"].value = null;
 }

//login focus
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 function loginFocus(){
   document.forms["loginform"]["user"].focus();
 }
// signup focus
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 function signupFocus(){
   document.forms["signupform"]["fname"].focus();
 }


// vallidate signup
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

 function validateSignup(){
   var d1 = document.forms["signupform"]["fname"].value, d2 = document.forms["signupform"]["lname"].value, d3 = document.forms["signupform"]["username"].value, d4 = document.forms["signupform"]["email"].value, d5 = document.forms["signupform"]["number"].value;
   var d6 = document.forms["signupform"]["pass1"].value, d7 = document.forms["signupform"]["pass2"].value;

   var special = ['!','%','#','$','%','^','&','*','(',')','_','-','+','=','|','\\',':',';','\"','\'','?','/','<','@'];
   var upper = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];


   if((d1=="") || (d2=="") || (d3=="") || (d4=="") || (d5=="") || (d6=="") || (d7=="")){
    alert("Error: Invalid information");
     return false;
   }

  // for fname
   if(!validateDataUpper(d1, special)){
     alert("invalid fname");
     return false;
   }
   if(validateData(d1," ")){
     error2("Error: Invalid space in fname");
     return false;
   }
   // for lname
   if(!validateDataUpper(d2, special)){
     error2("Error: Invalid lname");
     return false;
   }
   if(validateData(d2," ")){
     error2("Error: Invalid space in lname");
     return false;
   }
   // for username
   if(!validateDataUpper(d3, special)){
     error2("Error: Invalid username");
     return false;
   }

   // for email id

   var holdon, wt, et;

   if(validateDataUpper(d4,upper)){
       if(validateData(d4,"@")){
            holdon = d4.split("");

            if(holdon[holdon.length-4]=="."){
               for(et=0; et<holdon.length; et++){
                   for(wt=0; wt<special.length-1; wt++){
                       if(holdon[et]==special[wt]){
                               error2("Error: Invalid email");
                               return false;
                       }
                   }
               }
               if((holdon[holdon.length-3] != "c") || (holdon[holdon.length-2] != "o") || (holdon[holdon.length-1] != "m")){
                 error2("Error: Invalid email");
                 return false;
               }
            }
            else{
              error2("Error: Invalid email");
              return false;
            }
       }else{
         error2("Error: Invalid email");
         return false;
       }
    }
    else{
      error2("Error: Invalid email");
      return false;
    }


   if(d6 != d7){
     alert("Error: Password not equal");
     return false;
   }
// not validating id number
  return false;
}

</script>


<?php
 }

?>