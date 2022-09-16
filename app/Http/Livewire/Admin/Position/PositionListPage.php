<?php

namespace App\Http\Livewire\Admin\Position;

use Livewire\Component;
use App\Models\Position;
use Livewire\WithPagination;

class PositionListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $positions = Position::withTrashed()
                        ->paginate(2);
        return view('livewire.admin.position.position-list-page',[
                    'positions' => $positions
                ])
                    ->extends('backend.layouts.main');
    }
}
