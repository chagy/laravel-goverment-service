<?php

namespace App\Http\Livewire\Admin\SubDistrict;

use Livewire\Component;
use App\Models\District;
use App\Models\Province;
use App\Models\SubDistrict;

class SubDistrictForm extends Component
{
    public $idKey = 0;
    public $subd_name;
    public $subd_desc;
    public $province_id;
    public $district_id;
    public $subd_zipcode;

    public $districts = [];

    protected $listeners = [
        'subDistrictEdit' => 'edit',
        'subDistrictResetInput' => 'resetInput'
    ];

    protected $messages = [
        'province_id.required' => 'กรุณาเลือกจังหวัด',
        'district_id.required' => 'กรุณาเลือกอำเภอ',
        'subd_name.required' => 'กรุณากรอกชื่อตำบล',
        'subd_zipcode.required' => 'กรุณากรอกรหัสไปรษณีย์'
    ];

    protected $rules = [
        'province_id' => 'required|integer',
        'district_id' => 'required|integer',
        'subd_name' => 'required',
        'subd_zipcode' => 'required'
    ];

    public function edit($id = 0)
    {
        if($id > 0)
        {
            $subDistrict = SubDistrict::findOrFail($id);
            $this->idKey = $subDistrict->id;
            $this->province_id = $subDistrict->district->province_id;
            $this->district_id = $subDistrict->district_id;
            $this->subd_name = $subDistrict->subd_name;
            $this->subd_desc = $subDistrict->subd_desc;
            $this->subd_zipcode = $subDistrict->subd_zipcode;
        }
    }

    public function save()
    {
        $this->validate();

        $subDistrict = SubDistrict::updateOrCreate(
            ['id' => $this->idKey],
            [
                'district_id' => $this->district_id,
                'subd_name' => $this->subd_name,
                'subd_desc' => $this->subd_desc,
                'subd_zipcode' => $this->subd_zipcode,
            ]
        );

        $this->resetInput();

        $this->emit('modalBootstrap');
        $this->emit('subDistrictListRefresh');

        $this->dispatchBrowserEvent('toastr',[
            'type' => 'success',
            'message' => 'บันทึกข้อมูอตำบลเรียบร้อย'
        ]);
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('subd_name');
        $this->reset('subd_desc');
        $this->reset('province_id');
        $this->reset('district_id');
        $this->reset('districts');
        $this->reset('subd_zipcode');
    }

    public function render()
    {
        if($this->province_id){
            $this->districts = District::where('province_id',$this->province_id)->get();
        }
        
        return view('livewire.admin.sub-district.sub-district-form',[
            'provinces' => Province::orderBy('prov_name','asc')->get(),
        ]);
    }
}
