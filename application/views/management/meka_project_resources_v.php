<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header">
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
    </div>
    <!-- /page header -->
    <!-- Content area -->
    <div class="content">
        <div id="example">
            <div id="gantt"></div>
        </div>
    </div>
</div>
<!-- <script src="//kendo.cdn.telerik.com/2016.3.914/js/pako_deflate.min.js"></script> -->

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
                        "week",
                        { type: "month", selected: true }
                    ],
                    columns: [
                        { field: "title", title: "Title", editable: true, sortable: true, width: 200 },
                        { field: "resources", title: "Assigned Resources", editable: true }
                    ],
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