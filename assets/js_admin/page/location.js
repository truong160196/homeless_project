var table_location = "#location_table";
var datatable_location;
var run_waitMe = window.run_waitMe;

$(function() {
    'use strict';

    $(document).ready(function() {
        loadListLocation();
    });

    var loadListLocation = () => {
        var url = base_ajax + '/admin/location';
        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                document.getElementById('location-list').innerHTML = response;
                $(document).on('click','.btn-delete-location', function(e) {
                    var id = e.currentTarget.dataset.id;
                    var url = base_ajax+'/admin/location/delete/'+id;
                    deleteActivity(url,id);
                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: 'There was an error during processing'
                });
            }
        });
    }

    var clearFormCreate = function () {
        $('#location_name').val('');
    };


    $(document).on('click', '#btn_create_location', function(e) {
        openModalCreateUser();
        e.preventDefault();
    });

    var openModalCreateUser = function () {
        clearFormCreate();
        $('#modal_location_create').modal('show');

        $('#birthday').daterangepicker({
            timePicker: false,
            singleDatePicker: true,
            timePicker24Hour: false,
            timePickerIncrement: 1,
            autoUpdateInput: true,
            locale: {
                format: 'DD/MM/YYYY',
                cancelLabel: 'Clear'
            }
        });
    };


    $(document).on('click', '#btn_submit_location', function(e) {
        e.preventDefault();
        $('#form_create_location').submit();
    });


    $("#form_create_location").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            createActivitySubmitFrom();
        }
    });

    var createActivitySubmitFrom = function () {
        run_waitMe('.limiter');
        var url = base_ajax + '/admin/location/create';
        var dataForm = $("#form_create_location").serialize();

        $.ajax({
            url: url,
            type: "POST",
            data: dataForm,
            success: function(response) {
                if (response.code === 200) {
                    Swal.fire({
                        type: 'success',
                        title: response.msg
                    });

                    clearFormCreate();

                    $('#modal_location_create').modal('hide');
                    loadListLocation();
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
        run_waitMe('.limiter', true);
    };

    function deleteActivity(url,id) {
       $.ajax({
            type:"delete",
            url: url,
            data: {'id':id},
            success: function(response) {
                if (response.code === 200) {
                    Swal.fire({
                        type: 'success',
                        title: response.msg
                    });
                    loadListLocation();
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
    };
    $(document).on('click','.btn-edit-cate', function(e) {
        openModalEditCategory();
        e.preventDefault();
    });

    var openModalEditCategory = function () {
        clearFormCreate();
        $('#modal_category_edit').modal('show');

        $('#birthday').daterangepicker({
            timePicker: false,
            singleDatePicker: true,
            timePicker24Hour: false,
            timePickerIncrement: 1,
            autoUpdateInput: true,
            locale: {
                format: 'DD/MM/YYYY',
                cancelLabel: 'Clear'
            }
        });
    };
});