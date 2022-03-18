<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Kendo UI Snippet</title>

    <link rel="stylesheet" href="<?php echo base_url();?>kendo/styles/kendo.common.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>kendo/styles/kendo.rtl.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>kendo/styles/kendo.silver.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>kendo/styles/kendo.mobile.all.min.css"/>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2019.1.220/js/kendo.all.min.js"></script>
</head>
<body>
  
<script src="https://demos.telerik.com/kendo-ui/content/shared/js/products.js"></script>
<div id="example">
    <div id="grid"></div>

    <script>

        // $(document).ready(function () {
            var dataSource = new kendo.data.DataSource({
               pageSize: 20,
               data: "<?php echo base_url();?>test/getsystem",
               schema: {
                   model: {
                     id: "ProductID",
                     fields: {
                        ProductID: { editable: false, nullable: true },
                        ProductName: { validation: { required: true } },
                        Category: { defaultValue: { CategoryID: 1, CategoryName: "Beverages"} },
                        UnitPrice: { type: "number", validation: { required: true, min: 1} }
                     }
                   }
               }
            });

            $("#grid").kendoGrid({
                dataSource: dataSource,
                pageable: true,
                height: 550,
                toolbar: ["create"],
                columns: [
                    { field:"ProductName",title:"Product Name" },
                    { field: "Category", title: "Category", width: "180px", editor: categoryDropDownEditor, template: "#: data.CategoryName #" },
                    { field: "UnitPrice", title:"Unit Price", format: "{0:c}", width: "130px" },
                    { command: "edit", title: " ", width: "150px" }],
                editable: "inline",
                edit: function(e) {
                  var model = e.model; //reference to the model that is about the be edited

                  var container = e.container; //reference to the editor container

                  var categoryDropDownList = container.find("[data-role=dropdownlist]").data("kendoDropDownList"); //find widget element and then get the widget instance
                  // if DropDownListwidget is found
                  if (categoryDropDownList) {
                    //use DropDownList API based on the model values to accomplish your bussiness requirement.
                    //link: http://docs.telerik.com/kendo-ui/api/javascript/ui/dropdownlist
                    console.log("DropDownList", categoryDropDownList);
                  }

                  var priceNumericTextBox = container.find("[data-role=numerictextbox]").data("kendoNumericTextBox"); //find widget element and then the widget instance
                  if (priceNumericTextBox) {
                    //use NumericTextBox API
                    //link: http://docs.telerik.com/kendo-ui/api/javascript/ui/numerictextbox
                    console.log("NumericTextBox", priceNumericTextBox);
                  }
                }
            });
        // });

        function categoryDropDownEditor(container, options) {
            $('<input required data-text-field="CategoryName" data-value-field="CategoryID" data-bind="value:' + options.field + '"/>')
                .appendTo(container)
                .kendoDropDownList({
                    autoBind: false,
                    dataSource: {
                        type: "json",
                        transport: {
                            read: "<?php echo base_url();?>datastore/jsonsystem"
                        }
                    }
                });
        }

    </script>
</div>
</body>
</html>