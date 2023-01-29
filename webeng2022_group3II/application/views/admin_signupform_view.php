<form id="adformSignUp" action="<?=base_url()?>adSignup/addnew" method="post" style="border:1px solid #ccc">
    <div class="container">
        <br><br><br><br>
        <h1>Register as Admin</h1>
        <p>Please fill in this form to register an admin account.</p>
        <p><?php echo $this->session->flashdata('status'); ?></p>
        <?php $string = validation_errors(); if(!empty($string)): ?>
        <?php echo '<div class="alert" style="width:60%">' .validation_errors(). '</div>' ?>
        <?php endif; ?>
        <hr>

        <label for="adID"><b>Admin ID</b></label>
        <input type="text" placeholder="Enter Admin ID" name="adID" required>

        <label for="adName"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="adName" required>

        <label for="adIC"><b>MyKad Indentity Number</b></label>
        <input type="text" placeholder="Enter MyKad Indentity Number" name="adIC" required>

        <label for="adGender"><b>Gender</b></label>
        <select name="adGender" id="adGender">
            <option value="" disabled="disabled" selected="selected">Select Gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Other</option>
        </select>

        <label for="adPhoneNo"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Phone Number" name="adPhoneNo" required>
        
        <label for="adPosition"><b>Register as </b></label>
        <select name="adPosition" id="adPosition" required>
            <option value="" disabled="disabled" selected="selected">Select Admin type</option>
                <option value="1">Admin</option>
                <option value="2">Co-admin</option>
        </select>
        
        <label for="adEmail"><b>Login Email</b></label>
        <input type="email" placeholder="Enter Email" name="adEmail" required>
        
        <label for="adPassword"><b>Login Password</b></label>
        <input type="password" placeholder="Enter Password" name="adPassword" required>


        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom: 15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn">Sign Up</button>
        </div>
    </div>
</form>


<style>
    body{/* font-family: Arial, Helvetica, sans-serif; */}
    *{box-sizing: border-box}

    input[type=text], input[type=password], input[type=email], select{
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, select:focus{
        background-color: #ddd;
        outline: none;
    }

    hr{
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    button{
        background-color: #4caf50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 20%;
        opacity: 0.9;
    }

    button:hover{
        opacity: 1;
    }

    .cancelbtn{
        padding: 14px 20px;
        background-color: #f44336;
    }

    .cancelbtn, .signupbtn{
        float: left;
        width: 20%;
    }

    .container{
        padding: 16px;
        width: 80%;
    }

    .clearfix::after{
        content: "";
        clear: both;
        display: table;
    }

    .alert{
        padding: 20px;
        background-color: #f44336;
        color: white;
    }

    .alert_green{
        padding: 20px;
        background-color: #00cc66;
        color: white;
    }

    @media screen and (max-width: 300px){
        .cancelbtn, .signupbtn{
            width: 20%;
        }
    }
</style>