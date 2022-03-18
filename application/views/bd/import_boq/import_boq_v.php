<!DOCTYPE html>
<html lang="en">
<head>
 	<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.1.221/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.1.221/styles/kendo.bootstrap.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.1.221/styles/kendo.default.mobile.min.css" />

    <script src="https://kendo.cdn.telerik.com/2018.1.221/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2018.1.221/js/jszip.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2018.1.221/js/kendo.all.min.js"></script>

	<meta charset="UTF-8">
	<title>test Loop</title>
</head>
<body>
<div id="example">
    <div class="box wide">
        <div class="box-col">
        <ul class="options">
            <li>
                <button class="k-button" id="save">Save changes</button>
                <button class="k-button" id="cancel">Cancel changes</button>
            </li>
        </ul>
        </div>
    </div>
    <div id="spreadsheet" style="width: 100%;"></div>
    <script>
	 $(function() {
            var crudServiceBaseUrl = "<?php echo base_url();?>";

            var dataSource = new kendo.data.DataSource({
                transport: {
                    read:  {
                        url: crudServiceBaseUrl + "jsonr/getboq/<?php echo $bd;?>",
                        dataType: "json"
                    },
                    update: {
                        url: crudServiceBaseUrl + "jsonr/venderUpdate",
                        dataType: "json",
						type: "post"
                    },
                    destroy: {
                        url: crudServiceBaseUrl + "jsonr/venderDestroy",
                        dataType: "json",
						type: "post"
                    },
                    create: {
                        url: crudServiceBaseUrl + "jsonr/boqCreate",
                        dataType: "json",
						type: "post"
                    },
                    parameterMap: function(options, operation) {
                        if (operation !== "read" && options.models) {
                            return {models: kendo.stringify(options.models)};
                        }
                    }
                },
                batch: true,
                change: function() {
                   $("#cancel, #save").toggleClass("k-state-disabled", !this.hasChanges());
                },
                schema: {
                    model: {
                        id: "boq_id",
                        fields: {
                            // boq_id: { type: "number" },
							boq_id: { type: "string" },
                            boq_job: { type: "string" }
                        }
                    }
                }
            });
        var spreadsheet = $("#spreadsheet").kendoSpreadsheet({
            render: function(e){
              // do custom height calculations to determine desired height
              var height = window.innerHeight;
              e.sender.element.innerHeight(height);
            },
                columns: 26,
                rows: 49999,
                toolbar: true,
                sheetsbar: false,
                sheets: [{
                    name: "boq_id",
                    dataSource: dataSource,
                    rows: [{
                        height: 40,
                        cells: [
                        {
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        },{
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        },{
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        },{
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        },{
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        },{
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        },{
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        },{
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        },{
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        },{
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        },{
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        },{
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        },{
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        },{
                            bold: "true",
                            background: "#9c27b0",
                            textAlign: "center",
                            color: "white"
                        }]
                    }],
                    columns: [
						// {field: "boq_id", title:"Vender ID", width: 50},
						// {field: "boq_id", title:"Vender Code", width: 50},
						// {field: "boq_job", title:"Vender Name", width: 415},
                        // { width: 80 },
                        { width: 120 },
                        { width: 80 },
                        { width: 100 },
                        { width: 200 },
                        { width: 300 },
                        { width: 200 },
                        // { width: 100 },
                        { width: 100 },
                        { width: 120 },
                        { width: 120 },
                        { width: 120 },
                        { width: 120 },
                        { width: 120 },
                        { width: 120 },
                        { width: 120 },
                    ]
                }]
        }).data("kendoSpreadsheet");

            // var range = spreadsheet.activeSheet().range("A1:A100");
            // var enabled = range.enable();

            // if (enabled === null) {
            //     enabled = true;
            // }

            // //Enable / disable specified range
            // range.enable(!enabled);
			

			$("#save").click(function() {
                if (!$(this).hasClass("k-state-disabled")) {
                    dataSource.sync();
                }
            });

            $("#cancel").click(function() {
                if (!$(this).hasClass("k-state-disabled")) {
                    dataSource.cancelChanges();
                }
            });
        
    });
    </script>
</div>


</body>
</html>