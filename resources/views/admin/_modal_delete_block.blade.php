<?php ob_start(); ?>
<div class="modal-body modal-delete" del-function="{{ $function }}" >
    <h3>{{ $head }}</h3>
</div>
<!-- Футер модального окна -->
<div class="modal-footer">
    @include('admin._button_block', ['type' => 'button', 'text' => trans('content.yes'), 'addClass' => 'delete-yes'])
    @include('admin._button_block', ['type' => 'button', 'text' => trans('content.no'), 'addAttr' => ['data-dismiss' => 'modal']])
</div>
@include('admin._modal_block',['id' => $modalId, 'title' => trans('content.warning'), 'content' => ob_get_clean()])