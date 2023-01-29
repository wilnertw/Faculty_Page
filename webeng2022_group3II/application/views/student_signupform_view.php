<form id="studformSignUp" action="<?=base_url()?>studSignup/addnew" method="post" style="border:1px solid #ccc">
    <div class="container">
        <br><br><br><br>
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <p><?php echo $this->session->flashdata('status'); ?></p>
        <?php $string = validation_errors(); if(!empty($string)): ?>
        <?php echo '<div class="alert" style="width:60%">' .validation_errors(). '</div>' ?>
        <?php endif; ?>
        <hr>

        <label for="studMatricNo"><b>Matric No</b></label>
        <input type="text" placeholder="Enter Matric No" name="studMatricNo" required>

        <label for="studName"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="studName" required>

        <label for="studIC"><b>MyKad Indentity Number</b></label>
        <input type="text" placeholder="Enter MyKad Indentity Number" name="studIC" required>

        <label for="studGender"><b>Gender</b></label>
        <select name="studGender" id="studGender">
            <option value="" disabled="disabled" selected="selected">Select Gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Other</option>
        </select>

        <label for="studPhoneNo"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Phone Number" name="studPhoneNo" required>

        <label for="studRegisterSession"><b>Register Session</b></label>
        <input type="text" placeholder="Enter Semester-Session Eg: 1-2020/2021" name="studRegisterSession" required>
        
        <label for="studProgramme"><b>Programme</b></label>
        <select name="studProgramme" id="studProgramme" required>
            <option value="" disabled="disabled" selected="selected">Select Programme</option>
                <option value="1">UH6481001 Software Engineering</option>
                <option value="2">UH6481002 Network Engineering</option>
                <option value="3">UH6481005 Data Science</option>
                <option value="4">UH6481003 Multimedia Technology</option>
                <option value="5">UH6481004 Business Computing</option>
        </select>
        
        <label for="studEmail"><b>Login Email</b></label>
        <input type="email" placeholder="Enter Email" name="studEmail" required>
        
        <label for="studPassword"><b>Login Password</b></label>
        <input type="password" placeholder="Enter Password" name="studPassword" required>


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