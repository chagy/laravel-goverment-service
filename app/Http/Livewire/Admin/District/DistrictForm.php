<?php

namespace App\Http\Livewire\Admin\District;

use Livewire\Component;
use App\Models\District;
use App\Models\Province;

class DistrictForm extends Component
{
    public $idKey = 0;
    public $dist_name;
    public $dist_desc;
    public $province_id;

    protected $listeners = [
        'districtEdit' => 'edit',
        'districtResetInput' => 'resetInput'
    ];

    protected $messages = [
        'province_id.required' => 'กรุณาเลือกจังหวัด',
        'dist_name.required' => 'กรุณากรอกชื่ออำเภอ',
        'dist_name.unique' => 'ชื่ออำเภอนี้ใช้แล้ว'
    ];

    protected $rules = [
        'province_id' => 'required|integer',
        'dist_name' => 'required'
    ];

    public function edit($id = 0)
    {
        if($id > 0)
        {
            $district = District::findOrFail($id);
            $this->idKey = $district->id;
            $this->province_id = $district->province_id;
            $this->dist_name = $district->dist_name;
            $this->dist_desc = $district->dist_desc;
        }
    }

    public function save()
    {
        $this->validate();

        $district = District::updateOrCreate(
            ['id' => $this->idKey],
            [
                'province_id' => $this->province_id,
                'dist_name' => $this->dist_name,
                'dist_desc' => $this->dist_desc,
            ]
        );

        $this->resetInput();

        $this->emit('modalBootstrap');
        $this->emit('districtListRefresh');

        $this->dispatchBrowserEvent('toastr',[
            'type' => 'success',
            'message' => 'บันทึกข้อมูลอำเภอเรียบร้อย'
        ]);
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('dist_name');
        $this->reset('dist_desc');
        $this->reset('province_id');
    }

    public function render()
    {
        return view('livewire.admin.district.district-form',[
            'provinces' => Province::orderBy('prov_name','asc')->get(),
        ]);
    }
}
