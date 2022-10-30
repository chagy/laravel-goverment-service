<?php

namespace App\Http\Livewire\Admin\Department;

use Livewire\Component;
use App\Models\Department;

class DepartmentForm extends Component
{
    public $idKey = 0;
    public $depa_name;
    public $depa_desc;
    public $parent_id;
    public $depa_num;

    protected $listeners = [
        'departmentEdit' => 'edit',
        'departmentResetInput' => 'resetInput'
    ];

    protected $messages = [
        'depa_name.required' => 'กรุณากรอกชื่อแผนก',
        'depa_num.required' => 'กรุณากรอกเลขแผนก',
        'depa_name.unique' => 'ชื่อแผนกนี้ใช้แล้ว'
    ];

    public function rules()
    {
        if($this->idKey == 0)
        {
            return [
                'depa_name' => 'required|unique:departments,depa_name',
                'depa_num' => 'required',
            ];
        }
        else 
        {
            return [
                'depa_name' => 'required|unique:departments,depa_name,'.$this->idKey,
                'depa_num' => 'required',
            ];
        }
    }

    public function edit($id = 0)
    {
        if($id > 0)
        {
            $department = Department::findOrFail($id);
            $this->idKey = $department->id;
            $this->parent_id = $department->parent_id;
            $this->depa_name = $department->depa_name;
            $this->depa_num = $department->depa_num;
            $this->depa_desc = $department->depa_desc;
        }
    }

    public function save()
    {
        $this->validate();

        $department = Department::updateOrCreate(
            ['id' => $this->idKey],
            [
                'parent_id' => $this->parent_id,
                'depa_name' => $this->depa_name,
                'depa_num' => $this->depa_num,
                'depa_desc' => $this->depa_desc,
            ]
        );

        $this->resetInput();

        $this->emit('modalBootstrap');
        $this->emit('departmentListRefresh');

        $this->dispatchBrowserEvent('toastr',[
            'type' => 'success',
            'message' => 'บันทึกข้อมูลตำแหน่งเรียบร้อย'
        ]);
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('depa_name');
        $this->reset('depa_desc');
        $this->reset('parent_id');
        $this->reset('depa_num');
    }

    public function render()
    {
        return view('livewire.admin.department.department-form',[
            'parents' => Department::get(),
        ]);
    }
}
