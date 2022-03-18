$(function() {


  $.extend( $.fn.dataTable.defaults, {
       autoWidth: false,
       columnDefs: [{
           orderable: false,
           width: '100px',
           targets: [ 3 ]
       }],
       dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
       language: {
           search: '<span>Filter:</span> _INPUT_',
           lengthMenu: '<span>Show:</span> _MENU_',
           paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
       },
       drawCallback: function () {
           $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
       },
       preDrawCallback: function() {
           $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
       }
   });

$('.datatable-basic').DataTable();
// Highlighting rows and columns on mouseover
    var lastIdx = null;
    var table = $('.datatable-highlight').DataTable();

    $('.datatable-highlight tbody').on('mouseover', 'td', function() {
        var colIdx = table.cell(this).index().column;

        if (colIdx !== lastIdx) {
            $(table.cells().nodes()).removeClass('active');
            $(table.column(colIdx).nodes()).addClass('active');
        }
    }).on('mouseleave', function() {
        $(table.cells().nodes()).removeClass('active');
    });


 $('a.preload').on('click', function() {
        $.blockUI({
            message: '<i class="icon-spinner4 spinner"></i>',
            timeout: 5000, //unblock after 5 seconds
            overlayCSS: {
                backgroundColor: '#1b2024',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                color: '#fff',
                padding: 0,
                backgroundColor: 'transparent'
            }
        });
    });
 $('button.preload').on('click', function() {
        $.blockUI({
            message: '<i class="icon-spinner4 spinner"></i>',
            timeout: 5000, //unblock after 5 seconds
            overlayCSS: {
                backgroundColor: '#1b2024',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                color: '#fff',
                padding: 0,
                backgroundColor: 'transparent'
            }
        });
    });

  $('button.boxmessage').on('click', function() {
        var block = $(this).parent();
        $(block).block({
            message: '<span class="text-semibold">Please wait...</span>',
            timeout: 5000, //unblock after 2 seconds
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'transparent'
            }
        });
    });
 // $('.daterange-single').daterangepicker({
 //        singleDatePicker: true,
 //         locale: {
 //            format: 'YYYY-MM-DD'
 //        }
 //    });


/////// calenda
 // Add events
    // ------------------------------

    // Default events
    var events = [

        {
            title: 'Long Event',
            start: '2014-11-07',
            end: '2014-11-10'
        },
        {
            id: 999,
            title: 'Repeating Event',
            start: '2014-11-09T16:00:00'
        },
        {
            id: 999,
            title: 'Repeating Event',
            start: '2014-11-16T16:00:00'
        },
        {
            title: 'Conference',
            start: '2014-11-11',
            end: '2014-11-13'
        },
        {
            title: 'Meeting',
            start: '2014-11-12T10:30:00',
            end: '2014-11-12T12:30:00'
        },
        {
            title: 'Lunch',
            start: '2014-11-12T12:00:00'
        },
        {
            title: 'Meeting',
            start: '2014-11-12T14:30:00'
        },
        {
            title: 'Happy Hour',
            start: '2014-11-12T17:30:00'
        },
        {
            title: 'Dinner',
            start: '2014-11-12T20:00:00'
        },
        {
            title: 'Birthday Party',
            start: '2014-11-13T07:00:00'
        },
        {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2014-11-28'
        }
    ];



    // Date formats
    // ------------------------------

    $('.fullcalendar-formats').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        titleFormat: {
            month: 'LL', // September 2009
            week: "MMM Do YY", // Sep 13 2009
            day: 'dddd'  // September 8
        },
        columnFormat: {
            month: 'dddd', // January
            week: 'ddd D', // Mon 7
            day: 'dddd' // Monday
        },
        timeFormat: 'h(:mm) a', // uppercase H for 24-hour clock
        defaultDate: '2014-11-12',
        editable: true,
        events: events
    });



    // Internationalization
    // ------------------------------

    // Set default language
    var currentLangCode = 'en';


    // Build the language selector's options
    $.each($.fullCalendar.langs, function(langCode) {
        $('#lang-selector').append(
            $('<option/>')
            .attr('value', langCode)
            .prop('selected', langCode == currentLangCode)
            .text(langCode)
        );
    });


    // Re-render the calendar when the selected option changes
    $('#lang-selector').on('change', function() {
        if (this.value) {
            currentLangCode = this.value;
            $('.fullcalendar-languages').fullCalendar('destroy');
            renderCalendar();
        }
    });


    // Render calendar
    renderCalendar();
    function renderCalendar() {
        $('.fullcalendar-languages').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2016-2-18',
            lang: currentLangCode,
            buttonIcons: false, // show the prev/next text
            weekNumbers: true,
            editable: true,
            events: [
                {
                    title: 'จ่ายเเช็ค 700,000 บาท',
                    start: '2016-2-19'
                },
                {
                    title: 'รับเเช็ค 900,000 บาท',
                    url:   'http://localhost:8888/mekabase3/index.php/office/newpr',
                    start: '2016-2-19'
                },
                {
                    title: 'จ่ายเเช็ค 700,000 บาท',
                    start: '2016-2-25'
                },
                {
                    title: 'รับเเช็ค 900,000 บาท',
                    start: '2016-2-25'
                },
                {
                    title: 'จ่ายเเช็ค 700,000 บาท',
                    start: '2016-3-19'
                },
                {
                    title: 'จ่ายเงินเดือน 200,000 บาท',
                    start: '2016-2-29'
                },

                {
                    title: 'รับเเช็ค 900,000 บาท',
                    start: '2016-3-3'
                },
                {
                    title: 'จ่ายเเช็ค 700,000 บาท',
                    start: '2016-3-3'
                },
                {
                    title: 'รับเเช็ค 900,000 บาท',
                    start: '2016-3-4'
                },
            ]
        });
    }

