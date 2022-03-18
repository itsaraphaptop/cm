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
                            <h3 class="card-label">Project
                            <span class="d-blocktext-muted pt-2 font-size-sm"></span></h3>
                        </div>
                        <div class="card-toolbar">
                             <!--begin::Button-->
                             <button class="btn btn-light font-weight-bold mr-2" type="button" id="kt_datatable_reload">Reload</button>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <a href="<?php echo base_url();?>datastore/addproject_new" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>New Project</a>
                            <!--end::Button-->
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
<!--begin::Modal-->
<div id="kt_datatable_modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="min-height: 590px;">
            <div class="modal-header py-5">
                <h5 class="modal-title">Sub Project
                <span class="d-block text-muted font-size-sm" id="subproject"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-5">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query_2" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_sub"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold text-uppercase">Submit</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
<script>var HOST_URL = "<?php echo base_url();?>jsonr/getdataprojrct";</script>
<script>var HOST_URL_SUB = "<?php echo base_url();?>jsonr/getdatasubprojrct";</script>


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
				}, {
					field: 'project_name',
					title: 'Project Name',
                    width: 250,
				}, {
					field: 'chkconbqq',
					title: 'BOQ',
                    width: 100,
					// callback function support for column rendering
					template: function(row) {
						var conboq = {
							1: {'title': 'Control', 'class': 'label-light-primary'},
							0: {'title': 'Not Control', 'class': ' label-light-danger'},
						};
						return '<span class="label ' + conboq[row.chkconbqq].class + ' label-inline font-weight-bold label-lg">' + conboq[row.chkconbqq].title + '</span>';
					},
				}, {
					field: 'controlbg',
					title: 'Budget',
                    width: 100,
					// callback function support for column rendering
					template: function(row) {
						var conbg = {
							1: {'title': 'Not Control', 'class': 'label-light-danger'},
							2: {'title': 'Control', 'class': 'label-light-primary'},
						};
						return '<span class="label ' + conbg[row.controlbg].class + ' label-inline font-weight-bold label-lg">' + conbg[row.controlbg].title + '</span>';
					},
				},{
					field: 'project_status',
					title: 'Status',
                    width: 75,
					// callback function support for column rendering
					template: function(row) {
						var conboq = {
							'normal': {'title': 'Active', 'class': 'label-light-success'},
							'close': {'title': 'Close Project', 'class': ' label-light-danger'},
						};
						return '<span class="label ' + conboq[row.project_status].class + ' label-inline font-weight-bold label-lg">' + conboq[row.project_status].title + '</span>';
					},
				}, {
                    field: 'Sub Project',
                    title: 'Sub Project',
                    width: 100,
                    template: function(row) {
                        return '\
                            <button data-project-id="' + row.project_id + '" data-project-name="'+ row.project_name +'" class="btn btn-sm btn-clean" title="View records">\
                                <i class="flaticon2-document"></i> Details\
                            </button>';
                    },
                }, {
					field: 'Actions',
					title: 'Actions',
                    width: 75,
					template: function(row) {
						return '\
							<a href="<?php echo base_url();?>datastore/editproject/'+row.project_id+'/'+row.project_code+'" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
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
            initSubDatatable($(this).data('project-id'));
            $('#kt_datatable_modal').modal('show');
        });
	};

    var initSubDatatable = function(id) {
        var el = $('#kt_datatable_sub');
        var datatable = el.KTDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: HOST_URL_SUB,
                        params: {
                            query: {
                                generalSearch: '',
                                project_sub: id,
                            },
                        },
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: false,
                serverSorting: true,
            },

            // layout definition
            layout: {
                scroll: true,
                height: 550,
                footer: false,
            },

            search: {
                input: $('#kt_datatable_search_query_2'),
                key: 'generalSearch'
            },

            sortable: true,

            // columns definition
            columns: [{
                field: 'project_id',
                title: '#',
                sortable: false,
                width: 10,
            }, {
                field: 'project_code',
                title: 'Project Code',
            }, {
                field: 'project_name',
                title: 'Project Name',
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return '\
                        <a href="<?php echo base_url();?>datastore/editcompany/'+row.project_id+'" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
                            <i class="la la-edit"></i>\
                        </a>\
                    ';
                },
            }],
        });

        var modal = datatable.closest('.modal');

        $('#kt_datatable_search_status_2').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type_2').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status_2, #kt_datatable_search_type_2').selectpicker();

        // fix datatable layout after modal shown
        datatable.hide();
        modal.on('shown.bs.modal', function() {
            var modalContent = $(this).find('.modal-content');
            datatable.spinnerCallback(true, modalContent);
            datatable.spinnerCallback(false, modalContent);
        }).on('hidden.bs.modal', function() {
            el.KTDatatable('destroy');
        });

        datatable.on('datatable-on-layout-updated', function() {
            datatable.show();
            datatable.redraw();
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