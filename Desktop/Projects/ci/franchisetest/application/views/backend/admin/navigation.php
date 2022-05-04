<?php
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
			<?php
			$admin_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
			?>
			<span class="leftbar-user-name"><?php echo $admin_details['first_name'] . ' ' . $admin_details['last_name']; ?></span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

		<li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>

		<li class="side-nav-item <?php if ($page_name == 'dashboard') echo 'active'; ?>">
			<a href="<?php echo site_url('admin/dashboard'); ?>" class="side-nav-link">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('dashboard'); ?></span>
			</a>
		</li>


		

		

		<?php if (has_permission('user')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'admins' || $page_name == 'admin_add' || $page_name == 'admin_edit' || $page_name == 'admin_permission' || $page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit' || $page_name == 'instructor_payout' || $page_name == 'instructor_settings' || $page_name == 'application_list' || $page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'admins' || $page_name == 'admin_add' || $page_name == 'admin_edit' || $page_name == 'admin_permission' || $page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit' || $page_name == 'instructor_payout' || $page_name == 'instructor_settings' || $page_name == 'application_list' || $page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit') : ?> active <?php endif; ?>">
					<i class="dripicons-box"></i>
					<span> <?php echo get_phrase('users'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<?php if (has_permission('admins')) : ?>
						<li class="side-nav-item <?php if ($page_name == 'admins' || $page_name == 'admin_add' || $page_name == 'admin_edit' || $page_name == 'admin_permission') : ?> active <?php endif; ?>">
							<a href="javascript: void(0);" class="<?php if ($page_name == 'admins' || $page_name == 'admin_add' || $page_name == 'admin_edit' || $page_name == 'admin_permission') : ?> active <?php endif; ?>" aria-expanded="false"><?php echo get_phrase('admins'); ?>
								<span class="menu-arrow"></span>
							</a>
							<ul class="side-nav-third-level" aria-expanded="false">
								<li class="<?php if ($page_name == 'admins' || $page_name == 'admin_edit' || $page_name == 'admin_permission') : ?> active <?php endif; ?>">
									<a href="<?php echo site_url('admin/admins'); ?>" class="<?php if ($page_name == 'admins' || $page_name == 'admin_edit' || $page_name == 'admin_permission') : ?> active <?php endif; ?>"><?php echo get_phrase('manage_admins'); ?></a>
								</li>
								<li class="<?php if ($page_name == 'admin_add') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/admin_form/add_admin_form'); ?>"><?php echo get_phrase('add_new_admin'); ?></a>
								</li>
							</ul>
						</li>
					<?php endif; ?>

					<?php if (has_permission('instructor')) : ?>
						<li class="side-nav-item <?php if ($page_name == 'instructors' || $page_name == 'instructor_edit') : ?> active <?php endif; ?>">
							<a href="javascript: void(0);" aria-expanded="false" class="<?php if ($page_name == 'instructors' || $page_name == 'instructor_edit') : ?> active <?php endif; ?>">
								<?php echo get_phrase('Franchise'); ?>
								<span class="menu-arrow"></span>
							</a>
							<ul class="side-nav-third-level" aria-expanded="false">
								<!-- <li class="<?php if ($page_name == 'instructors' || $page_name == 'instructor_edit') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/instructors'); ?>"><?php echo get_phrase('manage_instructors'); ?></a>
								</li> -->

								<li class="<?php if ($page_name == 'franchises' || $page_name == 'franchise_edit') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/franchises'); ?>"><?php echo "Manage Franchise" ?></a>
								</li>

								

								<!-- <li class="<?php if ($page_name == 'instructor_add') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/instructor_form/add_instructor_form'); ?>"><?php echo get_phrase('add_new_instructor'); ?></a>
								</li> -->
								<li class="<?php if ($page_name == 'franchise_add') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/franchise_form/add_franchise_form'); ?>"><?php echo get_phrase('Franchise Add'); ?></a>
								</li>
								<!--<li class="<?php if ($page_name == 'instructor_payout') echo 'active'; ?>">-->
								<!--	<a href="<?php echo site_url('admin/instructor_payout'); ?>">-->
								<!--		<?php echo get_phrase('instructor_payout'); ?>-->
								<!--		<span class="badge badge-danger-lighten"><?php echo $this->crud_model->get_pending_payouts()->num_rows(); ?></span>-->
								<!--	</a>-->
								<!--</li>-->
								<!--<li class="<?php if ($page_name == 'instructor_settings') echo 'active'; ?>">-->
								<!--	<a href="<?php echo site_url('admin/instructor_settings'); ?>"><?php echo get_phrase('instructor_settings'); ?></a>-->
								<!--</li>-->
								<!--<li class="<?php if ($page_name == 'application_list') echo 'active'; ?>">-->
								<!--	<a href="<?php echo site_url('admin/instructor_application'); ?>">-->
								<!--		<?php echo get_phrase('applications'); ?>-->
								<!--		<span class="badge badge-danger-lighten"><?php echo $this->user_model->get_pending_applications()->num_rows(); ?></span>-->
								<!--	</a>-->
								<!--</li>-->
							</ul>
						</li>
					<?php endif; ?>

					

					<!-- <?php if (has_permission('student')) : ?>
						<li class="side-nav-item <?php if ($page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit') : ?> active <?php endif; ?>">
							<a href="javascript: void(0);" aria-expanded="false" class="<?php if ($page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit') : ?> active <?php endif; ?>"><?php echo get_phrase('customer'); ?>
								<span class="menu-arrow"></span>
							</a>
							<ul class="side-nav-third-level" aria-expanded="false">
								<li class="<?php if ($page_name == 'users' || $page_name == 'user_edit') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/users'); ?>"><?php echo get_phrase('manage_students'); ?></a>
								</li>
								<li class="<?php if ($page_name == 'user_add') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/user_form/add_user_form'); ?>"><?php echo get_phrase('add_new_student'); ?></a>
								</li>
							</ul>
						</li>
					<?php endif; ?>-->
				</ul> 
			</li>
		<?php endif; ?>

		<!-- <?php if (addon_status('offline_payment')) : ?>
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'offline_payment_pending' || $page_name == 'offline_payment_approve' || $page_name == 'offline_payment_suspended') : ?> active <?php endif; ?>">
					<i class="dripicons-box"></i>
					<span> <?php echo get_phrase('offline_payment'); ?></span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'offline_payment_pending') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/offline_payment/pending'); ?>">
							<?php echo get_phrase('pending_request'); ?>
							<span class="badge badge-danger-lighten badge-pill float-right"><?php echo get_pending_offline_payment(); ?></span></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'offline_payment_approve') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/offline_payment/approve'); ?>"><?php echo get_phrase('accepted_request'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'offline_payment_suspended') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/offline_payment/suspended'); ?>"><?php echo get_phrase('suspended_request'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>

		<?php if (has_permission('messaging')) : ?>
			<li class="side-nav-item">
				<a href="<?php echo site_url('admin/message'); ?>" class="side-nav-link <?php if ($page_name == 'message' || $page_name == 'message_new' || $page_name == 'message_read') echo 'active'; ?>">
					<i class="dripicons-message"></i>
					<span><?php echo get_phrase('message'); ?></span>
				</a>
			</li>
		<?php endif; ?>


	<!-- 	<?php if (has_permission('blog')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'blog' || $page_name == 'blog_add' || $page_name == 'blog_edit' || $page_name == 'blog_category' || $page_name == 'blog_settings') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'blog' || $page_name == 'blog_add' || $page_name == 'blog_edit' || $page_name == 'blog_category' || $page_name == 'blog_settings' || $page_name == 'instructors_pending_blog') : ?> active <?php endif; ?>">
					<i class="dripicons-blog"></i>
					<span> <?php echo get_phrase('blog'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'blog') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/blog'); ?>"><?php echo get_phrase('all_blogs'); ?></a>
					</li>

					<li class="<?php if ($page_name == 'instructors_pending_blog') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/instructors_pending_blog'); ?>"><?php echo get_phrase('pending_blog'); ?> <span class="badge badge-danger-lighten"><?php echo $this->crud_model->get_instructors_pending_blog()->num_rows(); ?></span></a>
					</li>

					<li class="<?php if ($page_name == 'blog_category') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/blog_category'); ?>"><?php echo get_phrase('blog_category'); ?></a>
					</li>

					<li class="<?php if ($page_name == 'blog_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/blog_settings'); ?>"><?php echo get_phrase('blog_settings'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>

 -->
		<?php if (addon_status('customer_support')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'tickets' || $page_name == 'support_category' || $page_name == 'support_macro' || $page_name == 'create_ticket') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="dripicons-help"></i>
					<span> <?php echo get_phrase('customer_support'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'tickets') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/customer_support/tickets/opened'); ?>"><?php echo get_phrase('ticket_list'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'support_category') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/customer_support/get_support_categories'); ?>"><?php echo get_phrase('support_category'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'support_macro') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/customer_support/get_support_macros'); ?>"><?php echo get_phrase('macro'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'create_ticket') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/customer_support/create_support_ticket'); ?>"><?php echo get_phrase('create_ticket'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>

		<!-- <?php if (has_permission('addon')) : ?>
			<li class="side-nav-item">
				<a href="<?php echo site_url('admin/addon'); ?>" class="side-nav-link <?php if ($page_name == 'addons' || $page_name == 'addon_add' || $page_name == 'available_addons') : ?> active <?php endif; ?>">
					<i class="dripicons-graph-pie"></i>
					<span><?php echo get_phrase('addons'); ?></span>
				</a>
			</li>
		<?php endif; ?> -->

		<!-- <?php if (has_permission('theme')) : ?>
			<li class="side-nav-item">
				<a href="<?php echo site_url('admin/theme_settings'); ?>" class="side-nav-link <?php if ($page_name == 'theme_settings') echo 'active'; ?>">
					<i class="dripicons-brush"></i>
					<span><?php echo get_phrase('themes'); ?></span>
				</a>
			</li>
		<?php endif; ?> -->




		<?php if (has_permission('settings')) : ?>
			<li class="side-nav-item  <?php if ($page_name == 'system_settings' || $page_name == 'frontend_settings' || $page_name == 'payment_settings' || $page_name == 'smtp_settings' || $page_name == 'manage_language' || $page_name == 'about' || $page_name == 'themes') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="dripicons-toggles"></i>
					<span> <?php echo get_phrase('settings'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<!-- <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/system_settings'); ?>"><?php echo get_phrase('system_settings'); ?></a>
					</li> -->

					<!-- <li class="<?php if ($page_name == 'frontend_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/frontend_settings'); ?>"><?php echo get_phrase('website_settings'); ?></a>
					</li>
 -->
					<!-- <?php if (addon_status('certificate')) : ?>
						<li class="<?php if ($page_name == 'certificate_settings') echo 'active'; ?>">
							<a href="<?php echo site_url('addons/certificate/settings'); ?>"><?php echo get_phrase('certificate_settings'); ?></a>
						</li>
					<?php endif; ?>

					<?php if (addon_status('amazon-s3')) : ?>
						<li class="<?php if ($page_name == 's3_settings') echo 'active'; ?>">
							<a href="<?php echo site_url('addons/amazons3/settings'); ?>"><?php echo get_phrase('s3_settings'); ?></a>
						</li>
					<?php endif; ?>

					<?php if (addon_status('live-class')) : ?>
						<li class="<?php if ($page_name == 'live_class_settings') echo 'active'; ?>">
							<a href="<?php echo site_url('addons/liveclass/settings'); ?>"><?php echo get_phrase('live_class_settings'); ?></a>
						</li>
					<?php endif; ?>
 -->
					<li class="<?php if ($page_name == 'payment_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/payment_settings'); ?>"><?php echo get_phrase('payment_settings'); ?></a>
					</li>
					<!-- <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/manage_language'); ?>"><?php echo get_phrase('language_settings'); ?></a>
					</li> -->
					<li class="<?php if ($page_name == 'smtp_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/smtp_settings'); ?>"><?php echo get_phrase('smtp_settings'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'social_login') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/social_login_settings'); ?>"><?php echo get_phrase('social_login'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'about') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/about'); ?>"><?php echo get_phrase('about'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>

		<li class="side-nav-item <?php if ($page_name == 'customer_info' || $page_name == 'customeres' || $page_name == 'customer_invoices' ) echo 'active'; ?>">
			<a href="javascript: void(0);" class="side-nav-link">
				<i class="fa fa-user"></i>
				<span><?php echo get_phrase('Customer Info'); ?></span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class="<?php if ($page_name == 'customers') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/customers/view_customers'); ?>"><?php echo get_phrase('Customers'); ?></a>
				</li>
				<li class="<?php if ($page_name == 'customers_invoices') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/customers/invoices'); ?>"><?php echo get_phrase('Customer Invoices'); ?></a>
				</li>
			</ul>
		</li>
		<li class="side-nav-item <?php if ($page_name == 'application' || $page_name == 'pending_application' || $page_name == 'proccessing_application' || $page_name == 'completed_application' || $page_name=='cancelled_application' || $page_name=="document_verification" || $page_name == 'document_error'  ) echo 'active'; ?>">
			<a href="javascript: void(0);" class="side-nav-link">
				<i class="fa fa-file"></i>
				<span><?php echo get_phrase('Applications'); ?></span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class="<?php if ($page_name == 'pending_application') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/application/pending'); ?>"><?php echo get_phrase('Pending'); ?></a>
				</li>
				<li class="<?php if ($page_name == 'proccessing_application') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/application/proccessing'); ?>"><?php echo get_phrase('Proccessing'); ?></a>
				</li>
				<li class="<?php if ($page_name == 'cancelled_application') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/application/cancelled'); ?>"><?php echo get_phrase('Cancelled'); ?></a>
				</li>
				<li class="<?php if ($page_name == 'document_verification') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/application/verfication'); ?>"><?php echo get_phrase('Verifiying Document'); ?></a>
				</li>
				<li class="<?php if ($page_name == 'document_error') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/application/doc_error'); ?>"><?php echo get_phrase('Document Error'); ?></a>
				</li>
				<li class="<?php if ($page_name == 'completed_application') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/application/completed'); ?>"><?php echo get_phrase('Completed'); ?></a>
				</li>
			</ul>
		</li>
		<?php if($this->session->userdata('is_root')):?>
			<li class="side-nav-item <?php if ($page_name == 'services' || $page_name == 'add_service' || $page_name == 'view_services' || $page_name== 'view_service_detail' ) echo 'active'; ?>">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="fa fa-user"></i>
					<span><?php echo get_phrase('Services'); ?></span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'add_service') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/service/add_service'); ?>">Add Serivce</a>
					</li>
					<li class="<?php if ($page_name == 'view_services' || $page_name== 'view_service_detail') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/service/view_services'); ?>">View Services</a>
					</li>
				</ul>
			</li>

			<?php endif;?> 

	</ul>
</div>