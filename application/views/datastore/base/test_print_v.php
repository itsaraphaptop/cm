<!DOCTYPE html>
<html>
<head>
    <base href="http://demos.telerik.com/kendo-ui/grid/editing-custom-validation">
    <style>html { font-size: 14px; font-family: Arial, Helvetica, sans-serif; }</style>
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url();?>kendo/styles/kendo.common-bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>kendo/styles/kendo.bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>kendo/styles/kendo.default.mobile.min.css" />
    <script src="<?php echo base_url();?>kendo/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>kendo/js/jszip.min.js"></script>
    <script src="<?php echo base_url();?>kendo/js/kendo.all.min.js"></script>
</head>
  <body>
    <div id="grid"></div>

    <script type="text/x-kendo-template" id="toolbar-template">
        <button type="button" class="k-button" id="printGrid">Print Grid</button>
    </script>
    <script>
    function printGrid() {
      var gridElement = $('#grid'),
          printableContent = '',
          win = window.open('', '', 'width=800, height=500, resizable=1, scrollbars=1'),
          doc = win.document.open();

      var htmlStart =
              '<!DOCTYPE html>' +
              '<html>' +
              '<head>' +
              '<meta charset="utf-8" />' +
              '<title>Kendo UI Grid</title>' +
              '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" /> ' +
              '<style>' +
              'html { font: 11pt sans-serif; }' +
              '.k-grid { border-top-width: 0; }' +
              '.k-grid, .k-grid-content { height: auto !important; }' +
              '.k-grid-content { overflow: visible !important; }' +
              'div.k-grid table { table-layout: auto; width: 100% !important; }' +
              '.k-grid .k-grid-header th { border-top: 1px solid; }' +
              '.k-grouping-header, .k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
              // '.k-grid-pager { display: none; }' + // optional: hide the whole pager
              '</style>' +
              '</head>' +
              '<body>';

      var htmlEnd =
              '</body>' +
              '</html>';

      var gridHeader = gridElement.children('.k-grid-header');
      if (gridHeader[0]) {
          var thead = gridHeader.find('thead').clone().addClass('k-grid-header');
          printableContent = gridElement
              .clone()
                  .children('.k-grid-header').remove()
              .end()
                  .children('.k-grid-content')
                      .find('table')
                          .first()
                              .children('tbody').before(thead)
                          .end()
                      .end()
                  .end()
              .end()[0].outerHTML;
      } else {
          printableContent = gridElement.clone()[0].outerHTML;
      }

      doc.write(htmlStart + printableContent + htmlEnd);
      doc.close();
      win.print();
  }

  $(function () {
      var grid = $('#grid').kendoGrid({
          dataSource: {
              type: 'odata',
              transport: {
                  read: "http://demos.telerik.com/kendo-ui/service/Northwind.svc/Products"
              },
              allPages: true,
              serverPaging: true,
              serverSorting: true,
              serverFiltering: true
          },
          toolbar: kendo.template($('#toolbar-template').html()),
          height: 400,
          pageable: false,
          columns: [
              { field: 'ProductID', title: 'Product ID', width: 100 },
              { field: 'ProductName', title: 'Product Name' },
              { field: 'UnitPrice', title: 'Unit Price', width: 100 },
              { field: 'QuantityPerUnit', title: 'Quantity Per Unit' }
          ]
      });

      $('#printGrid').click(function () {
          printGrid();
      });

  });
    </script>
  </body>
</html>
