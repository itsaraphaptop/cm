<div class="content d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <!--begin::Content-->
    <div class="d-flex flex-column flex-column-fluid" id="kt_content">
       
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">Warehouse
                            <span class="d-blocktext-muted pt-2 font-size-sm"></span></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Search Form-->
                        <!--begin::Search Form-->
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
                        <!--end::Search Form-->
                        <!--begin: Datatable-->
                        <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
</div>
<script>var HOST_URL = "<?php echo base_url();?>jsonr/getdataprojrct";</script>


<script>
    "use strict";
// Class definition

var KTDefaultDatatableDemo = function() {
	// Private functions

	// basic demo
	var initDatatable = function() {

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
			columns: [
				{
					field: 'ID',
					title: '#',
					sortable: false,
					type: 'number',
					width: 20,
					selector: true,
					textAlign: 'center',
					template: function(row) {
						return row.project_id;
					},
				},{
					field: 'project_code',
					title: 'Project Code',
                    textAlign: 'center',
					width: 150,
				}, {
					field: 'project_name',
					title: 'Project Name',
				}, {
					field: 'Actions',
					title: 'Warehouse',
                    width: 100,
					template: function(row) {
						return '\
							<a href="<?php echo base_url();?>datastore/setupwarehouse/'+row.project_id+'/'+row.project_code+'" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\
						';
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

        datatable.on('click', '[data-project-id]', function() {
            $("#subproject").html($(this).data('project-name'));
            $('#kt_datatable_modal').modal('show');
        });
	};


	return {
		// public functions
		init: function() {
			initDatatable();
		},
	};
}();

jQuery(document).ready(function() {
	KTDefaultDatatableDemo.init();
});

</script>