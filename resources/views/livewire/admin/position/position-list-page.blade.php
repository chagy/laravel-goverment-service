<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">ตารางตำแหน่ง</h3>

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
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>รหัส</th>
                <th>ชื่อตำแหน่ง</th>
                <th>รายละเอียด</th>
                <th>สถานะ</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($positions as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->posi_name }}</td>
                    <td>{{ $item->posi_desc }}</td>
                    <td>
                        @if ($item->deleted_at)
                            <span class="badge bg-danger">ยกเลิก</span>
                        @else
                            <span class="badge bg-success">ใช้งาน</span>
                        @endif
                    </td>
                    <td>
                        @if (!$item->deleted_at)
                            <button 
                                type="button" 
                                class="btn btn-sm btn-outline-warning">
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
            {!! $positions->links() !!}
        </div>
      </div>
      <!-- /.card -->
    </div>
</div>