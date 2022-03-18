

<div class="content-wrapper">
    <div class="content">
        <!-- Pre-populating new rows -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title"> BILL OF QUATITY</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div class="form-group">
                    <button type="button" class="btn btn-default">Back</button>
                    <button type="button" class="btn btn-info" id="load">Import</button>
                    <button type="button" class="btn btn-success" id="save">Save</button>
                    <button type="button" class="btn btn-default">Close</button>
                </div>
                <pre id="example1console" class="console">Click "Load" to load data from server</pre>
                <div class="hot-container_custom has-scroll">
                    <div id="hot_populate"></div>
                </div>
            </div>
        </div>
        <!-- /pre-populating new rows -->

    </div>
</div>

<script>
    
    // Pre-populating new rows
    // ------------------------------

    // Add data
    var hot_populate_data = [
        {job:"ค่าอำนวยการและเตรียมการ",costcode:"11010201",material:"MB020200100100027",unit:"เส้น",qty:100,matprice:1500,matamt:150000,laberp:0,laberamt:0,subprice:1500,subamt:150000,total:324342},
        {job:"งานโครงสร้าง (STR)",costcode:"11010201",material:"MB020200200100027",unit:"เส้น",qty:100,matprice:1500,matamt:150000,laberp:0,laberamt:0,subprice:1500,subamt:150000,total:324342},
        {job:"งานระบบ (M&E)",costcode:"22060401",material:"MB180900101000031",unit:"ตร.ม",qty:100,matprice:1000,matamt:100000,laberp:0,laberamt:0,subprice:1000,subamt:100000,total:324342}
    ]; // Cells template
    var tpl = ['one', 'two', 'three', 'four', 'five'];

    // Render empty row
    function isEmptyRow(instance, row) {
        var rowData = instance.getData()[row];

        for (var i = 0, ilen = rowData.length; i < ilen; i++) {
            if (rowData[i] !== null) {
                return false;
            }
        }

        return true;
    }

    // Render default values
    function defaultValueRenderer(instance, td, row, col, prop, value, cellProperties) {
        var args = arguments;

        if (args[20] === null && isEmptyRow(instance, row)) {
            args[20] = tpl[col];
            td.style.color = '#ccc';
        }
        else {
            td.style.color = '';
        }
        Handsontable.renderers.TextRenderer.apply(this, args);
    }

    // Define element
    var hot_populate = document.getElementById('hot_populate')

    // Initialize with options
    var hot_populate_init = new Handsontable(hot_populate, {
        data: hot_populate_data,
        // startRows: 8,
        startCols: 11,
        minSpareRows: 20,
        colWidths: [200, 150, 300, 150, 100, 100, 200, 200, 200, 200, 200, 200],
        rowHeaders: true,
        colHeaders: ['Job', 'Cost Code', 'Material', 'Unit', 'QTY','MAT. Price','MAT. Amount','LAB. Price','LAB. Amount','SUB. Price','SUB. Amount','Total'],
        fixedColumnsLeft: 5,
        contextMenu: ['row_above', 'row_below', '---------', 'freeze_column'],
        manualColumnFreeze: true,
        
        columns: [
            {
                data: 'job', // 1nd column is simple text, no special options here
                type: 'autocomplete',
                source: function (query, process) {
                    $.ajax({
                    //url: 'php/cars.php', // commented out because our website is hosted as a set of static pages
                    url: '<?php echo base_url();?>datastore/jsonsystem',
                    dataType: 'json',
                    data: {
                        query: query
                    },
                        success: function (response) {
                            console.log("response", response);
                            //process(JSON.parse(response.data)); // JSON.parse takes string as a argument
                            process(response.data);

                        }
                    });
                },
                strict: true
            },
            {
                data: 'costcode',
                type: 'autocomplete',
                source: function (query, process) {
                    $.ajax({
                    //url: 'php/cars.php', // commented out because our website is hosted as a set of static pages
                    url: '<?php echo base_url();?>datastore/jsoncostcode',
                    dataType: 'json',
                    data: {
                        query: query
                    },
                        success: function (response) {
                            console.log("response", response);
                            //process(JSON.parse(response.data)); // JSON.parse takes string as a argument
                            process(response.data);

                        }
                    });
                },
                strict: true
            },
            {
                data: 'material',
                type: 'autocomplete',
                source: function (query, process) {
                    $.ajax({
                    //url: 'php/cars.php', // commented out because our website is hosted as a set of static pages
                    url: '<?php echo base_url();?>datastore/matjson',
                    dataType: 'json',
                    data: {
                        query: query
                    },
                        success: function (response) {
                            console.log("response", response);
                            //process(JSON.parse(response.data)); // JSON.parse takes string as a argument
                            process(response.data);

                        }
                    });
                },
                strict: true
            },
            {
                data: 'unit',
                type: 'autocomplete',
                source: function (query, process) {
                    $.ajax({
                    //url: 'php/cars.php', // commented out because our website is hosted as a set of static pages
                    url: '<?php echo base_url();?>datastore/unitjson',
                    dataType: 'json',
                    data: {
                        query: query
                    },
                        success: function (response) {
                            console.log("response", response);
                            //process(JSON.parse(response.data)); // JSON.parse takes string as a argument
                            process(response.data);

                        }
                    });
                },
                strict: true
            },
            {
                data: 'qty',
                type: 'numeric',
                format: '0,0.00 ',
                language: 'th-TH' // i18n: use this for EUR (German)
            },
            {
                data: 'matprice',
                type: 'numeric',
                format: '0,0.00 ',
                language: 'th-TH' // i18n: use this for EUR (German)
            },
            {
                data: 'matamt',
                type: 'numeric',
                format: '0,0.00 ',
                language: 'th-TH' // i18n: use this for EUR (German)
            },
            {
                data: 'laberp',
                type: 'numeric',
                format: '0,0.00 ',
                language: 'th-TH' // i18n: use this for EUR (German)
            },
            {
                data: 'laberamt',
                type: 'numeric',
                format: '0,0.00 ',
                language: 'th-TH' // i18n: use this for EUR (German)
            },
            {
                data: 'subprice',
                type: 'numeric',
                format: '0,0.00 ',
                language: 'th-TH' // i18n: use this for EUR (German)
            },
            {
                data: 'subamt',
                type: 'numeric',
                format: '0,0.00',
                language: 'th-TH' // i18n: use this for EUR (German)
            },
            {
                data: 'total',
                type: 'numeric',
                format: '0,0.00',
                language: 'th-TH' // i18n: use this for EUR (German)
            }
        ],
        // cells: function (row, col, prop) {
        //     var cellProperties = {};

        //     cellProperties.renderer = defaultValueRenderer;

        //     return cellProperties;
        // },
        beforeChange: function (changes) {
            var instance = hot_populate_init,
            ilen = changes.length,
            clen = instance.colCount,
            rowColumnSeen = {},
            rowsToFill = {},
            i,
            c;

            for (i = 0; i < ilen; i++) {

                // If oldVal is empty
                if (changes[i][2] === null && changes[i][3] !== null) {
                    if (isEmptyRow(instance, changes[i][0])) {

                        // Add this row/col combination to cache so it will not be overwritten by template
                        rowColumnSeen[changes[i][0] + '/' + changes[i][1]] = true;
                        rowsToFill[changes[i][0]] = true;
                    }
                }
            }

            for (var r in rowsToFill) {
                if (rowsToFill.hasOwnProperty(r)) {
                    for (c = 0; c < clen; c++) {

                        // If it is not provided by user in this change set, take value from template
                        if (!rowColumnSeen[r + '/' + c]) {
                            changes.push([r, c, null, tpl[c]]);
                        }
                    }
                }
            }
        }
    });
    var $container = $("#hot_populate");
var $console = $("#example1console");
// var $parent = $container.parent();
// var autosaveNotification;

var handsontable = $container.data('handsontable');
    $("#save").click(function () {
        $.ajax({
            url: "<?php echo base_url();?>bd/savejson",
            data: {"data": handsontable.getData()}, //returns all cells' data
            dataType: 'json',
            type: 'POST',
            success: function (res) {
            if (res.result === 'ok') {
                $console.text('Data saved');
            }
            else {
                $console.text('Save error');
            }
            },
            error: function () {
            $console.text('Save error. POST method is not allowed on GitHub Pages. Run this example on your own server to see the success message.');
            }
        });
    });
</script>