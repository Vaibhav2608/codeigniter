<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function get_admin_details()
    {
        return $this->db->get_where('users', array('role_id' => 1));
    }

    public function get_user($user_id = 0)
    {
        if ($user_id > 0) {
            $this->db->where('id', $user_id);
        }
        $this->db->where('role_id', 2);
        return $this->db->get('users');
    }

    public function get_all_user($user_id = 0)
    {
        if ($user_id > 0) {
            $this->db->where('id', $user_id);
        }
        return $this->db->get('users');
    }

    public function add_user($is_instructor = false, $is_admin = false)
    {
        $validity = $this->check_duplication('on_create', $this->input->post('email'));
        if ($validity == false) {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        } else {
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $social_link['facebook'] = html_escape($this->input->post('facebook_link'));
            $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
            $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
            $data['social_links'] = json_encode($social_link);
            $data['biography'] = $this->input->post('biography');

            if ($is_admin) {
                $data['role_id'] = 1;
                $data['is_instructor'] = 1;
            } else {
                $data['role_id'] = 2;
            }

            $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
            $data['wishlist'] = json_encode(array());
            $data['watch_history'] = json_encode(array());
            $data['status'] = 1;
            $data['image'] = md5(rand(10000, 10000000));

            // Add paypal keys
            $payment_keys = array();

            $paypal['production_client_id']  = html_escape($this->input->post('paypal_client_id'));
            $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
            $payment_keys['paypal'] = $paypal;

            // Add Stripe keys
            $stripe['public_live_key'] = html_escape($this->input->post('stripe_public_key'));
            $stripe['secret_live_key'] = html_escape($this->input->post('stripe_secret_key'));
            $payment_keys['stripe'] = $stripe;

            // Add razorpay keys
            $razorpay['key_id'] = html_escape($this->input->post('key_id'));
            $razorpay['secret_key'] = html_escape($this->input->post('secret_key'));
            $payment_keys['razorpay'] = $razorpay;

            //All payment keys
            $data['payment_keys'] = json_encode($payment_keys);

            if ($is_instructor) {
                $data['is_instructor'] = 1;
            }

            $this->db->insert('users', $data);
            $user_id = $this->db->insert_id();

            // IF THIS IS A USER THEN INSERT BLANK VALUE IN PERMISSION TABLE AS WELL
            if ($is_admin) {
                $permission_data['admin_id'] = $user_id;
                $permission_data['permissions'] = json_encode(array());
                $this->db->insert('permissions', $permission_data);
            }

            $this->upload_user_image($data['image']);
            $this->session->set_flashdata('flash_message', get_phrase('user_added_successfully'));
        }
    }

    public function add_customer(){
        $validity = $this->check_customer_duplication('on_create', $this->input->post('email'));
        if ($validity == false) {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        } else {
            print_r($this->input->post());
            $data['franchise_id'] = $this->session->userdata('user_id');
            $data['name'] = html_escape($this->input->post('customername'));
            $data['company_name'] = html_escape($this->input->post('companyname'));
            $data['phone'] = html_escape($this->input->post('mobileno'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['state'] = html_escape($this->input->post('state'));
            $data['dob'] = html_escape($this->input->post('dob'));
            $data['address'] = html_escape($this->input->post('address'));
            $data['pan_no'] = html_escape($this->input->post('pancardno'));
            $data['aadhar_no'] = html_escape($this->input->post('aadhar_no'));
            $data['gstin_no'] = html_escape($this->input->post('gst_number'));
            $data['gst_reg_month'] = html_escape($this->input->post('gst_reg_month'));
            $data['gst_reg_year'] = html_escape($this->input->post('gst_reg_year'));
            $this->db->insert('customer', $data);
            $customer_id = $this->db->insert_id();
            if($customer_id>0){
                $this->session->set_flashdata('flash_message', 'Custoemr Added Successfully');
            }
        }
    }


    public function get_franchise_customer($user_id=""){
        if ($id > 0) {
            return $this->db->get_where('customer', array('franchise_id' => $user_id, 'is_franchise' => 1));
        } else {
            return $this->db->get('customer');
        }
    }

    public function get_customer($id=0){
        if($id != 0 ){
            return $this->db->get_where('customer', array('id' => $id));
        }
        return $this->db->get_where('customer');
    
    }

    public function get_applied_form_data($form_id){
        $form = explode('_', $form_id);
        
        return $this->db->get_where($form[0], array('id'=>$form[1]))->row()->form_data;
    }

    public function get_application_detail($form_id){
        $form = explode('_', $form_id);
        
        return $this->db->get_where($form[0], array('id'=>$form[1]))->row();
    }

    public function get_form_status($form_id){
        return $this->db->get('applications', array('form_id'=>$form_id))->row()->status;
    }

    public function get_form_detail($form_id){
         $form = explode('_', $form_id);
        
        return $this->db->get_where($form[0], array('id'=>$form[1]))->row();
    }

    public function get_application_by_status($status){
        if(!empty($status)){
            return $this->db->get_where('applications', array('status'=>$status));
        }
    }

    public function update_status($form_id){
        $status = html_escape($this->input->post('status'));
        if(!empty($status)){
            $this->db->set('status', $status);
            $this->db->where('form_id', $form_id);
            $this->db->update('applications');
        }else{
            $this->db->set('status', 'pending');
            $this->db->where('form_id', $form_id);
            $this->db->update('applications');
        }
    }

    public function itr_service_form(){
        $config['upload_path']          = './uploads/forms';
        
        
        // $config['upload_path'] = './img/header/';   
        $config['allowed_types'] = 'rar|zip|gif|jpg|png|jpeg';
        $config['max_size'] = '2048000';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $form['franchise_id'] = $this->session->userdata('user_id');
        $form['customer_id'] = html_escape($this->input->post('customer_id'));
        $form['date'] = date('Y-m-d H:i:s');
        $form['invoice_id'] = $this->input->post('invoice');
        $additional_data['it_password']= html_escape($this->input->post('it_password'));
        if($additional_data['it_password']=='Yes'){
            $additional_data['eitrpassword']= html_escape($this->input->post('eitrpassword'));
        }
        
        $additional_data['firstname']= html_escape($this->input->post('firstname'));
        $additional_data['middlename']= html_escape($this->input->post('middlename'));
        $additional_data['lastname']= html_escape($this->input->post('lastname'));
        $additional_data['pan']= html_escape($this->input->post('pan'));
        $additional_data['gender']= html_escape($this->input->post('gender'));
        $additional_data['dob']= html_escape($this->input->post('dob'));
        $additional_data['fathername']= html_escape($this->input->post('fathername'));
        $additional_data['flatdoorbuilding']= html_escape($this->input->post('flatdoorbuilding'));
        $additional_data['nameofpremises']= html_escape($this->input->post('nameofpremises'));
        $additional_data['street']= html_escape($this->input->post('street'));
        $additional_data['locality']= html_escape($this->input->post('locality'));
        $additional_data['town']= html_escape($this->input->post('town'));
        $additional_data['state']= html_escape($this->input->post('state'));
        $additional_data['pincode']= html_escape($this->input->post('pincode'));
        $additional_data['email']= html_escape($this->input->post('email'));
        $additional_data['mobileno']= html_escape($this->input->post('mobileno'));
        $additional_data['aadhaarno']= html_escape($this->input->post('aadhaarno'));
        $additional_data['passport']= html_escape($this->input->post('passport'));
        $additional_data['passport_number']= html_escape($this->input->post('passport_number'));
        $additional_data['amount_shown']= html_escape($this->input->post('amount_shown'));
        $additional_data['nature_of_business']= html_escape($this->input->post('nature_of_business'));
        $additional_data['gstin']= html_escape($this->input->post('gstin'));
        $additional_data['deposited']= html_escape($this->input->post('deposited'));
        $additional_data['deposited_amount']= html_escape($this->input->post('deposited_amount'));
        $additional_data['expenditure']= html_escape($this->input->post('expenditure'));
        $additional_data['expenditure_amount']= html_escape($this->input->post('expenditure_amount'));
        $additional_data['expenditure1']= html_escape($this->input->post('expenditure1'));
        $additional_data['expenditure1_amount']= html_escape($this->input->post('expenditure1_amount'));
        $additional_data['comment']= html_escape($this->input->post('comment'));
        $additional_data['Bank1Name']= html_escape($this->input->post('Bank1Name'));
        $additional_data['Bank1IFSC']= html_escape($this->input->post('Bank1IFSC'));
        $additional_data['Bank1AccountNo']= html_escape($this->input->post('Bank1AccountNo'));

        $additional_data['Bank1AccountType']= html_escape($this->input->post('Bank1AccountType'));


        if ( ! $this->upload->do_upload('partnershippancardlist1'))
        {
                $error = array('error' => $this->upload->display_errors());

                print_r($error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                
                //$this->load->view('upload_success', $data);
        }          

        $additional_data['file_name'] = $data['upload_data']['file_name'];
        $additional_data['attachment_url'] = $config['upload_path'].'/'.$additional_data['file_name'];
        $form['form_data'] = json_encode($additional_data);
        
        $this->db->insert('itr', $form);
        $form_id = $this->db->insert_id();
        if($form_id>0){
            $application['form_id'] = 'itr_'.$form_id;
            $application['franchise_id'] = $form['franchise_id'];
            $application['customer_id'] = $form['customer_id'];
            $application['applied_date  '] = $form['date'];
            $application['type'] = 'itr';
            $this->db->insert('applications', $application);
            $application_id = $this->db->insert_id();
            if($application_id>0){
                $this->session->set_flashdata('flash_message', 'Your application is been added successfully');
            }else{
            $this->session->set_flashdata('error_message', 'There is some issue in your data');

            }
        }else{
            $this->session->set_flashdata('error_message', 'There is some issue in your data');
        }
   
    }

    public function get_customer_by_invoice_id($invoice_id){
        $customer_id = $this->db->get_where('invoice', array('id'=>$invoice_id))->row()->customer_id;
        $customer = $this->get_customer($customer_id);
        return $customer;

    }

public function gst_service_form(){
   //print_r($this->input->post());
    $config['upload_path'] = './uploads/forms';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = '2048000';
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
 
  $form_data['invoice_id'] = html_escape($this->input->post('invoice'));
  $form_data['customer_id']= html_escape($this->input->post('startid'));
  $form_data['franchise_id'] =  $this->session->userdata('user_id');
  $form_data['date'] = date('Y-m-d H:i:s');      

 $additional_data['gstnreg_name'] = html_escape($this->input->post('gstnreg_name'));
 $additional_data['CompanyName'] = html_escape($this->input->post('CompanyName'));
 $additional_data['CompanyPerson'] = html_escape($this->input->post('CompanyPerson'));
 $additional_data['pancardno'] = html_escape($this->input->post('pancardno'));
 $additional_data['State'] = html_escape($this->input->post('State'));
 $additional_data['ContactNo'] = html_escape($this->input->post('ContactNo'));
 $additional_data['AlternateNo'] = html_escape($this->input->post('AlternateNo'));
 $additional_data['PrimaryEmailId'] = html_escape($this->input->post('PrimaryEmailId'));
 $additional_data['District'] = html_escape($this->input->post('District'));
 $additional_data['gst_number'] = html_escape($this->input->post('gst_number'));
 $additional_data['gst_username'] = html_escape($this->input->post('gst_username'));
 $additional_data['gst_password'] = html_escape($this->input->post('gst_password'));
 $additional_data['OtherMention'] = html_escape($this->input->post('OtherMention'));
 $additional_data['Address'] = html_escape($this->input->post('Address'));
 $additional_data['PinCode'] = html_escape($this->input->post('PinCode'));
 $additional_data['dCommencement'] = html_escape($this->input->post('dCommencement'));
 $additional_data['compositescheme'] = html_escape($this->input->post('compositescheme'));
 $additional_data['AlternateEmailId'] = html_escape($this->input->post('AlternateEmailId'));
 $additional_data['WebsiteAddress'] = html_escape($this->input->post('WebsiteAddress'));
 $additional_data['TypeOfOrganisation'] = html_escape($this->input->post('TypeOfOrganisation'));
 $additional_data['CompanyOverview'] = html_escape($this->input->post('CompanyOverview'));
 $additional_data['OrganisationTypeDocuments'] = html_escape($this->input->post('OrganisationTypeDocuments'));
 

$selector=html_escape($this->input->post('OrganisationTypeDocuments'));   
$zip = new ZipArchive();
$zip_name = $config['upload_path'].'/'.$form_data['customer_id'].'_'.date('YmdHis', time()).'_gst'.".zip";
         
    // Create a zip target
if($zip->open($zip_name, ZipArchive::CREATE) !== TRUE){
    $error .= "Sorry ZIP creation is not working currently.<br/>";
}
if($selector == "proprietor"){
    $files = array('Pancardproprietorship','Aadharcardproprietorship', 'Photographproprietorship', 'ShopaddressProof','existingregistrationcert' );
}elseif($selector == "partnership"){
    $files = array('PancardFirmpartnership','PartnershipDeed','FirmaddressProof','CancelledChequeofFirmAccount','AuthorisedSignatoryPartnership','partnershippancardlist','partnershipaadharcardlist','partnershipphotographcardlist');
}elseif($selector == "company"){
    $files = array('PANCardofCompany','CertificateofIncorporationofCompany','CompanyaddressProof',
    'CancelledChequeofCompanyAccount','CompanyAuthorisedSignatory',
    'CompanyDSCofAuthorisedSignatory','companypancardlist','companyaadharcardlist','companyphotographcardlist');
}
    
 foreach($files as $file){
    $newname = date('YmdHis', time()) . mt_rand() . '.jpg';
    $zip->addFromString($file.'.jpg', // naming the file which will show in zip
    file_get_contents($_FILES[$file]['tmp_name']));
    move_uploaded_file($_FILES[$file]['tmp_name'],'./uploads/forms/'.$newname); 
            $path =$config['upload_path'].'/'.$newname;
                
    if(file_exists($path)){
        unlink($path);
    }   

} 
$zip->close();
$success = basename($zip_name);
    $additional_data['attachment_url']=$zip_name;
    $additional_data['file_name'] = $success;
    $form_data['form_data'] = json_encode($additional_data);
    $this->db->insert('gst', $form_data);
    $form_id = $this->db->insert_id();
    if($form_id>0){
        $application['form_id'] = 'gst_'.$form_id;
        $application['franchise_id'] = $form_data['franchise_id'];
        $application['customer_id'] = $form_data['customer_id'];
        $application['applied_date  '] = $form_data['date'];
        $application['type'] = 'gst';
        $this->db->insert('applications', $application);
        $application_id = $this->db->insert_id();
        if($application_id>0){
            $this->session->set_flashdata('flash_message', 'Your application is been added successfully');
        }else{
        $this->session->set_flashdata('error_message', 'There is some issue in your data');

        }
    }else{
        $this->session->set_flashdata('error_message', 'There is some issue in your data');
    }
         

}

    public function dsc_service_form(){

        $config['upload_path']          = './uploads/forms';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048000';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $files = $_FILES;
        $form_data['invoice_id'] = html_escape($this->input->post('invoice'));
        $form_data['customer_id']= html_escape($this->input->post('startid'));
        $form_data['franchise_id'] =  $this->session->userdata('user_id');
        $form_data['date'] = date('Y-m-d H:i:s');
        $additional_data['dsc_name'] = html_escape($this->input->post('dsc_name'));
        $additional_data['dsc_for'] = html_escape($this->input->post('dsc_for'));
        if($additional_data['dsc_for']=='Organisation'){
            $additional_data['organisation'] = html_escape($this->input->post('organisation'));
        }
        $additional_data['CompanyPerson'] = html_escape($this->input->post('CompanyPerson'));
        $additional_data['ContactNo'] = html_escape($this->input->post('ContactNo'));
        $additional_data['PrimaryEmailId'] = html_escape($this->input->post('PrimaryEmailId'));
        $additional_data['user_dob'] = html_escape($this->input->post('user_dob'));
        $additional_data['pan_no'] = html_escape($this->input->post('pan_no'));
        $additional_data['aadhar_no'] = html_escape($this->input->post('aadhar_no'));
        $additional_data['address'] = html_escape($this->input->post('address'));
        $additional_data['retained_courier'] = html_escape($this->input->post('retained_courier'));

        /*if($this->upload->do_upload('Pancardproprietorship')){
            $data = $this->upload->data();
            $file_name['Pancardproprietorship'] = $data['file_name'];
            // print_r($data);
        }
        if($files['Aadharcardproprietorship']['name'][0] != ''){
            $mum_files = count($files['Aadharcardproprietorship']);
            $dataInfo = array();
            for($i=0; $i<$mum_files; $i++){

                if ( isset($files['Aadharcardproprietorship']['name'][$i]) ) {

                    $config['file_name'] = time().'-'.$files['Aadharcardproprietorship']['name'][$i];
                    $this->load->library('upload', $config);

                    $_FILES['Aadharcardproprietorship']['name']= $files['Aadharcardproprietorship']['name']["$i"];
                    $_FILES['Aadharcardproprietorship']['type']= $files['Aadharcardproprietorship']['type']["$i"];
                    $_FILES['Aadharcardproprietorship']['tmp_name']= $files['Aadharcardproprietorship']['tmp_name']["$i"];
                    $_FILES['Aadharcardproprietorship']['error']= $files['Aadharcardproprietorship']['error']["$i"];
                    $_FILES['Aadharcardproprietorship']['size']= $files['Aadharcardproprietorship']['size']["$i"];    

                    $filename = rand().'-'.$_FILES['Aadharcardproprietorship']['name'];

                    if ( ! $this->upload->do_upload('Aadharcardproprietorship'))
                    {
                        $error_message = $this->upload->display_errors();

                        $this->session->set_flashdata('status', 'error');
                        $this->session->set_flashdata('message', "$error_message");
                        echo 'not happend';
                    }
                    else
                    {
                        //$data = array('upload_data' => $this->upload->data());

                        $this->session->set_flashdata('status', 'success');
                        $this->session->set_flashdata('message', "Files upload is success");
                    }

                    $data = $this->upload->data(); //all the info about the uploaded files are stored in this array
                    $$dataInfo[]=$data;
                    $file_name['Aadharcardproprietorship'][]= $data['file_name'];

                }
            }
        }
        if($files['photo']['name']!=''){
            if($this->upload->do_upload('photo')){
                $data = $this->upload->data();
                $file_name['photo'] = $data['file_name'];
            }
        }
        if($files['form']['name']!=''){
            if($this->upload->do_upload('form')){
                $data = $this->upload->data();
                $file_name['dgft_form'] = $data['file_name'];
            }
        }*/


    $zip = new ZipArchive();
    $zip_name = $config['upload_path'].'/'.$form_data['customer_id'].'_'.date('YmdHis', time()).'_dsc'.".zip";

    if($zip->open($zip_name, ZipArchive::CREATE) !== TRUE){
      $error .= "Sorry ZIP creation is not working currently.<br/>";
    }
    $files= array('Pancardproprietorship','Aadharcardproprietorship','photo','form');
    foreach($files as $file){
        $newname = date('YmdHis', time()) . mt_rand() . '.jpg';
        if(is_array($_FILES[$file]['name'])){
            $i=1;
            foreach($_FILES[$file]['name'] as $name){
                $zip->addFromString($file.$i.'.jpg', 
                file_get_contents($_FILES[$file]['tmp_name'][$i-1]));
                move_uploaded_file($_FILES[$file]['tmp_name'][$i-1],'./uploads/forms/'.$newname); 
                $path =$config['upload_path'].'/'.$newname;            
                if(file_exists($path)){
                    unlink($path);
                }
                $i++;   
            }
        }else{
            $zip->addFromString($file.'.jpg', 
            file_get_contents($_FILES[$file]['tmp_name']));
            move_uploaded_file($_FILES[$file]['tmp_name'],'./uploads/forms/'.$newname); 
            $path =$config['upload_path'].'/'.$newname;            
            if(file_exists($path)){
                unlink($path);
            }  
        }
         
    } 
    $zip->close();
    $success = basename($zip_name);
    $additional_data['attachment_url']=$zip_name;
    $additional_data['file_name'] = $success;
    $form_data['form_data'] = json_encode($additional_data);
    $this->db->insert('dsc', $form_data);
    $form_id = $this->db->insert_id();
        if($form_id>0){
            $application['form_id'] = 'dsc_'.$form_id;
            $application['franchise_id'] = $form_data['franchise_id'];
            $application['customer_id'] = $form_data['customer_id'];
            $application['applied_date  '] = $form_data['date'];
            $application['type'] = 'dsc';
            $this->db->insert('applications', $application);
            $application_id = $this->db->insert_id();
            if($application_id>0){
                $this->session->set_flashdata('flash_message', 'Your application is been added successfully');
            }else{
            $this->session->set_flashdata('error_message', 'There is some issue in your data');

            }
        }else{
            $this->session->set_flashdata('error_message', 'There is some issue in your data');
        }
    }

    public function get_form_data($title,$franchise_id=0){
        if($franchise_id != 0 ){
            return $this->db->get_where($title, array('franchise_id' => $franchise_id));
        }

        return $this->db->get_where($title);
    }

    public function get_attachment_url($form_id){
        $form = explode('_', $form_id);
        $data = $this->db->get_where($form[0], array('id'=>$form[1]))->row();
        $file = json_decode($data->form_data);
        return $file->attachment;
    }

    public function get_zip_attachment_url($form_id){
        $form = explode('_', $form_id);
        $data = $this->db->get_where($form[0], array('id'=>$form[1]))->row();
        $file = json_decode($data->form_data);
        $file_content = array( $file->file_name, $file->attachment_url);
        return json_encode($file_content);
    }

    public function get_dsc_zip_attachment_url($form_id){
        $form = explode('_', $form_id);
        $data = $this->db->get_where($form[0], array('id'=>$form[1]))->row();
        $file = json_decode($data->form_data);
        $file_content = array($file->attachment_url, $file->file_name);
        return json_encode($file_content);
    }

    public function get_all_services(){
        return $this->db->get('services');
    }

    public function get_service_data($type){
        return $this->db->get_where('services', array('name'=>$type))->row()->data;
    }

    public function get_application_data($title='',$franchise_id=0){
        if($franchise_id != 0 || $title!=''){
            return $this->db->get_where('applications', array('franchise_id' => $franchise_id, 'type'=>$title));
        }

        return $this->db->get_where('applications');
    }
    public function check_customer_duplication($action="", $email = "", $user_id = "" ){
         $duplicate_email_check = $this->db->get_where('customer', array('email' => $email));

        if ($action == 'on_create') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->status == 1) {
                    return false;
                } else {
                    return 'unverified_user';
                }
            } else {
                return true;
            }
        } elseif ($action == 'on_update') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->id == $user_id) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        }
    }

    public function add_franchise(){

        $validity = $this->check_duplication('on_create', $this->input->post('email'));
        if ($validity == false) {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        } else {
            $data['first_name'] = html_escape($this->input->post('name'));
            // $data['last_name'] = html_escape($this->input->post('last_name'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            // $social_link['facebook'] = html_escape($this->input->post('facebook_link'));
            // $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
            // $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
            // $data['social_links'] = json_encode($social_link);
            // $data['biography'] = $this->input->post('biography');

            // if ($is_admin) {
            //     $data['role_id'] = 1;
            //     $data['is_instructor'] = 1;
            // } else {
                $data['role_id'] = 2;
            // }

            $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
            $data['is_franchise'] = 1;
            $data['status'] = 1;
            $additional_data['gst_no']= html_escape($this->input->post('txtGSTIN'));
            $additional_data['gst_registration_year']= html_escape($this->input->post('gstregyr'));
            $additional_data['company_name'] = html_escape($this->input->post('cmpny'));
            $additional_data['phone'] = html_escape($this->input->post('mobno'));
            $additional_data['aadhar_no'] = html_escape($this->input->post('aadhharno'));
            $additional_data['address'] = html_escape($this->input->post('address'));
            $additional_data['pan_no'] = html_escape($this->input->post('txtPANCard'));

           
            // Add paypal keys
            $payment_keys = array();

            // $paypal['production_client_id']  = html_escape($this->input->post('paypal_client_id'));
            // $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
            // $payment_keys['paypal'] = $paypal;

            // Add Stripe keys
            // $stripe['public_live_key'] = html_escape($this->input->post('stripe_public_key'));
            // $stripe['secret_live_key'] = html_escape($this->input->post('stripe_secret_key'));
            // $payment_keys['stripe'] = $stripe;

            // // Add razorpay keys
            // $razorpay['key_id'] = html_escape($this->input->post('key_id'));
            // $razorpay['secret_key'] = html_escape($this->input->post('secret_key'));
            // $payment_keys['razorpay'] = $razorpay;

            //All payment keys
            // $data['payment_keys'] = json_encode($payment_keys);

            // if ($is_instructor) {
            //     $data['is_instructor'] = 1;
            // }

            $this->db->insert('users', $data);
            $user_id = $this->db->insert_id();
            if(!$user_id){
                $this->session->set_flashdata('error_message', 'Something went worng, Please try again!');
            }else{
                $additional_data['franchise_id'] = $user_id;
                $this->db->insert('franchise', $additional_data);
                $this->session->set_flashdata('flash_message', 'Franchise added successfully');
            }
            
            
            // IF THIS IS A USER THEN INSERT BLANK VALUE IN PERMISSION TABLE AS WELL
            

            // $this->upload_user_image($data['image']);
            
        }

    }



    public function get_franchise($id = 0)
    {
        if ($id > 0) {
            return $this->db->get_where('users', array('id' => $id, 'is_franchise' => 1));
        } else {
            return $this->db->get_where('users', array('is_franchise' => 1));
        }
    }
    public function edit_franchise($user_id = "")
    { // Admin does this editing
        $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);
        if ($validity) {
            $data['first_name'] = html_escape($this->input->post('name'));

            if (isset($_POST['email'])) {
                $data['email'] = html_escape($this->input->post('email'));
            }
            
            $data['last_modified'] = strtotime(date("Y-m-d H:i:s"));
            $additional_data['gst_no']= html_escape($this->input->post('txtGSTIN'));
            $additional_data['gst_registration_year']= html_escape($this->input->post('gstregyr'));
            $additional_data['company_name'] = html_escape($this->input->post('cmpny'));
            $additional_data['phone'] = html_escape($this->input->post('mobno'));
            $additional_data['aadhar_no'] = html_escape($this->input->post('aadhharno'));
            $additional_data['address'] = html_escape($this->input->post('address'));
            $additional_data['pan_no'] = html_escape($this->input->post('txtPANCard'));
            
            
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);

            $this->db->where('franchise_id', $user_id);
            $this->db->update('franchise', $additional_data);
            $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }
    }

    public function add_invoice(){
        
        // $data['customer_id'] = html_escape($this->input->post('customer_id'));
        // $data['franchise_id'] = html_escape($this->session->userdata('user_id'));
        // $data['customer_id'] = html_escape($this->input->post('customer_id'));
        // $data['franchise_id'] = html_escape($this->session->userdata('user_id'));
        $data['gsnt_no'] = html_escape($this->input->post('gstnno'));
        $data['gst_reg_charge'] = html_escape($this->input->post('gstnreg_charge'));
        $data['gst_audit'] = html_escape($this->input->post('gst_audit_charge'));
        $data['micro_finance'] = html_escape($this->input->post('borrower'));
        $data['digital_singnatur '] = html_escape($this->input->post('dscnreg_charge'));
        $data['comapany_pan_card'] = html_escape($this->input->post('pannreg_charge'));
        $data['uti_pan_card_coupon'] = html_escape($this->input->post('direct_pan_coupons_charge'));
        $data['e-way_bill_registration'] = html_escape($this->input->post('ewaybill_registration_charge'));
        $data['e-waybill_generator'] = html_escape($this->input->post('ewaybill_generator_charge'));
        $data['income_tax_assessment_year'] = html_escape($this->input->post('assessmentyear'));
        $data['gst_return_filling'] = html_escape($this->input->post('gstreturnfilling'));
        $data['gst_return_month'] = html_escape($this->input->post('monthreoprt'));
        $data['gst_return_filling_package'] = html_escape($this->input->post('gst_return_package'));
        $data['gst_return_filling_package_start_month'] = html_escape($this->input->post('package_start_month'));
        $data['tan_regiration'] = html_escape($this->input->post('tan_register_charge'));
        $data['tds_return_quater'] = html_escape($this->input->post('tds_returns_charge'));
        $data['tds_retrun_finacial_year'] = html_escape($this->input->post('tds_finance'));
        $data['profession_tax_registration'] = html_escape($this->input->post('pt_tax_registration_charge'));
        $data['profession_tax_retrun'] = html_escape($this->input->post('pt_tax_returns_charge'));
        $data['company_service'] = html_escape($this->input->post('com_service_type'));
        $data['book_keeping'] = html_escape($this->input->post('bookkeeping'));
        $data['book_keeping_month'] = html_escape($this->input->post('bk_month'));
        $data['book_keeping_year'] = html_escape($this->input->post('bk_year'));
        $data['addittional_service_charges'] = html_escape($this->input->post('subsequentnumofentries'));
        $data['print_out_price'] = html_escape($this->input->post('printoutprice'));
        $data['exit_cost'] = html_escape($this->input->post('exitcost'));
        $data['revocation_of_cancel_gst'] = html_escape($this->input->post('revocation_charge'));
        $data['cibil_report'] = html_escape($this->input->post('cibil_report'));
        $data['total_payment'] = html_escape($this->input->post('payment_amount'));
        // $this->db->insert('customer_invoice', $data);
        // $user_id = $this->db->insert_id();

        $encode_invoice['reg_date'] = date('Y-m-d H:i:s');
        $encode_invoice['response'] = json_encode($data);
        $encode_invoice['customer_id'] = html_escape($this->input->post('customer_id'));
        $encode_invoice['franchise_id'] = html_escape($this->session->userdata('user_id'));
        $this->db->insert('invoice', $encode_invoice);
        $user_id = $this->db->insert_id();
        if($user_id>0){
            

            $this->session->set_flashdata('flash_message', 'Invoice is Created');
        } else {
            $this->session->set_flashdata('error_message', get_phrase('Some error occured please try again!'));
        }

    }

    public function get_invoice($franchise_id=0, $customer_id=0){
        if($franchise_id){
            return $this->db->get_where('invoice', array('franchise_id'=>$franchise_id));

        }elseif($customer_id){
            return $this->db->get_where('invoice', array('customer_id'=>$customer_id));
        }


        return $this->db->get_where('invoice', array());
    }

    public function get_invoice_by_id($invoice_id=0){
        return $this->db->get_where('invoice', array('id'=>$invoice_id));
    }

    public function add_shortcut_user($is_instructor = false)
    {
        $validity = $this->check_duplication('on_create', $this->input->post('email'));
        if ($validity == false) {
            $response['status'] = 0;
            $response['message'] = get_phrase('this_email_already_exits') . '. ' . get_phrase('please_use_another_email');
            return json_encode($response);
        } else {
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $social_link['facebook'] = '';
            $social_link['twitter'] = '';
            $social_link['linkedin'] = '';
            $data['social_links'] = json_encode($social_link);
            $data['role_id'] = 2;
            $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
            $data['wishlist'] = json_encode(array());
            $data['watch_history'] = json_encode(array());
            $data['status'] = 1;
            $data['image'] = md5(rand(10000, 10000000));

            // Add paypal keys
            $payment_keys = array();

            $paypal['production_client_id']  = '';
            $paypal['production_secret_key'] = '';
            $payment_keys['paypal'] = $paypal;

            // Add Stripe keys
            $stripe['public_live_key'] = '';
            $stripe['secret_live_key'] = '';
            $payment_keys['stripe'] = $stripe;

            // Add razorpay keys
            $razorpay['key_id'] = '';
            $razorpay['secret_key'] = '';
            $payment_keys['razorpay'] = $razorpay;

            //All payment keys
            $data['payment_keys'] = json_encode($payment_keys);

            if ($is_instructor) {
                $data['is_instructor'] = 1;
            }
            $this->db->insert('users', $data);

            $this->session->set_flashdata('flash_message', get_phrase('user_added_successfully'));
            $response['status'] = 1;
            return json_encode($response);
        }
    }

    public function check_duplication($action = "", $email = "", $user_id = "")
    {
        $duplicate_email_check = $this->db->get_where('users', array('email' => $email));

        if ($action == 'on_create') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->status == 1) {
                    return false;
                } else {
                    return 'unverified_user';
                }
            } else {
                return true;
            }
        } elseif ($action == 'on_update') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->id == $user_id) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        }
    }

    public function edit_user($user_id = "")
    { // Admin does this editing
        $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);
        if ($validity) {
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));

            if (isset($_POST['email'])) {
                $data['email'] = html_escape($this->input->post('email'));
            }
            $social_link['facebook'] = html_escape($this->input->post('facebook_link'));
            $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
            $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
            $data['social_links'] = json_encode($social_link);
            $data['biography'] = $this->input->post('biography');
            $data['title'] = html_escape($this->input->post('title'));
            $data['skills'] = html_escape($this->input->post('skills'));
            $data['last_modified'] = strtotime(date("Y-m-d H:i:s"));

            if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
                unlink('uploads/user_image/' . $this->db->get_where('users', array('id' => $user_id))->row('image') . '.jpg');
                $data['image'] = md5(rand(10000, 10000000));
                $this->upload_user_image($data['image']);
            }

            // Update paypal keys
            $payment_keys = array();

            $paypal['production_client_id']  = html_escape($this->input->post('paypal_client_id'));
            $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
            $payment_keys['paypal'] = $paypal;

            // Update Stripe keys
            $stripe['public_live_key'] = html_escape($this->input->post('stripe_public_key'));
            $stripe['secret_live_key'] = html_escape($this->input->post('stripe_secret_key'));
            $payment_keys['stripe'] = $stripe;

            // Update razorpay keys
            $razorpay['key_id'] = html_escape($this->input->post('key_id'));
            $razorpay['secret_key'] = html_escape($this->input->post('secret_key'));
            $payment_keys['razorpay'] = $razorpay;

            //All payment keys
            $data['payment_keys'] = json_encode($payment_keys);

            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
            $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }
    }
    public function delete_user($user_id = "")
    {
        $this->db->where('id', $user_id);
        $this->db->delete('users');
        $this->session->set_flashdata('flash_message', get_phrase('user_deleted_successfully'));
    }

    public function unlock_screen_by_password($password = "")
    {
        $password = sha1($password);
        return $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'password' => $password))->num_rows();
    }

    public function register_user($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function register_user_update_code($data)
    {
        $update_code['verification_code'] = $data['verification_code'];
        $update_code['password'] = $data['password'];
        $this->db->where('email', $data['email']);
        $this->db->update('users', $update_code);
    }

    public function my_courses($user_id = "")
    {
        if ($user_id == "") {
            $user_id = $this->session->userdata('user_id');
        }
        return $this->db->get_where('enrol', array('user_id' => $user_id));
    }

    public function upload_user_image($image_code)
    {
        if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
            move_uploaded_file($_FILES['user_image']['tmp_name'], 'uploads/user_image/' . $image_code . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
        }
    }

    public function update_account_settings($user_id)
    {
        $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);
        if ($validity) {
            if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
                $user_details = $this->get_user($user_id)->row_array();
                $current_password = $this->input->post('current_password');
                $new_password = $this->input->post('new_password');
                $confirm_password = $this->input->post('confirm_password');
                if ($user_details['password'] == sha1($current_password) && $new_password == $confirm_password) {
                    $data['password'] = sha1($new_password);
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('mismatch_password'));
                    return;
                }
            }
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
            $this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }
    }

    public function change_password($user_id)
    {
        $data = array();
        if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
            $user_details = $this->get_all_user($user_id)->row_array();
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            if ($user_details['password'] == sha1($current_password) && $new_password == $confirm_password) {
                $data['password'] = sha1($new_password);
            } else {
                $this->session->set_flashdata('error_message', get_phrase('mismatch_password'));
                return;
            }
        }

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
        $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
    }


    public function get_instructor($id = 0)
    {
        if ($id > 0) {
            return $this->db->get_where('users', array('id' => $id, 'is_instructor' => 1));
        } else {
            return $this->db->get_where('users', array('is_instructor' => 1));
        }
    }

    public function get_instructor_by_email($email = null)
    {
        return $this->db->get_where('users', array('email' => $email, 'is_instructor' => 1));
    }

    public function get_admins($id = 0)
    {
        if ($id > 0) {
            return $this->db->get_where('users', array('id' => $id, 'role_id' => 1));
        } else {
            return $this->db->get_where('users', array('role_id' => 1));
        }
    }

    public function get_number_of_active_courses_of_instructor($instructor_id)
    {
        $multi_instructor_course_ids = $this->crud_model->multi_instructor_course_ids_for_an_instructor($instructor_id);

        $this->db->where('user_id', $instructor_id);
        if ($multi_instructor_course_ids && count($multi_instructor_course_ids)) {
            $this->db->or_where_in('id', $multi_instructor_course_ids);
        }
        $result = $this->db->get('course')->num_rows();
        return $result;
    }

    public function get_user_image_url($user_id)
    {
        $user_profile_image = $this->db->get_where('users', array('id' => $user_id))->row('image');
        if (file_exists('uploads/user_image/' . $user_profile_image . '.jpg'))
            return base_url() . 'uploads/user_image/' . $user_profile_image . '.jpg';
        else
            return base_url() . 'uploads/user_image/placeholder.png';
    }
    public function get_instructor_list()
    {
        $query1 = $this->db->get_where('course', array('status' => 'active'))->result_array();
        $instructor_ids = array();
        $query_result = array();
        foreach ($query1 as $row1) {
            if (!in_array($row1['user_id'], $instructor_ids) && $row1['user_id'] != "") {
                array_push($instructor_ids, $row1['user_id']);
            }
        }
        if (count($instructor_ids) > 0) {
            $this->db->where_in('id', $instructor_ids);
            $query_result = $this->db->get('users');
        } else {
            $query_result = $this->get_admin_details();
        }

        return $query_result;
    }

    public function update_instructor_paypal_settings($user_id = '')
    {
        $user_details = $this->get_all_user($user_id)->row_array();
        $payment_keys = json_decode($user_details['payment_keys'], true);
        // Update paypal keys
        $paypal['production_client_id'] = html_escape($this->input->post('paypal_client_id'));
        $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
        $payment_keys['paypal'] = $paypal;

        //All payment keys
        $data['payment_keys'] = json_encode($payment_keys);

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }
    public function update_instructor_stripe_settings($user_id = '')
    {
        $user_details = $this->get_all_user($user_id)->row_array();
        $payment_keys = json_decode($user_details['payment_keys'], true);
        // Update stripe keys
        $stripe['public_live_key'] = html_escape($this->input->post('stripe_public_key'));
        $stripe['secret_live_key'] = html_escape($this->input->post('stripe_secret_key'));
        $payment_keys['stripe'] = $stripe;

        //All payment keys
        $data['payment_keys'] = json_encode($payment_keys);

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    public function update_instructor_razorpay_settings($user_id = ''){
        $user_details = $this->get_all_user($user_id)->row_array();
        $payment_keys = json_decode($user_details['payment_keys'], true);
        // Update razorpay keys
        $razorpay['key_id'] = html_escape($this->input->post('key_id'));
        $razorpay['secret_key'] = html_escape($this->input->post('secret_key'));
        $payment_keys['razorpay'] = $razorpay;

        //All payment keys
        $data['payment_keys'] = json_encode($payment_keys);

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    // POST INSTRUCTOR APPLICATION FORM AND INSERT INTO DATABASE IF EVERYTHING IS OKAY
    public function post_instructor_application()
    {
        // FIRST GET THE USER DETAILS
        $user_details = $this->get_all_user($this->input->post('id'))->row_array();

        // CHECK IF THE PROVIDED ID AND EMAIL ARE COMING FROM VALID USER
        if ($user_details['email'] == $this->input->post('email')) {

            // GET PREVIOUS DATA FROM APPLICATION TABLE
            $previous_data = $this->get_applications($user_details['id'], 'user')->num_rows();
            // CHECK IF THE USER HAS SUBMITTED FORM BEFORE
            if ($previous_data > 0) {
                $this->session->set_flashdata('error_message', get_phrase('already_submitted'));
                redirect(site_url('user/become_an_instructor'), 'refresh');
            }
            $data['user_id'] = $this->input->post('id');
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
            $data['message'] = $this->input->post('message');
            if (isset($_FILES['document']) && $_FILES['document']['name'] != "") {
                if (!file_exists('uploads/document')) {
                    mkdir('uploads/document', 0777, true);
                }
                $accepted_ext = array('doc', 'docs', 'pdf', 'txt', 'png', 'jpg', 'jpeg');
                $path = $_FILES['document']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                if (in_array(strtolower($ext), $accepted_ext)) {
                    $document_custom_name = random(15) . '.' . $ext;
                    $data['document'] = $document_custom_name;
                    move_uploaded_file($_FILES['document']['tmp_name'], 'uploads/document/' . $document_custom_name);
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('invalide_file'));
                    redirect(site_url('user/become_an_instructor'), 'refresh');
                }
            }
            $this->db->insert('applications', $data);
            $this->session->set_flashdata('flash_message', get_phrase('application_submitted_successfully'));
            redirect(site_url('user/become_an_instructor'), 'refresh');
        } else {
            $this->session->set_flashdata('error_message', get_phrase('user_not_found'));
            redirect(site_url('user/become_an_instructor'), 'refresh');
        }
    }


    // GET INSTRUCTOR APPLICATIONS
    public function get_applications($id = "", $type = "")
    {
        if ($id > 0 && !empty($type)) {
            if ($type == 'user') {
                $applications = $this->db->get_where('applications', array('user_id' => $id));
                return $applications;
            } else {
                $applications = $this->db->get_where('applications', array('id' => $id));
                return $applications;
            }
        } else {
            $this->db->order_by("id", "DESC");
            $applications = $this->db->get_where('applications');
            return $applications;
        }
    }

    // GET APPROVED APPLICATIONS
    public function get_approved_applications()
    {
        $applications = $this->db->get_where('applications', array('status' => 1));
        return $applications;
    }

    // GET PENDING APPLICATIONS
    public function get_pending_applications()
    {
        $applications = $this->db->get_where('applications', array('status' => 0));
        return $applications;
    }

    //UPDATE STATUS OF INSTRUCTOR APPLICATION
    public function update_status_of_application($status, $application_id)
    {
        $application_details = $this->get_applications($application_id, 'application');
        if ($application_details->num_rows() > 0) {
            $application_details = $application_details->row_array();
            if ($status == 'approve') {
                $application_data['status'] = 1;
                $this->db->where('id', $application_id);
                $this->db->update('applications', $application_data);

                $instructor_data['is_instructor'] = 1;
                $this->db->where('id', $application_details['user_id']);
                $this->db->update('users', $instructor_data);

                $this->session->set_flashdata('flash_message', get_phrase('application_approved_successfully'));
                redirect(site_url('admin/instructor_application'), 'refresh');
            } else {
                $this->db->where('id', $application_id);
                $this->db->delete('applications');
                $this->session->set_flashdata('flash_message', get_phrase('application_deleted_successfully'));
                redirect(site_url('admin/instructor_application'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error_message', get_phrase('invalid_application'));
            redirect(site_url('admin/instructor_application'), 'refresh');
        }
    }

    // ASSIGN PERMISSION
    public function assign_permission()
    {
        $argument = html_escape($this->input->post('arg'));
        $argument = explode('-', $argument);
        $admin_id = $argument[0];
        $module = $argument[1];

        // CHECK IF IT IS A ROOT ADMIN
        if (is_root_admin($admin_id)) {
            return false;
        }

        $permission_data['admin_id'] = $admin_id;
        $previous_permissions = json_decode($this->get_admins_permission_json($permission_data['admin_id']), TRUE);

        if (in_array($module, $previous_permissions)) {
            $new_permission = array();
            foreach ($previous_permissions as $permission) {
                if ($permission != $module) {
                    array_push($new_permission, $permission);
                }
            }
        } else {
            array_push($previous_permissions, $module);
            $new_permission = $previous_permissions;
        }

        $permission_data['permissions'] = json_encode($new_permission);

        $this->db->where('admin_id', $admin_id);
        $this->db->update('permissions', $permission_data);
        return true;
    }

    // GET ADMIN'S PERMISSION JSON
    public function get_admins_permission_json($admin_id)
    {
        $admins_permissions = $this->db->get_where('permissions', ['admin_id' => $admin_id])->row_array();
        return $admins_permissions['permissions'];
    }

    // GET MULTI INSTRUCTOR DETAILS WITH COURSE ID
    public function get_multi_instructor_details_with_csv($csv)
    {
        $instructor_ids = explode(',', $csv);
        $this->db->where_in('id', $instructor_ids);
        return $this->db->get('users')->result_array();
    }
}
