<style type="text/css">

@media (min-device-width:769px) and (max-device-width:1024px) {
    #tab_bar{
        padding-top: 50px;
    }
}



</style>
<!-- Main content  trans-->
			<div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header" id="tab_bar">
                    <div class="btn-group btn-group-justified">
                        <a href="<?= base_url();?>project_control" class="btn bg-primary"> 
                            <i class="fa fa-mail-reply"></i> Project Control
                        </a>
                        <a href="<?= base_url();?>management/project_timeline/<?= $projid ?>" class="btn bg-success"> 
                            <i class="fa fa-users"></i> Basic
                        </a>
                        <a href="<?= base_url();?>management/project_resources/<?= $projid ?>" class="btn bg-danger">
                            <i class="fa fa-area-chart"></i> Resources
                        </a>
                    </div>

                  <!--   <div class="page-header-content">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                        </div>
                    </div> -->
                </div>
                <!-- /page header -->



				<!-- Content area -->
				<div class="content">

<div id="example">
        <div id="gantt"></div>
        <input type="hidden" value="<?php echo $projid; ?>">
<!--  -->
<style>
    /*
        Use the DejaVu Sans font for display and embedding in the PDF file.
        The standard PDF fonts have no support for Unicode characters.
    */
    .k-gantt {
        font-family: "DejaVu Sans", "Arial", sans-serif;
    }

    /* Hide toolbars during export */
    .k-pdf-export .k-gantt-toolbar
    {
        display: none;
    }
</style>

<script>
    // Import DejaVu Sans font for embedding

    // NOTE: Only required if the Kendo UI stylesheets are loaded
    // from a different origin, e.g. cdn.kendostatic.com
    // kendo.pdf.defineFont({
        "DejaVu Sans"             : "//kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans.ttf",
        "DejaVu Sans|Bold"        : "//kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Bold.ttf",
        "DejaVu Sans|Bold|Italic" : "//kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
        "DejaVu Sans|Italic"      : "//kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf"
    // });
</script>

<!-- Load Pako ZLIB library to enable PDF compression -->
<script src="//kendo.cdn.telerik.com/2016.3.914/js/pako_deflate.min.js"></script>

