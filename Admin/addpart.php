<?php
include('connection.php');
extract($_POST);

if (isset($reg)) {

    //check user exists or not
    $que = mysqli_query($con, "select * from part where description='$description'");
    if (mysqli_num_rows($que)) {
        $m = "<p style='color:red'>This part already exists</p>";
    } else {
        //$pass=md5($p);



        $query = "insert into part values('','$description','$qty','$price','$category')";
        if (mysqli_query($con, $query)) {
            $m = "Data saved successfully";
        } else {
            $m = "some error";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="../black.jpg">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script>function checkPass()
            {
                //Store the password field objects into variables ...
                var pass1 = document.getElementById('pass1');
                var pass2 = document.getElementById('pass2');
                //Store the Confimation Message Object ...
                var message = document.getElementById('confirmMessage');
                //Set the colors we will be using ...
                var goodColor = "#66cc66";
                var badColor = "#ff6666";
                //Compare the values in the password field 
                //and the confirmation field
                if (pass1.value == pass2.value) {
                    //The passwords match. 
                    //Set the color to the good color and inform
                    //the user that they have entered the correct password 
                    pass2.style.backgroundColor = goodColor;
                    message.style.color = goodColor;
                    message.innerHTML = "Passwords Match"
                } else {
                    //The passwords do not match.
                    //Set the color to the bad color and
                    //notify the user.
                    pass2.style.backgroundColor = badColor;
                    message.style.color = badColor;
                    message.innerHTML = "Passwords Do Not Match!"
                }
            }
            function validatephone(phone)
            {
                var maintainplus = '';
                var numval = phone.value
                if (numval.charAt(0) == '+')
                {
                    var maintainplus = '';
                }
                curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g, '');
                phone.value = maintainplus + curphonevar;
                var maintainplus = '';
                phone.focus;
            }
            // validates text only
            function Validate(txt) {
                txt.value = txt.value.replace(/[^a-zA-Z-'\n\r.]+/g, '');
            }
            // validate email
            function email_validate(email)
            {
                var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

                if (regMail.test(email) == false)
                {
                    document.getElementById("status").innerHTML = "<span class='warning'>Email address is not valid yet.</span>";
                } else
                {
                    document.getElementById("status").innerHTML = "<span class='valid'>Thanks, you have entered a valid Email address!</span>";
                }
            }
            // validate date of birth
            function dob_validate(dob)
            {
                var regDOB = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;

                if (regDOB.test(dob) == false)
                {
                    document.getElementById("statusDOB").innerHTML = "<span class='warning'>DOB is only used to verify your age.</span>";
                } else
                {
                    document.getElementById("statusDOB").innerHTML = "<span class='valid'>Thanks, you have entered a valid DOB!</span>";
                }
            }
            // validate address
            function add_validate(address)
            {
                var regAdd = /^(?=.*\d)[a-zA-Z\s\d\/]+$/;

                if (regAdd.test(address) == false)
                {
                    document.getElementById("statusAdd").innerHTML = "<span class='warning'>Address is not valid yet.</span>";
                } else
                {
                    document.getElementById("statusAdd").innerHTML = "<span class='valid'>Thanks, Address looks valid!</span>";
                }
            }

        </script>

        <style>body {
                padding-top:50px;
            }
            fieldset {
                border: thin solid #ccc; 
                border-radius: 4px;
                padding: 20px;
                padding-left: 40px;
                background: #fbfbfb;
            }
            legend {
                color: #678;
            }
            .form-control {
                width: 95%;
            }
            label small {
                color: #678 !important;
            }
            span.req {
                color:maroon;
                font-size: 112%;
            }
        </style>     



    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand visible-xs-block visible-sm-block" href="">Part Data</a>
                    <a class="navbar-brand hidden-xs hidden-sm" href="">Part Data</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li ><a href="index.php">Employee Data</a></li>
                        <li><a href="add.php">Add Employee</a></li>
                        <li><a href="service.php">Service Data</a></li>
                        <li><a href="addservice.php">Add Service</a></li>
                        <li ><a href="part.php">Part Data</a></li>
                        <li class="active"><a href="addpart.php">Add Part</a></li>
                        <li><a href="../index.php">Log Out</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>   
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="post" id="fileForm" role="form">
                        <fieldset><legend class="text-center"><span style="color:#CC0000">Add New Part Data</span></legend>


                            <div class="form-group">
                                <label for="description"><span class="req">* </span> Descriprion: </label> 
                                <input class="form-control" required type="text" name="description" id = "description"   placeholder="Description"/>   
                                <div class="status" id="status"></div>
                            </div>


                            <div class="form-group"> 	 
                                <label for="qty"><span class="req">* </span> Employee Name: </label>
                                <input class="form-control" type="text" name="qty" id = "qty"  placeholder="Enter Quantity In Stock" required /> 
                                <div id="errFirst"></div>    
                            </div>

                            <div class="form-group">
                                <label for="price"><span class="req">* </span> Selling: </label>
                                <input required type="text" name="price" id="price" class="form-control phone"  placeholder="Enter Selling Price"/> 
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Category</label>
                                <div class="col-sm-3">
                                    <select name="category" class="form-control" required>
                                        <option value=""> - Select Category - </option>
                                        <option value="change oil">Change Oil</option>
                                        <option value="break pads">Break Pads</option>
                                        <option value="clean pistols">Clean Pistols</option>

                                    </select>
                                </div>

                

                            <div class="form-group">
                                <input class="btn btn-success" type="submit" name="reg" value="Register">
                            </div>


                        </fieldset>
                    </form><!-- ends register form -->

                    <script type="text/javascript">
                        document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
                    </script>
                </div><!-- ends col-6 -->

                <div class="col-md-6">
                    <h1 class="page-header">HMS =|= </h1>
                    <?php
                    if (isset($m)) {
                        ?>
                        <p style="background-color:#99FFCC"><?php echo $m; ?></p>

                        </tr>
                        <?php
                    }
                    ?>



                </div>

            </div>
        </div>

    </body>
</html>
