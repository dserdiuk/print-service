$(document).ready(function () {
    $('body').on('click', '.printer-block', function (e) {
        if ($(e.target).hasClass('settings-image')) {
            return;
        }
        $(this).toggleClass('active');
    });
    $('.settings-image').on('click', function () {
        $('#printer-modal').modal();
    });
    $('.add-image').on('click', function () {
        $('#add-printer-modal').modal();
    });

    $('.add-printer-action').on('click', function  () {
        var name = $(this).closest('.modal').find('.printer-name').val(),
            $printer = $('.printers .example').clone();
        $printer.show();
        $printer.find('span').text(name);
        $('.printers .row').append($printer);
    });

    $('.to-order').on('click', function (e) {
        e.preventDefault();
        var $form = $(this).closest('form'),
            pages = $form.find('#pages').val().split('-'),
            pagesCount = parseInt(pages[1]) - parseInt(pages[0]),
            $table = $('.order-table'),
            $tr = $table.find('.example').clone();
        $tr.find('.td-task-num').text($table.find('tr').length - 1);
        $tr.find('.td-pages').text(pagesCount);
        $tr.find('.td-pages-remain').text(pagesCount);
        $tr.removeClass('example');
        $tr.css('display', '');
        $table.find('tbody').prepend($tr);
    });

    $( "table tbody" ).sortable();

    $('.order-table').on('click', '.pause', function () {
        console.log('xxx');
        $(this).toggleClass('active');
    });

    $('.order-table').on('click', '.delete', function () {
        $(this).closest('tr').remove();
    });


    $('.refresh-image').on('click', function () {
        $('.printers').hide(1000);
        setTimeout(function () {
            $('.printers').show(1000);
        }, 2500);
    });

    Dropzone.options.uploadWidget = {
        dictDefaultMessage: 'Drag an image here to upload, or click to select one',
        init: function() {
            this.on('success', function( file, response){
                setTimeout(function() {
                    $('.dropzone').hide();
                    $('.pages').html(response).show();
                }, 800);
            });
        }
    };
});
