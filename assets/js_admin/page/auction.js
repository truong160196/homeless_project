var table_auction = "#auction_table";
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
                    "data": "auction_title",
                },
                {
                    "data": "auction_raised",
                },
                {
                    "data": "auction_start_time",
                },
                {
                    "data": "auction_end_time",
                },
                {
                    "data": "product_title",
                },
                {
                    "data": "is_delete",
                    "render": function ( data, type, row, meta ) {
                        if (data == '0') {
                            return '<span class="badge badge-success"> Open </span>'
                        }

                        if (data == '1') {
                            return '<span class="badge badge-danger"> Close </span>'
                        }

                        return '';
                    }
                },
                {
                    "data": "actions",
                    "searchable": false,
                    "orderable": false
                },
            ],
            columnDefs: [
                { "width": "10%", "targets": [1,5, 6] },
                { "width": "15%", "targets": [2, 3] },
                { "width": "20%", "targets": [0, 4] },
                {"class": "text-left", "targets": [0, 4]}
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

    $(document).on('click', '#edit_auction', function(e) {
        e.preventDefault();
        const buttonEdit = document.getElementById('edit_auction');
        const buttonSave = document.getElementById('save_auction');

        if (buttonEdit && buttonSave) {
            buttonEdit.style.display = 'none';
            buttonSave.style.display = 'block';
        }

        $('#auction_description').summernote({
            height: 200,
            tabsize: 2,
            followingToolbar: true,
            focus: false,
        });
    });

    $(document).on('click', '#save_auction', function(e) {
        e.preventDefault();
        var aHTML = $('#auction_description').summernote('code');
        document.getElementById('auction_description').innerHTML = aHTML;

        $('#auction_description').summernote('destroy');


        const buttonEdit = document.getElementById('edit_auction');
        const buttonSave = document.getElementById('save_auction');

        if (buttonEdit && buttonSave) {
            buttonEdit.style.display = 'block';
            buttonSave.style.display = 'none';
        }
    });

    // product editor
    $(document).on('click', '#edit_product', function(e) {
        e.preventDefault();
        var buttonEditProduct = document.getElementById('edit_product');
        var buttonSaveProduct = document.getElementById('save_product');

        if (buttonEditProduct && buttonSaveProduct) {
            buttonEditProduct.style.display = 'none';
            buttonSaveProduct.style.display = 'block';
        }

        $('#product_detail').summernote({
            height: 200,
            tabsize: 2,
            followingToolbar: true,
            focus: false,
        });
    });

    $(document).on('click', '#save_product', function(e) {
        e.preventDefault();
        var aHTML = $('#product_detail').summernote('code');
        document.getElementById('product_detail').innerHTML = aHTML;

        $('#product_detail').summernote('destroy');


        var buttonEditProduct = document.getElementById('edit_product');
        var buttonSaveProduct = document.getElementById('save_product');

        if (buttonEditProduct && buttonSaveProduct) {
            buttonEditProduct.style.display = 'block';
            buttonSaveProduct.style.display = 'none';
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
            createAuctionSubmitFrom();
        }
    });

    var createAuctionSubmitFrom = function () {
        run_waitMe('.main-panel');
        var url = base_ajax + '/admin/auction/create';
        const formElem = document.getElementById('form_create_donate');
        var dataForm = new FormData(formElem);

        var auctionDescription = $('#auction_description').summernote('code');
        var productDetail = $('#product_detail').summernote('code');

        var accountWallet = blockchain.createAddress();

        dataForm.append('address', accountWallet.address);
        dataForm.append('privateKey', accountWallet.privateKey);
        dataForm.append('publicKey', accountWallet.publicKey);
        dataForm.append('auction_content', auctionDescription);
        dataForm.append('product_detail', productDetail);
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
    $(document).on('click', '#btn_update_auction', function(e) {
        e.preventDefault();
        $('#form_update_acution').submit();
    });


    $("#form_update_acution").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            updateAuctionSubmitFrom();
        }
    });

    var updateAuctionSubmitFrom = function () {
        run_waitMe('.main-panel');
        var url = base_ajax + '/admin/auction/update';
        const formElem = document.getElementById('form_update_acution');
        var dataForm = new FormData(formElem);

        var auctionDescription = $('#auction_description').summernote('code');
        var productDetail = $('#product_detail').summernote('code');

        dataForm.append('auction_content', auctionDescription);
        dataForm.append('product_detail', productDetail);

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
                run_waitMe('.main-panel', true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: 'There was an error during processing'
                });
                run_waitMe('.main-panel', true);
            }
        });
    }
});