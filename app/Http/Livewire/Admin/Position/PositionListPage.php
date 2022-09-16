<?php

namespace App\Http\Livewire\Admin\Position;

use Livewire\Component;
use App\Models\Position;
use Livewire\WithPagination;

class PositionListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;
    
    public function render()
    {
        $search = $this->search;
        $positions = Position::withTrashed()
                        ->when($search,function($query,$search){
                            return $query->where('posi_name','LIKE',"%{$search}%");
                        })
                        ->paginate(20);
        return view('livewire.admin.position.position-list-page',[
                    'positions' => $positions
                ])
                ->extends('backend.layouts.main');
    }
}
