<?php
$status_wise_courses = $this->crud_model->get_status_wise_courses();
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
			<?php
			$user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
			?>
			<span class="leftbar-user-name"><?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?></span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

		<li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>
		<?php if ($this->session->userdata('is_instructor')) : ?>
			<!-- <li class="side-nav-item">
				<a href="<?php echo site_url('user/dashboard'); ?>" class="side-nav-link <?php if ($page_name == 'dashboard') echo 'active'; ?>">
					<i class="dripicons-view-apps"></i>
					<span><?php echo get_phrase('dashboard'); ?></span>
				</a>
			</li> -->
			<!-- <li class="side-nav-item">
				<a href="<?php echo site_url('user/courses'); ?>" class="side-nav-link <?php if ($page_name == 'courses' || $page_name == 'course_add' || $page_name == 'course_edit') echo 'active'; ?>">
					<i class="dripicons-archive"></i>
					<span><?php echo get_phrase('course_manager'); ?></span>
				</a>
			</li>
			
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/sales_report'); ?>" class="side-nav-link <?php if ($page_name == 'report' || $page_name == 'invoice') echo 'active'; ?>">
					<i class="dripicons-to-do"></i>
					<span><?php echo get_phrase('sales_report'); ?></span>
				</a>
			</li> -->
			<!-- <li class="side-nav-item">
				<a href="<?php echo site_url('user/payout_report'); ?>" class="side-nav-link <?php if ($page_name == 'payout_report' || $page_name == 'invoice') echo 'active'; ?>">
					<i class="dripicons-shopping-bag"></i>
					<span><?php echo get_phrase('payout_report'); ?></span>
				</a>
			</li> -->
			<!-- <li class="side-nav-item">
				<a href="<?php echo site_url('user/payout_settings'); ?>" class="side-nav-link <?php if ($page_name == 'payment_settings') echo 'active'; ?>">
					<i class="dripicons-gear"></i>
					<span><?php echo get_phrase('payout_settings'); ?></span>
				</a>
			</li> -->
		<?php else : ?>
			<!-- <li class="side-nav-item">
				<a href="<?php echo site_url('user/become_an_instructor'); ?>" class="side-nav-link <?php if ($page_name == 'become_an_instructor') echo 'active'; ?>">
					<i class="dripicons-archive"></i>
					<span><?php echo get_phrase('become_an_instructor'); ?></span>
				</a>
			</li> -->
		<?php endif; ?>


		<!-- Franchise menu implementation -->
		<!-- <?php print_r($this->session->userdata()); ?> -->
		<?php if($this->session->userdata('is_franchise')): ?>
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/dashboard'); ?>" class="side-nav-link <?php if ($page_name == 'dashboard') echo 'active'; ?>">
					<i class="dripicons-view-apps"></i>
					<span><?php echo get_phrase('dashboard'); ?></span>
				</a>
			</li>
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'manage_customer' || $page_name =='add_cusotmer') echo 'active'; ?>">
					<i class="dripicons-archive"></i>
					<span><?php echo 'Customer' ?></span>
				</a>
				<ul class="side-nav-third-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'customer' || $page_name == 'manage_customer') echo 'active'; ?>">
						<a href="<?php echo site_url('user/customer'); ?>"><?php echo "Manage Customer" ?></a>
					</li>
					<li class="<?php if ($page_name == 'customer' || $page_name == 'add_customer') echo 'active'; ?>">
						<a href="<?php echo site_url('user/customer_form/add_customer_form'); ?>"><?php echo "Add Customer" ?></a>
					</li>
					<li class="<?php if ($page_name == 'customer' || $page_name == 'customer_invoice') echo 'active'; ?>">
						<a href="<?php echo site_url('user/customer_form/customer_invoice'); ?>"><?php echo "Customer Invoice" ?></a>
					</li>
					<li class="<?php if ($page_name == 'customer' || $page_name == 'manage_customer_invoice') echo 'active'; ?>">
						<a href="<?php echo site_url('user/customer_form/invoices'); ?>"><?php echo "Manage Customer Invoice" ?></a>
					</li>
				</ul>
			</li>
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'itr_form' || $page_name =='add_cusotmer') echo 'active'; ?>">
					<i class="dripicons-archive"></i>
					<span><?php echo 'ITR' ?></span>
				</a>
				<ul class="side-nav-third-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'itr_form' ) echo 'active'; ?>">
						<a href="<?php echo site_url('user/customer_form/itr_form'); ?>"><?php echo "ITR Form" ?></a>
					</li>
					<li class="<?php if ($page_name == 'view_itr_froms' ) echo 'active'; ?>">
						<a href="<?php echo site_url('user/customer_form/view_itr_form')?>">View Forms</a>
					</li>
				</ul>
			</li>
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'view_gstin' || $page_name =='gst_form') echo 'active'; ?>">
					<i class="dripicons-archive"></i>
					<span>GST</span>
				</a>
				 <ul class="side-nav-third-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'gst_form' ) echo 'active'; ?>">
						<a href="<?php echo site_url('user/customer_form/gst_form'); ?>"><?php echo "Apply GSTIN" ?></a>
					</li>
					<li class="<?php if ($page_name == 'view_gstin' ) echo 'active'; ?>">
						<a href="<?php echo site_url('user/customer_form/view_gstin_form')?>">VIEW STATUS - GSTIN</a>
					</li>
				</ul>
			</li>
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'manage_customer' || $page_name =='add_cusotmer') echo 'active'; ?>">
					<i class="dripicons-archive"></i>
					<span><?php echo 'Digital Signature' ?></span>
				</a>
				<ul class="side-nav-third-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'itr_form' ) echo 'active'; ?>">
						<a href="<?php echo site_url('user/customer_form/dsc_form'); ?>"><?php echo "Apply Dsc" ?></a>
					</li>
					<li class="<?php if ($page_name == 'view_dsc_froms' ) echo 'active'; ?>">
						<a href="<?php echo site_url('user/customer_form/view_dsc_form')?>">View Forms</a>
					</li>
				</ul>
			</li>

		<?php endif; ?>


		<!-- The end for franchise -->

		<!-- <li class="side-nav-item">
			<a href="<?php echo site_url('home/my_messages'); ?>" class="side-nav-link">
				<i class="dripicons-mail"></i>
				<span><?php echo get_phrase('message'); ?></span>
			</a>
		</li> -->

		<?php if (get_frontend_settings('instructors_blog_permission') && $this->session->userdata('is_instructor')) : ?>
			<!-- <li class="side-nav-item <?php if ($page_name == 'blog' || $page_name == 'blog_add' || $page_name == 'blog_edit' || $page_name == 'instructors_pending_blog') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'blog' || $page_name == 'blog_add' || $page_name == 'blog_edit' || $page_name == 'instructors_pending_blog') : ?> active <?php endif; ?>">
					<i class="dripicons-blog"></i>
					<span> <?php echo get_phrase('blog'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'blog') echo 'active'; ?>">
						<a href="<?php echo site_url('user/blog'); ?>"><?php echo get_phrase('all_blogs'); ?></a>
					</li>

					<li class="<?php if ($page_name == 'instructors_pending_blog') echo 'active'; ?>">
						<a href="<?php echo site_url('user/pending_blog'); ?>"><?php echo get_phrase('pending_blog'); ?> <span class="badge badge-danger-lighten"><?php echo $this->crud_model->get_instructors_pending_blog()->num_rows(); ?></span></a>
					</li>
				</ul>
			</li> -->
		<?php endif; ?>

		<?php if (addon_status('customer_support')) : ?>
			<!-- <li class="side-nav-item <?php if ($page_name == 'tickets' || $page_name == 'create_ticket') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="dripicons-help"></i>
					<span> <?php echo get_phrase('support'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'tickets') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/customer_support/user_tickets'); ?>"><?php echo get_phrase('ticket_list'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'create_ticket') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/customer_support/create_support_ticket'); ?>"><?php echo get_phrase('create_ticket'); ?></a>
					</li>
				</ul>
			</li> -->
		<?php endif; ?>

		<li class="side-nav-item">
			<a href="<?php echo site_url(strtolower($this->session->userdata('role')) . '/manage_profile'); ?>" class="side-nav-link">
				<i class="dripicons-user"></i>
				<span><?php echo get_phrase('manage_profile'); ?></span>
			</a>
		</li>
	</ul>
</div>

