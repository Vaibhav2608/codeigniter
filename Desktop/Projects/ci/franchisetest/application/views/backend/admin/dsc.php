<?php 
$data = json_decode($this->user_model->get_applied_form_data($form_id));
$status = $this->user_model->get_form_status($form_id);
$form_data = $this->user_model->get_application_detail($form_id);
?>

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

                <h4 class="header-title mb-3">Apply for DSC</h4>

                <div class="box-body">
                    <form enctype="multipart/form-data" action="<?php echo site_url('admin/save_status/'.$form_id); ?>" method="post" autocomplete="off">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                  <label for="return_type"> Status*</label> <span style="color:red" id="assessmentyear_msg"></span> 
                                  <select id="status" name="status" class="form-control" readonly value="<?php echo $status?>">
                                    <option value="">Select Status</option> 
                                    <option value="pending" <?php if ($status == 'pending') echo 'selected'; ?>><?php echo ucfirst('pending');?></option>
                                     <option value="proccessing" <?php if ($status == 'proccessing') echo 'selected'; ?> ><?php echo ucfirst('processing');?></option>
                                     <option value="verfication" <?php if ($status == 'verfication') echo 'selected'; ?> ><?php echo ucfirst('Document verfication');?></option>
                                     <option value="completed" <?php if ($status == 'completed') echo 'selected'; ?> ><?php echo ucfirst('completed');?></option>
                                     <option value="cancelled" <?php if ($status == 'cancelled') echo 'selected'; ?> ><?php echo ucfirst('cancelled');?></option>
                                     <option value="doc_error" <?php if ($status == 'doc_error') echo 'selected'; ?> ><?php echo ucfirst('worng documents');?></option>
                                         
                                   
                                  </select>
                                </div>
                                    
                                </div>

                                <div class="col-md-3" style="padding-bottom: 20px;">
                                    <div class="form-group">
                                    <input class="form-control btn btn-success" type="submit" id="btnSubmit" value="Submit"></div>
                                </div>
                                </div></form>
                                <div class="col-lg-12">
                                    <!-- <form role="form bor-rad" enctype="multipart/form-data"
                                        action="<?php echo site_url('user/form/dsc_form'); ?>" method="post"
                                        class="has-validation-callback"> -->
                                        <div class="box-body">
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="invoice">Sr. No.*</label> <span style="color:red"
                                                            id="frmnum"></span>
                                                        <input type="text" required="" name="invoice" id="invoice"
                                                            value="<?php echo $form_data->invoice?>" class="form-control" readonly
                                                            placeholder="Sr. No.*">
                                                    </div>
                                                </div>


                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="gnumber">Customer Id*</label>
                                                        <input type="text" required="" name="startid" id="gnumber"
                                                             value="<?php echo $form_data->customer_id?>" class="form-control"
                                                            placeholder="Customer Id" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="dsc_name">DSC Name</label>
                                                        <input type="text" name="dsc_name" id="dsc_name" value="<?php echo $data->dsc_name?>"
                                                            class="form-control" readonly placeholder="DSC Name." >
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="dsc_for">DSC For*</label>
                                                        <input type="text" name="dsc_for" id="dsc_for" value="<?php if($data->dsc_for) echo $data->dsc_for ?>" readonly
                                                            class="form-control" placeholder="DSC Name." >
                                                    </div>
                                                </div>
                                                <?php if($data->dsc_for == 'Organisation'):?>
                                                <div class="col-md-3 organisation">
                                                    <div class="form-group">
                                                        <label for="organisation">Organisation Name*</label>
                                                        <input type="text" name="organisation" id="organisation"
                                                            value="<?php if($data->dsc_for) echo $data->organisation ?>" class="form-control"
                                                            placeholder="Organisation Name">
                                                    </div>
                                                </div>
                                                <?php endif;?>


                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Applicant Name(As Per Pancard)*</label>
                                                        <input type="text" required="" id="CompanyPerson"
                                                            name="CompanyPerson" readonly value="<?php if($data->dsc_for) echo $data->CompanyPerson ?>" class="form-control"
                                                            placeholder="Applicant Name(As Per Pancard)" >
                                                    </div>
                                                </div>





                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Mobile No*:</label>
                                                        <input type="text" id="ContactNo" name="ContactNo" required=""
                                                            pattern="[5-9]{1}[0-9]{9}" readonly value="<?php if($data->ContactNo) echo $data->ContactNo ?>" class="form-control"
                                                            placeholder="Contact Number">
                                                    </div>
                                                </div>




                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Email ID*</label>
                                                        <input type="email" id="PrimaryEmailId" name="PrimaryEmailId"
                                                            required="" value="<?php if($data->PrimaryEmailId) echo $data->PrimaryEmailId ?>" class="form-control"
                                                            placeholder="Primary Email ID">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="user_dob">Date of Birth*</label>
                                                        <input type="date" required="" name="user_dob" id="user_dob" readonly
                                                            value="<?php if($data->user_dob) echo $data->user_dob ?>" class="form-control" placeholder="Date of Birth">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="pan_no">PAN No*</label>
                                                        <input type="text" id="pan_no" name="pan_no" required=""
                                                            onkeypress="false;" onpaste="false" readonly
                                                            value="<?php if($data->pan_no) echo $data->pan_no ?>" 
                                                            class="form-control" placeholder="Pan No.">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="aadhar_no">Aadhar No*</label>
                                                        <input type="text" id="aadhar_no" name="aadhar_no" required=""
                                                            readonly
                                                            value="<?php if($data->aadhar_no) echo $data->aadhar_no ?>"  class="form-control" placeholder="Aadhar No.">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address">Address (Aadhar printed address)*</label>
                                                        <textarea placeholder="Address" class="form-control"
                                                            id="address" name="address" required="" readonly
                                                            value="<?php if($data->address) echo $data->address ?>" ></textarea>

                                                    </div>
                                                </div>


                                                <!-- <div class="col-md-4">
                                                    <label for=""> Self Attested PanCard Attachment:</label>
                                                    <div class=" fileUpload btn btn-success wdt-bg">
                                                        <label for="">Choose File:</label>
                                                        <input id="Pancardproprietorship"
                                                            type="file" class="" name="Pancardproprietorship" value=""
                                                            accept="image/*">
                                                    </div>
                                                </div>


                                                <div class="col-md-4">
                                                    <label for=""> Self Attested AadharCard (front and back):</label>
                                                    <div class=" fileUpload btn btn-success wdt-bg">
                                                        <label for="">Choose File:</label>
                                                        <input id="Aadharcardproprietorship"
                                                            type="file" class="" name="Aadharcardproprietorship[]"
                                                            value="" accept="image/*" multiple>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-md-12" for=""> Photo:
                                                     </label>
                                                    <div class=" fileUpload btn btn-success wdt-bg">
                                                        <label for="">Choose File:</label>
                                                        <input id="photo"
                                                            type="file" class="" name="photo" value="" accept="image/*">
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <br>
                                                <div class="col-md-4 p-2">
                                                    <label for=""> Form: (ONLY FOR DGFT)</label>
                                                    <div class="fileUpload btn btn-success wdt-bg">
                                                        <label for="">Choose File:</label>
                                                        <input id="form" 
                                                            type="file" class="" name="form" value="" accept="image/*">
                                                    </div>
                                                </div> -->

                                                <div class="col-md-12 p-2">
                                                    <div class="form-group">
                                                        <label for="retained_courier">Retained/Courier/Download*</label>
                                                        <!-- <select class="form-control" name="retained_courier"
                                                            id="retained_courier" required="">
                                                            <option value="">Select DSC Used</option>
                                                            <option
                                                                value="Retained by PIPL for (ITR/GST/Comp. Service)">
                                                                Retained by PIPL for (ITR/GST/Comp. Service)</option>
                                                            <option value="Courier">Courier</option>
                                                            <option value="To be downloaded by SK">To be downloaded by
                                                                SK</option>
                                                        </select> -->
                                                        <input type="text" id="retained_courier" name="retained_courier" 
                                                            readonly
                                                            value="<?php if($data->aadhar_no) echo $data->retained_courier ?>"  class="form-control">
                                                    </div>
                                                </div>


                                            </div>

                                            <br><br> <br><br>
                                            <div class="box-footer sub-btn-wdt">
                                                <a href="<?php echo site_url('admin/download_zip_file/'.$form_id) ?>" value="submit"
                                                    class="btn btn-success wdt-bg col-md-2">Download Attachment</a>
                                            </div>

                                        </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>
