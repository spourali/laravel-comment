(function ($) {
    "use strict";

    let App = function () {
        let o = this; // Create reference to this instance
        $(document).ready(function () {
            o.initialize();
        }); // Initialize app when document is ready

    };
    let p = App.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function () {

        this._initAjax();
        this._initValidation();

        // Init components
        this._initCommentForm();

        // Init events
        this._getComments();


    };
    // =========================================================================
    // INIT
    // =========================================================================

    p._initAjax = function () {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

    };



    // =========================================================================
    // VALIDATION
    // =========================================================================

    p._initValidation = function () {
        if (!$.isFunction($.fn.validate)) {
            return;
        }
        $.validator.setDefaults({
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                }
                else if (element.parent('label').length) {
                    error.insertAfter(element.parent());
                }
                else {
                    error.insertAfter(element);
                }
            }
        });

        $('.form-validate').each(function () {
            var validator = $(this).validate();
            $(this).data('validator', validator);

        });



    };

    // =========================================================================
    // Get Comments From DB (or source)
    // =========================================================================

    // events
    p._getComments = function () {
        let o = this;
        $('form.addCommentForm').each(function (i, el) {
            $(el).on('submit', function (e) {

                e.preventDefault();

                var dataForm = $(el).serialize();
                // console.log(dataForm);

                $.ajax({
                    url: $(el).attr('action'),
                    dataType: "json",
                    type: "POST",
                    data :dataForm,
                    success: function (res, tex) {

                        $('#comment-container').html(res[0]);

                        o._initCommentForm();

                    }
                });


                return false;

            })

        });




    };


    // =========================================================================
    // INK EFFECT
    // =========================================================================

    p._initCommentForm = function () {
        var o = this;

        $('#commentModal').modal('hide');
        $('.reply, .btn-add-comment').each(function (i,el) {

            $(el).on('click', function () {

                let parent_id = $(this).data('parent');


                $('form.addCommentForm').each(function (i, el) {

                    $(el).find('#owner_name').val('')
                    $(el).find('#body').val('')
                    $(el).find('#parent_id').val(parent_id)


                    var validator = $(el).validate();
                    validator.resetForm()
                    $(el).find('.form-group').each(function (i, item) {

                        $(item).removeClass('has-error');
                    })


                })

            })
        })



    };


    // =========================================================================
    // DEFINE NAMESPACE
    // =========================================================================

    window.commentTask = window.commentTask || {};
    window.commentTask.App = new App;
}(jQuery)); // pass in (jQuery):
