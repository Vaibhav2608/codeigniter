<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?> </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3"><?php echo 'ITR Form'; ?></h4>

                <form role="form bor-rad" enctype="multipart/form-data" action="<?php echo site_url('user/form/itr_form'); ?>" method="post" onsubmit="validateData()" autocomplete="off" class="has-validation-callback">
        <div class="box-body">
          <div class="col-md-12">
          
            
           
      <div class="panel panel-default">
        <div class="panel-heading"><strong>A. Service Type</strong></div>
        <div class="panel-body" style="display: flex;
    flex-wrap: wrap;">
            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">Sr. No.*</label> <span style="color:red" id="frmnum"></span>
                                  <input type="text" autocomplete="off" name="invoice" id="invoice"  value="" class="form-control" placeholder="Sr. No." required="">
                                </div>
                              </div>
           <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">Customer Id*</label> 
                              <input type="text" autocomplete="off" name="customer_id" id="gnumber" onkeyup="checkform();" value="" class="form-control" placeholder="Customer Id" required="" onblur="checkform();">
                                </div>
                              </div>
                              
                              <div class="col-md-4 finnance" style="display:none">
                                <div class="form-group">
                                  <label for="return_type"> Return Type*</label> <span style="color:red" id="assessmentyear_msg"></span> 
                                  <select name="return_type" id="return_type" class="form-control">
                                  <option value="">Select Return Type</option>
                                  <option value="ORIGINAL ( Filing return first time for that Financial Year )">ORIGINAL ( Filing return first time for that Financial Year )</option>
                                  <option value="REVISED ( Want to make corrections in already filed return )">REVISED ( Want to make corrections in already filed return )</option>
                                  </select>
                                </div>
                              </div>
                              
                              <div class="col-md-4 finnace_reason" style="display:none">
                                <div class="form-group">
                                  <label for="return_type_reason"> Reason*</label> <span style="color:red" id="assessmentyear_msg"></span> 
                                  <input type="text" autocomplete="off" name="return_type_reason" id="return_type_reason" value="" class="form-control" placeholder="Reason">
                                </div>
                              </div>
                              
                              </div>
      </div>
           
      <div class="panel panel-default">
        <div class="panel-heading"><strong>B. Income Tax eFilling Website Password</strong></div>
                          
                          <div class="panel-body">
      
                              <div class="col-md-6">
                              <div class="form-group">
                              <label for="eitrpassword">Do you have IT Return Password?</label><br>
                              <span style="color:red" id="eitrpassword_msg"></span>
                                 <select class="form-control" name="it_password" id="it_password" required="">
                                  <option value="">Do you have IT Password?</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                  <option value="First Time">First Time</option>
                                 </select>
                              </div>
                            </div>
                              
                          <div class="col-md-6" style="display:none" id="password_area">
                              <div class="form-group">
                              <label for="eitrpassword">Password of Income Tax eFilling Website* (case sensitive) Active account </label><br>
                              <span style="color:red" id="eitrpassword_msg"></span>
                                 <input type="text" autocomplete="off" name="eitrpassword" id="eitrpassword" class="form-control" value="" placeholder="Password">
                              </div>
                            </div>
                          </div>
                            </div>  
                              
      <div class="panel panel-default">
        <div class="panel-heading"><strong>C. Personal Information</strong></div>
        <div class="panel-body" style="display: flex;
    flex-wrap: wrap;">      
                              
                                                      
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="firstname">First Name</label> <span style="color:red" id="firstname_msg"></span>
                              <input type="text" autocomplete="off" name="firstname" id="firstname" value="" class="form-control" placeholder="First Name" >
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="middlename">Middle Name</label> <span style="color:red" id="middlename_msg"></span>
                              <input type="text" autocomplete="off" name="middlename" id="middlename" value="" class="form-control" placeholder="Middle Name">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="lastname">Last Name*</label> <span style="color:red" id="lastname_msg"></span>
                              <input type="text" autocomplete="off" required="" name="lastname" id="lastname" value="" class="form-control" placeholder="Last Name">
                                </div>
                              </div>
                               
                               
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="pan">PAN Number*</label> <span style="color:red" id="pan_msg"></span>
                                  <input type="text" autocomplete="off" name="pan" id="pan" maxlength="10" value="" class="form-control" placeholder="PAN Number of the " required="" onkeypress="false;" onpaste="false">
                                </div>
                              </div> 
                           
                                
                                <div class="col-md-4">
                                <div class="form-group">
                                  <label for="gender"> Gender*</label> <span style="color:red" id="gender_msg"></span>
                                  <select required="" id="gender" name="gender" class="form-control">
                                  <option value="">Select Gender</option> 
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>      
                                   
                                  </select>
                                </div>
                              </div>
                              
                           
                               <div class="col-md-4">
                                <div class="form-group">
                                  <label for="dob">Date of Birth*</label> <span style="color:red" id="dob_msg"></span>
                                  <input type="date" required="" name="dob" id="dob" value="" class="form-control" placeholder="Date of Birth">
                                </div>
                              </div>
                           
                             <div class="col-md-4">
                                <div class="form-group">
                                  <label for="fathername">Father Full Name*</label> <span style="color:red" id="fathername_msg"></span>
                              <input type="text" autocomplete="off" required="" name="fathername" id="fathername" value="" class="form-control" placeholder="Father Full Name">
                                </div>
                              </div>
                           
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="flatdoorbuilding">Flat/ Door/ Building(<strong>As Per Aadhar Card</strong>)*</label> <span style="color:red" id="flatdoorbuilding_msg"></span>
                              <input type="text" autocomplete="off" required="" name="flatdoorbuilding" id="flatdoorbuilding" value="" class="form-control" placeholder="Flat/ Door/ Building">
                                </div>
                              </div>
                           
                                 <div class="col-md-4">
                                <div class="form-group">
                                  <label for="nameofpremises">Name of Premises / Building / Village(<strong>As Per Aadhar Card</strong>)*</label> <span style="color:red" id="nameofpremises_msg"></span>
                              <input type="text" autocomplete="off" required="" name="nameofpremises" id="nameofpremises" value="" class="form-control" placeholder="Name of Premises / Building / Village">
                                </div>
                              </div>
                           
                                <div class="col-md-4">
                                <div class="form-group">
                                  <label for="street">Road / Street(<strong>As Per Aadhar Card</strong>)* </label> <span style="color:red" id="street_msg"></span>
                              <input type="text" autocomplete="off" required="" name="street" id="street" value="" class="form-control" placeholder="Road / Street">
                                </div>
                              </div>
                           
                               <div class="col-md-4">
                                <div class="form-group">
                                  <label for="locality">Area / Locality(<strong>As Per Aadhar Card</strong>)* </label> <span style="color:red" id="locality_msg"></span>
                              <input type="text" autocomplete="off" required="" name="locality" id="locality" value="" class="form-control" placeholder="Area / Locality">
                                </div>
                              </div>
                           
                               <div class="col-md-4">
                                <div class="form-group">
                                  <label for="town">Town/ city/District(<strong>As Per Aadhar Card</strong>)* </label> <span style="color:red" id="town_msg"></span>
                              <input type="text" autocomplete="off" required="" name="town" id="town" value="" class="form-control" placeholder="Town/ city/District">
                                </div>
                              </div>
                            
                               <div class="col-md-4">
                                <div class="form-group">
                                 <label for="state">State(<strong>As Per Aadhar Card</strong>)*</label> <span style="color:red" id="state_msg"></span>
                               
                               <input class="form-control" required="" type="text" name="state" id="state" value="" placeholder="State">  
                               
                               </div>
                              </div>
                           
                           
                                <div class="col-md-4" style="display:none">
                                <div class="form-group">
                                  <label for="country">Country(<strong>As Per Aadhar Card</strong>)* </label> <span style="color:red" id="country_msg"></span>
                              <input type="text" autocomplete="off" name="country" id="country" value="" class="form-control" placeholder="Country" data-validation-suggestion-nr="1">
                                </div>
                              </div>
                           
                               <div class="col-md-4">
                                <div class="form-group">
                                  <label for="pincode">Pincode(<strong>As Per Aadhar Card</strong>)* </label> <span style="color:red" id="pincode_msg"></span>
                              <input type="text" autocomplete="off" maxlength="6" required="" name="pincode" id="pincode" value="" class="form-control" placeholder="Pincode">
                                </div>
                              </div>
                               
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="email">Email*</label> <span style="color:red" id="email_msg"></span>
                              <input type="email" autocomplete="off" required="" name="email" id="email" value="" class="form-control" placeholder="Email">
                                </div>
                              </div>
                           
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="mobileno">Mobile No*:</label> <span style="color:red" id="mobileno_msg"></span>
                                  <input type="text" autocomplete="off" maxlength="10" name="mobileno" id="mobileno" required="" value="" class="form-control" placeholder="Mobile Number">
                                </div>
                              </div>
                               
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="aadhaarno">Aadhaar No</label> <span style="color:red" id="aadhaarno_msg"></span>
                              <input type="text" autocomplete="off" maxlength="12" id="aadhaarno" name="aadhaarno" value="" class="form-control" placeholder="Aadhaar No">
                                </div>
                              </div> 
                               
                               
                              <div class="col-md-4">
                              <div class="form-group">
                              <label for="eitrpassword">Do you have passport?</label><br>
                              <span style="color:red"></span>
                                 <select class="form-control" name="passport" id="passport">
                                  <option value="">Please select</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                 </select>
                              </div>
                  </div>
                              
                  <div class="col-md-4" style="display:none" id="passport_area">
                              <div class="form-group">
                              <label for="eitrpassword">Passport Number</label><br>
                              <span style="color:red"></span>
                                 <input type="text" autocomplete="off" name="passport_number" id="passport_number" class="form-control" value="" placeholder="Passport Number">
                              </div>
                  </div>   
                               
                              <input type="hidden" name="enrollid" value="1" class="form-control" placeholder="Aadhaar or Enrollment ID">
                               
                          <!--   
                               <div class="col-md-4">
                                <div class="form-group">
                                  <label for="enrolltimestap">Enrollment No TimeStamp</label> <span style="color:red" id="enrolltimestap_msg"></span>
                              <input type="text"  id="enrolltimestap"  name="enrolltimestap" value="" class="form-control" placeholder="Enrollment No TimeStamp">
                                </div>
                              </div>
                                   
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="passport">Passport No  </label> <span style="color:red" id="passport_msg"></span>
                              <input type="text"  maxlength="9"   name="passport" id="passport" value="" class="form-control" placeholder="Passport No">
                                </div>
                              </div>
                           
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="altmobileno">Alternate Mobile No</label> <span style="color:red" id="altmobileno_msg"></span>
                                  <input type="text" maxlength="10" name="altmobileno" id="altmobileno"  pattern="[7-9]{1}[0-9]{9}" value="" class="form-control" placeholder="Alternate Mobile No">
                                </div>
                              </div>
                              
                              -->
                               
                      </div>
                              </div>     
                            
      <div class="panel panel-default">
        <div class="panel-heading"><strong>D. ITR Information</strong></div>
                          
              <div class="panel-body" style="display: flex;
    flex-wrap: wrap;">
      
                  
                              
                  <div class="col-md-3">
                                <div class="form-group">
                                  <label for="mobileno">Amount to be Shown*:</label> <span style="color:red" id="mobileno_msg"></span>
                                  <input type="text" autocomplete="off" name="amount_shown" id="amount_shown" required="" value="" class="form-control" placeholder="Amount to be Shown">
                                </div>
                              </div>
                              
                  <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">Nature of Business*</label> <span style="color:red" id="frmnum"></span>
                                  <input type="text" autocomplete="off" name="nature_of_business" id="nature_of_business" onkeyup="checkform();" value="" class="form-control" placeholder="Nature of Business" onblur="checkform();" required="">
                                </div>
                              </div>
                              
                  <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">GSTIN (Mandatory If registered under GST)</label> <span style="color:red" id="frmnum"></span>
                                  <input type="text" autocomplete="off" name="gstin" id="gstin" value="" class="form-control" placeholder="GSTIN (Mandatory If registered under GST)">
                                </div>
                              </div>
                  
              
                  
                  <div class="col-md-12">
                              <div class="form-group">
                              <label for="eitrpassword">Have you deposited amount or aggregate of amounts exceeding Rs.1 Crore in one or more current account the year?*</label><br>
                              <span style="color:red"></span>
                                 <select required="" class="form-control" name="deposited" id="deposited">
                                  <option value="">Please select</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                 </select>
                              </div>
                  </div>
                              
                  <div class="col-md-6" style="display:none" id="deposited_area">
                              <div class="form-group">
                              <label for="eitrpassword">Amount</label><br>
                              <span style="color:red"></span>
                                 <input type="text" autocomplete="off" name="deposited_amount" id="deposited_amount" class="form-control" value="" placeholder="Deposited Amount">
                              </div>
                  </div>
                  
                  
                  <div class="col-md-12">
                              <div class="form-group">
                              <label for="eitrpassword">Have you incurred expenditure of an amount or aggregate of amount exceeding  Rs.2 lakhs for travel to a foreign country for yourself or for any other person?*</label><br>
                              <span style="color:red"></span>
                                 <select required="" class="form-control" name="expenditure" id="expenditure">
                                  <option value="">Please select</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                 </select>
                              </div>
                  </div>
                              
                  <div class="col-md-6" style="display:none" id="expenditure_area">
                              <div class="form-group">
                              <label for="eitrpassword">Amount</label><br>
                              <span style="color:red"></span>
                                 <input type="text" autocomplete="off" name="expenditure_amount" id="expenditure_amount" class="form-control" value="" placeholder="Expenditure Amount">
                              </div>
                  </div>
                  
                  
                  <div class="col-md-12">
                              <div class="form-group">
                              <label for="eitrpassword">Have you incurred expenditure of amount or aggregate of amount exceeding  Rs.1 lakh on consumption of electricity during the previous year ?*</label><br>
                              <span style="color:red"></span>
                                 <select required="" class="form-control" name="expenditure1" id="expenditure1">
                                  <option value="">Please select</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                 </select>
                              </div>
                  </div>
                              
                  <div class="col-md-6" style="display:none" id="expenditure1_area">
                              <div class="form-group">
                              <label for="eitrpassword">Amount</label><br>
                              <span style="color:red"></span>
                                 <input type="text" autocomplete="off" name="expenditure1_amount" id="expenditure1_amount" class="form-control" value="" placeholder="Expenditure Amount">
                              </div>
                  </div>
                  
                  <div class="col-md-6">
                                <div class="form-group">
                                  <label for="comment">Comment:</label> <span style="color:red" id="mobileno_msg"></span>
                                  <textarea id="comment" name="comment" placeholder="Comment" class="form-control"></textarea>
                                </div>
                              </div>
                  
              </div>
      </div>  
      
      <div class="panel panel-default">
        <div class="panel-heading"><strong>E. Bank Details</strong></div>
        <div class="panel-body">
              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="Bank1Name">Name of the Bank</label> <span style="color:red" id="Bank1Name_msg"></span>
                              <input type="text" autocomplete="off" required="" name="Bank1Name" id="Bank1Name" value="" class="form-control" placeholder="Name of the Bank 1*">
                          <!--  <br>
                              <span style="color:red" id="Bank2Name_msg"></span>
                               <input type="text"  name="Bank2Name" id="Bank2Name" value="" class="form-control" placeholder="Name of the Bank 2">
                              <br>
                              <span style="color:red" id="Bank3Name_msg"></span>
                               <input type="text"   name="Bank3Name" id="Bank3Name" value="" class="form-control" placeholder="Name of the Bank 3"> -->
                                                         
                              </div>
                              </div>
                  <div class="col-md-12">
                                <div class="form-group">
                              <label for="Bank1IFSC">IFSC Code</label> <span style="color:red" id="Bank1IFSC_msg"></span>
                              <input type="text" autocomplete="off" required="" maxlength="11" name="Bank1IFSC" id="Bank1IFSC" value="" class="form-control" placeholder="IFSC Code 1*">
                          <!--  <br>
                              <span style="color:red" id="Bank2IFSC_msg"></span>
                              <input type="text" maxlength="11" name="Bank2IFSC"  id="Bank2IFSC" value="" class="form-control" placeholder="IFSC Code 2">
                              <br>
                              <span style="color:red" id="Bank3IFSC_msg"></span>
                              <input type="text" maxlength="11" name="Bank3IFSC" id="Bank3IFSC" value="" class="form-control" placeholder="IFSC Code 3"> -->
                                </div>
                              </div>        
                  <div class="col-md-12">
                                <div class="form-group">
                                  <label for="Bank1AccountNo">Account Number</label> <span style="color:red" id="Bank1AccountNo_msg"></span>
                              <input type="text" autocomplete="off" required="" maxlength="25" name="Bank1AccountNo" id="Bank1AccountNo" value="" class="form-control" placeholder="Account Number 1*">
                          <!--  <br>
                              <span style="color:red" id="Bank2AccountNo_msg"></span>
                              <input type="text" maxlength="15" name="Bank2AccountNo" id="Bank2AccountNo" value="" class="form-control" placeholder="Account Number 2">
                              <br>
                              <span style="color:red" id="Bank3AccountNo_msg"></span>
                              <input type="text" maxlength="15" name="Bank3AccountNo" id="Bank3AccountNo" value="" class="form-control" placeholder="Account Number 3"> -->
                                </div>
                              </div>        
                 <div class="col-md-12">
                                <div class="form-group">
                                  <label for="Bank1AccountType">Account Type</label> <span style="color:red" id="Bank1AccountType_msg"></span>
                                   <select required="" name="Bank1AccountType" id="Bank1AccountType" class="form-control">
                                  <option value="">Account Type</option> 
                                  <option selected="" value=""></option>
                                  <option value="Saving">Saving</option>
                                  <option value="Current">Current</option>      
                                  </select><br>
                              <!--  <span style="color:red" id="Bank2AccountType_msg"></span>
                                  <select   name="Bank2AccountType" id="Bank2AccountType"  class="form-control">
                                  <option  value="">Account Type</option> 
                                  <option selected value=""></option>
                                  <option value="Saving">Saving</option>
                                  <option value="Current">Current</option>      
                                  </select><br>
                                  <span style="color:red" id="Bank3AccountType_msg"></span>
                                  <select   name="Bank3AccountType"  id="Bank3AccountType" class="form-control">
                                  <option  value="">Account Type</option> 
                                  <option selected value=""></option>
                                  <option value="Saving">Saving</option>
                                  <option value="Current">Current</option>      
                                   
                                  </select> -->
                                  
                                </div>
                              </div>
              
          </div>
       </div>  
              </div>
          
       <div class="panel panel-default">
        <div class="panel-heading"><strong>F. Required Document</strong></div>
        <div class="panel-body">
            
            <p><b>SALARIED</b></p>
            <ul>
                <li>Salary Slip / Form 16</li>
                <li>Bank Statement</li>
                <li>Pancard</li>
                <li>Aadhar Card</li>
            </ul>
              
          <p><b>BUSINESS</b></p>
            <ul>
                <li>Bank Statement</li>
                <li>Pancard</li>
                <li>Aadhar Card</li>
                <li>Investments, if any</li>
                
            </ul>
            
            <p><b>ITR 5 &amp; ITR 6</b></p>
            <ul>
                <li>PAN</li>
                <li>Aadhar card</li>
                <li>Bank Statement</li>
                <li>Partnership deed for Partnership Firm // Incorporation Certificate for Company</li>
                <li>Any other Income or Deduction like LIC etc</li>
                <li>DSC, incase of Company</li>
                
            </ul>
              
            <p>Attach appropiate Document zip</p>
            <table id="employee_table" width="100%">
                             <tbody><tr id="row1">
                              <td>
                              <div class="col-md-5">
                              
                                <div class="fileUpload btn btn-success ">
                                  <label for="">Choose File:</label> <span style="color:red" id="partnershippancardlist1_msg"></span>
                                  <input type="file" id="partnershippancardlist1" class="" name="partnershippancardlist1" value="" accept="zip/*">
                                </div>
                              </div>
                                   
          </td>
                               
                              
                             </tr>
                            </tbody></table>
                            
          <br>
                                     
      
                               
          </div></div>
              <br><br>  <br><br>   
                      <div class="box-footer sub-btn-wdt">
                <input class="form-control btn btn-success wdt-bg" type="submit" id="btnSubmit" value="Submit" />
              </div>
                    
             </div></form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        
        $(document).on('change', '#it_password', function(){
          
          if($(this).val() === 'Yes'){
            $('#password_area').show();
          }else{
            $('#password_area').hide();
          }
        });
        $(document).on('change', '#passport', function(){
          if($(this).val() === 'Yes'){
            $('#passport_area').show();
          }else{
            $('#passport_area').hide();
          }
        });
        $(document).on('change', '#deposited',function(){
          if($(this).val() === 'Yes'){
            $('#deposited_area').show();
          }else{
            $('#deposited_area').hide();
          }
        });
        $(document).on('change', '#expenditure',function(){
          if($(this).val() === 'Yes'){
            $('#expenditure_area').show();
          }else{
            $('#expenditure_area').hide();
          }
        });
        $(document).on('change', '#expenditure1',function(){
          if($(this).val() === 'Yes'){
            $('#expenditure1_area').show();
          }else{
            $('#expenditure1_area').hide();
          }
        });

    }); 
</script>