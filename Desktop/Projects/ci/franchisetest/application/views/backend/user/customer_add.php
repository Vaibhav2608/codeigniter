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

                <h4 class="header-title mb-3"><?php echo 'Add New Customer'; ?></h4>

                <form class="required-form" action="<?php echo site_url('user/customer/add'); ?>" enctype="multipart/form-data" method="post">
                    <div class="box-body">
                        <div class="row">
                                                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customername">Customer / Contact Person Name*</label>
                                        <i data-toggle="tooltip" data-placement="right" title="Name should be as per Pancard.
                            Incase Pancard is not available, then as per Aadhar card" class="fa fa-info-circle"
                                            aria-hidden="true" style="float:right;"></i>
                                        <input id="customername" type="text" required="" name="customername" value=""
                                            class="form-control" placeholder="Customer Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="companyname">Company / Business Name</label>
                                        <i data-toggle="tooltip" data-placement="right" title=""
                                            class="fa fa-info-circle" aria-hidden="true" style="float:right;"
                                            data-original-title="Name of Private Limited Company / OPC or Sole Proprietorship"></i>
                                        <input id="companyname" type="text" name="companyname" value=""
                                            class="form-control" placeholder="Company Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobileno">Mobile Number*</label>
                                        <i data-toggle="tooltip" data-placement="right"
                                            title="Mobile Number To be mandatorily of the customer only"
                                            class="fa fa-info-circle" aria-hidden="true" style="float:right;"></i>
                                        <input id="mobileno" onfocusout="check_exist('mobileno',this.value);"
                                            type="text" required="" pattern="[5-9]{1}[0-9]{9}" name="mobileno" value=""
                                            class="form-control" placeholder="Mobile no">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emai">Email ID*</label>
                                        <i data-toggle="tooltip" data-placement="right"
                                            title="Email ID To be mandatorily of the customer only"
                                            class="fa fa-info-circle" aria-hidden="true" style="float:right;"></i>
                                        <input id="email" onfocusout="check_exist('email',this.value);" type="text"
                                            required="" name="email" value="" class="form-control" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state">State*</label>
                                        <i data-toggle="tooltip" data-placement="right"
                                            title="State to be mandatorily of the customer as per address proof"
                                            class="fa fa-info-circle" aria-hidden="true" style="float:right;"></i>
                                        <select id="state" name="state" required="" class="form-control">
                                            <option value="">Select State</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Andaman">Andaman</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Orissa">Orissa</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth*</label>
                                        <i data-toggle="tooltip" data-placement="right" title="Date of Birth should be as per Pancard.
                            Incase Pancard is not available, then as per Aadhar card" class="fa fa-info-circle"
                                            aria-hidden="true" style="float:right;"></i>
                                        <input type="date" id="dob" name="dob" value="" class="form-control"
                                            placeholder="Date of Birth" required="">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <grammarly-extension data-grammarly-shadow-root="true"
                                        style="position: absolute; top: 0px; left: 0px; pointer-events: none;"
                                        class="cGcvT"></grammarly-extension>
                                    <grammarly-extension data-grammarly-shadow-root="true"
                                        style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;"
                                        class="cGcvT">
                                    </grammarly-extension>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <i data-toggle="tooltip" data-placement="right"
                                            title="Address to be mandatorily of the customer as per address proof"
                                            class="fa fa-info-circle" aria-hidden="true" style="float:right;"></i>
                                        <textarea name="address" id="address" class="form-control"
                                            spellcheck="false"></textarea>
                                    </div>
                                </div>


                                <div class="col-md-6 cust">
                                    <div class="form-group">
                                        <label for="pancardno">Pancard Number</label>
                                        <i data-toggle="tooltip" data-placement="right"
                                            title="Pancard to be mandatorily of the Contact Person only. Use Pan Number of Company incase of Private Limited / OPC / LLP. It Cannot be changed once updated."
                                            class="fa fa-info-circle" aria-hidden="true" style="float:right;"></i>
                                        <input autocomplete="off" type="text" id="pancardno" name="pancardno" value=""
                                            class="form-control" placeholder="Pancard No" maxlength="10"
                                            onfocusout="check_exist('pancardno',this.value);">
                                    </div>
                                </div>


                                <div class="col-md-6 cust">
                                    <div class="form-group">
                                        <label for="aadhar_no">Aadhar Number</label>
                                        <i data-toggle="tooltip" data-placement="right"
                                            title="Aadhar to be mandatorily of the Contact Person only. Cannot be changed once updated."
                                            class="fa fa-info-circle" aria-hidden="true" style="float:right;"></i>
                                        <input type="text" id="aadhar_no" name="aadhar_no" value="" class="form-control"
                                            placeholder="Aadhar No" maxlength="12">
                                    </div>
                                </div>

                                <div class="col-md-6 cust">
                                    <div class="form-group">
                                        <label for="gst_number">GSTIN Number</label>
                                        <input type="text" id="gst_number" name="gst_number" value=""
                                            class="form-control" placeholder="GSTIN No" maxlength="15"
                                            onfocusout="check_exist('gst_number',this.value);">
                                    </div>
                                </div>
                                <div class="col-md-6 cust">
                                    <div class="form-group">
                                        <label for="gst_reg_month">GSTIN Registration Month</label>
                                        <select id="gst_reg_month" name="gst_reg_month" class="form-control">
                                            <option value="">Please select month</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 cust">
                                    <div class="form-group">
                                        <label for="gst_reg_year">GSTIN Registration Year</label>
                                        <select id="gst_reg_year" name="gst_reg_year" class="form-control">
                                            <option value="">Please select year</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                        </select>
                                    </div>
                                </div>

                                

                        </div>
                        <div class="d-grid gap-2 col-6 mt-4 mx-auto">
                    <input class="form-control btn btn-success wdt-bg" type="submit" id="btnSubmit" value="Submit" />
                                
                            </div>
                    </div>
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>
<script type="text/javascript">
// $(function() {
//     $( "#gstregyr" ).datepicker({dateFormat: 'yy'});
// }) 
</script>