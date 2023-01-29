<form id="RAform" action="<?=base_url()?>RA_con/addnew" method="post" style="border: 1px solid #ccc"> 
    <div class="container">
        <br><br><br><br>
        <h1>Registeration Form</h1>
        
        <p><?php echo $this->session->flashdata('status');?>
            <?php $string = validation_errors(); if(!empty($string)): ?>
            <?php echo' <div class="alert" style="width:60%; margin-left:35%">' .validation_errors(). '</div>'?>
            <?php endif; ?>
        </p>

            <table class="dropdown_menu">
                <caption>Pick the appropriate options</caption>
                <tr>
                    <td>
                        <select name="category1" required>
                            <option value="" disabled="disabled" selected="selected">Category I</option>
                            <option value="1">Niche Area</option>
                        </select>
                    </td>
                    <td>
                        <select name="category2" required>
                            <option value="" disabled="disabled" selected="selected">Category II</option>
                            <option value="1">RG (SD/MD)</option>
                            <option value="2">Full Member of RC/CoE</option>
                        </select>
                    </td>
                    <td>
                        <select name="category3">
                            <option value="" disabled="disabled" selected="">Category III</option>
                            <option value="1">Associate Member of RC/CoE</option>
                            <option value="2">RG (SD/MD)</option>
                            <option value="3">Full Member of RC/CoE</option>
                        </select>
                    </td>
                </tr>
            </table>
            <table class="sect_A">
                <caption>Section A: Applicant’s Particulars</caption>
                <tr> 
                    <td>Name:</td>
                    <td> <input type="text" placeholder="Enter Name" name="aName" required> </td>
                    <td>Staff_ID/No:</td>
                    <td> <input type="text" placeholder="Enter ID" name="aID" required> </td>
                </tr>
                <tr>
                    <td>Faculty:</td>
                    <td> <input type="text" placeholder="Enter Faculty" name="aFac" required> </td>
                    <td>Department:</td>
                    <td> <input type="text" placeholder="Enter Department" name="aDep" required> </td>
                </tr>
                <tr>
                    <td>Primary Email:</td>
                    <td> <input type="email" placeholder="Enter Primary Email" name="aEmail1" required> </td>
                    <td>Secondary Email:</td>
                    <td> <input type="email" placeholder="Enter Secondary Email" name="aEmail2"> </td>
                </tr>
                <tr>
                    <td>Office Phone No:</td>
                    <td><input type="text" placeholder="Enter Office Phone No." name="aOffHPNo"></td>
                    <td>Mobile Phone No:</td>
                    <td><input type="text" placeholder="Enter Phone No." name="aHPNo" required></td>
                </tr>
                <tr>
                    <td>Field Of Expertise:</td>
                    <td colspan="3"> <input type="text" placeholder="Enter Field" name="aFOS"> </td>
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
                    <td> <textarea rows="6" cols="30" type="text" placeholder="Enter Research Group" name="aRG" required></textarea> </td>
                    <td> <textarea rows="6" cols="30" type="text" placeholder="Remarks" name="aRemark"></textarea> </td>
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
                    <td> <textarea rows="6" cols="22" placeholder="Enter Alliance" name="aAlliance" required></textarea> </td>
                    <td> <textarea rows="6" cols="22" placeholder="Remarks" name="sectC_Remarks"></textarea> </td>
                </tr>
            </table>
            <br>
            <br>
        <div class="clearfix" style="margin-left: 35%;">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" class="singupbtn">Submit</button>
        </div>

    </div>
</form>

<style>

    h1{
        margin-left: 35%;
    }

    table{
        margin-left: 10%;
        width: 80%;
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


