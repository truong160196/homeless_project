var table_auction = "#donate_table";
var datatable_auction;
var run_waitMe = window.run_waitMe;

$(function() {
    'use strict';

    $(document).ready(function() {
        $(table_auction).ready(function() {
            loadTableUnit();
        });

        $('#start_date').daterangepicker({
            timePicker: false,
            singleDatePicker: true,
            timePicker24Hour: false,
            timePickerIncrement: 1,
            autoUpdateInput: true,
            locale: {
                format: 'YYYY/MM/DD',
                cancelLabel: 'Clear'
            }
        });
        $('#end_date').daterangepicker({
            timePicker: false,
            singleDatePicker: true,
            timePicker24Hour: false,
            timePickerIncrement: 1,
            autoUpdateInput: true,
            locale: {
                format: 'YYYY/MM/DD',
                cancelLabel: 'Clear'
            }
        });
    })

    var loadTableUnit = function() {
        // run_waitMe('.main-panel');
        if ($.fn.DataTable.isDataTable(table_auction)) {
            $(table_auction).DataTable().destroy();
            $('.table-unit tbody').empty();
        }
        var urlRequest =  '/api/admin/auction';


        datatable_auction = $(table_auction).DataTable({
            autoWidth: false,
            "processing": true,
            "serverSide": true,
            "ajax": urlRequest,
            "bInfo": false,
            "pagingType": "full_numbers",
            "language": {
                searchPlaceholder: 'Search...',
                sSearch: ''
            },
            "sLengthSelect": "select2",
            "responsive": true,
            "order": [
                [2, 'desc']
            ],
            "columns": [
                {
                    "data": "donate_title",
                    "width": "30%"
                },
                {
                    "data": "donate_goal",
                    "width": "10%"
                },
                {
                    "data": "donate_start_time",
                    "width": "20%"
                },
                {
                    "data": "donate_end_time",
                    "width": "20%"
                },
                {
                    "data": "category",
                    "width": "20%"
                },
                {
                    "data": "actions",
                    "searchable": false,
                    "orderable": false
                },
            ],
            columnDefs: [
                { "width": "15%", "targets": [2, 3, 4] },
                { "width": "35%", "class": "text-left",  "targets": [0] },
                { "width": "10%", "targets": [1, 5] }
            ],
            "initComplete": function(settings, json) {
                run_waitMe('.main-panel', true);
            },
            "fnCreatedRow": function(nRow, aData, iDataIndex) {
                $(nRow).attr('data-id', aData.id);
            }
        }).on('processing.dt', function(e, settings, processing) {
            if (processing) {
                run_waitMe('.main-panel');
            } else {
                run_waitMe('.main-panel', true);
            }
        });

        if ($('.dataTables_length select').length > 0) {
            $('.dataTables_length select').select2({
                minimumResultsForSearch: -1
            });
        }
    }

    $(document).on('click', '#edit', function(e) {
        e.preventDefault();
        const buttonEdit = document.getElementById('edit');
        const buttonSave = document.getElementById('save');

        if (buttonEdit && buttonSave) {
            buttonEdit.style.display = 'none';
            buttonSave.style.display = 'block';
        }

        $('#summernote').summernote({
            height: 200,
            tabsize: 2,
            followingToolbar: true,
            focus: false,
        });
    });

    $(document).on('click', '#save', function(e) {
        e.preventDefault();
        var aHTML = $('#summernote').summernote('code');
        document.getElementById('summernote').innerHTML = aHTML;

        $('#summernote').summernote('destroy');


        const buttonEdit = document.getElementById('edit');
        const buttonSave = document.getElementById('save');

        if (buttonEdit && buttonSave) {
            buttonEdit.style.display = 'block';
            buttonSave.style.display = 'none';
        }
    });



    $(document).on('click', '#insert_image', function(e) {
        e.preventDefault();
        document.getElementById('donate_image').click();
    });

    $(document).on('click', '#btn_create_donate', function(e) {
        e.preventDefault();
        $('#form_create_donate').submit();
    });


    $("#form_create_donate").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            createDonateSubmitFrom();
        }
    });

    var createDonateSubmitFrom = function () {
        run_waitMe('.main-panel');
        var url = base_ajax + '/admin/auction/create';
        const formElem = document.getElementById('form_create_donate');
        var dataForm = new FormData(formElem);

        var aHTML = $('#summernote').summernote('code');

        var accountWallet = blockchain.createAddress();

        dataForm.append('address', accountWallet.address);
        dataForm.append('privateKey', accountWallet.privateKey);
        dataForm.append('publicKey', accountWallet.publicKey);
        dataForm.append('donate_detail', aHTML);
        // dataForm.append('file', files);

        $.ajax({
            url: url,
            type: "POST",
            data: dataForm,
            cache       : false,
            contentType : false,
            processData : false,
            success: function(response) {
                if (response.code === 200) {
                    Swal.fire({
                        type: 'success',
                        title: response.msg
                    });
                    window.location.href = base_url + '/admin/auction';
                } else {
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops',
                        text: response.msg
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: 'There was an error during processing'
                });
            }
        });
        run_waitMe('.main-panel', true);
    }

    //update
    $(document).on('click', '#btn_update_donate', function(e) {
        e.preventDefault();
        $('#form_update_donate').submit();
    });


    $("#form_update_donate").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            updateDonateSubmitFrom();
        }
    });

    var updateDonateSubmitFrom = function () {
        run_waitMe('.main-panel');
        var url = base_ajax + '/admin/auction/update';
        const formElem = document.getElementById('form_update_donate');
        var dataForm = new FormData(formElem);

        var aHTML = $('#summernote').summernote('code');

        var accountWallet = blockchain.createAddress();

        dataForm.append('address', accountWallet.address);
        dataForm.append('privateKey', accountWallet.privateKey);
        dataForm.append('publicKey', accountWallet.publicKey);
        dataForm.append('donate_detail', aHTML);
        // dataForm.append('file', files);

        $.ajax({
            url: url,
            type: "POST",
            data: dataForm,
            cache       : false,
            contentType : false,
            processData : false,
            success: function(response) {
                if (response.code === 200) {
                    Swal.fire({
                        type: 'success',
                        title: response.msg
                    });
                    window.location.href = base_url + '/admin/auction';
                } else {
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops',
                        text: response.msg
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: 'There was an error during processing'
                });
            }
        });
        run_waitMe('.main-panel', true);
    }
});