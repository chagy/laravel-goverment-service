<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">ตารางอำเภอ</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 250px;">
              <input 
                type="text" 
                name="search" 
                class="form-control float-right" 
                placeholder="Search" 
                id="search"
                wire:model="search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        @livewire('admin.district.district-form')
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>รหัส</th>
                <th>ชื่ออำเภอ</th>
                <th>จังหวัด</th>
                <th>รายละเอียด</th>
                <th>สถานะ</th>
                <th class="text-center">
                  <button 
                    type="button" 
                    class="btn btn-sm btn-primary" 
                    data-toggle="modal" 
                    data-target="#modal-form" 
                    wire:click="$emit('districtResetInput')">
                    <i class="fas fa-plus"></i> เพิ่มข้อมูล
                  </button>
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($districts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->dist_name }}</td>
                    <td>{{ $item->province->prov_name }}</td>
                    <td>{{ $item->dist_desc }}</td>
                    <td>
                        @if ($item->deleted_at)
                            <span class="badge bg-danger">ยกเลิก</span>
                        @else
                            <span class="badge bg-success">ใช้งาน</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if (!$item->deleted_at)
                            <button 
                                type="button" 
                                class="btn btn-sm btn-outline-warning" 
                                data-toggle="modal" 
                                data-target="#modal-form" 
                                wire:click="$emit('districtEdit',{{ $item->id }})">
                                <i class="fas fa-edit"></i> แก้ไข
                            </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {!! $districts->links() !!}
        </div>
      </div>
      <!-- /.card -->
    </div>
</div>