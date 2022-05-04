<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('Customer Invoice'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<?php

$invoice_data = $this->user_model->get_invoice_by_id($invoice_id)->row_array();
$customer_data = $this->user_model->get_customer($invoice_data['customer_id'])->row_array();
$franchise_data = $this->user_model->get_franchise($invoice_data['franchise_id'])->row_array();
$services = json_decode($invoice_data['response']);

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <!-- Invoice Logo-->
                <div class="clearfix">
                    <div class="float-left mb-3">
                        <img src="<?php echo base_url('uploads/system/'.get_frontend_settings('dark_logo'));?>" alt="" height="18">
                    </div>
                    <div class="float-right">
                        <h4 class="m-0 d-print-none"><?php echo get_phrase("invoice"); ?></h4>
                    </div>
                </div>

                <!-- Invoice Detail-->
                <div class="row">
                    <div class="col-sm-6">

                    </div><!-- end col -->
                    <div class="col-sm-4 offset-sm-2">
                        <div class="mt-3 float-sm-right">
                            <p class="font-13"><strong><?php echo get_phrase("Invoice Created Date"); ?>: </strong> &nbsp;&nbsp;&nbsp; <?php echo $invoice_data['reg_date']; ?></p>
                            <!-- <p class="font-13"><strong><?php echo get_phrase("payment_status"); ?>: </strong> <?php if ($payout_details['status'] == 1): ?><span class="badge badge-success float-right"><?php echo get_phrase("paid"); ?></span><?php else: ?><span class="badge badge-danger float-right"><?php echo get_phrase("unpaid"); ?></span><?php endif; ?> </p> -->
                                <p class="font-13"><strong><?php echo get_phrase("Invoice Id"); ?>: </strong> <span class="float-right"><?php echo sprintf('%04d', $invoice_data['id']); ?></span></p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row mt-4">
                        <div class="col-sm-4">
                            <h6><?php echo get_phrase("Customer Detail"); ?></h6>
                            <address>
                                <?php echo $customer_data['name'] ?><br>
                                <?php echo $customer_data['email']; ?><br>
                            </address>
                        </div> <!-- end col-->

                        <div class="col-sm-4">
                            <h6><?php echo get_phrase("Franchise Detail"); ?></h6>
                            <address>
                                <?php echo $franchise_data['first_name']; ?><br>
                                <?php echo $franchise_data['email']; ?><br>
                            </address>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-4">
                                    <thead>
                                        <tr><th>#</th>
                                            <th><?php echo get_phrase("Serivce Type"); ?></th>
                                            <th><?php echo get_phrase("Name"); ?></th>
                                            <th class="text-right"><?php echo get_phrase("total"); ?></th>
                                        </tr></thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            <?php foreach($services as $key => $value) :?>
                                                <?php if(!empty($value) && $key!='total_payment'):

                                                    $p_name = explode(',', $value)
                                                    ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td>
                                                    <b><?php echo ucwords((str_replace('_', ' ', $key))); ?></b>
                                                </td>
                                                <?php if(sizeof($p_name)>1):?>
                                                <td>
                                                    <?php echo $p_name[1]; ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php echo currency($p_name[0]); ?>
                                                </td>
                                                <?php else:?>
                                                    <td>
                                                    <?php echo ''; ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php echo currency($p_name[0]); ?>
                                                </td>
                                                <?php endif;?>
                                                <?php $i+=1;?>
                                            </tr>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">

                            </div> <!-- end col -->
                            <div class="col-sm-6">
                                <div class="float-right mt-3 mt-sm-0">
                                    <p><b><?php echo get_phrase("sub_total"); ?>:</b> <span class="float-right">
                                        <?php echo currency($services->total_payment); ?>
                                    </span></p>
                                    <h3>
                                        <?php echo currency($services->total_payment); ?>
                                    </h3>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                        <div class="d-print-none mt-4">
                            <div class="text-right">
                                <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> <?php echo get_phrase('print'); ?></a>
                            </div>
                        </div>
                        <!-- end buttons -->

                    </div> <!-- end card-body-->
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>
