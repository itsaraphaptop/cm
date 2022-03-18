<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Itim&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>kendo/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>kendo/styles/kendo.bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>kendo/styles/kendo.default.mobile.min.css" />

    <script src="<?php echo base_url(); ?>kendo/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>kendo/js/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>kendo/js/kendo.all.min.js"></script>
</head>
<body>
        <div id="example">
            <div id="grid"></div>

            <script>
                // $(document).ready(function () {

                    $("#grid").kendoGrid({
                      toolbar: ["excel"],
                        excel: {
                            fileName: "Kendo UI Grid Export.xlsx",
                            proxyURL: "//demos.telerik.com/kendo-ui/service/export",
                            filterable: true
                        },
                        dataSource: {
                            type: "odata",
                            transport: {
                                read: "//demos.telerik.com/kendo-ui/service/Northwind.svc/Customers"
                            },
                            pageSize: 20
                        },
                        height: 550,
                        groupable: true,
                        sortable: true,
                        resizable: true,
                        reorderable: true,
                        pageable: true,
                        columnMenu: true,
                        columns: [{
                            field: "CompanyName",
                            title: "Company Name",
                            width: 420
                        },
                        {
                            title: "Contact Info",
                            columns: [{
                                field: "ContactTitle",
                                title: "Contact Title",
                                width: 200
                            },{
                                field: "ContactName",
                                title: "Contact Name",
                                width: 200
                            },{
                                title: "Location",
                                columns: [ {
                                    field: "Country",
                                    width: 200
                                },{
                                    field: "City",
                                    width: 200
                                }]
                            },{
                                field: "Phone",
                                title: "Phone"
                            }]
                        }]
                    });
                // });
            </script>
        </div>


</body>
</html>
