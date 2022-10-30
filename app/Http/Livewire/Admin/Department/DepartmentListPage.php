<?php

namespace App\Http\Livewire\Admin\Department;

use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;

class DepartmentListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $listeners = [
        'departmentListRefresh' => '$refresh'
    ];
    
    public function render()
    {
        $search = $this->search;
        $departments = Department::withTrashed()
                        ->when($search,function($query,$search){
                            return $query->where('depa_name','LIKE',"%{$search}%");
                        })
                        ->paginate(20);
        return view('livewire.admin.department.department-list-page',[
                    'departments' => $departments
                ])
                ->extends('backend.layouts.main');
    }
}
