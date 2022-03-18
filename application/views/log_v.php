
    
      <div class="container">
            <div id="grid"></div>
    </div>
            <script src="http://demos.telerik.com/kendo-ui/content/web/integration/jquery.signalr-1.1.3.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


    <script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
    <link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />
            <script>
                // $(document).ready(function() {
                    $("#grid").kendoGrid({
                        dataSource: {
                            type: "json",
                            transport: {
                                read: "<?php echo base_url(); ?>index.php/log/read"
                            },
                            schema: {
                                model: {
                                    fields: {
                                        user: { type: "string" },
                                        menu: { type: "string" },
                                        logindate: { type: "date" },
                                        ipaddress: { type: "string" }
                                    }
                                }
                            },
                            pageSize: 20, 
                            sort: { field: "logindate", dir: "desc"},
                        },
                        height: 550,
                        filterable: true,
                        sortable: true,
                        pageable: true,
                        columns: [{
                                field:"user",
                                title: "Username",
                                filterable: true
                            }, {
                                field: "menu",
                                title: "MENU"
                            },
                            {
                                field: "logindate",
                                title: "Last click",
                                format: "{0:MM/dd/yyyy hh:mm:ss tt}"

                            }, {
                                field: "ipaddress",
                                title: "IP Address",
                                 template: '<div><span class="label label-warning">#= ipaddress#</span></div>',
                            }
                        ]
                    });
                // });
            </script>
