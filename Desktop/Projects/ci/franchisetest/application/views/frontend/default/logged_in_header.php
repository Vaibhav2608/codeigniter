<?php
$user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
?> 