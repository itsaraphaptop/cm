		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->
			<a href="index.html">
				<img alt="Logo" src="<?php echo base_url();?>boostrap4/dist/assets/media/logos/logo-light.png" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Aside Mobile Toggle-->
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
				<!--end::Aside Mobile Toggle-->
				<!--begin::Header Menu Mobile Toggle-->
				<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<!--end::Header Menu Mobile Toggle-->
				<!--begin::Topbar Mobile Toggle-->
				<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
				<!--end::Topbar Mobile Toggle-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Aside-->
				<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
					<!--begin::Brand-->
					<div class="brand flex-column-auto" id="kt_brand">
						<!--begin::Logo-->
                        <a href="<?=base_url();?>panel/office" class="brand-logo">
                            <?php if ($comp_img=="none") { ?>

                            <?php }else{?>
                                <img src="<?php echo base_url();?>comp/<?= $comp_img;?>" align="middle" style=" height: 30px;position: absolute;left: 5vh;top: 2vh;">
                            <?php }?>
                        </a>
						<!--end::Logo-->
						<!--begin::Toggle-->
						<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</button>
						<!--end::Toolbar-->
					</div>
					<!--end::Brand-->
					<!--begin::Aside Menu-->
					<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
						<!--begin::Menu Container-->
						<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
							<!--begin::Menu Nav-->
							<ul class="menu-nav">
								<li class="menu-item menu-item-active" aria-haspopup="true">
									<a href="index.html" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Dashboard</span>
									</a>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">Custom</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
													<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Applications</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Applications</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Users</span>
													<span class="menu-label">
														<span class="label label-rounded label-primary">6</span>
													</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/list-default.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Default</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/list-datatable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Datatable</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/list-columns-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/list-columns-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/add-user.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Add User</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/user/edit-user.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Edit User</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Profile</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Profile 1</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/overview.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Overview</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/personal-information.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Personal Information</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/account-information.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Account Information</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/change-password.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Change Password</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/profile/profile-1/email-settings.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Email Settings</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/profile/profile-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Profile 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/profile/profile-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Profile 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/profile/profile-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Profile 4</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Contacts</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/list-columns.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/list-datatable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Datatable</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/view-contact.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">View Contact</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/add-contact.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Add Contact</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/contacts/edit-contact.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Edit Contact</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Projects</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-columns-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-columns-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-columns-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-columns-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Columns 4</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/list-datatable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">List - Datatable</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/view-project.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">View Project</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/add-project.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Add Project</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/projects/edit-project.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Edit Project</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Support Center</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/home-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Home 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/home-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Home 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/faq-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">FAQ 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/faq-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">FAQ 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/faq-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">FAQ 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/feedback.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Feedback</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/support-center/license.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">License</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Chat</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/chat/private.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Private</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/chat/group.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Group</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/chat/popup.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Popup</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Todo</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/todo/tasks.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Tasks</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/todo/docs.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Docs</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/todo/files.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Files</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Education</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">School</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/education/school/dashboard.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Dashboard</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/education/school/statistics.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Statistics</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/education/school/calendar.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Calendar</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/education/school/library.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Library</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/education/school/teachers.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Teachers</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/education/school/students.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Students</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Student</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/education/student/dashboard.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Dashboard</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/education/student/profile.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Profile</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/education/student/calendar.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Calendar</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/apps/education/student/classmates.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">Classmates</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/education/class/dashboard.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Class</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">eCommerce</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/ecommerce/dashboard.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Dashboard 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/ecommerce/dashboard-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Dashboard 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/ecommerce/dashboard-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Dashboard 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/ecommerce/product-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Product 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/ecommerce/product-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Product 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/ecommerce/product-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Product 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/ecommerce/product-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">My Orders</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/ecommerce/order-details.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Order Details</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/ecommerce/shopping-cart.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Shopping Cart</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/apps/ecommerce/checkout.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Checkout</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="custom/apps/inbox.html" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Inbox</span>
													<span class="menu-label">
														<span class="label label-danger label-inline">new</span>
													</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16" />
													<path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Pages</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Pages</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Login</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/login/login-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/login/login-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 2</span>
															</a>
														</li>
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 3</span>
																<span class="menu-label">
																	<span class="label label-inline label-info">Wizard</span>
																</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/login-3/signup.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Sign Up</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/login-3/signin.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Sign In</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/login-3/forgot.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Forgot Password</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Login 4</span>
																<span class="menu-label">
																	<span class="label label-inline label-info">Wizard</span>
																</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/login-4/signup.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Sign Up</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/login-4/signin.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Sign In</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/login-4/forgot.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Forgot Password</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Classic</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-1.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 1</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-2.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 2</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-3.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 3</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-4.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 4</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-5.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 5</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="custom/pages/login/classic/login-6.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Login 6</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Wizard</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 4</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-5.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 5</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/wizard/wizard-6.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Wizard 6</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Pricing Tables</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/pricing/pricing-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pricing Tables 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/pricing/pricing-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pricing Tables 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/pricing/pricing-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pricing Tables 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/pricing/pricing-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pricing Tables 4</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Invoices</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/invoices/invoice-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Invoice 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/invoices/invoice-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Invoice 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/invoices/invoice-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Invoice 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/invoices/invoice-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Invoice 4</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/invoices/invoice-5.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Invoice 5</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/invoices/invoice-6.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Invoice 6</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Error</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-1.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 1</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-3.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 3</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-4.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 4</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-5.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 5</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="custom/pages/error/error-6.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Error 6</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">Layout</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
													<path d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Themes</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Themes</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/themes/aside-light.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Light Aside</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/themes/header-dark.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Dark Header</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
													<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Subheaders</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Subheaders</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/toolbar.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Toolbar Nav</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/actions.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Actions Buttons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/tabbed.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tabbed Nav</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/classic.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Classic</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/subheader/none.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">None</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
													<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">General</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">General</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/fluid-content.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Fluid Content</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/minimized-aside.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Minimized Aside</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/no-aside.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">No Aside</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/empty-page.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Empty Page</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/fixed-footer.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Fixed Footer</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="layout/general/no-header-menu.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">No Header Menu</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item" aria-haspopup="true">
									<a target="_blank" href="https://preview.keenthemes.com/metronic/demo1/builder.html" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
													<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Builder</span>
									</a>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">CRUD</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
													<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Forms</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Forms</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Controls</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/base.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Base Inputs</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/input-group.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Input Groups</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/checkbox.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Checkbox</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/radio.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Radio</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/switch.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Switch</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/controls/option.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Mega Options</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Widgets</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-datetimepicker.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Datetimepicker</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-datepicker.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Datepicker</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-timepicker.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Timepicker</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-daterangepicker.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Daterangepicker</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/tagify.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Tagify</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-touchspin.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Touchspin</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-maxlength.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Maxlength</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-switch.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Switch</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-multipleselectsplitter.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Multiple Select Splitter</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/bootstrap-select.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Bootstrap Select</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/select2.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Select2</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/typeahead.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Typeahead</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/nouislider.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">noUiSlider</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/form-repeater.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Form Repeater</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/ion-range-slider.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Ion Range Slider</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/input-mask.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Input Masks</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/jquery-mask.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">jQuery Mask</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/autosize.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Autosize</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/clipboard.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Clipboard</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/widgets/recaptcha.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Google reCaptcha</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Text Editors</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/editors/tinymce.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">TinyMCE</span>
															</a>
														</li>
														<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
															<a href="javascript:;" class="menu-link menu-toggle">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">CKEditor</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu">
																<i class="menu-arrow"></i>
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-classic.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Classic</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-inline.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Inline</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-balloon.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Balloon</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-balloon-block.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Balloon Block</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="crud/forms/editors/ckeditor-document.html" class="menu-link">
																			<i class="menu-bullet menu-bullet-line">
																				<span></span>
																			</i>
																			<span class="menu-text">CKEditor Document</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/editors/quill.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Quill Text Editor</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/editors/summernote.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Summernote WYSIWYG</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/editors/bootstrap-markdown.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Markdown Editor</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Layouts</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/layouts/default-forms.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Default Forms</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/layouts/multi-column-forms.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Multi Column Forms</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/layouts/action-bars.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Basic Action Bars</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/layouts/sticky-action-bar.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Sticky Action Bar</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Form Validation</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/validation/states.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Validation States</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/validation/form-controls.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Form Controls</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/forms/validation/form-widgets.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Form Widgets</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-left-panel-2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z" fill="#000000" />
													<rect fill="#000000" opacity="0.3" x="2" y="4" width="5" height="16" rx="1" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">KTDatatable</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">KTDatatable</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Base</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/data-local.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Local Data</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/data-json.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">JSON Data</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/data-ajax.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Ajax Data</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/html-table.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">HTML Table</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/local-sort.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Local Sort</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/base/translation.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Translation</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Advanced</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/record-selection.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Record Selection</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/row-details.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Row Details</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/modal.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Modal Examples</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/column-rendering.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Rendering</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/column-width.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Width</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/advanced/vertical.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Vertical Scrolling</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Child Datatables</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/child/data-local.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Local Data</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/child/data-ajax.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Remote Data</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">API</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/api/methods.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">API Methods</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/ktdatatable/api/events.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Events</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-horizontal.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="4" y="5" width="16" height="6" rx="1.5" />
													<rect fill="#000000" x="4" y="13" width="16" height="6" rx="1.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Datatables.net</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Datatables.net</span>
												</span>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Basic</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/basic/basic.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Basic Tables</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/basic/scrollable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Scrollable Tables</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/basic/headers.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Complex Headers</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/basic/paginations.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Pagination Options</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Advanced</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/column-rendering.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Rendering</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/multiple-controls.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Multiple Controls</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/column-visibility.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Visibility</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/row-callback.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Row Callback</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/row-grouping.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Row Grouping</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/advanced/footer-callback.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Footer Callback</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Data sources</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/data-sources/html.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">HTML</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/data-sources/javascript.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Javascript</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/data-sources/ajax-client-side.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Ajax Client-side</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/data-sources/ajax-server-side.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Ajax Server-side</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Search Options</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/search-options/column-search.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Column Search</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/search-options/advanced-search.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Advanced Search</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Extensions</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/buttons.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Buttons</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/colreorder.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">ColReorder</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/keytable.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">KeyTable</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/responsive.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Responsive</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/rowgroup.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">RowGroup</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/rowreorder.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">RowReorder</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/scroller.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Scroller</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="crud/datatables/extensions/select.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">Select</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Files/Upload.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													<rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="14" rx="1" />
													<path d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">File Upload</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="crud/file-upload/image-input.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Image Input</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="crud/file-upload/dropzonejs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">DropzoneJS</span>
													<span class="menu-label">
														<span class="label label-danger label-inline">new</span>
													</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="crud/file-upload/uppy.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Uppy</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">Features</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Box2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />
													<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Bootstrap</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Bootstrap</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/typography.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Typography</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/buttons.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Buttons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/button-group.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Button Group</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/dropdown.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Dropdown</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/navs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Navs</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/tables.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tables</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/progress.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Progress</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/modal.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Modal</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/alerts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Alerts</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/popover.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Popover</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/bootstrap/tooltip.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tooltip</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Files/Pictures1.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3" />
													<polygon fill="#000000" opacity="0.3" points="4 19 10 11 16 19" />
													<polygon fill="#000000" points="11 19 15 14 19 19" />
													<path d="M18,12 C18.8284271,12 19.5,11.3284271 19.5,10.5 C19.5,9.67157288 18.8284271,9 18,9 C17.1715729,9 16.5,9.67157288 16.5,10.5 C16.5,11.3284271 17.1715729,12 18,12 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Custom</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Custom</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/utilities.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Utilities</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/label.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Labels</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/pulse.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Pulse</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/line-tabs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Line Tabs</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/advance-navs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Advance Navs</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/timeline.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Timeline</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/pagination.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Pagination</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/symbol.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Symbol</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/overlay.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Overlay</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/spinners.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Spinners</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/iconbox.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Iconbox</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/callout.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Callout</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/ribbons.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Ribbons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/custom/accordions.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Accordions</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-arrange.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z" fill="#000000" />
													<path d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Cards</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Cards</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/general.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">General Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/stacked.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Stacked Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/tabbed.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tabbed Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/draggable.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Draggable Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/tools.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Cards Tools</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/sticky.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Sticky Cards</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/cards/stretched.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Stretched Cards</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Diagnostics.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="18" rx="2" />
													<path d="M9.9486833,13.3162278 C9.81256925,13.7245699 9.43043041,14 9,14 L5,14 C4.44771525,14 4,13.5522847 4,13 C4,12.4477153 4.44771525,12 5,12 L8.27924078,12 L10.0513167,6.68377223 C10.367686,5.73466443 11.7274983,5.78688777 11.9701425,6.75746437 L13.8145063,14.1349195 L14.6055728,12.5527864 C14.7749648,12.2140024 15.1212279,12 15.5,12 L19,12 C19.5522847,12 20,12.4477153 20,13 C20,13.5522847 19.5522847,14 19,14 L16.118034,14 L14.3944272,17.4472136 C13.9792313,18.2776054 12.7550291,18.143222 12.5298575,17.2425356 L10.8627389,10.5740611 L9.9486833,13.3162278 Z" fill="#000000" fill-rule="nonzero" />
													<circle fill="#000000" opacity="0.3" cx="19" cy="6" r="1" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Widgets</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Widgets</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/lists.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Lists</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/stats.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Stats</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/charts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Charts</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/mixed.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Mixed</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/tiles.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tiles</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/engage.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Engage</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/base-tables.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Base Tables</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/advance-tables.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Advance Tables</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/feeds.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Feeds</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/widgets/nav-panels.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Nav Panels</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z" fill="#000000" opacity="0.3" transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641)" />
													<path d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z" fill="#000000" transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359)" />
													<path d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z" fill="#000000" opacity="0.3" transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146)" />
													<path d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z" fill="#000000" opacity="0.3" transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Icons</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/svg.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">SVG Icons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/custom-icons.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Custom Icons</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/flaticon.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Flaticon</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/fontawesome5.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Fontawesome 5</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/lineawesome.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Lineawesome</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/icons/socicons.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Socicons</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Select.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M18.5,8 C17.1192881,8 16,6.88071187 16,5.5 C16,4.11928813 17.1192881,3 18.5,3 C19.8807119,3 21,4.11928813 21,5.5 C21,6.88071187 19.8807119,8 18.5,8 Z M18.5,21 C17.1192881,21 16,19.8807119 16,18.5 C16,17.1192881 17.1192881,16 18.5,16 C19.8807119,16 21,17.1192881 21,18.5 C21,19.8807119 19.8807119,21 18.5,21 Z M5.5,21 C4.11928813,21 3,19.8807119 3,18.5 C3,17.1192881 4.11928813,16 5.5,16 C6.88071187,16 8,17.1192881 8,18.5 C8,19.8807119 6.88071187,21 5.5,21 Z" fill="#000000" opacity="0.3" />
													<path d="M5.5,8 C4.11928813,8 3,6.88071187 3,5.5 C3,4.11928813 4.11928813,3 5.5,3 C6.88071187,3 8,4.11928813 8,5.5 C8,6.88071187 6.88071187,8 5.5,8 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 C14,5.55228475 13.5522847,6 13,6 L11,6 C10.4477153,6 10,5.55228475 10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,18 L13,18 C13.5522847,18 14,18.4477153 14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 C10,18.4477153 10.4477153,18 11,18 Z M5,10 C5.55228475,10 6,10.4477153 6,11 L6,13 C6,13.5522847 5.55228475,14 5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 C18.4477153,14 18,13.5522847 18,13 L18,11 C18,10.4477153 18.4477153,10 19,10 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Calendar</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Calendar</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/basic.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Basic Calendar</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/list-view.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">List Views</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/google.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Google Calendar</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/external-events.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">External Events</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/calendar/background-events.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Background Events</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
													<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
													<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
													<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Charts</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Charts</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/charts/apexcharts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Apexcharts</span>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="javascript:;" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">amCharts</span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu">
													<i class="menu-arrow"></i>
													<ul class="menu-subnav">
														<li class="menu-item" aria-haspopup="true">
															<a href="features/charts/amcharts/charts.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">amCharts Charts</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="features/charts/amcharts/stock-charts.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">amCharts Stock Charts</span>
															</a>
														</li>
														<li class="menu-item" aria-haspopup="true">
															<a href="features/charts/amcharts/maps.html" class="menu-link">
																<i class="menu-bullet menu-bullet-dot">
																	<span></span>
																</i>
																<span class="menu-text">amCharts Maps</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/charts/flotcharts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Flot Charts</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/charts/google-charts.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Google Charts</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Book-open.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000" />
													<path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Maps</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Maps</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/maps/google-maps.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Google Maps</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/maps/leaflet.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Leaflet</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/maps/jqvmap.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">JQVMap</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Mirror.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M13,17.0484323 L13,18 L14,18 C15.1045695,18 16,18.8954305 16,20 L8,20 C8,18.8954305 8.8954305,18 10,18 L11,18 L11,17.0482312 C6.89844817,16.5925472 3.58685702,13.3691811 3.07555009,9.22038742 C3.00799634,8.67224972 3.3975866,8.17313318 3.94572429,8.10557943 C4.49386199,8.03802567 4.99297853,8.42761593 5.06053229,8.97575363 C5.4896663,12.4577884 8.46049164,15.1035129 12.0008191,15.1035129 C15.577644,15.1035129 18.5681939,12.4043008 18.9524872,8.87772126 C19.0123158,8.32868667 19.505897,7.93210686 20.0549316,7.99193546 C20.6039661,8.05176407 21.000546,8.54534521 20.9407173,9.09437981 C20.4824216,13.3000638 17.1471597,16.5885839 13,17.0484323 Z" fill="#000000" fill-rule="nonzero" />
													<path d="M12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 Z M8.81595773,7.80077353 C8.79067542,7.43921955 8.47708263,7.16661749 8.11552864,7.19189981 C7.75397465,7.21718213 7.4813726,7.53077492 7.50665492,7.89232891 C7.62279197,9.55316612 8.39667037,10.8635466 9.79502238,11.7671393 C10.099435,11.9638458 10.5056723,11.8765328 10.7023788,11.5721203 C10.8990854,11.2677077 10.8117724,10.8614704 10.5073598,10.6647638 C9.4559885,9.98538454 8.90327706,9.04949813 8.81595773,7.80077353 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Miscellaneous</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Miscellaneous</span>
												</span>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/kanban-board.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Kanban Board</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/sticky-panels.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Sticky Panels</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/blockui.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Block UI</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/perfect-scrollbar.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Perfect Scrollbar</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/treeview.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Tree View</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/bootstrap-notify.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Bootstrap Notify</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/toastr.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Toastr</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/sweetalert2.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">SweetAlert2</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/dual-listbox.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Dual Listbox</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/session-timeout.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Session Timeout</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/idle-timer.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Idle Timer</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="features/miscellaneous/cropper.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Cropper</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
							<!--end::Menu Nav-->
						</div>
						<!--end::Menu Container-->
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Header Menu Wrapper-->
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
								<!--begin::Header Menu-->
                                
								<!--end::Header Menu-->
							</div>
							<!--end::Header Menu Wrapper-->
							<!--begin::Topbar-->
							<div class="topbar">
								<!--begin::Search-->
								<div class="dropdown" id="kt_quick_search_toggle">
									<!--begin::Toggle-->
									<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
										<div class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1">
											<span class="svg-icon svg-icon-xl svg-icon-primary">
												<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
									</div>
									<!--end::Toggle-->
									<!--begin::Dropdown-->
									<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
										<div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
											<!--begin:Form-->
											<form method="get" class="quick-search-form">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
													<input type="text" class="form-control" placeholder="Search..." />
													<div class="input-group-append">
														<span class="input-group-text">
															<i class="quick-search-close ki ki-close icon-sm text-muted"></i>
														</span>
													</div>
												</div>
											</form>
											<!--end::Form-->
											<!--begin::Scroll-->
											<div class="quick-search-wrapper scroll" data-scroll="true" data-height="325" data-mobile-height="200"></div>
											<!--end::Scroll-->
										</div>
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Search-->
								<!--begin::Notifications-->
								<div class="dropdown">
									<!--begin::Toggle-->
									<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
										<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
											<span class="svg-icon svg-icon-xl svg-icon-primary">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
														<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<span class="pulse-ring"></span>
										</div>
									</div>
									<!--end::Toggle-->
									<!--begin::Dropdown-->
									<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
										<form>
											<!--begin::Header-->
											<div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(assets/media/misc/bg-1.jpg)">
												<!--begin::Title-->
												<h4 class="d-flex flex-center rounded-top">
													<span class="text-white">User Notifications</span>
													<span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">23 new</span>
												</h4>
												<!--end::Title-->
												<!--begin::Tabs-->
												<ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">
													<li class="nav-item">
														<a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications">Alerts</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#topbar_notifications_events">Events</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs">Logs</a>
													</li>
												</ul>
												<!--end::Tabs-->
											</div>
											<!--end::Header-->
											<!--begin::Content-->
											<div class="tab-content">
												<!--begin::Tabpane-->
												<div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
													<!--begin::Scroll-->
													<div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200">
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-primary mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-primary">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24" />
																				<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
																				<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Cool App</a>
																<span class="text-muted">Marketing campaign planning</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-warning mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-warning">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24" />
																				<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																				<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg">Awesome SAAS</a>
																<span class="text-muted">Project status update meeting</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-success mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-success">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24" />
																				<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
																				<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Claudy Sys</a>
																<span class="text-muted">Project Deployment &amp; Launch</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-danger mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-danger">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/General/Attachment2.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24" />
																				<path d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z" fill="#000000" opacity="0.3" transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641)" />
																				<path d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z" fill="#000000" transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359)" />
																				<path d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z" fill="#000000" opacity="0.3" transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146)" />
																				<path d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z" fill="#000000" opacity="0.3" transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961)" />
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Trilo Service</a>
																<span class="text-muted">Analytics &amp; Requirement Study</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-info mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-info">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24" />
																				<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
																				<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
																				<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Bravia SAAS</a>
																<span class="text-muted">Reporting Application</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-danger mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-danger">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24" />
																				<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
																				<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Express Wind</a>
																<span class="text-muted">Software Analytics &amp; Design</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex align-items-center mb-6">
															<!--begin::Symbol-->
															<div class="symbol symbol-40 symbol-light-success mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-success">
																		<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24" />
																				<path d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
																				<path d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z" fill="#000000" opacity="0.3" />
																			</g>
																		</svg>
																		<!--end::Svg Icon-->
																	</span>
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Text-->
															<div class="d-flex flex-column font-weight-bold">
																<a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Bruk Fitness</a>
																<span class="text-muted">Web Design &amp; Development</span>
															</div>
															<!--end::Text-->
														</div>
														<!--end::Item-->
													</div>
													<!--end::Scroll-->
													<!--begin::Action-->
													<div class="d-flex flex-center pt-7">
														<a href="#" class="btn btn-light-primary font-weight-bold text-center">See All</a>
													</div>
													<!--end::Action-->
												</div>
												<!--end::Tabpane-->
												<!--begin::Tabpane-->
												<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
													<!--begin::Nav-->
													<div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300" data-mobile-height="200">
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-line-chart text-success"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New report has been received</div>
																	<div class="text-muted">23 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-paper-plane text-danger"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">Finance report has been generated</div>
																	<div class="text-muted">25 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-user flaticon2-line- text-success"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New order has been received</div>
																	<div class="text-muted">2 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-pin text-primary"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New customer is registered</div>
																	<div class="text-muted">3 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-sms text-danger"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">Application has been approved</div>
																	<div class="text-muted">3 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-pie-chart-3 text-warning"></i>
																</div>
																<div class="navinavinavi-text">
																	<div class="font-weight-bold">New file has been uploaded</div>
																	<div class="text-muted">5 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon-pie-chart-1 text-info"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New user feedback received</div>
																	<div class="text-muted">8 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-settings text-success"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">System reboot has been successfully completed</div>
																	<div class="text-muted">12 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon-safe-shield-protection text-primary"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New order has been placed</div>
																	<div class="text-muted">15 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-notification text-primary"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">Company meeting canceled</div>
																	<div class="text-muted">19 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-fax text-success"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New report has been received</div>
																	<div class="text-muted">23 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon-download-1 text-danger"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">Finance report has been generated</div>
																	<div class="text-muted">25 hrs ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon-security text-warning"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New customer comment recieved</div>
																	<div class="text-muted">2 days ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
														<!--begin::Item-->
														<a href="#" class="navi-item">
															<div class="navi-link">
																<div class="navi-icon mr-2">
																	<i class="flaticon2-analytics-1 text-success"></i>
																</div>
																<div class="navi-text">
																	<div class="font-weight-bold">New customer is registered</div>
																	<div class="text-muted">3 days ago</div>
																</div>
															</div>
														</a>
														<!--end::Item-->
													</div>
													<!--end::Nav-->
												</div>
												<!--end::Tabpane-->
												<!--begin::Tabpane-->
												<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
													<!--begin::Nav-->
													<div class="d-flex flex-center text-center text-muted min-h-200px">All caught up!
													<br />No new notifications.</div>
													<!--end::Nav-->
												</div>
												<!--end::Tabpane-->
											</div>
											<!--end::Content-->
										</form>
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Notifications-->
								<!--begin::Quick Actions-->
								<div class="dropdown">
									<!--begin::Toggle-->
									<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
										<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
											<span class="svg-icon svg-icon-xl svg-icon-primary">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
														<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
														<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
														<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
									</div>
									<!--end::Toggle-->
									<!--begin::Dropdown-->
									<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
										<!--begin:Header-->
										<div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(assets/media/misc/bg-1.jpg)">
											<h4 class="text-white font-weight-bold">Quick Actions</h4>
											<span class="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">23 tasks pending</span>
										</div>
										<!--end:Header-->
										<!--begin:Nav-->
										<div class="row row-paddingless">
											<!--begin:Item-->
											<div class="col-6">
												<a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-right border-bottom">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Euro.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" fill="#000000" opacity="0.3" />
																<path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" fill="#000000" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
													<span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Accounting</span>
													<span class="d-block text-dark-50 font-size-lg">eCommerce</span>
												</a>
											</div>
											<!--end:Item-->
											<!--begin:Item-->
											<div class="col-6">
												<a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-bottom">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-attachment.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z" fill="#000000" opacity="0.3" />
																<path d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z" fill="#000000" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
													<span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Administration</span>
													<span class="d-block text-dark-50 font-size-lg">Console</span>
												</a>
											</div>
											<!--end:Item-->
											<!--begin:Item-->
											<div class="col-6">
												<a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-right">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Box2.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />
																<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
													<span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Projects</span>
													<span class="d-block text-dark-50 font-size-lg">Pending Tasks</span>
												</a>
											</div>
											<!--end:Item-->
											<!--begin:Item-->
											<div class="col-6">
												<a href="#" class="d-block py-10 px-5 text-center bg-hover-light">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
													<span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Customers</span>
													<span class="d-block text-dark-50 font-size-lg">Latest cases</span>
												</a>
											</div>
											<!--end:Item-->
										</div>
										<!--end:Nav-->
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Quick Actions-->
								<!--begin::Cart-->
								<div class="topbar-item">
									<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1" id="kt_quick_cart_toggle">
										<span class="svg-icon svg-icon-xl svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
								</div>
								<!--end::Cart-->
								<!--begin::Quick panel-->
								<div class="topbar-item">
									<div class="btn btn-icon btn-clean btn-lg mr-1" id="kt_quick_panel_toggle">
										<span class="svg-icon svg-icon-xl svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
													<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
								</div>
								<!--end::Quick panel-->
								<!--begin::Chat-->
								<div class="topbar-item">
									<div class="btn btn-icon btn-clean btn-lg mr-1" data-toggle="modal" data-target="#kt_chat_modal">
										<span class="svg-icon svg-icon-xl svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
													<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
								</div>
								<!--end::Chat-->
								<!--begin::Languages-->
								<div class="dropdown">
									<!--begin::Toggle-->
									<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
										<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
											<img class="h-20px w-20px rounded-sm" src="<?php echo base_url();?>boostrap4/dist/assets/media/svg/flags/226-united-states.svg" alt="" />
										</div>
									</div>
									<!--end::Toggle-->
									<!--begin::Dropdown-->
									<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
										<!--begin::Nav-->
										<ul class="navi navi-hover py-4">
											<!--begin::Item-->
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="symbol symbol-20 mr-3">
														<img src="<?php echo base_url();?>boostrap4/dist/assets/media/svg/flags/226-united-states.svg" alt="" />
													</span>
													<span class="navi-text">English</span>
												</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="navi-item active">
												<a href="#" class="navi-link">
													<span class="symbol symbol-20 mr-3">
														<img src="<?php echo base_url();?>boostrap4/dist/assets/media/svg/flags/128-spain.svg" alt="" />
													</span>
													<span class="navi-text">Spanish</span>
												</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="symbol symbol-20 mr-3">
														<img src="<?php echo base_url();?>boostrap4/dist/assets/media/svg/flags/162-germany.svg" alt="" />
													</span>
													<span class="navi-text">German</span>
												</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="symbol symbol-20 mr-3">
														<img src="<?php echo base_url();?>boostrap4/dist/assets/media/svg/flags/063-japan.svg" alt="" />
													</span>
													<span class="navi-text">Japanese</span>
												</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="symbol symbol-20 mr-3">
														<img src="<?php echo base_url();?>boostrap4/dist/assets/media/svg/flags/195-france.svg" alt="" />
													</span>
													<span class="navi-text">French</span>
												</a>
											</li>
											<!--end::Item-->
										</ul>
										<!--end::Nav-->
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Languages-->
								<!--begin::User-->
								<div class="topbar-item">
									<div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
										<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
										<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Sean</span>
										<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
											<span class="symbol-label font-size-h5 font-weight-bold">S</span>
										</span>
									</div>
								</div>
								<!--end::User-->
							</div>
							<!--end::Topbar-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					