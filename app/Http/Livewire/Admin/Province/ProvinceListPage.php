<?php

namespace App\Http\Livewire\Admin\Province;

use Livewire\Component;
use App\Models\Province;
use Livewire\WithPagination;

class ProvinceListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $listeners = [
        'provinceListRefresh' => '$refresh'
    ];
    
    public function render()
    {
        $search = $this->search;
        $provinces = Province::withTrashed()
                        ->when($search,function($query,$search){
                            return $query->where('prov_name','LIKE',"%{$search}%");
                        })
                        ->paginate(20);
        return view('livewire.admin.province.province-list-page',[
            'provinces' => $provinces,
        ])->extends('backend.layouts.main');
    }
}
