<title>Admin - Faculty of Computing and Informatics</title>
<form id="formAdmin" action="<?=base_url()?>UpdateAdmin" method="post" style="border:1px solid #ccc">
    <div class="container">
        <br><br><br><br>
        <h1 >Update admin details</h1>
        <p>Please fill in this form to update account details.</p>
        <p><?php echo $this->session->flashdata('status'); ?></p>
        <?php $string = validation_errors(); if(!empty($string)): ?>
        <?php echo '<div class="alert" style="width:60%">' .validation_errors(). '</div>' ?>
        <?php endif; ?>
        <hr>

        <label for="adID"><b>Admin ID</b></label>
        <input type="text" placeholder="Enter Admin ID" name="adID"  value="<?php echo $adID?>" required>

        <label for="adName"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="adName" value="<?php echo $adName?>" required>

        <label for="adIC"><b>MyKad Indentity Number</b></label>
        <input type="text" placeholder="Enter MyKad Indentity Number" name="adIC"  value="<?php echo $adIC?>" required>

        <label for="adGender"><b>Gender</b></label>
        <select name="adGender" id="adGender">
            <option value="" disabled="disabled" selected="selected">Select Gender</option>
                <option value="1"<?php if($adGender==1)echo 'selected="selected"' ?>>Male</option>
                <option value="2"<?php if($adGender==2)echo 'selected="selected"' ?>>Female</option>
                <option value="3"<?php if($adGender==3)echo 'selected="selected"' ?>>Other</option>
        </select>

        <label for="adPhoneNo"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Phone Number" name="adPhoneNo"  value="<?php echo $adPhoneNo?>" required>
        
        <label for="adPosition"><b>Register as </b></label>
        <select name="adPosition" id="adPosition" required>
            <option value="" disabled="disabled" selected="selected">Select Admin type</option>
                <option value="1"<?php if($adGender==1)echo 'selected="selected"' ?>>Admin</option>
                <option value="2"<?php if($adGender==2)echo 'selected="selected"' ?>>Co-admin</option>
        </select>
        
        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
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