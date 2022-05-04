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

                <h4 class="header-title mb-3"><?php echo get_phrase('Franchise Add Form'); ?></h4>

                <form class="required-form" action="<?php echo site_url('admin/franchise/add'); ?>" enctype="multipart/form-data" method="post">
                    <div class="column">
    
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name" required><br><br>
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email"><br><br>
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password"><br><br>
                    <label class="form-label" for="addr">Address</label><br>
                    <textarea id="addr" name="addr" rows="3" cols="67"></textarea><br><br>
                    <label class="form-label" for="pan">PAN No.</label>
                    <input class="form-control" name="txtPANCard" type="text" placeholder="XXXXX 1234 X" id="txtPANCard" class="PAN" />
                    <label class="form-label" for="gstin">GSTIN No.</label> 
                    <!-- <input class="form-control" type="text" id="txtGSTIN" name="txtGSTIN" placeholder="22 AAAAA0000A 1 Z 5" pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$" title="Invalid GST Number." /><br><br> -->
                    <input class="form-control" type="text" id="txtGSTIN" name="txtGSTIN" placeholder="22 AAAAA0000A 1 Z 5" title="Invalid GST Number." /><br><br>
                    <label class="form-label" for="gstregyr">GSTIN Registration Year.</label> 
                    <input class="form-control" name="gstregyr" type="text" id="gstregyr" name="gstregyr" />
                    
                </div>

                <div class="column"><br><br>
                    <label class="form-label" for="cmpny">Company</label>
                    <input class="form-control" type="text" id="cmpny" name="cmpny"><br><br>
                    <label class="form-label" for="phone">Phone</label>
                    <input class="form-control" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required placeholder="123-456-7890" id="mobno" name="mobno"><br><br>
                    <label class="form-label" for="aadhhar">Aadhaar</label>
                    <input class="form-control" type="text" name="aadhharno" required id="aadhharno" placeholder="XXXX XXXX XXXX" ><br><br>
                    <input class="form-control" type="submit" id="btnSubmit" value="Submit" />
                </div> <!-- end #progressbarwizard-->
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