<?php

namespace App\Http\Livewire\Admin\Position;

use Livewire\Component;

class PositionListPage extends Component
{
    public function render()
    {
        return view('livewire.admin.position.position-list-page')
                    ->extends('backend.layouts.main');
    }
}
