<div class="card-header">
    <div class="form-group">
        <div class="control-label">{{ __('web.shop_global_visibility_control') }}</div>
        <label class="custom-switch mt-2">
            <input type="checkbox" wire:change="switchVisibility" wire:model="visibility" class="custom-switch-input">
            <span class="custom-switch-indicator"></span>
            <span class="custom-switch-description"> {{ $visibility ? __('web.shop_visible_in_marketplace') : __('web.shop_invisible_in_marketplace') }}</span>
        </label>
    </div>
    <div class="form-group">
        <div class="control-label">{{ __('web.store_working_management') }}</div>
        <label class="custom-switch mt-2">
            <input type="checkbox" wire:change="switchOpen" wire:model="open" class="custom-switch-input">
            <span class="custom-switch-indicator"></span>
            <span class="custom-switch-description"> {{ $open ? __('web.shop_is_open') : __('web.shop_is_closed') }}</span>
        </label>
    </div>

</div>
