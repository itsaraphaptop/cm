<div class="mb-7">
    <div class="row align-items-center">
        <div class="col-lg-9 col-xl-8">
            <div class="row align-items-center">
                <div class="col-md-4 my-2 my-md-0">
                    <div class="input-icon">
                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                        <span>
                            <i class="flaticon2-search-1 text-muted"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>

<script>var HOST_URL = "<?php echo base_url();?>share/getaccount_deta";</script>

<script>
    "use strict";
	// Class definition

	var KTDefaultDatatableDemo = function() {
		// Private functions

		// basic demo
		var demo = function() {

			var options = {
				// datasource definition
				data: {
					type: 'remote',
					source: {
						read: {
							url: HOST_URL,
						},
					},
					pageSize: 20, // display 20 records per page
					// serverPaging: true,
					// serverFiltering: true,
					// serverSorting: true,
				},

				// layout definition
				layout: {
					scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
					height: 550, // datatable's body's fixed height
					footer: false, // display/hide footer
				},

				// column sorting
				sortable: true,

				pagination: true,

				search: {
					input: $('#kt_datatable_search_query'),
					key: 'generalSearch'
				},

				// columns definition
				columns: [ {
						field: 'act_code',
						title: 'Account Code',
					}, {
						field: 'act_name',
						title: 'Account Name',
					}, {
						field: 'Actions',
						title: 'Actions',
						sortable: false,
						width: 100,
						overflow: 'visible',
						autoHide: false,
						template: function(row) {
							if (row.act_header != "H") {
								return '\
									<button data-act-id="' + row.act_id + '" data-act-code="' + row.act_code + '" data-act-name="'+ row.act_name +'" class="btn btn-sm btn-clean" title="View records">\
									Select \
									</button>';
							}else{
								return '';
							}
						},
					}],

			};

			var datatable = $('#kt_datatable').KTDatatable(options);

			// both methods are supported
			// datatable.methodName(args); or $(datatable).KTDatatable(methodName, args);


			$('#kt_datatable_init').on('click', function() {
				datatable = $('#kt_datatable').KTDatatable(options);
			});

			$('#kt_datatable_reload').on('click', function() {
				// datatable.reload();
				$('#kt_datatable').KTDatatable('reload');
			});

            datatable.on('click', '[data-act-id]', function() {
            $("#accountname").val($(this).data('act-name'));
            $("#accno").val($(this).data('act-code'));
            $('#acprimary').modal('hide');
        });

		};

		return {
			// public functions
			init: function() {
				demo();
			},
		};
	}();

	jQuery(document).ready(function() {
		KTDefaultDatatableDemo.init();
	});

</script>