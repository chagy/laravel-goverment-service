<?php

namespace App\Http\Livewire\Admin\District;

use Livewire\Component;
use App\Models\District;
use Livewire\WithPagination;

class DistrictListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $listeners = [
        'districtListRefresh' => '$refresh'
    ];
    
    public function render()
    {
        $search = $this->search;
        $districts = District::withTrashed()
                        ->when($search,function($query,$search){
                            return $query->where('dist_name','LIKE',"%{$search}%");
                        })
                        ->paginate(20);
        return view('livewire.admin.district.district-list-page',[
            'districts' => $districts,
        ])->extends('backend.layouts.main');
    }
}
