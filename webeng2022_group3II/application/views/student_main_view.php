<title>Student - Faculty of Computing and Informatics</title>
<form id="formStudent" action="<?=base_url()?>UpdateStudent" method="post" style="border:1px solid #ccc">
    <div class="container">
        <br><br><br><br>
        <h1 >Welcome back <span style="color: #7a90d1"><?php echo $studName?></span>!</h1>
        <p>Please fill in this form to update account details.</p>
        <p><?php echo $this->session->flashdata('status'); ?></p>
        <?php $string = validation_errors(); if(!empty($string)): ?>
        <?php echo '<div class="alert" style="width:60%">' .validation_errors(). '</div>' ?>
        <?php endif; ?>
        <hr>

        <label for="studMatricNo"><b>Matric No</b></label>
        <input type="text" placeholder="Enter Matric No" name="studMatricNo" value="<?php echo $studMatricNo?>"required>

        <label for="studName"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="studName" value="<?php echo $studName?>" required>

        <label for="studIC"><b>MyKad Indentity Number</b></label>
        <input type="text" placeholder="Enter MyKad Indentity Number" name="studIC" value="<?php echo $studIC?>" required>

        <label for="studGender"><b>Gender</b></label>
        <select name="studGender" id="studGender">
            <option value="" disabled="disabled" selected="selected">Select Gender</option>
                <option value="1"<?php if($studGender==1)echo 'selected="selected"' ?>>Male</option>
                <option value="2"<?php if($studGender==2)echo 'selected="selected"' ?>>Female</option>
                <option value="3"<?php if($studGender==3)echo 'selected="selected"' ?>>Other</option>
        </select>

        <label for="studPhoneNo"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Phone Number" name="studPhoneNo" value="<?php echo $studPhoneNo?>"required>

        <label for="studRegisterSession"><b>Register Session</b></label>
        <input type="text" placeholder="Enter Semester-Session Eg: 1-2020/2021" name="studRegisterSession" value="<?php echo $studRegisterSession?>" required>
        
        <label for="studProgramme"><b>Programme</b></label>
        <select name="studProgramme" id="studProgramme" required>
            <option value="" disabled="disabled" selected="selected">Select Programme</option>
                <option value="1"<?php if($studProgramme==1)echo 'selected="selected"' ?>>UH6481001 Software Engineering</option>
                <option value="2"<?php if($studProgramme==2)echo 'selected="selected"' ?>>UH6481002 Network Engineering</option>
                <option value="3"<?php if($studProgramme==3)echo 'selected="selected"' ?>>UH6481005 Data Science</option>
                <option value="4"<?php if($studProgramme==4)echo 'selected="selected"' ?>>UH6481003 Multimedia Technology</option>
                <option value="5"<?php if($studProgramme==5)echo 'selected="selected"' ?>>UH6481004 Business Computing</option>
        </select>

        <div class="clearfix">
            <a href="<?=base_url()?>studProfile" class="nav-link" "><button type="button" class="cancelbtn" style="color:white">Cancel</button></a>
            <button type="submit" class="signupbtn">Update</button>
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