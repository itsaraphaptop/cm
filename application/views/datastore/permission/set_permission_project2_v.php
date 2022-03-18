
<div class="content d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <!--begin::Content-->
    <div class="d-flex flex-column flex-column-fluid" id="kt_content">
       
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="d-flex">
                            <!--begin::Pic-->
                            <div class="flex-shrink-0 mr-7">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img alt="Pic" src="<?php echo base_url();?>profile/<?php echo $getmemb[0]['uimg'];?>">
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin: Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <!--begin::User-->
                                    <div class="mr-3">
                                        <div class="d-flex align-items-center mr-3">
                                            <!--begin::Name-->
                                            <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3"><?php echo $getmemb[0]['m_name'];?></a>
                                            <!--end::Name-->
                                            <span class="label label-light-success label-inline font-weight-bolder mr-1"><?php echo strtoupper($getmemb[0]['m_type']);?></span>
                                        </div>
                                        <!--begin::Contacts-->
                                        <div class="d-flex flex-wrap my-2">
                                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
                                                        <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"></circle>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span><?php echo $getmemb[0]['m_email'];?></a>
                                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Lock.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                        <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span><?=$getposition[0]['p_name'];?></a>
                                        </div>
                                        <div class="d-flex flex-wrap my-2">
                                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M11.613922,13.2130341 C11.1688026,13.6581534 10.4887934,13.7685037 9.92575695,13.4869855 C9.36272054,13.2054673 8.68271128,13.3158176 8.23759191,13.760937 L6.72658218,15.2719467 C6.67169475,15.3268342 6.63034033,15.393747 6.60579393,15.4673862 C6.51847004,15.7293579 6.66005003,16.0125179 6.92202169,16.0998418 L8.27584113,16.5511149 C9.57592638,16.9844767 11.009274,16.6461092 11.9783003,15.6770829 L15.9775173,11.6778659 C16.867756,10.7876271 17.0884566,9.42760861 16.5254202,8.3015358 L15.8928491,7.03639343 C15.8688153,6.98832598 15.8371895,6.9444475 15.7991889,6.90644684 C15.6039267,6.71118469 15.2873442,6.71118469 15.0920821,6.90644684 L13.4995401,8.49898884 C13.0544207,8.94410821 12.9440704,9.62411747 13.2255886,10.1871539 C13.5071068,10.7501903 13.3967565,11.4301996 12.9516371,11.8753189 L11.613922,13.2130341 Z" fill="#000000"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span><?php echo $getmemb[0]['m_tel'];?></a>
                                        </div>
                                        <div class="d-flex flex-wrap my-2">
                                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M9,15 L7.5,15 C6.67157288,15 6,15.6715729 6,16.5 C6,17.3284271 6.67157288,18 7.5,18 C8.32842712,18 9,17.3284271 9,16.5 L9,15 Z M9,15 L9,9 L15,9 L15,15 L9,15 Z M15,16.5 C15,17.3284271 15.6715729,18 16.5,18 C17.3284271,18 18,17.3284271 18,16.5 C18,15.6715729 17.3284271,15 16.5,15 L15,15 L15,16.5 Z M16.5,9 C17.3284271,9 18,8.32842712 18,7.5 C18,6.67157288 17.3284271,6 16.5,6 C15.6715729,6 15,6.67157288 15,7.5 L15,9 L16.5,9 Z M9,7.5 C9,6.67157288 8.32842712,6 7.5,6 C6.67157288,6 6,6.67157288 6,7.5 C6,8.32842712 6.67157288,9 7.5,9 L9,9 L9,7.5 Z M11,13 L13,13 L13,11 L11,11 L11,13 Z M13,11 L13,7.5 C13,5.56700338 14.5670034,4 16.5,4 C18.4329966,4 20,5.56700338 20,7.5 C20,9.43299662 18.4329966,11 16.5,11 L13,11 Z M16.5,13 C18.4329966,13 20,14.5670034 20,16.5 C20,18.4329966 18.4329966,20 16.5,20 C14.5670034,20 13,18.4329966 13,16.5 L13,13 L16.5,13 Z M11,16.5 C11,18.4329966 9.43299662,20 7.5,20 C5.56700338,20 4,18.4329966 4,16.5 C4,14.5670034 5.56700338,13 7.5,13 L11,13 L11,16.5 Z M7.5,11 C5.56700338,11 4,9.43299662 4,7.5 C4,5.56700338 5.56700338,4 7.5,4 C9.43299662,4 11,5.56700338 11,7.5 L11,11 L7.5,11 Z" fill="#000000" fill-rule="nonzero"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span><?php echo $getmemb[0]['m_code'];?></a>
                                        </div>
                                        <!--end::Contacts-->
                                    </div>
                                    <!--begin::User-->
                                </div>
                                <!--end::Title-->
                                <!--begin::Content-->
                            </div>
                            <!--end::Info-->
                        </div>
                    </div>
                </div>
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-body">
                        <!--begin: Search Form-->
                        <!--begin: Datatable-->
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_datatable_2" style="margin-top: 13px !important;">
                            <thead>
                                <tr>
                                    <th width="10%">Record ID</th>
                                    <th>Project Name</th>
                                    <th hidden>Project status</th>
                                    <th hidden>Project ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n=1; foreach ($res as $key => $value) { ?>
                                    <tr>
                                        <td><?=$n;?></td>
                                        <td><?=$value->project_name;?></td>
                                        <td hidden><?=$value->permission_status;?></td>
                                        <td hidden><?=$value->project_id;?></td>
                                    </tr>
                                <?php $n++; } ?>
                            </tfoot>
                        </table>
                        <input type="hidden" id="userid" value="<?=$module_id;?>">
                        <!-- <input type="text" id="show" name="vehicle"><br> -->
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
<script src="<?php echo base_url();?>boostrap4/dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url();?>boostrap4/dist/assets/js/pages/crud/datatables/basic/paginations.js"></script>
<script>
    var KTDatatablesExtensionsKeytable = function() {
var initTable2 = function() {
    // begin first table
    var table = $('#kt_datatable_2').DataTable({
        responsive: true,
        select: {
            style: 'multi',
            selector: 'td:first-child .checkable',
        },
        headerCallback: function(thead, data, start, end, display) {
            let counter = 0;
            for (var i = 0; i < data.length; i++) {
               if (data[i][2]==='Y') counter++;
            }
            if (i === counter) {
                thead.getElementsByTagName('th')[0].innerHTML = `
                <label class="checkbox checkbox-single checkbox-solid checkbox-primary mb-0">
                    <input type="checkbox" checked  class="group-checkable"/>
                    <span></span>
                </label>`;
                // document.getElementById("show").value = "chkall";
            }else{
                thead.getElementsByTagName('th')[0].innerHTML = `
                <label class="checkbox checkbox-single checkbox-solid checkbox-primary mb-0">
                    <input type="checkbox" class="group-checkable"/>
                    <span></span>
                </label>`;
                // document.getElementById("show").value = "unchkall";
            }
            
           
        },
        columnDefs: [
            {
                targets: 0,
                orderable: false,
                render: function(data, type, full, meta) {
                    // console.log(full);
                    if (full[2]=="Y") {
                        return `
                            <label class="checkbox checkbox-single checkbox-primary mb-0">
                                <input type="checkbox" checked name="myCheckbox" value="${full[3]}" class="checkable"/>
                                <span></span>
                            </label>`;
                    }else{
                        return `
                            <label class="checkbox checkbox-single checkbox-primary mb-0">
                                <input type="checkbox" name="myCheckbox" value="${full[3]}" class="checkable"/>
                                <span></span>
                            </label>`;

                    }                  
                },
            },
        ],
    });

    table.on('change', '.group-checkable', function() {
        var set = $(this).closest('table').find('td:first-child .checkable');
        var checked = $(this).is(':checked');
        $(set).each(function(data) {
            if (checked) {
                $(this).prop('checked', true);
                // table.rows($(this).closest('tr')).select();
                console.log(data);
                // document.getElementById("show").value = "chkall";
                var userid = $("#userid").val();
                $.ajax({
                    url: '<?php echo base_url(); ?>datastore_active/permisallchk',
                    type: 'POST',
                    data: {'userid':userid},
                    success: function(data) {
                        console.log($.trim(data));
                    }
                });
            }
            else {
                $(this).prop('checked', false);
                // table.rows($(this).closest('tr')).deselect();
                console.log(data);
                // document.getElementById("show").value =  "unchkall";
                var userid = $("#userid").val();
                $.ajax({
                    url: '<?php echo base_url(); ?>datastore_active/permisallunchk',
                    type: 'POST',
                    data: {'userid':userid},
                    success: function(data) {
                        console.log($.trim(data));
                    }
                });
            }
        });
    });

    table.on('change', '.checkable', function() {
        var set = $(this).closest('table').find('th:first-child .group-checkable');
        set.prop('checked', false);
        // table.rows($(this).closest('tr')).select();

        var checked = $(this).is(':checked');
            if (checked) {
                $(this).prop('checked', true);
                // table.rows($(this).closest('tr')).select();
                let counter = 0;
                var checkboxes = document.getElementsByName('myCheckbox');
                var checkboxesChecked = [];
                for (var i=0; i<checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        checkboxesChecked.push(checkboxes[i].value);
                    }
                    if (checkboxes[i].checked) counter++;
                }
                console.log(counter);
                if (checkboxes.length === counter) {
                    set.prop('checked', true);
                    // table.rows($(this).closest('tr')).select();
                }
                var userid = $("#userid").val();
                $.ajax({
                    url: '<?php echo base_url(); ?>datastore_active/testchk',
                    type: 'POST',
                    data: {'data[]':checkboxesChecked,'userid':userid},
                    success: function(data) {
                        console.log($.trim(data));
                    }
                });
            } else {
                $(this).prop('checked', false);
                table.rows($(this).closest('tr')).deselect();
                var checkboxes = document.getElementsByName('myCheckbox');
                var checkboxesChecked = [];
                for (var i=0; i<checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        checkboxesChecked.push(checkboxes[i].value);
                    }
                }
                var userid = $("#userid").val();
                $.ajax({
                    url: '<?php echo base_url(); ?>datastore_active/testunchk',
                    type: 'POST',
                    data: {'data[]':checkboxesChecked,'userid':userid},
                    success: function(data) {
                        console.log($.trim(data));
                    }
                });
            }
        });
        
        // });
    };

return {

    //main function to initiate the module
    init: function() {
        initTable2();
    },

};

}();

jQuery(document).ready(function() {
KTDatatablesExtensionsKeytable.init();
});
</script>