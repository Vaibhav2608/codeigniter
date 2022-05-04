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

                <h4 class="header-title mb-3">GST Form</h4>

                <form id="uploadForm" enctype="multipart/form-data" action="<?php echo site_url('user/form/gst_form'); ?>" method="post" class="has-validation-callback">
  <div class="box-body">
    <div class="row">
   
  <input type="hidden" name="skupdatedate" value="2022-04-27" class="form-control"> 
      <div class="col-md-4">
              <div class="form-group">
                <label for="invoice">Sr. No.*</label> <span style="color:red" id="frmnum"></span>
              <input type="text"  name="invoice" id="invoice" value="" class="form-control" placeholder="Sr. No.*" style="border-radius: 5px;">
              </div>
            </div>
            
        <div class="col-md-4">
              <div class="form-group">
                <label for="gnumber">Customer Id*</label>
              <input type="text"   name="startid" id="gnumber" value="" class="form-control" placeholder="Customer Id" style="border-radius: 5px;">
              </div>
            </div>    
  
            <div class="col-md-4">
              <div class="form-group">
                <label for="gstnreg_name">GSTIN Name*</label>
              <input type="text"   id="gstnreg_name" name="gstnreg_name" value="" class="form-control" placeholder="GSTIN Name" style="border-radius: 5px;">
              </div>
            </div>
  
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Name of Business*</label>
              <input type="text"   id="CompanyName" name="CompanyName" value="" class="form-control" placeholder="Name of Company" style="border-radius: 5px;">
              </div>
            </div>
            
                        
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Name of Person*</label>
              <input type="text"   id="CompanyPerson" name="CompanyPerson" value="" class="form-control" placeholder="Name of Person" style="border-radius: 5px;">
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">              
              <label for="">PanCard*</label>
                <input type="text" id="pancardno"  onpaste="return false" name="pancardno" value="" class="form-control" placeholder="PanCard" style="border-radius: 5px;">
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="">State*</label>
                <input type="text" id="State"   name="State" value="" class="form-control" placeholder="PanCard" style="border-radius: 5px;">
                <!-- <select  id="State" name="State"  required class="form-control" style="border-radius: 5px;">  <option selected value=""></option><option value="Andaman">Andaman</option><option value="Andhra Pradesh">Andhra Pradesh</option><option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option><option value="Bihar">Bihar</option><option value="Chhattisgarh">Chhattisgarh</option><option value="Chandigarh">Chandigarh</option><option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option><option value="Daman and Diu">Daman and Diu</option><option value="Delhi">Delhi</option><option value="Goa">Goa</option><option value="Gujarat">Gujarat</option><option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option><option value="Jammu and Kashmir">Jammu and Kashmir</option><option value="Jharkhand">Jharkhand</option><option value="Karnataka">Karnataka</option><option value="Kerala">Kerala</option><option value="Madhya Pradesh">Madhya Pradesh</option><option value="Maharashtra">Maharashtra</option><option value="Manipur">Manipur</option><option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option><option value="Nagaland">Nagaland</option><option value="Orissa">Orissa</option><option value="Puducherry">Puducherry</option><option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option><option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option><option value="Telangana">Telangana</option><option value="Tripura">Tripura</option><option value="Uttar Pradesh">Uttar Pradesh</option><option value="Uttarakhand">Uttarakhand</option><option value="West Bengal">West Bengal</option></select> -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Mobile No*:</label>
                <input type="text" id="ContactNo" name="ContactNo"   value="" class="form-control" placeholder="Contact Number" style="border-radius: 5px;">
              </div>
            </div>
             <input type="hidden" name="AlternateNo" value="1" class="form-control">
             
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Email ID*</label>
              <input type="email" id="PrimaryEmailId" name="PrimaryEmailId"   value="" class="form-control" placeholder="Primary Email ID" style="border-radius: 5px;">
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="">District*</label>
                <input type="text" id="District" name="District" value="" class="form-control" placeholder="District" style="border-radius: 5px;" >
              </div>
            </div>
            
            <div class="col-md-4 both hide_div">
              <div class="form-group">
                <label for="">GSTIN*</label>
              <input type="text" id="gstin" name="gst_number" value="" class="form-control" placeholder="GSTIN" style="border-radius: 5px;">
              </div>
            </div>
            
            <div class="col-md-4 both hide_div">
              <div class="form-group">
                <label for="">GST Username*</label>
              <input type="text" id="gst_username" name="gst_username" value="" class="form-control" placeholder="GST Username" style="border-radius: 5px;">
              </div>
            </div>
            
            <div class="col-md-4 both hide_div">
              <div class="form-group">
                <label for="">GST Password*</label>
              <input type="text" id="gst_password" name="gst_password" value="" class="form-control" placeholder="GST Password" style="border-radius: 5px;">
              </div>
            </div>
            
              <input type="hidden" name="OtherMention" value="1" class="form-control" placeholder="If any other please mention type">
            <div class="col-md-4 for_gstin" style="display: block;">
              <div class="form-group">              
              <label for="">Company Address*</label>
                <input type="text" id="Address" name="Address" value="" class="form-control" placeholder="Company Address" style="border-radius: 5px;">
              </div>
            </div>
            <!--
            <div class="col-md-6">
              <div class="form-group">
                <label for="">City:</label>
                <input type="text" id="City" name="City" value="" class="form-control" placeholder="City">
              </div>
            </div>
            -->
            <div class="col-md-4 for_gstin" style="display: block;">
              <div class="form-group">
                <label for="">Pin Number*</label>
                <input type="text" id="PinCode" name="PinCode" value="" class="form-control" placeholder="Pin Number" style="border-radius: 5px;">
              </div>
            </div>
            
            <div class="col-md-3 for_gstin" style="display: block;">
              <div class="form-group">
                <label for="">Date of Commencement of Business*</label>
              <input type="date" id="dCommencement" name="dCommencement" value="" class="form-control" placeholder="Date of Commencement of Business" style="border-radius: 5px;">
              </div>
            </div>
            <!--
              <div class="col-md-3">
              <div class="form-group">
                <label for="">HSN/SAC applicable</label>
              <input type="text" name="hsnsac"   value="" class="form-control" placeholder="HSN/SAC applicable">
              </div>
            </div>
            -->
            <div class="col-md-3 for_gstin" style="display: block;">
              <div class="form-group">
                <label for="">Composite scheme* <strong><span id="show_notice" data-toggle="modal" data-target="#myModal" style="color: #f76b2e;"> WHO CAN APPLY ?</span></strong></label>
              <input type="text" id="compositescheme" name="compositescheme" value="" class="form-control" placeholder="Yes/No" style="border-radius: 5px;" >
              </div>
            </div>
            
            <!-- <div class="col-md-3">
              <div class="form-group">
                <label for="">State Jurisdiction</label>
              <input type="text" name="jurisdiction"   value="" class="form-control" placeholder="State jurisdiction">
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="form-group">
                <label for="">Commissionerate Code</label>
              <input type="text" name="commissionerate"   value="" class="form-control" placeholder="Commissionerate Code">
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="form-group">
                <label for="">Division Code</label>
              <input type="text" name="divisioncode"   value="" class="form-control" placeholder="Division Code">
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="form-group">
                <label for="">Range Code</label>
              <input type="text" name="rangecode"   value="" class="form-control" placeholder="Range Code">
              </div>
            </div>
            -->
             <input type="hidden" name="AlternateEmailId" value="1" class="form-control">
             <input type="hidden" name="WebsiteAddress" value="1" class="form-control">
              <input type="hidden" name="TypeOfOrganisation" value="1" class="form-control">
             
              
             
            <div class="col-md-12">
              <div class="form-group">
                <label id="label_msg"><strong>Company Overview</strong> : Mention your type of Business like Trader, Manufacture, Distributor etc. and the industry*</label>
           <textarea   type="text" id="CompanyOverview" name="CompanyOverview" value="" class="form-control" placeholder="Name" style="border-radius: 5px;"></textarea>
              
              </div>
            </div>
            
           <div class="col-md-12 for_gstin" style="display: block;">
                  <div class="form-group">
                    <label for="status"> Type of Organization and Document Required*</label> 
                    <select id="enterprisebox1" name="OrganisationTypeDocuments" class="form-control"  style="border-radius: 5px;">
              
              <option value="">Please Select</option>
                  <option value="proprietor">Proprietorship</option>                  
                  <option value="partnership">Partnership Firm</option>
                  <option value="company">Company</option>
                    </select>
                  </div>
                </div>

    
    
