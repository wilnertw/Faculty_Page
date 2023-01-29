<form id="RAadmin" action="<?=base_url()?>RA_con_Admin" method="post" style="border: 1px solid #ccc"> 
    <div class="container">
        <br><br><br><br><br>
        <h1>Registeration Form</h1>
            <h2>Admin Pick Applicants</h2>
            <p>
                <?php
                $pdo = new PDO('mysql:host=localhost; dbname=bi20110160_webtech', 'root', ')DsNUuz_lhGdpZ)b');
                $sql = "SELECT RApplicantName, ApplicantID FROM raapplicant";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $users = $stmt->fetchAll();
                ?>
                <select class="dropdownmenu" name="admin_pick">
                    <?php foreach($users as $user): ?>
                        <option  value="<?=$user['ApplicantID'];?>" <?= !empty($_POST) && $_POST['admin_pick'] == $user['ApplicantID'] ? 'selected' : '' ?> > 
                        <?= $user['RApplicantName'];?>
                        </option>
                        <?php endforeach; ?>
                </select>
                <button type="submit" name="action" value="fetch" class="fetch">Fetch</button>
            </p>
            
            <table class="dropdown_menu">
                <caption>Pick the appropriate options</caption>
                <tr>
                    <td>
                        <select name="category1" >
                            <option value="" disabled="disabled" selected="selected">Category I</option>
                            <option value="1" <?php if($CAT1 == 1) echo 'selected = "selected"'?>>Niche Area</option>
                        </select>
                    </td>
                    <td>
                        <select name="category2" >
                            <option value="" disabled="disabled" selected="selected">Category II</option>
                            <option value="1"<?php if($CAT2 == 1) echo 'selected = "selected"'?>>RG (SD/MD)</option>
                            <option value="2"<?php if($CAT2 == 2) echo 'selected = "selected"'?>>Full Member of RC/CoE</option>
                        </select>
                    </td>
                    <td>
                        <select name="category3">
                            <option value="" disabled="disabled" selected="">Category III</option>
                            <option value="1"<?php if($CAT3 == 1) echo 'selected = "selected"'?>>Associate Member of RC/CoE</option>
                            <option value="2"<?php if($CAT3 == 2) echo 'selected = "selected"'?>>RG (SD/MD)</option>
                            <option value="3"<?php if($CAT3 == 3) echo 'selected = "selected"'?>>Full Member of RC/CoE</option>
                        </select>
                    </td>
                </tr>
            </table>
            <table class="sect_A">
                <caption>Section A: Applicant’s Particulars</caption>
                <tr> 
                    <td>Name:</td>
                    <td> <input type="text" placeholder="Enter Name" name="aName" value="<?php echo $RApplicantName ?>" > </td>
                    <td>Staff_ID/No:</td>
                    <td> <input type="text" placeholder="Enter ID" name="aID" value="<?php echo $RApplicantID ?>" > </td>
                </tr>
                <tr>
                    <td>Faculty:</td>
                    <td> <input type="text" placeholder="Enter Faculty" name="aFac" value="<?php echo $RApplicantFac ?>" > </td>
                    <td>Department:</td>
                    <td> <input type="text" placeholder="Enter Department" name="aDep" value="<?php echo $RApplicantDep ?>"  > </td>
                </tr>
                <tr>
                    <td>Primary Email:</td>
                    <td> <input type="email" placeholder="Enter Primary Email" name="aEmail1" value="<?php echo $RApplicantEmail1 ?>"  > </td>
                    <td>Secondary Email:</td>
                    <td> <input type="email" placeholder="Enter Secondary Email" name="aEmail2" value="<?php echo $RApplicantEmail2 ?>"> </td>
                </tr>
                <tr>
                    <td>Office Phone No:</td>
                    <td><input type="text" placeholder="Enter Office Phone No." name="aOffHPNo" value="<?php echo $RApplicantOfficeHP ?>" ></td>
                    <td>Mobile Phone No:</td>
                    <td><input type="text" placeholder="Enter Phone No." name="aHPNo" value="<?php echo $RApplicantHP ?>"  ></td>
                </tr>
                <tr>
                    <td>Field Of Expertise:</td>
                    <td colspan="3"> <input type="text" placeholder="Enter Field" name="aFOS" value="<?php echo $RApplicantFOS ?>" > </td>
                </tr>
            </table>
            <br>
            <table class="sect_B">
                <caption>Section B: Research Group(RG)</caption>
                <tr>
                    <td>Research Group</td>
                    <td>Remarks</td>
                </tr>
                <tr>
                    <td> <textarea rows="6" cols="30" type="text" placeholder="Enter Research Group" name="aRG" value="<?php echo $RAplicantRG ?>"  ></textarea> </td>
                    <td> <textarea rows="6" cols="30" type="text" placeholder="Remarks" name="aRemark" value="<?php echo $RGRemark ?>" ></textarea> </td>
                </tr>
            </table>
            <br>
            <table class="sect_C">
                <caption>Section C: Chair of Research Alliance(RA)</caption>
                <tr>
                    <td>Research Alliance</td>
                    <td>Remarks</td>
                </tr>
                <tr>
                    <td> <textarea rows="6" cols="30" placeholder="Enter Alliance" name="aAlliance" value="<?php echo $RAplicantRA ?>" ></textarea> </td>
                    <td> <textarea rows="6" cols="30" placeholder="Remarks" name="sectC_Remarks" value="<?php echo $RAAlliance ?>" ></textarea> </td>
                </tr>
            </table>
            <br>
            <table class="sect_D">
                <caption>Section D: Secretariat, Office of Deputy Vice Chancellor (Research & Innovation)</caption>
                <tr>
                    <td>Remarks</td>
                </tr>
                <tr>
                <td> <textarea rows="6" cols="50" placeholder="Remarks" name="sectD_Remarks"></textarea> </td>
                </tr>
            </table>
            <br>

        <div class="clearfix" style="margin-left: 37%;">
            <button type="submit" name="action" value="reject" class="cancelbtn">Reject</button>
            <button type="submit" name="action" value="approve" class="singupbtn">Approve</button>
        </div>

    </div>
