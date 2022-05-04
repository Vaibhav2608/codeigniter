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

                <h4 class="header-title mb-3"><?php echo 'Invoice'; ?></h4>

                <form role="form bor-rad"
                       action="<?php echo site_url('user/customer/add_invoice'); ?>"  enctype="multipart/form-data" method="post" id="invoice_form">


                        <div class="box-body">
                            <div class="row">

                                <!--Proforma Invoice Start-->
                                <div class="col-md-12">
                                    <div class="col-md-2" style="padding-left: 0px;">
                                        <label><strong>Invoice Type*</strong>:</label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="radio" value="tax" id="tax_invoice"
                                                name="invoice_type" checked=""> Tax Invoice
                                        </div>
                                    </div>

                                </div>
                                                <!--Proforma Invoice End-->

    <div class="col-md-4">
        <div class="form-group">

            <label for="">Customer Id*:</label><span style="color:red"
                id="frmnum1"></span>

            <select id="customer_id" name="customer_id"
                class="form-control form-select select2"
                style="border-radius: 5px;" aria-label="Default select example" required="required"
                tabindex="-1" aria-hidden="true">
                <option value="">Please select customer</option>
                 <?php foreach($customers as $customer): ?>
                <option value=<?php echo $customer['id']?> ><?php echo $customer['id'].' | '.$customer['name']?></option>
            <?php endforeach;?>
            </select><!-- <span
                class="select2 select2-container select2-container--default"
                dir="ltr" style="width: 328.328px;"><span
                    class="selection"><span
                        class="select2-selection select2-selection--single"
                        role="combobox" aria-haspopup="true"
                        aria-expanded="false" tabindex="0"
                        aria-labelledby="select2-gnumber-container"><span
                            class="select2-selection__rendered"
                            id="select2-gnumber-container"
                            title="Please select customer">Please select
                            customer</span><span
                            class="select2-selection__arrow"
                            role="presentation"><b
                                role="presentation"></b></span></span></span><span
                    class="dropdown-wrapper"
                    aria-hidden="true"></span></span> -->

        </div>
    </div>

    <!-- <div class="col-md-4" id="suvidha_code_area" style="display:none">
        <div class="form-group">
            <label for="">Suvidha Code:</label>
            <input type="text" id="suvidha_code" name="suvidha_code"
                value="" class="form-control" placeholder="Suvidha Code"
                style="border-radius: 5px;">
        </div>
    </div> -->

    <div class="col-md-4">
        <div class="form-group">
            <label for="">Customer GSTIN Number</label>
            <input type="text" id="gstnno" name="gstnno" value=""
                class="form-control" placeholder="Customer GSTIN Number"
                style="border-radius: 5px;">
        </div>
    </div>





    <div class="col-md-12">

        <table id="invoice_table" class="table" width="100%">
            <thead>
                <tr>
                    <th><strong>Sr. No.</strong></th>
                    <th><strong>Service Particulars</strong></th>
                    <th><strong>Amount (Taxes as applicable)</strong></th>
                    <th><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody>


                <tr>
                    <td>1</td>
                    <td>GSTN Registration / Modification / Cancellation /
                        Surrender <i data-toggle="tooltip"
                            data-placement="right"
                            title="Login credentials of customer would be withheld by PIPL, including email ID"
                            class="fa fa-info-circle"
                            aria-hidden="true"></i></td>
                    <td>
                        <select class="form-select invoice-select" id="gstnreg_charge" name="gstnreg_charge"
                            style="border-radius: 5px;">
                            <option value="">Select GSTIN</option>
                            <!-- <option value="200,Modification"> Modification
                                (Rs. 200)</option>
                            <option value="200,Cancellation / Surrender">
                                Cancellation / Surrender (Rs. 200)</option>
                            <option
                                value="1000,GSTIN Single Registrations (5 Coupons)">
                                GSTIN Single Registrations (5 Coupons (Rs.
                                1000))</option>
                            <option
                                value="850,Free GSTIN Registration with 1 Quarter (GSTR1 - GSTR 3B || CMP-08) Return Filing">
                                Free GSTIN Registration with 1 Quarter
                                (GSTR1 - GSTR 3B || CMP-08) Return Filing
                                (Rs. 850)</option>
                            <option
                                value="3000,Free GSTIN Registration with 1 Year (GSTR1 - GSTR 3B || CMP-08) Return Filing">
                                Free GSTIN Registration with 1 Year (GSTR1 -
                                GSTR 3B || CMP-08) Return Filing (Rs. 3000)
                            </option> -->
                            <?php 
                            $form_data = json_decode($this->user_model->get_service_data('gst'));
                                foreach($form_data as $fields){
                                    echo '<option value="'.$fields->customer.','.$fields->name.'" data="'.$fields->franchise.'"> '.$fields->name.'
                                (Rs. '.$fields->customer.')</option>';
                                }
                            ?>

                        </select>
                    </td>
                    <td>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>GST Audit Consultancy
                    </td>
                    <td>Rs.13000</td>
                    <td><input type="checkbox" value="13000"
                            class="messageCheckbox form-check-input" name="gst_audit_charge"
                            id="gst_audit_charge" disabled></td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Micro Finance Application</td>
                    <td>Rs.211.86</td>
                    <td><input type="checkbox" value="211.86"
                            class="messageCheckbox form-check-input" name="borrower"
                            id="borrower" disabled></td>
                </tr>
                                                            
            <tr>
                <td>3</td>
                <td>Digital Signature Registration</td>
                <td><select class="form-select invoice-select" id="dscnreg_charge" name="dscnreg_charge"
                        style="border-radius: 5px;">
                        <option value="">Select DSC</option>
                    <!-- <option
                        value="1250,Class 3 - 2 Years - Signing">
                        Class 3 - 2 Years - Signing (Rs 1250)
                    </option>
                    <option
                        value="2200,Class 3 - 2 Years - Signing + Encryption">
                        Class 3 - 2 Years - Signing + Encryption
                        (Rs. 2200)</option>
                    <option value="2500,DGFT - 1 Year">DGFT - 1 Year
                        (Rs 2500)</option>
                    <option value="2850,DGFT - 2 Years">DGFT - 2
                        Years (Rs 2850)</option> -->
                        <?php 
                            $form_data = json_decode($this->user_model->get_service_data('dsc'));
                                foreach($form_data as $fields){
                                    echo '<option value="'.$fields->customer.','.$fields->name.'" data="'.$fields->franchise.'"> '.$fields->name.'
                                (Rs. '.$fields->customer.')</option>';
                                }
                            ?>
                </select></td>
            <td></td>
        </tr>
        <tr>
            <td>4</td>
            <td>PAN Card (Application from company) <br>
            </td>
            <td>Rs.148.30</td>
            <td><input type="checkbox" value="148.30"
                    class="messageCheckbox form-check-input" name="pannreg_charge"
                    id="pannreg_chargeid" disabled></td>
        </tr>
        <tr>
            <td>5</td>
            <td>UTI PAN Card Coupons<br>
            </td>
            <td><select class="form-select invoice-select" id="direct_pan_coupons_charge"
                    name="direct_pan_coupons_charge"
                    style="border-radius: 5px;" disabled>
                    <option value="">Select Direct PAN Card Coupons
                    </option>
                    <option value="453.4,UTI PAN Card Coupons (5)">1
                        UTI PAN Card Coupons (5) (Rs 90.68 X 5 =
                        453.4)</option>
                    <option value="906.8,UTI PAN Card Coupons (10)">
                        2 UTI PAN Card Coupons (10) (Rs 90.68 X 10 =
                        906.8)</option>
                    <option
                        value="1813.6,UTI PAN Card Coupons (20)">3
                        UTI PAN Card Coupons (20) (Rs 90.68 X 20 =
                        1813.6)</option>
                                                                        
                   </select></td>
                    <td></td>
                </tr>
                <!--E-way bill start-->
                <tr>
                    <td>6</td>
                    <td>E-way bill Registration</td>
                    <td>Rs.100</td>
                    <td><input type="checkbox" value="100"
                            class="messageCheckbox form-check-input"
                            name="ewaybill_registration_charge"
                            id="ewaybill_registration_charge" disabled></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>E-way bill Generation</td>
                    <td>Rs.50</td>
                    <td><input type="checkbox" value="50"
                            class="messageCheckbox form-check-input"
                            name="ewaybill_generator_charge"
                            id="ewaybill_generator_charge" disabled></td>
                </tr>
                                                            <!--E-way bill end-->

                                                            
            <tr>
                <td>8</td>
                <td>Income Tax Return
                </td>
                <td>
                    <select class="form-select" name="assessmentyear" id="assessmentyear"
                        style="margin-bottom:20px;">
                        <option value="">Select Assessment Year</option>
                        <option value="2022-23 (Financial Year 2021-22)">2022-23 (Financial Year 2021-22)</option>
                        <option
                            value="2021-22 (Financial Year 2020-21)">
                            2021-22 (Financial Year 2020-21)</option>
                        <option
                            value="2020-21 (Financial Year 2019-20)">
                            2020-21 (Financial Year 2019-20)</option>
                        <option
                            value="2019-20 (Financial Year 2018-19)">
                            2019-20 (Financial Year 2018-19)</option>
                        <option
                            value="2018-19 (Financial Year 2017-18)">
                            2018-19 (Financial Year 2017-18)</option>
                        <option
                            value="2017-18 (Financial Year 2016-17)">
                            2017-18 (Financial Year 2016-17)</option>
                    </select>
                    <select class="form-select" style="display:none" id="itrreg_chargeid"
                        name="itrreg_charge">
                        <option value="">Select ITR</option>
                    </select>
                </td>
                <td> </td>
            </tr>

            <tr>
                <td>9</td>
                <td>GST Return Filing <i data-toggle="tooltip"
                        data-placement="right"
                        title="Login credentials of customer would be withheld by PIPL, including email ID and Phone No."
                        class="fa fa-info-circle"
                        aria-hidden="true"></i></td>
                <td>

                    <select class="form-select invoice-select" id="gstreturnfillingid"
                        name="gstreturnfilling"
                        style="border-radius: 5px;" disabled>
                        <option value="">Select GST Return Filing
                        </option>
                        <option value="200,GSTR-3B">1 GSTR-3B (Rs. 200)
                        </option>

                        <!--For GSTR-1 Surge Prices-->

                        <option value="750,GSTR-1">2 GSTR-1 - Data (Rs.
                            750)</option>
                        <option value="500,GSTR-1">3 GSTR-1 - NIL(No
                            Sale) (Rs. 500)</option>

                        <!--For CMP-08 Surge Prices-->

                        <option value="300,CMP-08">4 CMP-08 (Rs. 300)
                        </option>

                        <!--For GSTR-4 Surge Prices-->
                        <option value="500,GSTR-4">5 GSTR-4 (Rs. 500)
                        </option>

                        <!--For GSTR-1 & 3B Surge Prices-->

                        <option value="750,GSTR-1 &amp; 3B">6 GSTR-1
                            &amp; 3B - Data (Rs. 750)</option>
                        <option value="500,GSTR-1 &amp; 3B">7 GSTR-1
                            &amp; 3B - NIL(No Sale, No Purchase) (Rs.
                            500)</option>
                        <option value="500,GSTR-7">8 GSTR-7 (Rs. 500)
                        </option>
                        <option value="1500,GSTR-9">8 GSTR-9 (Rs. 1500)
                        </option>
                        <option value="500,GSTR-10">9 GSTR-10 (Rs. 500)
                        </option>
                        <option value="400,GST ITC Returns">10 GST ITC
                            Returns (Rs. 400)</option>
                        <option value="500,GST Reconciliation">12 GST
                            Reconciliation (Rs. 500)</option>
                                                                        <!-- 
                      <option value="500,Reconciliation">7 Reconciliation  (Rs. 500)</option>
                      -->
                        </select>

                        <select class="form-select mt-2" name="monthreoprt" id="monthreoprt"
                            style="border-radius: 5px;" disabled>
                            <option value="">Select return month</option>

                            <option value="March 2022">March 2022</option>

                            <option value="February 2022">February 2022
                            </option>

                            <option value="January 2022">January 2022
                            </option>

                            <option value="December 2021">December 2021
                            </option>

                            <option value="November 2021">November 2021
                            </option>

                            <option value="October 2021">October 2021
                            </option>

                            <option value="September 2021">September 2021
                            </option>

                            <option value="August 2021">August 2021</option>

                            <option value="July 2021">July 2021</option>

                            <option value="June 2021">June 2021</option>

                            <option value="May 2021">May 2021</option>

                            <option value="April 2021">April 2021</option>

                            <option value="March 2021">March 2021</option>

                            <option value="February 2021">February 2021
                            </option>

                            <option value="January 2021">January 2021
                            </option>

                            <option value="December 2020">December 2020
                            </option>

                            <option value="November 2020">November 2020
                            </option>

                            <option value="October 2020">October 2020
                            </option>

                            <option value="September 2020">September 2020
                            </option>

                            <option value="August 2020">August 2020</option>

                            <option value="July 2020">July 2020</option>

                            <option value="June 2020">June 2020</option>

                            <option value="May 2020">May 2020</option>

                            <option value="April 2020">April 2020</option>

                            <option value="March 2020">March 2020</option>

                            <option value="February 2020">February 2020
                            </option>

                            <option value="January 2020">January 2020
                            </option>

                            <option value="December 2019">December 2019
                            </option>

                            <option value="November 2019">November 2019
                            </option>

                            <option value="October 2019">October 2019
                            </option>

                            <option value="September 2019">September 2019
                            </option>

                            <option value="August 2019">August 2019</option>

                            <option value="July 2019">July 2019</option>

                            <option value="June 2019">June 2019</option>

                            <option value="May 2019">May 2019</option>

                            <option value="April 2019">April 2019</option>

                            <option value="March 2019">March 2019</option>

                            <option value="February 2019">February 2019
                            </option>

                            <option value="January 2019">January 2019
                            </option>

                            <option value="December 2018">December 2018
                            </option>

                            <option value="November 2018">November 2018
                            </option>

                            <option value="October 2018">October 2018
                            </option>

                            <option value="September 2018">September 2018
                            </option>

                            <option value="August 2018">August 2018</option>

                            <option value="July 2018">July 2018</option>

                            <option value="June 2018">June 2018</option>

                            <option value="May 2018">May 2018</option>

                            <option value="April 2018">April 2018</option>

                            <option value="March 2018">March 2018</option>

                            <option value="February 2018">February 2018
                            </option>

                            <option value="January 2018">January 2018
                            </option>

                            <option value="December 2017">December 2017
                            </option>

                            <option value="November 2017">November 2017
                            </option>

                            <option value="October 2017">October 2017
                            </option>

                            <option value="September 2017">September 2017
                            </option>

                            <option value="August 2017">August 2017</option>

                            <option value="July 2017">July 2017</option>
                        </select>
                        <!--Financial Year-->
                        <select class="form-select" id="gstr9_financial_year"
                            name="gstr9_financial_year"
                            style="display:none" disabled>
                            <option value="">Select Financial Year</option>
                            <option value="2021-2022">2021-2022</option>
                            <option value="2020-2021">2020-2021</option>
                            <option value="2019-2020">2019-2020</option>
                            <option value="2018-2019">2018-2019</option>
                            <option value="2017-2018">2017-2018</option>
                        </select>
                        <!-- For CMP 08 -->
                        <select class="form-select" id="cmp_month" name="cmp_month"
                            style="display:none">
                            <option value="">Select CMP-08 Quarter</option>
                            <option value="January-March">January - March
                            </option>
                            <option value="April-June">April - June</option>
                            <option value="July-September">July - September
                            </option>
                            <option value="October-December">October -
                                December</option>
                        </select>

                        <select class="form-select" id="cmp_year" name="cmp_year"
                            style="display:none">
                            <option value="">Select CMP-08 Financial Year
                            </option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                        </select>
                        <input type="hidden" name="gst9_month"
                            id="gst9_month" value="">
                    </td>
                    <td>

                    </td>
                    </tr>


                    <tr>
                    <td>10</td>
                    <td>GST Return Filing Package <i data-toggle="tooltip"
                            data-placement="right"
                            title="Login credentials of customer would be withheld by PIPL, including email ID and Phone No."
                            class="fa fa-info-circle"
                            aria-hidden="true"></i></td>
                    <td>
                        <select class="form-select invoice-select" id="gst_return_package"
                            name="gst_return_package"
                            style="border-radius: 5px;" disabled>
                            <option value="">Select GST Return Filing
                                Package</option>
                            <option value="3000,Regular Quarterly Package">
                                Annual ( Regular Quarterly Scheme ) : 4 GSTR
                                1 &amp; 12 GSTR 3B (Rs. 3000)</option>
                            <option
                                value="1800,Half Yearly Regular Quarterly Package">
                                Semi - Annual ( Regular Quarterly Scheme ) :
                                2 GSTR 1 &amp; 6 GSTR 3B (Rs. 1800)</option>
                            <option value="5000,Regular Monthly Package">
                                Annual ( Regular Monthly Scheme ) : 12 GSTR
                                1 &amp; 12 GSTR 3B (Rs. 5000)</option>
                            <option
                                value="3000,Half Yearly Regular Monthly Package">
                                Semi - Annual ( Regular Monthly Scheme ) : 6
                                GSTR 1 &amp; 6 GSTR 3B (Rs. 3000)</option>
                        </select>

                        <select class="form-select mt-2" name="package_start_month"
                            id="package_start_month"
                            style="border-radius: 5px;" disabled>
                            <option value="">Select Start Package</option>

                            <option value="January 2022">January 2022
                            </option>

                            <option value="February 2022">February 2022
                            </option>

                            <option value="March 2022">March 2022</option>

                        </select>
                    </td>
                    <td>

                    </td>
                    </tr>
                                                            <!--
                  <tr>
                    <td>10</td>
                      <td>Late GST Return <i data-toggle="tooltip" data-placement="right" title="Login credentials of customer would be withheld by PIPL, including email ID and Phone No." class="fa fa-info-circle" aria-hidden="true"></i><img src="https://popcorninfotech.com/suvidha/assets/images/aeps_subscription.gif" height="30" width="30"></td>
                      <td>
                      <select id="late_gst_return_package" name="late_gst_return_package" >
                      <option value="">Late GST Return</option>
                      <option value="72.03,GSTR-1 & 3B">1 GSTR-1 & 3B - NIL</option>
                      </select>
                      
                      <select  name="late_package_start_month" id="late_package_start_month" >
                      <option value="">Select Start Month</option>
                       
                      <option  value="July 2017">July 2017</option>
                       
                      <option  value="August 2017">August 2017</option>
                       
                      <option  value="September 2017">September 2017</option>
                       
                      <option  value="October 2017">October 2017</option>
                       
                      <option  value="November 2017">November 2017</option>
                       
                      <option  value="December 2017">December 2017</option>
                       
                      <option  value="January 2018">January 2018</option>
                       
                      <option  value="February 2018">February 2018</option>
                       
                      <option  value="March 2018">March 2018</option>
                       
                      <option  value="April 2018">April 2018</option>
                       
                      <option  value="May 2018">May 2018</option>
                       
                      <option  value="June 2018">June 2018</option>
                       
                      <option  value="July 2018">July 2018</option>
                       
                      <option  value="August 2018">August 2018</option>
                       
                      <option  value="September 2018">September 2018</option>
                              </select>
                      
                  <select  name="late_package_end_month" id="late_package_end_month" >
                      <option value="">Select End Month</option>
                              <option  value="September 2018">September 2018</option>
                          </select>
                      
                      </td>
                      <td>
                      
                      </td>
                    </tr>
              -->

                            <tr>
                            <td>11</td>
                            <td>TAN Registration</td>
                            <td><span>500<span></span></span></td>
                            <td> <input type="checkbox" value="500"
                            class="messageCheckbox form-check-input"
                            name="tan_register_charge"
                            id="tan_register_charge" disabled></td>
                            </tr>

                            <tr>
                            <td>12</td>
                            <td>TDS Returns</td>
                            <td>
                            <!--Financial Year-->
                            <select class="form-select invoice-select" id="tds_returns_charge"
                            name="tds_returns_charge"
                            style="border-radius: 5px;" disabled>
                            <option value="">Select TDS Quarter</option>
                            <option value="500,Quarter 1 (April-June)">
                            Quarter 1 (April-June) (Rs. 500)</option>
                            <option value="500,Quarter 2 (July-September)">
                            Quarter 2 (July-September) (Rs. 500)
                            </option>
                            <option
                            value="500,Quarter 3 (October-December)">
                            Quarter 3 (October-December) (Rs. 500)
                            </option>
                            <option value="500,Quarter 4 (January-March)">
                            Quarter 4 (January-March) (Rs. 500)</option>
                            </select>
                            <select class="form-select mt-2" id="tds_finance" name="tds_finance"
                            style="border-radius: 5px;" disabled>
                            <option value="">Select TDS Financial Year
                            </option>
                            <option value="2018-19">2018-19</option>
                            <option value="2019-20">2019-20</option>
                            <option value="2020-21">2020-21</option>
                            <option value="2021-22">2021-22</option>
                            </select>
                            </td>
                            <td></td>
                            </tr>
                            <tr>
                            <td>13</td>
                            <td>Profession Tax Registration</td>
                            <td><span>750<span></span></span></td>
                            <td> <input type="checkbox" value="750"
                            class="messageCheckbox form-check-input"
                            name="pt_tax_registration_charge"
                            id="pt_tax_registration_charge" disabled></td>
                            </tr>

                            <tr>
                            <td>14</td>
                            <td>Profession Tax Returns</td>
                            <td><span>300<span></span></span></td>
                            <td> <input type="checkbox" value="300"
                            class="messageCheckbox form-check-input"
                            name="pt_tax_returns_charge"
                            id="pt_tax_returns_charge" disabled></td>
                            </tr>

                            <tr>
                            <td>15</td>
                            <td>Company Services &amp; Government Registration</td>
                            <td>
                            <select class="form-select" name="com_service_type"
                            id="com_service_type"
                            style="margin-bottom:20px;" disabled>
                            <option value="">Please Select Service</option>
                            <option value="0">Company Formation and
                            Compliance</option>
                            <option value="1">Government Registrations
                            </option>
                            </select>
                            <select class="form-select" style="display:none"
                            name="company_service_charge"
                            id="company_service_charge" disabled>

                            </select>
                            </td>
                            <td>

                            </td>
                            </tr>

                            <tr>
                            <td>16</td>
                            <td>Book Keeping - Upto 90 entries</td>
                            <td>
                            <span id="bookval">300<span>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <select class="form-select" name="bk_month" id="bk_month" disabled>
                            <option value="">Please select Month
                            </option>
                            <option value="January">January</option>
                            <option value="February">February
                            </option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September
                            </option>
                            <option value="October">October</option>
                            <option value="November">November
                            </option>
                            <option value="December">December
                            </option>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <select class="form-select" name="bk_year" id="bk_year" disabled>
                            <option value="">Please select Year
                            </option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            </select>
                            </span></span>
                            </td>
                            <td> <input type="checkbox" value="300"
                            class="messageCheckbox form-check-input" name="bookkeeping"
                            id="bookkeeping" disabled></td>
                            </tr>

                            <tr>
                            <td>17</td>
                            <td> Additional Service Charges
                            <!-- Subsequent entries Rs.1 per entry</br>or Rs.30 per page whichever is lower -->
                            </td>
                            <td>
                            <span id="lblValue"></span><br><input type="hidden"
                            name="Subsequentamount" value="0"
                            id="Subsequentamountid">
                            Number of entries &nbsp;&nbsp;&nbsp;<input
                            id="edValue1" name="subsequentnumofentries"
                            type="text" onkeypress="edValueKeyPress1()"
                            onkeyup="edValueKeyPress1() " disabled
                            style="border-radius: 5px;"><br>
                            <span id="lblValue1"></span>
                            <!-- Number of pages &nbsp&nbsp&nbsp&nbsp&nbsp --><input
                            id="edValue" name="subsequentnumofpage"
                            type="hidden" onkeypress="edValueKeyPress()"
                            onkeyup="edValueKeyPress()"
                            style="border-radius: 5px;"><br>
                            </td>
                            <td></td>
                            </tr>

                                                            
                                                            <input type="hidden" name="compositecust">
                                                            <tr>
                                                                <td>18</td>
                                                                <td>Printout Rs.2 per Print</td>
                                                                <td><input id="printoutprice" type="text"
                                                                        name="printoutprice"
                                                                        style="border-radius: 5px;" disabled></td>
                                                                <td> </td>
                                                            </tr>

                                                            <tr>
                                                                <td>19</td>
                                                                <td>Exit Cost</td>
                                                                <td>Rs.<span id="exit_text">500</span></td>
                                                                <td><input type="checkbox" value="500"
                                                                        class="messageCheckbox form-check-input" name="exitcost"
                                                                        id="exitcostid" disabled></td>
                                                            </tr>
                                                            <!--
                     <tr>
                     <td>20</td>
                      <td>Taxware Invoicing Software</td>
                      <td>Rs.3000</td>
                      <td><input type="checkbox" value="3000" class="messageCheckbox form-check-input"
                       name="tax_ware_charge" id="tax_ware_charge"></td>
                    </tr>
              -->
                                                            <tr>
                                                                <td>20</td>
                                                                <td>Revocation of Cancellation of GSTIN</td>
                                                                <td>Rs.1000</td>
                                                                <td><input type="checkbox" value="1000"
                                                                        class="messageCheckbox form-check-input" name="revocation_charge"
                                                                        id="revocation_charge" disabled></td>
                                                            </tr>
                                                            <!--  
                    <tr>
                    <td>21</td>
                      <td>Passport</td>
                      <td>Rs.200</td>
                      <td><input type="checkbox" value="200" class="messageCheckbox form-check-input"
                       name="passport_charge" id="passport_charge"></td>
                    </tr>   
                  
                    <tr>
                    <td>22</td>
                      <td>Driving License</td>
                      <td>
                          <select id="driving_charge" name="driving_charge" style="border-radius: 5px;">
                          <option value="">Select License</option>
                              <option value="350,Learners License Application">Learners License Application (Rs 350)</option>
                              <option value="350,Driving License Application">Driving License Application (Rs. 350)</option>
                          </select>
                      </td>
                      <td></td>
                    </tr>   
                  -->
                                                            <tr>
                                                                <td>21</td>
                                                                <td>CIBIL Report</td>
                                                                <td>Rs.100</td>
                                                                <td><input type="checkbox" value="100"
                                                                        class="messageCheckbox form-check-input" name="cibil_report"
                                                                        id="cibil_report" disabled></td>
                                                            </tr>

                                                            
                                                        </tbody>
                                                    </table>

                                                </div>


                                            </div>



                                            <div class="col-md-3 keep_gst_credential" style="display:none">
                                                <div class="form-group">
                                                    <input class="form-check-input" type="checkbox" name="keep_gst_credential"
                                                        id="keep_gst_credential" value="Keep GSTIN Credential">
                                                    <label for="keep_gst_credential"><strong style="color:red">GSTIN
                                                            credentials will be retained by PIPL for future
                                                            filing</strong></label>
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-12" style="padding-left: 0px; display: none;">
                                                <div class="form-group">
                                                    <label for="">Payment Option*</label>
                                                    <select class="form-control form-select" name="paymentoption"
                                                        id="paymentoptionid" onchange="javascript:valueselectcq()"
                                                        style="border-radius: 5px;" required="">
                                                        <option value="">Select</option>
                                                        <option style="display:none" class="proforma" value="proforma">
                                                            Proforma</option>

                                                        <option class="tax" value="addasp">Wallet</option>
                                                    </select>
                                                </div>
                                            </div> -->

                                            <!-- <div class="tax" id="paymentrtgs" style="display:none">

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">UTR*</label>
                                                        <input type="text" required="" value="" name="utrnumber"
                                                            id="utrnumberid" class="form-control">
                                                    </div>
                                                </div> -->

                                                <div class="col-md-3" id="payment_date" style="display:none">
                                                    <div class="form-group">
                                                        <label for="">Payment Date*</label>
                                                        <input type="date" value="" name="payment_date"
                                                            class="form-control req">
                                                    </div>
                                                </div>

                                                <div class="col-md-3" id="payment_bank" style="display:none">
                                                    <div class="form-group">
                                                        <label for="">Payment Bank*</label>
                                                        <select name="payment_bank" class="form-control req form-select">
                                                            <option value="">Bank Name</option>
                                                            <option value="Kotak Bank">Kotak Bank</option>
                                                            <option value="ICICI Bank">ICICI Bank</option>
                                                            <option value="Vijaya Bank">Vijaya Bank</option>
                                                            <option value="Axis Bank">Axis Bank</option>
                                                            <option value="Cash Received at office">Cash Received at
                                                                office</option>
                                                            <option value="Pending">Pending</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3" id="payment_amount" style="display:none">
                                                    <div class="form-group">
                                                        <label for="">Payment Amount*</label>
                                                        <input type="text" value=0 name="payment_amount"
                                                            class="form-control req" placeholder="Payment Amount" id="invoice_payment_amount">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="d-flex justify-content-center m-2 ">

                                                <!-- <button type="submit" name="submit" onclick="checkval()" value="submit" class="btn btn-success wdt-bg">Submit</button> -->
                                                <!-- <button type="submit" name="submit" value="submit" id="submit" onclick="checkval()"
                                                    class="btn btn-primary col-sm-3"><span>Submit</span> </button> -->
                                                    <input class="form-control btn btn-success wdt-bg" type="submit" id="btnSubmit" value="Submit" />
                                            </div>

                                        </div>
                                    </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>
<script type="text/javascript">
    function checkval(){
        $('.invoice-select').each(function(){
            $('#invoice_payment_amount').val((parseFloat($('#invoice_payment_amount').val()) + parseFloat($(this).val())).toFixed(2));
        })
    }

    $('#invoice_form').submit(function() {
      $('.invoice-select').each(function(){
            if(isNaN($(this).val())){
                $('#invoice_payment_amount').val((parseFloat($('#invoice_payment_amount').val()) + parseFloat($(this).val())).toFixed(2));
            }  
        })
    });

    $(document).ready(function(){
              
        $(document).on('click', 'input.messageCheckbox', function(){
            if($(this).is(':checked')){
                $('#invoice_payment_amount').val((parseFloat($('#invoice_payment_amount').val()) + parseFloat($(this).val())).toFixed(2));            
            }else{
                $('#invoice_payment_amount').val((parseFloat($('#invoice_payment_amount').val()) - parseFloat($(this).val())).toFixed(2)); 
            }
            console.log($('#invoice_payment_amount').val());

        });



    }) 
</script>