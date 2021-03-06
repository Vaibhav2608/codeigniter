<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a href="<?php echo site_url('user/customer_form/add_customer_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo 'Add a Customer'; ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo 'Services'; ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('name'); ?></th>
                                
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php $services = $this->user_model->get_all_services()->result_array();
                                    $key = 0;
                                    foreach($services as $service =>$values){
                                       ?>
                                        <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td>
                                        <?php echo strtoupper($values['name'])?>
                                    </td>
                                    
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/view_service_detail/'.$values['name']) ?>"><?php echo get_phrase('View Services'); ?></a></li>
                                                <!-- <li><a class="dropdown-item" href="<?php echo site_url('admin/franchise_form/edit_franchise_form/' . $user['id']) ?>"><?php echo get_phrase('edit'); ?></a></li> -->
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/instructors/delete/' . $user['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr><?php
                                $key+=1;
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>