<?php

namespace App\Traits;

trait SweetAlertResponse
{
    public function sweetAlert2Success(string $message = null){
        /* SweetAlert2 show success toast */
        $this->dispatchBrowserEvent('swal', [
            'title' => $message ?? __('web.record_was_successfully_updated'),
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right',
            'showConfirmButton' => false,
            'timerProgressBar' => true,
        ]);
    }

    public function sweetAlert2Error(string $message = null){
        /* SweetAlert2 show error toast */
        $this->dispatchBrowserEvent('swal', [
            'title' => $message ?? __('web.error_during_updating'),
            'timer'=>3000,
            'icon'=>'error',
            'toast'=>true,
            'position'=>'top-right',
            'showConfirmButton' => false,
            'timerProgressBar' => true,
        ]);
    }
}
