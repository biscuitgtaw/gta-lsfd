<?php /* <button type="button" class="btn btn-info" data-toggle="modal" data-target="#antelope-edit-rank-modal" name="antelope-edit-rank-fetch" data-id="">{!! __('rank_management.edit_rank') !!}</button> */ ?>
<?php /* <button type="button" class="btn btn-info btn-sm justify-content-center" data-target="#antelope-edit-rank-modal" data-toggle="modal" name="antelope-edit-rank-fetch" data-id=""><i class="ri-pencil-fill pr-0"></i></button> */ ?>
<!-- Antelope.io - Edit User Component -->
<div class="modal fade" tabindex="-1" role="dialog" id="antelope-edit-rank-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{!! __('rank_management.edit_rank') !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" id="antelope-edit-rank-form">
                <div class="modal-body" id="antelope-edit-rank-fillable">
                    <?php /* /ajax/edit_rank_fetch.blade.php */ ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{!! __('core.cancel') !!}</button>
                    <button type="submit" class="btn btn-info">{!! __('rank_management.edit_rank') !!}</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php /* <script src="{{ asset('js/views/components/modals/edit_rank.js') }}"></script> */ ?>

<!-- #END - Edit User Component -->
