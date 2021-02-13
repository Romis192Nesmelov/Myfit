window.csvFile = null;
window.userInteract = false;
window.allMonths = ['Янв.', 'Фев.', 'Март', 'Апр.', 'Май', 'Июнь', 'Июль', 'Авг.', 'Сент.', 'Окт.', 'Нояб.', 'Декаб.'];
window.statisticsData = [];

$(document).click(function () {
    window.userInteract = true;
});

$(document).ready(function () {
    $('a.img-preview').fancybox({
        padding: 3
    });

    // Seen all link
    bindSeenAll();

    // Getting new messages
    // setInterval(function () {
    //     $.post('/admin/get-new-messages',{
    //         '_token': $('input[name=_token]').val()
    //     }, function (data) {
    //         if (data.success) {
    //             var countContainer = $('#message-counter');
    //
    //             if (!countContainer.length) {
    //                 $('#message-counter-container').append(
    //                     $('<span></span>').attr('id','message-counter').addClass('badge bg-warning-400')
    //                 );
    //                 newMessages(data.counter, data.messages);
    //             } else if (parseInt(countContainer.html()) != data.counter) {
    //                 newMessages(data.counter, data.messages);
    //             }
    //         }
    //     });
    // }, 30000);
    
    // Phone mask
    $('input[name=phone]').mask("+7(999)999-99-99");
    
    // Preview upload image
    $('input[type=file]').change(function () {
        var input = $(this)[0],
            parent = $(this).parents('.edit-image-preview'),
            imagePreview = parent.find('img');

        if (input.files[0].type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.attr('src', e.target.result);
                if (!imagePreview.is(':visible')) imagePreview.fadeIn();
            };
            reader.readAsDataURL(input.files[0]);
        } else if (parent.hasClass('file-advanced')) {
            imagePreview.attr('src', '');
            imagePreview.fadeOut();
        } else {
            imagePreview.attr('src', '/images/placeholder.jpg');
        }
    });

    // Click to delete items
    bindDelete();

    // Click YES on delete modal
    $('.delete-yes').click(function () {
        $('#'+localStorage.getItem('delete_modal')).modal('hide');

        $.post('/admin/'+localStorage.getItem('delete_function'), {
            '_token': $('input[name=_token]').val(),
            'id': localStorage.getItem('delete_id'),
        }, function (data) {
            if (data.success) {
                var row = localStorage.getItem('delete_row');
                $('#'+row).remove();
            }
        });
    });

    // Change pagination on data-tables
    $('table.datatable-basic').on('draw.dt', function () {
        bindDelete();
    });

    // Display range input value
    $('input[type=range]').on('input', function () {
        var _self = $(this);
        var valCell = _self.parents('table.range-input').find('.value input');
        valCell.val(_self.val());
    });

    $('table.range-input .value input').change(function () {
        var _self = $(this);
        var inputRange = _self.parents('table.range-input').find('input[type=range]');
        var parentInputRange = inputRange.parents('td');
        var attrInputRange = {
            'class':'form-control pull-left',
            'min':inputRange.attr('min'),
            'max':inputRange.attr('max'),
            'name':inputRange.attr('name'),
            'type':'range',
            'value':_self.val()
        };
        inputRange.remove();
        var newInput = $('<input>').attr(attrInputRange);
        parentInputRange.append(newInput);
    });
});

function deleteItem(obj) {
    var deleteModal = $('#'+obj.attr('modal-data'));

    localStorage.clear();
    localStorage.setItem('delete_id',obj.attr('del-data'));
    localStorage.setItem('delete_function',deleteModal.find('.modal-body').attr('del-function'));
    localStorage.setItem('delete_row', (obj.parents('tr').length ? obj.parents('tr').attr('id') : obj.parents('.col-lg-2').attr('id')));
    localStorage.setItem('delete_modal',obj.attr('modal-data'));

    deleteModal.modal('show');
}

function bindSeenAll() {
    $('#seen-all').click(function (e) {
        e.preventDefault();
        $.post('/admin/seen-all',{
            '_token': $('input[name=_token]').val(),
        }, function (data) {
            if (data.success) {
                var counter = $('#message-counter'),
                    messageCount = parseInt(counter.html()),
                    title = $('title'),
                    titleText = title.html();

                if (data.messages.length == messageCount) {
                    counter.remove();
                    $('#seen-all').remove();
                    var newTitleCounter = '';
                } else {
                    counter.html(data.messages.length);
                    newTitleCounter = '('+data.messages.length+') ';
                }

                counter.html(data.messages.length);
                $.each(data.messages, function (k,id) {
                    $('#message'+id).remove();
                });

                title.html(titleText.replace(/^(\(\d+\)\s)/g,newTitleCounter));
            }
        });
    });
}

function playWarning() {
    if (window.userInteract) {
        var audio = new Audio();
        audio.preload = 'auto';
        audio.src = '/sound/new_message.wav';
        audio.play();
    }
}

function newMessages(newCounter, messages) {
    $('#message-counter').html(newCounter);
    playWarning();

    $('#messages').html(newCounter);
    bindSeenAll();
}

function bindDelete() {
    var deleteIcon = $('.glyphicon-remove-circle');
    deleteIcon.unbind();
    deleteIcon.bind('click', function () {
        deleteItem($(this));
    });
}

var PowerSlider = function (target, values, value, step, tips, range, callback) {
    var slider = $(target);
    if (slider.length) {
        var width = slider.parents('.p-slider').width();
        return new rSlider({
            width: width,
            target: target,
            values: values,
            set: value,
            labels: true,
            range: range,
            step: step,
            tooltip: tips,
            onChange: function (vals) {
                if (callback) callback(vals);
            }
        });
    }
};