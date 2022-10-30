<?php

namespace App\Http\Livewire\Admin\Province;

use Livewire\Component;
use App\Models\Province;

class ProvinceForm extends Component
{
    public $idKey = 0;
    public $prov_name;
    public $prov_desc;

    protected $listeners = [
        'provinceEdit' => 'edit',
        'provinceResetInput' => 'resetInput'
    ];

    protected $messages = [
        'prov_name.required' => 'กรุณากรอกชื่อจังหวัด',
        'prov_name.unique' => 'ชื่อจังหวัดนี้ใช้แล้ว'
    ];

    public function rules()
    {
        if($this->idKey == 0)
        {
            return [
                'prov_name' => 'required|unique:provinces,prov_name'
            ];
        }
        else 
        {
            return [
                'prov_name' => 'required|unique:provinces,prov_name,'.$this->idKey
            ];
        }
    }

    public function edit($id = 0)
    {
        if($id > 0)
        {
            $province = Province::findOrFail($id);
            $this->idKey = $province->id;
            $this->prov_name = $province->prov_name;
            $this->prov_desc = $province->prov_desc;
        }
    }

    public function save()
    {
        $this->validate();

        $province = Province::updateOrCreate(
            ['id' => $this->idKey],
            [
                'prov_name' => $this->prov_name,
                'prov_desc' => $this->prov_desc,
            ]
        );

        $this->resetInput();

        $this->emit('modalBootstrap');
        $this->emit('provinceListRefresh');

        $this->dispatchBrowserEvent('toastr',[
            'type' => 'success',
            'message' => 'บันทึกข้อมูลตำแหน่งเรียบร้อย'
        ]);
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('prov_name');
        $this->reset('prov_desc');
    }

    public function render()
    {
        return view('livewire.admin.province.province-form');
    }
}
