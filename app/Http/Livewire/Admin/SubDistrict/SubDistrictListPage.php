<?php

namespace App\Http\Livewire\Admin\SubDistrict;

use Livewire\Component;
use App\Models\SubDistrict;
use Livewire\WithPagination;

class SubDistrictListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $listeners = [
        'subDistrictListRefresh' => '$refresh'
    ];
    
    public function render()
    {
        $search = $this->search;
        $subDistricts = SubDistrict::withTrashed()
                        ->when($search,function($query,$search){
                            return $query->where('subd_name','LIKE',"%{$search}%");
                        })
                        ->paginate(20);
        return view('livewire.admin.sub-district.sub-district-list-page',[
            'subDistricts' => $subDistricts,
        ])->extends('backend.layouts.main');
    }
}
