
<?php 

$type = $data;
$form_data = json_decode($this->user_model->get_service_data($type));
// print_r($data);

// foreach ($data as $key => $value) {
//   # code...
//   print_r($key);
// }

// $dsc_form = array(
//   array('name'=>'Class 3 - 2 Years - Signing', 'franchise'=>1000, 'customer'=>1250),
//   array('name'=>'Class 3 - 2 Years - Signing + Encryption', 'franchise'=>2200, 'customer'=>2200),
//   array('name'=>'DGFT - 1 Year', 'franchise'=>100, 'customer'=>2250),
//   array('name'=>'DGFT - 2 Years', 'franchise'=>1000, 'customer'=>4250),
// );

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
            <h4 class="header-title mb-3"><?php echo $page_title; ?> Edit</h4>
            <form enctype="multipart/form-data" action="<?php echo site_url('admin/save_price/'.$type); ?>" method="post">
              <div class="box-body">
                <div class="col-md-12">
                  <input type="hidden" name="service_type" value="">
                  <table>
                    <thead>
                      <tr>
                        <th class="col-md-4">Name</th>
                        <th class="col-md-4" >Rate for Franchise</th>
                        <th class="col-md-4">Rate for Cosutomer</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i=1;
                      foreach($form_data as $fields){
                        echo '<tr>
                          <td style="padding: 20px">'.$fields->name.'<input type="hidden" name="service_'.$i.'" value="'.$fields->name.'"></td>
                          <td style="padding: 20px"><input type="text"  name="'.$fields->name.'_franchise" class="form-control" value='.$fields->franchise.'></td>
                          <td style="padding: 20px"><input type="text" name="'.$fields->name.'_customer" class="form-control" value='.$fields->customer.'></td>
                          <input type="hidden" name="size" value="'.$i.'">
                        </tr>';
                        $i+=1;
                      }
                      /*foreach($dsc_form as $fields){
                        echo '<tr>
                          <td style="padding: 20px">'.$fields['name'].'<input type="hidden" name="service_'.$i.'" value="'.$fields['name'].'"></td>
                          <td style="padding: 20px"><input type="text"  name="'.$fields['name'].'_franchise" class="form-control" value='.$fields['franchise'].'></td>
                          <td style="padding: 20px"><input type="text" name="'.$fields['name'].'_customer" class="form-control" value='.$fields['customer'].'></td>
                          <input type="hidden" name="size" value="'.$i.'">
                        </tr>';
                        $i+=1;
                      }*/

                      ?>
                    </tbody>
                  </table>
                </div> <!-- col-md-12 -->

                <br><br>
                <button type="submit" value="submit" class="btn btn-success wdt-bg col-md-2">Submit</button> 
              </div> <!-- box-body --> 
            </form>

          </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>
