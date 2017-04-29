<div class="FormClass">
<!-- <form> IT doesn't work well with ajax-->
<h1>Name</h1> <input type="text" id="user_name" name="user_name" required="" >  <br><br>

<h1>Email </h1><input id="user_email" name="user_email" type="email" required="">  <br><br>
<h1>Password </h1><input id="user_password" name="user_password" type="password" required="">  <br><br>
<h1>Confirm Password </h1><input id="user_password_confirm" name="user_password_confirm" required="" type="password"
                                 onchange="checkPassword();"> 
<span id='password_span' style="background-color: blue;"></span><br><br>

<textarea name="errors" id="errors" readonly="" ></textarea>  <br><br>
<br><br>
<input name="RegisterButton" type="submit" value="Register" onclick="checkRegister();"> <br><br>

</div>
<div id="status"></div>
<div id="error_area" style="color: red;"></div>

<script>
function checkPassword(){
    var p1=document.getElementById("user_password");
    var p2=document.getElementById("user_password_confirm");
    var password_span=document.getElementById("errors");
    if(p1.value != p2.value){
        password_span.style.color="red";
        password_span.value="Password and Confirm Password doesn't match";
    }
}
function checkRegister(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "Controller/RegisterController.php";
    var user_name = document.getElementById("user_name").value;
    var pass = document.getElementById("user_password").value;
    var user_password_confirm = document.getElementById("user_password_confirm").value;
    var email = document.getElementById("user_email").value;
    //var date_of_birth = document.getElementById("DOB").value;
    //var gender = document.getElementById("user_gender").value;
    var error_area=document.getElementById("errors");
    var checkVariable=true;
    if(checkVariable){
        if(
            user_name.length==0||
            pass.length==0||user_password_confirm.length==0||
            email.length==0
            ){
        checkVariable=false;
       error_area.style.color="red";
       error_area.value = "Please fill all fields";
      // alert("Please fill all fields");
    }
    }
    if(checkVariable){
        if(pass!=user_password_confirm){
        error_area.style.color="red";
        error_area.value = "Password and Confirm Password doesn't match";
        //alert("Password and Confirm Password doesn't match");
        checkVariable=false;
    }
    }
    if(checkVariable){
    var vars = "user_name="+user_name+"&email="+email+
                "&pass="+pass;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("status").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "processing...";
    }//end of check if data is correct or not
}
</script>


<!--<div class="col-lg-3 col-md-4 col-sm-6">
             Vertical Form:
               <form name="RegisterForm" action="">
                 <div class="form-group">
                   <label for="InputName"> Name:</label>
                   <input type="text" name="UserName" class="form-control" >
                 </div>
                 <div class="form-group">
                   <label for="InputEmail"> Email:</label>
                   <input type="Email" name="UserEmail" class="form-control" >
                 </div>
                 <div class="form-group">
                   <label for="Password"> Password:</label>
                   <input type="Password" name="UserPassword" class="form-control" >
                 </div>
                 <div class="form-group">
                   <label for="DOB"> Date Of Birth:</label>
                   <input type="Date" name="UserDOB" class="form-control" >
                 </div>         

                   <div class="radio">
                   <label><input type="radio" value="male" name="UserGender">Male</label>
                 </div>
                 <div class="radio">
                   <label><input type="radio" value="female" name="UserGender">Female</label>
                 </div>
                <br/>

                  <div class="form-group">
                      <button class="btn btn-default" onclick="checkRegister()">Register</button>
                 </div>

               </form>
           -->

          <!-- <center>
    <div class="FormClass" >
        <form name="RegisterForm">
            <h1> Name:</h1><input type="text" required="required" name="UserName" value=""><br>
            <h1> Email:</h1><input type="email" required="required" name="UserEmail" value=""><br>

            <h1>Password:</h1><input type="password" required="required" name="UserPassword" value=""><br>
            <h1>DOB:</h1><input type="date" required="required" name="UserDOB" value=""><br>
            <h1>Gender:</h1>
            <select name="UserGender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <br>
            <input type="submit"  required="required" name="Register" value="Register" onclick="checkRegister();">
        </form>
    </div>
 </div>
<br/>
<div id="status2"></div>-->
<script type="text/javascript">
/*function checkRegister(){
    var ajaxObject=new XMLHttpRequest();

    var name=document.RegisterForm.UserName.value;
    var email=document.RegisterForm.UserEmail.value;
    var password=document.RegisterForm.UserPassword.value;
    var DOB=document.RegisterForm.UserDOB.value;
    var gender=document.RegisterForm.UserGender.value;
    var url="Controller/RegisterController.php";
    var sendData="Name="+name+
                 "&Email="+email+
                 "&Password="+password+
                 "&DOB="+DOB+"&Gender="+gender;
         

ajaxObject.open("POST",url,true);//true:asynchronouns
// Set content type header information for sending url encoded variables in the request
ajaxObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// Access the onreadystatechange event for the XMLHttpRequest object
ajaxObject.onreadystatechange = function() {
	    if(ajaxObject.readyState == 4 && ajaxObject.status == 200) {
		    var return_data = ajaxObject.responseText;
		    document.getElementById("status2").innerHTML = return_data;
	    }
    }
    ajaxObject.send(sendData); // Actually execute the request

// Send the data to PHP now... and wait for response to update the status div
}
*/

</script>
