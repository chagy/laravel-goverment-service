<?php

namespace App\Http\Livewire\Admin\Position;

use Livewire\Component;
use App\Models\Position;

class PositionForm extends Component
{
    public $idKey = 0;
    public $posi_name;
    public $posi_desc;

    public function save()
    {
        $position = Position::updateOrCreate(
            ['id' => $this->idKey],
            [
                'posi_name' => $this->posi_name,
                'posi_desc' => $this->posi_desc,
            ]
        );
    }

    public function render()
    {
        return view('livewire.admin.position.position-form');
    }
}