<!--      <div class="hide_div">
      <div class="col-md-4">
               <label for="">Document 1</label>
              <div class=" fileUpload btn btn-success wdt-bg">
                <label for="">Choose File:</label>
                <input onchange="check_size_extention('consent_latter');" id="consent_latter" type="file" class="" name="consent_latter" value="" accept="image/*" style="border-radius: 5px;">
              </div>
            </div>
            
            <div class="col-md-4">
               <label for=""> Document 2</label>
              <div class=" fileUpload btn btn-success wdt-bg">
                <label for="">Choose File:</label>
                <input onchange="check_size_extention('electricity_bill');" id="electricity_bill" type="file" class="" name="electricity_bill" value="" accept="image/*">
              </div>
            </div>
            
     </div> 
     -->
     <div class="docs_for_gstin" id="proprietorid" name="proprietorid" style="display:none">
     
      <!--
              <div class="col-md-3">
             <label for=""> Shop Establishment Certificate:</label>
              <div  class=" fileUpload btn btn-success wdt-bg">
                <label for="">Choose File:</label>
                <input onchange="check_size_extention('ShopEstablishment');" id="ShopEstablishment" type="file" value="" class="" name="ShopEstablishment" accept="image/*">
              </div>
            </div>   
      -->
        <div class="col-md-4">
             <label for=""> PanCard Attachment:</label>
              <div class=" fileUpload btn btn-success wdt-bg bg_col">
                <!-- <label for="">Choose File:</label> -->
                <input  id="Pancardproprietorship" type="file" class="" name="Pancardproprietorship" value="" accept="image/*" >  
              </div>
            </div>  
         
             
            <div class="col-md-4">
               <label for=""> AadharCard (front and back):</label>
              <div class=" fileUpload btn btn-success wdt-bg bg_col">
                <!-- <label for="">Choose File:</label> -->
                <input  id="Aadharcardproprietorship" type="file" class="" name="Aadharcardproprietorship" value="" accept="image/*" >
              </div>
            </div>    
                  <div class="col-md-4">
             <label for="">Photograph Attachment:</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
                <!-- <label for="">Choose File:</label> -->
                <input id="Photographproprietorship" type="file" class="" name="Photographproprietorship" value="" accept="image/*" >
              </div>
            </div>  
                  
            
     <div class="col-md-4 bg_col1">
       <label for="">  Shop address Proof (Rent agreement / Consent letter):</label>
          <div class=" fileUpload btn btn-success wdt-bg bg_col">
             <!-- <label for="">Choose File:</label> -->
          <input id="ShopaddressProof" type="file" class="" name="ShopaddressProof" value="" accept="image/*" >
           </div>
     </div>  
            
    <div class="col-md-4 bg_col1">
             <label for="">  Shop address Proof (Latest electricity bill):</label>
              <div class=" fileUpload btn btn-success wdt-bg bg_col">
                <!-- <label for="">Choose File:</label> -->
                <input id="existingregistrationcert" type="file" class="" name="existingregistrationcert" value="" accept="image/*" >
              </div>
            </div>          
        <!--    
     <div class="col-md-4 bg_col1">
             <label for="">  Cancelled Cheque of shop Account:</label>
              <div  class=" fileUpload btn btn-success wdt-bg bg_col">
               <!--  <label for="">Choose File:</label> -->
          <!--      <input onchange="check_size_extention('CancelledChequeofshopAccount');" id="CancelledChequeofshopAccount" type="file" class="" name="CancelledChequeofshopAccount" value="" accept="image/*">
              </div>
            </div>  -->
            
      
      
     </div>
                 
          
     <div class="docs_for_gstin" id="partnershipid" style="display:none">
            
            
             
            
            <div class="col-md-4 bg_col1">
             <label for="">PAN Card of Firm:</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
                <!-- <label for="">Choose File:</label> -->
                <input id="PancardFirmpartnership" type="file" class="" name="PancardFirmpartnership" value="" accept="image/*" >
              </div>
            </div>  
            
              <div class="col-md-4 bg_col1">
             <label for="">Partnership Deed:</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
               <!--  <label for="">Choose File:</label> -->
                <input id="PartnershipDeed" type="file" class="" name="PartnershipDeed" value="" accept="image/*" >
              </div>
            </div>  
            
            <div class="col-md-4 bg_col1">
             <label for="">Firm address Proof: (Rent agreement / Consent letter)</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
                <!-- <label for="">Choose File:</label> -->
                <input id="FirmaddressProof" type="file" class="" name="FirmaddressProof" value="" accept="image/*" >
              </div>
            </div>  
            
            <div class="col-md-4 bg_col1">
              <label for="">Firm address Proof: (latest Electricity bill)</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
            <!--     <label for="">Choose File:</label> -->
                <input id="CancelledChequeofFirmAccount" type="file" class="" name="CancelledChequeofFirmAccount" value="" accept="image/*" >
              </div>
            </div>  
          <div class="col-md-4 bg_col1">
             <label for="">Authorisation letter:</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
               <!--  <label for="">Choose File:</label> -->
                <input id="AuthorisedSignatoryPartnership" type="file" class="" name="AuthorisedSignatoryPartnership" value="" accept="image/*" >
              </div>
            </div>  
        <!--  <div  class="col-md-4 bg_col1">
             <label for="">Cancelled Cheque of Firm Account:</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
             <!--    <label for="">Choose File:</label> -->
          <!--      <input onchange="check_size_extention('DSCofAuthorisedSignatoryPartnership');" id="DSCofAuthorisedSignatoryPartnership" type="file"   class="" name="DSCofAuthorisedSignatoryPartnership" value="" accept="image/*">
              </div>
            </div>  -->
          
        <!--  
           <div class="col-md-3">
             <label for="">  Existing registration certificate (TIN, VAT, Service tax etc):</label>
              <div  class=" fileUpload btn btn-success wdt-bg">
                <label for="">Choose File:</label>
                <input onchange="check_size_extention('existingregistrationcert1');" id="existingregistrationcert1" type="file" class="" name="existingregistrationcert1" value="" accept="image/*">
              </div>
            </div>  
          --> 
          
                  
           
            
            <div class="col-md-4 bg_col1">
             <label for="">PAN Partners</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col ">
                <!-- <label for="">Choose File:</label> -->
                <input id="partnershippancardlist" type="file" class="" name="partnershippancardlist" value="" accept="image/*" >
              </div>
            </div>
  
      
            <div class="col-md-4 bg_col1">
             <label for="">Aadhar Partners</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
                <!-- <label for="">Choose File:</label> -->
                <input id="partnershipaadharcardlist" type="file" class="" name="partnershipaadharcardlist" value="" accept="image/*" >
              </div>
            </div>  
            
    
            <div class="col-md-4 bg_col1">
             <label for="">Photograph Partners</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
               <!--  <label for="">Choose File:</label> -->
                <input id="partnershipphotographcardlist" type="file" class="" name="partnershipphotographcardlist" value="" accept="image/*" >
              </div>
            </div>  
          
             
            
             <div style="display:none" id="addmore"><input type="button" class="form-control" onclick="add_row();" value="ADD ROW"></div>
            
             
          
          
                             
          
          
         </div>   


    <div class="docs_for_gstin" id="companyid" style="display:none">
            
            
             
            
            <div class="col-md-4 bg_col1">
             <label for="">PAN Card of Company:</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
          <!--      <label for="">Choose File:</label> -->
                <input id="PANCardofCompany" type="file" class="" name="PANCardofCompany" value="" accept="image/*" >
              </div>
            </div>  
            
              <div class="col-md-4 bg_col1">
             <label for="">Certificate of Incorporation of Company:</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
              <!--   <label for="">Choose File:</label> -->
                <input id="CertificateofIncorporationofCompany" type="file" class="" name="CertificateofIncorporationofCompany" value="" accept="image/*" >
              </div>
            </div>  
            
            <div class="col-md-4 bg_col1">
             <label for="">Company address Proof : (Rent Agreement / Consent letter)</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
                <!-- <label for="">Choose File:</label> -->
                <input id="CompanyaddressProof" type="file" class="" name="CompanyaddressProof" value="" accept="image/*" >
              </div>
            </div>  
            
            <div class="col-md-4 bg_col1">
              <label for="">Company address Proof: (latest Electricity bill)</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
               <!--  <label for="">Choose File:</label> -->
                <input id="CancelledChequeofCompanyAccount" type="file" class="" name="CancelledChequeofCompanyAccount" value="" accept="image/*" >
              </div>
            </div>  


          <div class="col-md-4 bg_col1">
             <label for="">Authorisation letter :</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
                <!-- <label for="">Choose File:</label> -->
                <input id="CompanyAuthorisedSignatory" type="file" class="" name="CompanyAuthorisedSignatory" value="" accept="image/*" >
              </div>
            </div>  


          <div class="col-md-4 bg_col1">
             <label for="">DSC of Authorised Signatory :</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
                <!-- <label for="">Choose File:</label> -->
                <input id="CompanyDSCofAuthorisedSignatory" type="file" class="" name="CompanyDSCofAuthorisedSignatory" value="" accept="image/*" >
              </div>
            </div>  
          
        <!--   <div class="col-md-4 bg_col1">
            <label for="">Cancelled Cheque of Company Account  :</label>
              <div  class=" fileUpload btn btn-success wdt-bg bg_col">
               <!--  <label for="">Choose File:</label> -->
             <!--   <input onchange="check_size_extention('existingregistrationcert2');" id="existingregistrationcert2" type="file" class="" name="existingregistrationcert2" value="" accept="image/*">
              </div>
            </div>  -->
          
                  <!--  <table id="employee_table2" width="100%" >
             <tr id="row1">
            <td> -->
            <div class="col-md-4 bg_col1">
             <label for="">PAN Directors</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
                <!-- <label for="">Choose File:</label> -->
                <input id="companypancardlist" type="file" class="" name="companypancardlist" value="" accept="image/*" >
              </div>
            </div>
  <!-- </td>
    <td> -->  
            <div class="col-md-4 bg_col1">
             <label for="">Aadhar Directors</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
               <!--  <label for="">Choose File:</label> -->
                <input id="companyaadharcardlist" type="file" class="" name="companyaadharcardlist" value="" accept="image/*" >
              </div>
            </div>  
            
   <!--  <td> -->
            <div class="col-md-4 bg_col1">
             <label for="">Photograph Directors</label>
              <div class="fileUpload btn btn-success wdt-bg bg_col">
               <!--  <label for="">Choose File:</label> -->
                <input id="companyphotographcardlist" type="file" class="" name="companyphotographcardlist" value="" accept="image/*" >
              </div>
            </div>  
          <!--  </td> -->
             
          <!--  <td> -->
             <div style="display:none" id="addmore2"><input type="button" class="form-control" onclick="add_row2();" value="ADD ROW"></div>
            <!-- </td>
             </tr> -->
            
          
         </div>       

         
        </div>
    
    <br><br>  <br><br>   
          <div class="box-footer sub-btn-wdt">
          <!-- <button type="submit" name="submit" value="submit" onclick="checkval()" class="btn btn-success wdt-bg">Submit</button> -->
          <button type="submit" name="submit" value="submit" onclick="checkval()" class="btn btn-success"><span>Submit</span> </button>
        </div>
              
     </div></form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>

<script>
$(document).ready(function(){
    $(document).on('change','#enterprisebox1', function(){
      if($(this).val()==='proprietor'){
        $('#proprietorid').show();
        $("#proprietorid :input").each(function(e){
          $(this).prop('required',true)
        });
      }else{
        $("#proprietorid :input").each(function(e){
          $(this).prop('required',false);
        })
        $('#proprietorid').hide();
      }
      if($(this).val()==='partnership'){
        $("#partnership :input").each(function(e){
          $(this).prop('required',true)
        });
        $('#partnershipid').show();
      }else{
        $("#partnership :input").each(function(e){
          $(this).prop('required',false)
        });
        $('#partnershipid').hide();
      }
      if($(this).val()==='company'){
        $("#company :input").each(function(e){
          $(this).prop('required',true)
        });
        $("#companyid").show();
      }else{
        $("#company :input").each(function(e){
          $(this).prop('required',false)
        });
        $("#companyid").hide();
      }
    })
});
</script>

