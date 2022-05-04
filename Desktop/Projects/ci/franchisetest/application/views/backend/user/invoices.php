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
                <h4 class="mb-3 header-title"><?php echo 'Customers'; ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo 'Invoice ID' ?></th>
                                <th><?php echo get_phrase('name'); ?></th>
                                <th><?php echo 'Phone'; ?></th>
                                <th><?php echo 'Date'; ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $key => $invoice) : ?>
                                <?php $customer = $this->user_model->get_customer($invoice['customer_id'])->result_array();?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td>
                                        <!-- <img src="<?php echo $this->user_model->get_user_image_url($user['id']); ?>" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail"> -->
                                        <?php echo $invoice['id'];?>
                                    </td>
                                    <td><?php echo $customer[0]['name']; ?></td>
                                    <td><?php echo $customer[0]['phone']; ?></td>
                                    <td>
                                        <?php echo $invoice['reg_date'];?>
                                       <!--  <?php echo $this->user_model->get_number_of_active_courses_of_instructor($user['id']) . ' ' . strtolower(get_phrase('active services')); ?> -->
                                    </td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('user/customer_form/view_invoice/' . $invoice['id']); ?>"><?php echo get_phrase('View Invoice'); ?></a></li>
                                                <!-- <li><a class="dropdown-item" href="<?php echo site_url('admin/franchise_form/edit_franchise_form/' . $user['id']) ?>"><?php echo get_phrase('edit'); ?></a></li> -->
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('user/customer_form/view_invoice' . $invoice['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>