</form>

<style>

    h1{
        margin-left: 35%;
    }

    h2{
        margin-left: 10%;
    }

    table{
        margin-left: 10%;
        width: 80%;
    }

    .dropdownmenu {
       
        margin-left: 10%;

    }

    .sect_A td{
        padding-left: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
        width: 100px;
    }

    .sect_A caption{
        padding-top: 15px;
        padding-bottom: 10px;
    }

    body{font-family: Arial, Helvetica, sans-serif;}
    *{box-sizing: border-box}

    .sect_B td{
        text-align: center;
        padding: 5px;
    }

    .sect_C td{
        text-align: center;
        padding: 5px;
    }

    .sect_D td{
        text-align: center;
        padding: 5px;
    }

    /* Full-width input fields */

    input[type=text], input[type=password], input[type=email], select{
        display: inline-block;
        border: 1px solid #000;
        background: #f1f1f1;

    }

    .sect_A input[type=text], input[type=password], input[type=email], select{
        height: 25px;
        text-align: center;
        width: 200px;

    }

    .sect_B textarea{
        height: 100px;
        width: 250px;
        margin: 5px 0 22px 0;        
    }

    .sect_C textarea{
        height: 100px;
        width: 250px;
        margin: 5px 0 22px 0;        
    }

    input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, select:focus { 
        background-color: #ddd;
        outline: none;
    }

    hr{
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* set a style for all buttons */
    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        cursor: pointer;
        width: 20%;
        opacity: 0.9;

    }

    button:hover{
        opacity: 1;
    }

    .fetch{
        background-color: #4CAF50;
        color: white;
        padding: 4px 7px;
        margin: 8px 0;
        cursor: pointer;
        width: 10%;
        opacity: 0.9;
    }

    /* Extra styles for the cancel button */
    .cancelbtn{
        padding: 14px 20px;
        background-color: #f44336;
    }

    /* Float cancel and signup buttons and add an equal width */
    .cancelbtn, .signupbtn{
        float: left;
        width: 20%;
    }

    /* add padding to container elements */
    .container{
        padding: 16px;
        width: 80%;
    }

    /* clear floats */
    .clearfix::after{
        content: "";
        clear: both;
        display: table;
    }

    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
    }

    .alert_green{
        padding: 20px;
        background-color: #00cc66;
        color: white;

    }

    /* change styles for cancel button and signup button on extra small screens */
    @media screen and (max-width: 300px) {
        .cancelbtn, .signupbtn{
            width: 20%;
        }
    }

</style>


