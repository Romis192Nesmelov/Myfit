window.userInteract = false;
window.statisticsData = [];

$(document).click(function () {
    window.userInteract = true;
});

$(document).ready(function () {
    $('a.img-preview').fancybox({
        padding: 3
    });

    // unifiedHeight();

    // Changing add-video input
    $('input[name=video_add]').change(function () {
        var videoContainer = $(this).parents('.panel-body').find('.video-container'),
            placeholder = videoContainer.find('img'),
            value = $(this).val();

        if (value) {
            placeholder.hide();
            // value = value.replace('https://youtu.be/','https://www.youtube.com/embed/');
            $(this).val(value);
            videoContainer.append('<iframe src="'+value+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
        } else {
            placeholder.show();
            videoContainer.find('iframe').remove();
        }
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

    // Change users select
    bindChangeUserSelect();

    // Change trainings select in payment page
    $('.payment select[name=training_id]').change(function () {
        var id = $(this).val(),
            programNameBlock = $('.program span'),
            trainingPriceBlock = $('.training-price span'),
            inputValue = $('input[name=value]');

        $.post('/admin/get-training', {
            '_token': $('input[name=_token]').val(),
            'id': id
        }, function (data) {
            if (data.success) {
                programNameBlock.html(data.program);
                trainingPriceBlock.html(data.price);
                inputValue.val(data.value);
                inputValue.attr('max',data.value);
            }
        });
    });
});

function deleteItem(obj) {
    var deleteModal = $('#'+obj.attr('modal-data'));
    localStorage.clear();
    localStorage.setItem('delete_id',obj.attr('del-data'));
    localStorage.setItem('delete_function',deleteModal.find('.modal-body').attr('del-function'));
    localStorage.setItem('delete_row', (obj.parents('tr').length ? obj.parents('tr').attr('id') : obj.parents('.col-xs-12').attr('id')));
    localStorage.setItem('delete_modal',obj.attr('modal-data'));

    deleteModal.modal('show');
}

function bindChangeUserSelect() {
    $('select[name=user_id]').change(function () {
        var id = $(this).val(),
            parent = $(this).parents('.panel-body'),
            userBlock = parent.find('.user-block');

        $.post('/admin/get-user', {
            '_token': $('input[name=_token]').val(),
            'id': id,
        }, function (data) {
            if (data.success) {
                userBlock.html(data.user);
                $('.image.avatar a.img-preview').fancybox({
                    padding: 3
                });
                bindChangeUserSelect();
            }
        });
    });
}

function bindSeenAll() {
    $('#seen-all').click(function (e) {
        e.preventDefault();
        $.post('/admin/seen-all',{
            '_token': $('input[name=_token]').val(),
        }, function (data) {
            if (data.success) {
                $('#message-counter').remove();
                $('#seen-all').remove();
                $('ul.media-list').html('');
            }
        });
    });
}

// function playWarning() {
//     if (window.userInteract) {
//         var audio = new Audio();
//         audio.preload = 'auto';
//         audio.src = '/sound/new_message.wav';
//         audio.play();
//     }
// }

// function newMessages(newCounter, messages) {
//     $('#message-counter').html(newCounter);
//     playWarning();
//
//     $('#messages').html(newCounter);
//     bindSeenAll();
// }

function bindDelete() {
    var deleteIcon = $('.glyphicon-remove-circle');
    deleteIcon.unbind();
    deleteIcon.bind('click', function () {
        deleteItem($(this));
    });
    
    
}

function cloneArrayData(data) {
    var newData = [];
    $.each(data, function (k,item) {
        newData[k] = item;
    });
    return newData;
}