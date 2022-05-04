<?php
    $user_data = $this->db->get_where('users', array('id' => $user_id))->row_array();
    $additonal_data = $this->db->get_where('franchise', array('franchise_id' => $user_id))->row_array();
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

                <h4 class="header-title mb-3"><?php echo "Edit here"; ?></h4>

                <form class="required-form" action="<?php echo site_url('admin/franchises/edit/'.$user_id); ?>" enctype="multipart/form-data" method="post">
                    <div class="column">
    
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="<?php echo $user_data['first_name']?>"><br><br>
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" value="<?php echo $user_data['email']?>" ><br><br>
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password" readonly value="<?php echo $user_data['password']?>"><br><br>
                    <label class="form-label" for="addr">Address</label><br>
                    <textarea id="addr" name="addr" rows="3" cols="67" value="<?php echo $additonal_data['address']?>"></textarea><br><br>
                    <label class="form-label" for="pan">PAN No.</label>
                    <input class="form-control" name="txtPANCard" type="text" placeholder="XXXXX 1234 X" id="txtPANCard" value="<?php echo $additonal_data['pan_no']?>" class="PAN" />
                    <label class="form-label" for="gstin">GSTIN No.</label> 
                    <!-- <input class="form-control" type="text" id="txtGSTIN" name="txtGSTIN" placeholder="22 AAAAA0000A 1 Z 5" pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$" title="Invalid GST Number." /><br><br> -->
                    <input class="form-control" type="text" id="txtGSTIN" name="txtGSTIN" placeholder="22 AAAAA0000A 1 Z 5" title="Invalid GST Number." value="<?php echo $additonal_data['gst_no']?>" /><br><br>
                    <label class="form-label" for="gstregyr">GSTIN Registration Year.</label> 
                    <input class="form-control" name="gstregyr" type="text" id="gstregyr" name="gstregyr" value="<?php echo $additonal_data['gst_registration_year']?>"/>
                    
                </div>

                <div class="column"><br><br>
                    <label class="form-label" for="cmpny">Company</label>
                    <input class="form-control" type="text" value="<?php echo $additonal_data['company_name']?>" id="cmpny" name="cmpny"><br><br>
                    <label class="form-label" for="phone">Phone</label>
                    <input class="form-control" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required placeholder="123-456-7890" id="mobno" name="mobno" value="<?php echo $additonal_data['phone']?>"><br><br>
                    <label class="form-label" for="aadhhar">Aadhaar</label>
                    <input class="form-control" type="text" name="aadhharno" required id="aadhharno" placeholder="XXXX XXXX XXXX" value="<?php echo $additonal_data['aadhar_no']?>"><br><br>
                    <input class="form-control" type="submit" id="btnSubmit" value="Submit" />
                </div> <!-- end #progressbarwizard-->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>