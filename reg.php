<?php
   session_start();
   include("config.php");
   
   
   if(isset($_POST['email']))
   {
   	$email=$_POST['email'];
   	$password=md5 ($_POST['password1']);
   	$phone=$_POST['phone'];
   	$firstname=$_POST['first_name'];
   	$lastname=$_POST['last_name'];
       $check="select username from users where username='$email'";
       $result = mysqli_query($db, $check);
       $user = mysqli_fetch_assoc($result);
      if($user['username']==$email)
      {
   	   
      }
      else
      {
         $qry="insert into users (username,password,firstname,lastname,phone) values('$email','$password','$firstname','$lastname','$phone')";
         mysqli_query($db, $qry);
   	 
         echo "<script>alert('account registered');window.location = 'login.html';</script>";
   	 
      }
   }
   ?>
   <style>
   	#textboxid
{
    height:30px;
    font-size:14pt;
}
.rightb {
  position: absolute;
  top: 30%;
  right: 850px;
  border: 3px solid #73AD21;
}
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: green;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: green;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
   </style>
<html lang="en-us" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="http://ogp.me/ns/fb#">
   <head>
      <title>Register | Ayush</title>
      <!-- Stylesheets -->
      <!-- Google Fonts -->
      <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900">
      <!-- Bootstrap -->
      <link href="css/style3.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="css/style1.css" rel="stylesheet">
      <link href="css/style2.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript">
         function validateForm() {
         var first = document.forms["formRegister"]["first_name"].value;
         var last = document.forms["formRegister"]["last_name"].value;
         var eml = document.forms["formRegister"]["email"].value;
         var ph = document.forms["formRegister"]["phone"].value;
         var pass1 = document.forms["formRegister"]["password1"].value;
         var pass2 = document.forms["formRegister"]["password2"].value;
         if (first == "") {
         $("#fnamefill").html("First Name must be filled out");
            return false;
         }
         else if(last==""){
           $("#lnamefill").html("Last Name must be filled out");
         
            return false;
         }
         else if(eml==""){
           $("#emailfill").html("Email must be filled out");
         
            return false;
         }
         else if(ph==""){
           $("#phfill").html("Phone number must be filled");
         
            return false;
         }
         else if(pass1==""||!(pass1==pass2)){
            $("#passfill").html("passwords don't match");
            return false;
         }
         
         }
         
         
      </script>
      <script>
         $(document).ready(function check(){ $('#success').hide();
             $("#id_email").blur(function(){
         	   var em=$(this).val();
         	    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
         	    if(em==""){$("#emailfill").html("email must be filled");return false;}
         		else if(!re.test(em)){$('#success').hide();$("#emailfill").html("not a vaild email address"); return false;}
         		else{
                 $.ajax({url: "checkemail.php?username="+em, success: function(result){
                  if(result==1){$('#emailfill').hide();$('#success').show();$("#success").html("<strong>Success new user</strong>"); return true;}
         		 else{$('#success').hide();$("#emailfill").html("Email already registered");return false;}
         		 return false;
                 }});
         		}
             });
         });
      </script>
   </head>
   <body background="images/index_hero.jpg">
      <div id="wrap">
         <header class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                  
                  <a class="navbar-brand" href="index.php">
                  
                  </a>
                  <div class="pull-right visible-xs" style="margin-right: 4px;">
                     
                    
                     
                  </div>
               </div>
               <!-- Collect the nav links, forms, and other content for toggling -->
               <div id="navbar-collapse-content" class="collapse navbar-collapse">
                  <form id="header_search_form" class="navbar-form navbar-search navbar-left hidden-xs" role="search" action="search.php" method="get">
                     <div class="input-group">
                        <div class="input-group">
                           
                           <span class="input-group-btn">
                          
                           </span>
                        </div>
                     </div>
                  </form>
                  
            </div>
         </header>
         <div class="container">
            <h1>
               Register with Ayush
            </h1>

            <div class="row">
               <div class="col-sm-12">
                  
                  <hr style="margin-bottom: 0px;" />
                  <div style="margin: 20px 0">
                     <form id="formRegister" name="form" action="reg.php" method="post" onsubmit="return (validateForm()&&check())">
                        <div class="row">
                           <div class="col-sm-6">
                           
                              <div id="field_first_name" class="field form-group required">
                                 <label for ="id_first_name" class="control-label">First Name *</label>
                                 <div class="controls widget" style="margin-bottom: 0px;">
                                    <input id="id_first_name" maxlength="30" name="first_name" type="text" />
                                 </div>
                                 <div class="errors help-block" style="margin: 0px; padding-top: 5px;">
                                 </div>
                                 <small id="fnamefill" class="text-danger"> </small>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div id="field_last_name" class="field form-group required">
                                 <label for="id_last_name" class="control-label">Last Name *</label>
                                 <div class="controls widget" style="margin-bottom: 0px;">
                                    <input id="id_last_name" maxlength="30" name="last_name" type="text" />
                                 </div>
                                 <div class="errors help-block" style="margin: 0px; padding-top: 5px;"></div>
                                 <small id="lnamefill" class="text-danger"> </small>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <div id="field_email" class="field form-group required">
                                 <label for="id_email" class="control-label">E-mail *</label>
                                 <div class="controls widget" style="margin-bottom: 0px;">
                                    <input id="id_email" name="email" type="email"/>
                                    <span id="email_status"></span>
                                 </div>
                                 <div class="errors help-block" style="margin: 0px; padding-top: 5px;">
                                    <small id="emailfill" class="text-danger"> </small>
                                    <div id="success" class="alert alert-success fade in" style="display: inline">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-6">
                              <div id="field_first_name" class="field form-group required">
                                 <label for="id_first_name" class="control-label">Phone*</label>
                                 <div class="controls widget" style="margin-bottom: 0px;">
                                    <input id="phone" maxlength="10" name="phone" type="tel" />
                                 </div>
                                 <div class="errors help-block" style="margin: 0px; padding-top: 5px;"></div>
                                 <small id="phfill" class="text-danger"> </small>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-6">
                              <div id="field_password1" class="field form-group required">
                                 <label for="id_password1" class="control-label">Password *</label>
                                 <div class="controls widget" style="margin-bottom: 0px;">
                                    <input id="id_password1" name="password1" type="password" />
                                 </div>
                                 <div class="errors help-block" style="margin: 0px; padding-top: 5px;">
                                    <small id="passfill" class="text-danger"> </small>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div id="field_password2" class="field form-group required">
                                 <label for="id_password2" class="control-label">Password (again) *</label>
                                 <div class="controls widget" style="margin-bottom: 0px;">
                                    <input id="id_password2" name="password2" type="password" />
                                 </div>
                                 <div class="errors help-block" style="margin: 0px; padding-top: 5px;"></div>
                              </div>
                           </div>
                        </div>
                        <div class="rightb"> 
                        	<div class="custom-select" style="width:200px;">
                        		<select>
                        		<option value="Select" >Select</option>
  								<option value="Patient" >Patient</option>
  								<option value="Doctor">Doctor</option>
		  						<option value="Hospital">Hospital</option>
		  						</select>
		  						</div>
		  						</div>
                       
                        <div class="row">
                           <div class="col-sm-6">
                              <button type="submit" class="btn btn-primary btn-lg btn-block" value="Register">Register</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div>
      </div>
     	<script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
   </body>
