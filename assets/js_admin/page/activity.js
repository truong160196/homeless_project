var table_activity = "#activity_table";
var datatable_activity;
var run_waitMe = window.run_waitMe;

$(function() {
    'use strict';

    $(document).ready(function() {
        loadListActivity();
    });

    var loadListActivity = () => {
        var url = base_ajax + '/admin/activity';
        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                document.getElementById('activity-list').innerHTML = response;
                $(document).on('click','.btn-delete-activity', function(e) {
                    var id = e.currentTarget.dataset.id;
                    var url = base_ajax+'/admin/activity/delete/'+id;
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
        $('#activity_name').val('');
        $('#activity_detail').val('');
    };


    $(document).on('click', '#btn_create_activity', function(e) {
        openModalCreateUser();
        e.preventDefault();
    });

    var openModalCreateUser = function () {
        clearFormCreate();
        $('#modal_activity_create').modal('show');

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


    $(document).on('click', '#btn_submit_activity', function(e) {
        e.preventDefault();
        $('#form_create_activity').submit();
    });


    $("#form_create_activity").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            createActivitySubmitFrom();
        }
    });

    var createActivitySubmitFrom = function () {
        run_waitMe('.limiter');
        var url = base_ajax + '/admin/activity/create';
        var dataForm = $("#form_create_activity").serialize();

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

                    $('#modal_activity_create').modal('hide');
                    loadListActivity();
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
                    loadListActivity();
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
    $(document).on('click','.btn-edit-activity', function(e) {
        var id = e.currentTarget.dataset.id;
        var url = base_ajax + '/admin/activity/detail/'+id;
        openModalEditActivity(id, url);
    });

    var openModalEditActivity = function (id, url) {
        // clearFormCreate();
        $.ajax({
            type: "GET",
            url: url,
            data: {id: id},
            success: function(response) {
                if (response.data) {
                    var activity = response.data;
                    $("#id_edit_activity").val(activity.id);
                    $("#activity_name_edit").val(activity.activity_name);
                    $("#activity_detail_edit").val(activity.activity_detail ? activity.activity_detail : "");
                    $("#activity_name_edit").parent().addClass("is-filled");
                    $("#activity_detail_edit").parent().addClass("is-filled");
                    $('#modal_activity_edit').modal('show');
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
    
    $(document).on('click',"#btn_update_activity", function(e) {
        e.preventDefault();
        $('#form_edit_activity').submit();
    });

    $("#form_edit_activity").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            updateActivitySubmitFrom();
        }
    });

    var updateActivitySubmitFrom = function () {
        run_waitMe('.limiter');
        var id = $("#id_edit_activity").val();
        var url = base_ajax + '/admin/activity/update';
        var dataForm = $("#form_edit_activity").serialize();

        $.ajax({
            url: url,
            type: "POST",
            data: dataForm,
            success: function(response) {
                if (response.code === 200) {
                    $('#modal_activity_edit').modal('hide');
                    clearFormCreate();
                    
                    Swal.fire({
                        type: 'success',
                        title: response.msg
                    });
                    loadListActivity();                    
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
});