<!--  -->
        <script>
            // $(document).ready(function() {
                var serviceRoot = "<?php echo base_url(); ?>";
                var tasksDataSource = new kendo.data.GanttDataSource({
                    transport: {
                        read: {
                            url: serviceRoot + "gantttasks/index/<?php echo $projid; ?>",
                            dataType: "json"
                        },
                        update: {
                            url: serviceRoot + "gantttasks/Update/<?php echo $projid; ?>",
                            dataType: "json",
                            type: "post"
                        },
                        destroy: {
                            url: serviceRoot + "gantttasks/Destroy/<?php echo $projid; ?>",
                            dataType: "json",
                            type: "post"
                        },
                        create: {
                            url: serviceRoot + "gantttasks/Create/<?php echo $projid; ?>",
                            dataType: "json",
                            type: "post"
                        },
                        parameterMap: function(options, operation) {
                            if (operation !== "read") {
                                return { models: kendo.stringify(options.models || [options]) };
                            }
                        }
                    },
                    schema: {
                        model: {
                            id: "id",
                            fields: {
                                id: { from: "ID", type: "number" },
                                orderId: { from: "OrderID", type: "number", validation: { required: true } },
                                parentId: { from: "ParentID", type: "number", defaultValue: null, validation: { required: true } },
                                start: { from: "Start", type: "date" },
                                end: { from: "End", type: "date" },
                                title: { from: "Title", defaultValue: "", type: "string" },
                                // contact: { from: "contact", defaultValue: "", type: "string" },
                                percentComplete: { from: "PercentComplete", type: "number" },
                                summary: { from: "Summary", type: "boolean" },
                                expanded: { from: "Expanded", type: "boolean", defaultValue: true }
                            }
                        }
                    }
                });

                var dependenciesDataSource = new kendo.data.GanttDependencyDataSource({
                    transport: {
                        read: {
                            url: serviceRoot + "GanttDependencies",
                            dataType: "json"
                        },
                        update: {
                            url: serviceRoot + "GanttDependencies/Update",
                            dataType: "json",
                            type: "post"
                        },
                        destroy: {
                            url: serviceRoot + "GanttDependencies/Destroy",
                            dataType: "json",
                            type: "post"
                        },
                        create: {
                            url: serviceRoot + "GanttDependencies/Create",
                            dataType: "json",
                            type: "post"
                        },
                        parameterMap: function(options, operation) {
                            if (operation !== "read") {
                                return { models: kendo.stringify(options.models || [options]) };
                            }
                        }
                    },
                    schema: {
                        model: {
                            id: "id",
                            fields: {
                                id: { from: "ID", type: "number" },
                                predecessorId: { from: "PredecessorID", type: "number" },
                                successorId: { from: "SuccessorID", type: "number" },
                                type: { from: "Type", type: "number" }
                            }
                        }
                    }
                });

                var gantt = $("#gantt").kendoGantt({
                    dataSource: tasksDataSource,
                    dependencies: dependenciesDataSource,
                    resources: {
                        field: "resources",
                         dataColorField: "Color",
                        dataTextField: "Name",
                        dataSource: {
                            transport: {
                                read: {
                                    url: serviceRoot + "GanttDependencies/Member",
                                    dataType: "json"
                                }
                            },
                            schema: {
                                model: {
                                    id: "id",
                                    fields: {
                                        id: { from: "ID", type: "number" }
                                    }
                                }
                            }
                        }
                    },
                    assignments: {
                        dataTaskIdField: "TaskID",
                        dataResourceIdField: "ResourceID",
                        dataValueField: "Units",
                        dataSource: {
                            transport: {
                                read: {
                                    url: serviceRoot + "GanttResourceAssignments",
                                    dataType: "json"
                                },
                                update: {
                                    url: serviceRoot + "GanttResourceAssignments/Update",
                                    dataType: "json",
                                    type: "post"
                                },
                                destroy: {
                                    url: serviceRoot + "GanttResourceAssignments/Destroy",
                                    dataType: "json",
                                    type: "post"
                                },
                                create: {
                                    url: serviceRoot + "GanttResourceAssignments/Create",
                                    dataType: "json",
                                    type: "post"
                                },
                                parameterMap: function(options, operation) {
                                    if (operation !== "read") {
                                        return { models: kendo.stringify(options.models || [options]) };
                                    }
                                }
                            },
                            schema: {
                                model: {
                                    id: "ID",
                                    fields: {
                                        ID: { type: "number" },
                                        ResourceID: { type: "number" },
                                        Units: { type: "number" },
                                        TaskID: { type: "number" }
                                    }
                                }
                            }
                        }
                    },
                    views: [
                        "day",
                        { type: "week", selected: true },
                        "month"
                    ],
                    columns: [
                        { field: "id", title: "ID", width: 60 },
                        { field: "title", title: "Title", editable: true, sortable: true },
                        { field: "start", title: "Start Time", format: "{0:MM/dd/yyyy}", width: 100, editable: true, sortable: true },
                        { field: "end", title: "End Time", format: "{0:MM/dd/yyyy}", width: 100, editable: true, sortable: true },
                        // { field: "contact", title: "contact", editable: true, sortable: true }
                        { field: "resources", title: "Assigned Resources", editable: true }
                    ],
                    toolbar: ["append", "pdf"],
                    pdf: {
                        fileName: "Project Gantt Export.pdf"
                    },
                    height: 700,

                    showWorkHours: false,
                    showWorkDays: false,

                    snap: false
                }).data("kendoGantt");

                $(document).bind("kendo:skinChange", function() {
                    gantt.refresh();
                });
            // });
        </script>
    </div>
</div>
</div>
