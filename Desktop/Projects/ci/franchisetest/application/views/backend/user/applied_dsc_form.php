<?php 
$data = json_decode($this->user_model->get_applied_form_data($form_id));
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

                <h4 class="header-title mb-3">Apply for DSC</h4>

                <div class="box-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="invoice">Status</label> <span style="color:red"
                                                id="frmnum"></span>
                                            <input readonly type="text" required="" name="invoice" id="invoice"
                                                value="<?php echo ucfirst($status);?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <form role="form bor-rad" enctype="multipart/form-data"
                                        action="<?php echo site_url('user/form/dsc_form'); ?>" method="post"
                                        class="has-validation-callback">
                                        <div class="box-body">
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="invoice">Sr. No.*</label> <span style="color:red"
                                                            id="frmnum"></span>
                                                        <input readonly type="text" required="" name="invoice" id="invoice"
                                                        value="<?php echo $data->invoice;?>" class="form-control"
                                                            placeholder="Sr. No.*">
                                                    </div>
                                                </div>


                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="gnumber">Customer Id*</label>
                                                        <input type="text" required="" name="startid" id="gnumber"
                                                             value="" class="form-control"
                                                            placeholder="Customer Id" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="dsc_name">DSC Name</label>
                                                        <input readonly type="text" name="dsc_name" id="dsc_name" value="<?php echo $data->dsc_name; ?>"
                                                            class="form-control" placeholder="DSC Name." >
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="dsc_for">DSC For*</label>
                                                        <input type="text" readonly class="form-control" name="dsc_for" id="dsc_for" required="" 
                                                        value="<?php echo $data->dsc_for?>"/>
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-3 organisation" style="display:none">
                                                    <div class="form-group">
                                                        <label for="organisation">Organisation Name*</label>
                                                        <input readonly type="text" name="organisation" id="organisation"
                                                            value="" class="form-control"
                                                            placeholder="Organisation Name">
                                                    </div>
                                                </div>



                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Applicant Name(As Per Pancard)*</label>
                                                        <input readonly type="text" required="" id="CompanyPerson"
                                                            name="CompanyPerson" value="<?php echo $data->CompanyPerson?>" class="form-control"
                                                            placeholder="Applicant Name(As Per Pancard)" >
                                                    </div>
                                                </div>





                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Mobile No*:</label>
                                                        <input readonly type="text" id="ContactNo" name="ContactNo" required="" value="<?php echo $data->ContactNo?>" class="form-control"
                                                            placeholder="Contact Number">
                                                    </div>
                                                </div>




                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Email ID*</label>
                                                        <input type="email" id="PrimaryEmailId" name="PrimaryEmailId"
                                                            required="" readonly value="<?php echo $data->PrimaryEmailId?>" class="form-control"
                                                            placeholder="Primary Email ID">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="user_dob">Date of Birth*</label>
                                                        <input readonly type="date" required="" name="user_dob" id="user_dob"
                                                            value="<?php echo $data->user_dob?>" class="form-control" placeholder="Date of Birth">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="pan_no">PAN No*</label>
                                                        <input readonly type="text" id="pan_no" name="pan_no" required=""
                                                            onkeypress="false;" onpaste="false" value="<?php echo $data->pan_no?>"
                                                            class="form-control" placeholder="Pan No.">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="aadhar_no">Aadhar No*</label>
                                                        <input type="text" readonly id="aadhar_no" name="aadhar_no" required=""
                                                            value="<?php echo $data->aadhar_no?>" class="form-control" placeholder="Aadhar No.">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address">Address (Aadhar printed address)*</label>
                                                        <textarea readonly placeholder="Address" class="form-control" id="address" name="address" required><?php echo $data->address ?>
                                                        </textarea>
                                                    </div>
                                                </div>


                                               <!--  <div class="col-md-4">
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
                                                        <input type="text" value="<?php echo $data->retained_courier?>" readonly class="form-control" name="retained_courier"
                                                            id="retained_courier" required="">
                                                      <!--      
                                                            <option
                                                                value="Retained by PIPL for (ITR/GST/Comp. Service)">
                                                                Retained by PIPL for (ITR/GST/Comp. Service)</option>
                                                            <option value="Courier">Courier</option>
                                                            <option value="To be downloaded by SK">To be downloaded by
                                                                SK</option> -->
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>

                                            <br><br> <br><br>
                                            <!-- <div class="box-footer sub-btn-wdt">
                                                <button type="submit" value="submit"
                                                    class="btn btn-success wdt-bg col-md-2">Submit</button>
                                            </div> -->
                                            <div class="fileUpload btn btn-success ">
                                              <a href="<?php echo site_url('user/download_zip_file/'.$form_id) ?>">
                                                <label for="">Download File:</label> 
                                                <span style="color:red" id="partnershippancardlist1_msg"></span>
                                              </a>
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

<script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change', '#dsc_for', function(){
                if($(this).val() == 'Organisation'){
                    $('.organisation').show();
                }else{
                    $('.organisation').hide();
                }
            })
            $(document).on('blur', '#invoice', function(){
                var invoice_id = $(this).val();
                $.ajax({
                    url: '<?php echo site_url('user/get_customer'); ?>',
                    type: 'POST',
                    data: {
                        id: invoice_id
                    },
                    error: function() {
                       alert('Something is wrong');
                    },
                    success: function(data) {
                        var customer_data = JSON.parse(data);
                        if(customer_data=="wrong invoice number"){
                            alert(customer_data);
                            return;
                        }
                        for(let data in customer_data){
                            console.log(data);
                            switch(data){
                                case 'id':
                                $('#gnumber').val(customer_data[data]);
                                break;
                                case 'name':
                                $('#dsc_name').val(customer_data[data]);
                                break;
                                case 'email':
                                $('#PrimaryEmailId').val(customer_data[data]);
                                break;
                                case 'dob':
                                $('#user_dob').val(customer_data[data]);
                                break;
                                case 'pan_no':
                                $('#pan_no').val(customer_data[data]);
                                break;
                                case 'aadhar_no':
                                $('#aadhar_no').val(customer_data[data]);
                                break;
                                case 'phone':
                                $('#ContactNo').val(customer_data[data]);
                                break;
                                case 'company_name':
                                $('#organisation').val(customer_data[data]);
                                break;

                            }
                        }
                    }
                });
            })
        })

    
</script>