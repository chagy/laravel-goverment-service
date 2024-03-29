<?php

namespace App\Http\Livewire\Admin\Position;

use Livewire\Component;
use App\Models\Position;

class PositionForm extends Component
{
    public $idKey = 0;
    public $posi_name;
    public $posi_desc;

    protected $listeners = [
        'positionEdit' => 'edit',
        'positionResetInput' => 'resetInput'
    ];

    protected $messages = [
        'posi_name.required' => 'กรุณากรอกชื่อตำแหน่ง',
        'posi_name.unique' => 'ชื่อตำแหน่งนี้ใช้แล้ว'
    ];

    public function rules()
    {
        if($this->idKey == 0)
        {
            return [
                'posi_name' => 'required|unique:positions,posi_name'
            ];
        }
        else 
        {
            return [
                'posi_name' => 'required|unique:positions,posi_name,'.$this->idKey
            ];
        }
    }

    public function edit($id = 0)
    {
        if($id > 0)
        {
            $position = Position::findOrFail($id);
            $this->idKey = $position->id;
            $this->posi_name = $position->posi_name;
            $this->posi_desc = $position->posi_desc;
        }
    }

    public function save()
    {
        $this->validate();

        $position = Position::updateOrCreate(
            ['id' => $this->idKey],
            [
                'posi_name' => $this->posi_name,
                'posi_desc' => $this->posi_desc,
            ]
        );

        $this->resetInput();

        $this->emit('modalBootstrap');
        $this->emit('positionListRefresh');

        $this->dispatchBrowserEvent('toastr',[
            'type' => 'success',
            'message' => 'บันทึกข้อมูลตำแหน่งเรียบร้อย'
        ]);
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('posi_name');
        $this->reset('posi_desc');
    }

    public function render()
    {
        return view('livewire.admin.position.position-form');
    }
}
