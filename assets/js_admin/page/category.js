var table_category = "#category_table";
var datatable_category;
var run_waitMe = window.run_waitMe;

$(function() {
    'use strict';

    $(document).ready(function() {
        loadListCategory();
    });

    var loadListCategory = () => {
        var url = base_ajax + '/admin/category';
        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                document.getElementById('category-list').innerHTML = response;
                $(document).on('click','.btn-remove-cate', function(e) {
                    var id = e.currentTarget.dataset.id;
                    var url = base_ajax+'/admin/category/delete/'+id;
                    deleteCategory(url,id);
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
        $('#category_name').val('');
        $('#category_detail').val('');
    };


    $(document).on('click', '#btn_create_category', function(e) {
        openModalCreateUser();
        e.preventDefault();
    });

    var openModalCreateUser = function () {
        clearFormCreate();
        $('#modal_category_create').modal('show');

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


    $(document).on('click', '#btn_submit_category', function(e) {
        e.preventDefault();
        $('#form_create_category').submit();
    });

    $("#form_create_category").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            createCategorySubmitFrom();
        }
    });

    var createCategorySubmitFrom = function () {
        run_waitMe('.limiter');
        var url = base_ajax + '/admin/category/create';
        var dataForm = $("#form_create_category").serialize();

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

                    $('#modal_category_create').modal('hide');
                    loadListCategory();
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

    function deleteCategory(url,id) {
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
                    loadListCategory();
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
        var id = e.currentTarget.dataset.id;
        var url = base_ajax + '/admin/category/detail/'+id;
        openModalEditCategory(id, url);
    });

    var openModalEditCategory = function (id, url) {
        // clearFormCreate();
        $.ajax({
            type: "GET",
            url: url,
            data: {id: id},
            success: function(response) {
                if (response.data) {
                    var category = response.data;
                    $("#id_edit").val(category.id);
                    $("#category_name_edit").val(category.category_name);
                    $("#category_detail_edit").val(category.category_detail ? category.category_detail : "");
                    $("#category_name_edit").parent().addClass("is-filled");
                    $("#category_detail_edit").parent().addClass("is-filled");
                    $('#modal_category_edit').modal('show');
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
    
    $(document).on('click',"#btn_update_category", function(e) {
        e.preventDefault();
        $('#form_edit_category').submit();
    });

    $("#form_edit_category").on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        form.parsley().validate();
        if (form.parsley().isValid()) {
            updateCategorySubmitFrom();
        }
    });

    var updateCategorySubmitFrom = function () {
        run_waitMe('.limiter');
        var id = $("#id_edit").val();
        var url = base_ajax + '/admin/category/update';
        var dataForm = $("#form_edit_category").serialize();

        $.ajax({
            url: url,
            type: "POST",
            data: dataForm,
            success: function(response) {
                if (response.code === 200) {
                    $('#modal_category_edit').modal('hide');
                    clearFormCreate();
                    
                    Swal.fire({
                        type: 'success',
                        title: response.msg
                    });
                    loadListCategory();                    
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