<div class="table">
    <div id="gridccode"></div>
</div>

<script>
    var record = 0;

    function onChange(arg) {
        var selected = $.map(this.select(), function(item) {
            return $(item).text();
        });

        console.log("Selected: " + selected.length + " item(s), [" + selected + "]");
        // window.location.href = "<?php echo base_url(); ?>bd/boq_main/BD201807169/8/0/20/p";
    }

    function onDataBound(arg) {
        console.log("Grid data bound");
    }

    function onDataBinding(arg) {
        console.log("Grid data binding");
    }



        $("#gridccode").kendoGrid({

            dataSource: {
                dataType: "json",
                transport: {
                    read: "<?php echo base_url();?>bd/getboqcost/<?php echo $bdtender;?>/<?php echo $ref_bd;?>/<?php echo $projectid;?>"
                },
                schema: {
                    model: {
                        fields: {
                            cosrcode_h: {
                                type: "string"
                            },
                            costcode: {
                                type: "string"
                            },
                            csubgroup_name:{
                                type: "string"
                            },
                            totalamt: {
                                type: "number"
                            },
                            po_amt: {
                                type: "number"
                            },
                        }
                    }
                },
                serverPaging: true,
                pageSize: 100,
                serverFiltering: false,
                serverSorting: true,
                aggregate: [{
                        field: "totalamt",
                        aggregate: "sum"
                    },{
                        field: "po_amt",
                        aggregate: "sum"
                    },
                ],
                group: {
                    field: "cosrcode_h",
                    title: "G Cost",
                    dir: "asc",
                    
                    aggregates: [
                        { field: "totalamt", aggregate: "sum" },
                        { field: "po_amt", aggregate: "sum" }
                    ]
                },
            },
            height: 500,
            filterable: true,
            resizable: true,
            sortable: true,
            groupable: false,
            scrollable: {
                    virtual: true
            },
             pageable: {
                    alwaysVisible: true,
                    pageSizes: [5, 10, 20, 100,200,300,400,500]
                },

            columns: [{
                field: "cosrcode_h",
                title: "G Code",
                groupHeaderTemplate: "G Code: #=data.value#, Total Budget: #=kendo.format('{0:n}', aggregates.totalamt.sum)#, Total PO Amount: #=kendo.format('{0:n}', aggregates.po_amt.sum)#",
                filterable: {
                    multi: true,
                    search: true
                },
                width: 200,
                hidden:true ,
            }, {
                field: "costcode",
                title: "G Code",
                width: 100,
                filterable: {
                    multi: true,
                    search: true
                },
                attributes: {
                    class: "ob-center"
                },
            }, {
                field: "csubgroup_name",
                title: "S Name",
                width: 540,
                filterable: {
                    multi: true,
                    search: true
                },
            },{
                field: "totalamt",
                title: "Budget",
                filterable: {
                    multi: true,
                    search: true
                },
                width: 200,
                attributes: {
                    class: "ob-right"
                },
                format: "{0:n2}",
                footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n2')#</div>",

            },{
                field: "po_amt",
                title: "PO Amount",
                filterable: {
                    multi: true,
                    search: true
                },
                width: 200,
                attributes: {
                    class: "ob-right"
                },
                format: "{0:n2}",
                footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n2')#</div>",

            }],
            dataBinding: function() {
                record = (this.dataSource.page() - 1) * this.dataSource.pageSize();
            }

        });


</script>