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

<script>var HOST_URL = "<?php echo base_url();?>datastore/gettender";</script>

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
						field: 'bd_tenid',
						title: 'Tender Code',
					}, {
						field: 'bd_pname',
						title: 'Tender Name',
					}, {
						field: 'Actions',
						title: 'Actions',
						sortable: false,
						width: 100,
						overflow: 'visible',
						autoHide: false,
						template: function(row) {
							if (row.bd_status==='win') {
								return '\
									<button data-tender-id="' + row.bd_tenid + '" data-tender-name="'+ row.bd_pname +'" class="btn btn-sm btn-clean" disabled="disabled" title="View records">\
									Select '+(row.bd_status)+'\
									</button>';
							} else {
								return '\
									<button data-tender-id="' + row.bd_tenid + '" data-tender-name="'+ row.bd_pname +'" class="btn btn-sm btn-clean" title="View records">\
									Select '+(row.bd_status)+'\
									</button>';
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

            datatable.on('click', '[data-tender-id]', function() {
            $("#bd_tenname").val($(this).data('tender-name'));
            $("#bd_tenid").val($(this).data('tender-id'));
			var ten_id = $(this).data('tender-id');
            $('#tender_modal').modal('hide');
			$("#kt_repeater_3").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			$("#kt_repeater_3").load('<?php echo base_url(); ?>management/tender_detail_new/'+ten_id);
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