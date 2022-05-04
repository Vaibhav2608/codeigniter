<?php 
$data = json_decode($this->user_model->get_applied_form_data($form_id));
$form_detail = $this->user_model->get_form_detail($form_id);
$status = $this->user_model->get_form_status($form_id);
$file = json_encode($file);
?>

<style>
.form-control:disabled, .form-control[readonly] {
    background-color: lightgray;
}
</style>
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
              <input type="text" readonly name="invoice" id="invoice" value="<?php echo $form_detail->invoice_id; ?>" class="form-control" placeholder="Sr. No.*" style="border-radius: 5px;">
              </div>
            </div>
            
        <div class="col-md-4">
              <div class="form-group">
                <label for="gnumber">Customer Id*</label>
              <input type="text" readonly name="startid" id="gnumber" value="<?php echo $form_detail->customer_id; ?>" class="form-control" placeholder="Customer Id" style="border-radius: 5px;">
              </div>
            </div>    
            <div class="col-md-3">
              <div class="form-group">
                  <label for="invoice">Status</label> <span style="color:red"
                      id="frmnum"></span>
                  <input type="text" readonly required="" name="invoice" id="invoice"
                      value="<?php echo ucfirst($status);?>" class="form-control">
              </div>
          </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="gstnreg_name">GSTIN Name*</label>
              <input type="text" readonly id="gstnreg_name" name="gstnreg_name" value="<?php echo $data->gstnreg_name; ?>" class="form-control" placeholder="GSTIN Name" style="border-radius: 5px;">
              </div>
            </div>
  
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Name of Business*</label>
              <input type="text" readonly id="CompanyName" name="CompanyName" value="<?php echo $data->CompanyName; ?>" class="form-control" placeholder="Name of Company" style="border-radius: 5px;">
              </div>
            </div>
            
                        
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Name of Person*</label>
              <input type="text" readonly id="CompanyPerson" name="CompanyPerson" value="<?php echo $data->CompanyPerson; ?>" class="form-control" placeholder="Name of Person" style="border-radius: 5px;">
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">              
              <label for="">PanCard*</label>
                <input type="text" id="pancardno" readonly onpaste="return false" name="pancardno" value="<?php echo $data->pancardno; ?>" class="form-control" placeholder="PanCard" style="border-radius: 5px;">
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="">State*</label>
                <input type="text" id="State" readonly name="State" value="<?php echo $data->State; ?>" class="form-control" placeholder="PanCard" style="border-radius: 5px;">
                <!-- <select  id="State" name="State"  required class="form-control" style="border-radius: 5px;">  <option selected value=""></option><option value="Andaman">Andaman</option><option value="Andhra Pradesh">Andhra Pradesh</option><option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option><option value="Bihar">Bihar</option><option value="Chhattisgarh">Chhattisgarh</option><option value="Chandigarh">Chandigarh</option><option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option><option value="Daman and Diu">Daman and Diu</option><option value="Delhi">Delhi</option><option value="Goa">Goa</option><option value="Gujarat">Gujarat</option><option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option><option value="Jammu and Kashmir">Jammu and Kashmir</option><option value="Jharkhand">Jharkhand</option><option value="Karnataka">Karnataka</option><option value="Kerala">Kerala</option><option value="Madhya Pradesh">Madhya Pradesh</option><option value="Maharashtra">Maharashtra</option><option value="Manipur">Manipur</option><option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option><option value="Nagaland">Nagaland</option><option value="Orissa">Orissa</option><option value="Puducherry">Puducherry</option><option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option><option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option><option value="Telangana">Telangana</option><option value="Tripura">Tripura</option><option value="Uttar Pradesh">Uttar Pradesh</option><option value="Uttarakhand">Uttarakhand</option><option value="West Bengal">West Bengal</option></select> -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Mobile No*:</label>
                <input type="text" id="ContactNo" name="ContactNo" readonly value="<?php echo $data->ContactNo; ?>" class="form-control" placeholder="Contact Number" style="border-radius: 5px;">
              </div>
            </div>
             <input type="hidden" name="AlternateNo" value="1" class="form-control">
             
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Email ID*</label>
              <input type="email" id="PrimaryEmailId" name="PrimaryEmailId" readonly value="<?php echo $data->PrimaryEmailId; ?>" class="form-control" placeholder="Primary Email ID" style="border-radius: 5px;">
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="">District*</label>
                <input type="text" id="District" readonly name="District" value="<?php echo $data->District; ?>" class="form-control" placeholder="District" style="border-radius: 5px;" >
              </div>
            </div>
            
            <div class="col-md-4 both hide_div">
              <div class="form-group">
                <label for="">GSTIN*</label>
              <input type="text" id="gstin" readonly name="gst_number" value="<?php echo $data->gst_number; ?>" class="form-control" placeholder="GSTIN" style="border-radius: 5px;">
              </div>
            </div>
            
            <div class="col-md-4 both hide_div">
              <div class="form-group">
                <label for="">GST Username*</label>
              <input readonly type="text" id="gst_username" name="gst_username" value="<?php echo $data->gst_username; ?>" class="form-control" placeholder="GST Username" style="border-radius: 5px;">
              </div>
            </div>
            
            <div class="col-md-4 both hide_div">
              <div class="form-group">
                <label for="">GST Password*</label>
              <input readonly type="text" id="gst_password" name="gst_password" value="<?php echo $data->gst_password; ?>" class="form-control" placeholder="GST Password" style="border-radius: 5px;">
              </div>
            </div>
            
              <input type="hidden" name="OtherMention" value="1" class="form-control" placeholder="If any other please mention type">
            <div class="col-md-4 for_gstin" style="display: block;">
              <div class="form-group">              
              <label for="">Company Address*</label>
                <input readonly type="text" id="Address" name="Address" value="<?php echo $data->Address; ?>" class="form-control" placeholder="Company Address" style="border-radius: 5px;">
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
                <input readonly type="text" id="PinCode" name="PinCode" value="<?php echo $data->PinCode; ?>" class="form-control" placeholder="Pin Number" style="border-radius: 5px;">
              </div>
            </div>
            
            <div class="col-md-3 for_gstin" style="display: block;">
              <div class="form-group">
                <label for="">Date of Commencement of Business*</label>
              <input readonly type="date" id="dCommencement" name="dCommencement" value="<?php echo $data->dCommencement; ?>" class="form-control" placeholder="Date of Commencement of Business" style="border-radius: 5px;">
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
              <input readonly type="text" id="compositescheme" name="compositescheme" value="<?php echo $data->compositescheme; ?>" class="form-control" placeholder="Yes/No" style="border-radius: 5px;" >
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
           <input readonly type="text" id="CompanyOverview" name="CompanyOverview" value="<?php echo $data->CompanyOverview; ?>" class="form-control" placeholder="Name" style="border-radius: 5px;"/>
              
              </div>
            </div>
            
           <div class="col-md-12 for_gstin" style="display: block;">
                  <div class="form-group">
                    <label for="status"> Type of Organization and Document Required*</label> 
                    <input readonly type="text" id="OrganisationTypeDocuments" name="OrganisationTypeDocuments" value="<?php echo $data->OrganisationTypeDocuments; ?>" class="form-control" placeholder="Name" style="border-radius: 5px;"/>             
              
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
                 
          
         

         
        </div>
    <br><br>  <br><br>   
          <div class="box-footer sub-btn-wdt">
          <!-- <button type="submit" name="submit" value="submit" onclick="checkval()" class="btn btn-success wdt-bg">Submit</button> -->
          <a href="<?php echo site_url('user/download_zip_file/'.$form_id) ?>" class="btn btn-success"><span>Download attachements</span> </a>
        </div>
    
              
     </div></form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>



