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
                        <input type="text" id="userid" value="<?=$module_id;?>">
                        <textarea id="kt_datatable_console" class="form-control" cols="100" rows="10" title="Console" readonly="readonly"></textarea>
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
<script>var HOST_URL = "<?php echo base_url();?>jsonr/getdataprojrct_permis";</script>


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
                    selector: {class: 'm-checkbox--solid m-checkbox--brand'},
					textAlign: 'center',
					template: function(row) {
						return row.project_id;
					},
				}, {
					field: 'project_name',
					title: 'Project Name',
                    width: 250,
				}],

		};

        options.extensions = {
            // boolean or object (extension options)
            checkbox: {
                vars: {
                selectedAllRows: 'selectedAllRows',
                requestIds: 'requestIds',
                rowIds: 'meta.rowIds',
                },
            },
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

	};
    var eventsCapture = function() {
        $('#kt_datatable').on('datatable-on-init', function() {
            eventsWriter('Datatable init');
            // const jsons = "<?php echo base_url();?>jsonr/getdataprojrct_permis_fecth"
            // fetch(jsons)
            //     .then(response => response.json())
            //     .then(data => appendData(data))
            //     .catch(err => {console.log('error: '+ err)})
            // function appendData(data) {
            //     for (var i = 0; i < data.length; i++) {
            //         console.log(data[i].permission_status);
            //         console.log(data[i].project_id);
                    
            //         console.log($("input[type='checkbox']").val());
                   
            //         if (data[i].permission_status=="Y") {
            //             alert("Y");
            //                 $("input[type='checkbox']").prop ( "checked" ,true );
                            
            //         } else {
            //             alert("N");
            //             $("input[type='checkbox']").prop ( "checked" ,false );
            //                 // alert($("input:checkbox:checked").length);
            //                 // $("input[type='checkbox']");
                        
            //         }
                    
            //     }
            // }
            
        }).on('datatable-on-reloaded', function(e) {
            eventsWriter('Datatable reloaded');
        }).on('datatable-on-check', function(e, args) {
            eventsWriter('Checkbox active: ' + args.toString());
            console.log(args);
            var userid = $("#userid").val();
            $.ajax({
                url: '<?php echo base_url(); ?>datastore_active/testchk',
                type: 'POST',
                data: {'data[]':args,'userid':userid},
                success: function(data) {
                    console.log($.trim(data));
                }
            });
        }).on('datatable-on-uncheck', function(e, args) {
            eventsWriter('Checkbox inactive: ' + args.toString());
            console.log(args);
            var userid = $("#userid").val();
            $.ajax({
                url: '<?php echo base_url(); ?>datastore_active/testunchk',
                type: 'POST',
                data: {'data[]':args,'userid':userid},
                success: function(data) {
                    console.log($.trim(data));
                }
            });
        });
    };
    var eventsWriter = function(string) {
    var console = $('#kt_datatable_console');
    var value = console.val();
        value = value + '\t\n' + string;
        $(console).val(value);
        $(console).scrollTop(console[0].scrollHeight - $(console).height());
    };


	return {
		// public functions
		init: function() {
			initDatatable();
            eventsCapture();
		},
	};
}();

jQuery(document).ready(function() {
	KTDefaultDatatableDemo.init();
});

</script>