$('.select-search').select2();
$('.select-border-color').select2({
        dropdownCssClass: 'border-primary',
        containerCssClass: 'border-primary text-primary-700'
    });
    $('.select-menu2-color').select2({
           containerCssClass: 'bg-teal-400',
           dropdownCssClass: 'bg-teal-400'
       });

    // We're using Select2 for language select
    $('.select').select2({
        width: 100,
        minimumResultsForSearch: Infinity,
        containerCssClass: 'bg-slate-700',
        dropdownCssClass: 'bg-slate-700'
    });

    // jQuery UI date picker
$('.datepicker').datepicker();


//
// Date range picker
//

// Initialize with options
$('#reportrange').daterangepicker(
    {
        startDate: moment().subtract('days', 29),
        endDate: moment(),
        minDate: '01/01/2015',
        maxDate: '12/31/2016',
        dateLimit: { days: 60 },
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
            'Last 7 Days': [moment().subtract('days', 6), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn'],
        applyClass: 'btn-small btn-info btn-block',
        cancelClass: 'btn-small btn-default btn-block',
        locale: {
            applyLabel: 'Submit',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom Range',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
        }
    },
    function(start, end) {
        $('#reportrange .daterange-custom-display').html(start.format('<i>D</i> <b><i>MMM</i> <i>YYYY</i></b>') + '<em> &#8211; </em>' + end.format('<i>D</i> <b><i>MMM</i> <i>YYYY</i></b>'));
    }
);

// Custom date display layout
$('#reportrange .daterange-custom-display').html(moment().subtract('days', 29).format('<i>D</i> <b><i>MMM</i> <i>YYYY</i></b>') + '<em> &#8211; </em>' + moment().format('<i>D</i> <b><i>MMM</i> <i>YYYY</i></b>'));

// Switchery
    // ------------------------------

    // Initialize multiple switches
    if (Array.prototype.forEach) {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html);
        });
    }
    else {
        var elems = document.querySelectorAll('.switchery');
        for (var i = 0; i < elems.length; i++) {
            var switchery = new Switchery(elems[i]);
        }
    }

    // Colored switches
    var primary = document.querySelector('.switchery-primary');
    var switchery = new Switchery(primary, { color: '#2196F3' });

    var danger = document.querySelector('.switchery-danger');
    var switchery = new Switchery(danger, { color: '#EF5350' });

    var warning = document.querySelector('.switchery-warning');
    var switchery = new Switchery(warning, { color: '#FF7043' });

    var info = document.querySelector('.switchery-info');
    var switchery = new Switchery(info, { color: '#00BCD4'});



    // Checkboxes/radios (Uniform)
    // ------------------------------

    // Default initialization
    $(".styled, .multiselect-container input").uniform({
        radioClass: 'choice'
    });

    // File input
    $(".file-styled").uniform({
        wrapperClass: 'bg-blue',
        fileButtonHtml: '<i class="icon-file-plus"></i>'
    });


    //
    // Contextual colors
    //

    // Primary
    $(".control-primary").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-primary-600 text-primary-800'
    });

    // Danger
    $(".control-danger").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-danger-600 text-danger-800'
    });

    // Success
    $(".control-success").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-success-600 text-success-800'
    });

    // Warning
    $(".control-warning").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-warning-600 text-warning-800'
    });

    // Info
    $(".control-info").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-info-600 text-info-800'
    });

    // Custom color
    $(".control-custom").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-indigo-600 text-indigo-800'
    });



    // Bootstrap switch
    // ------------------------------

    $(".switch").bootstrapSwitch();
});
