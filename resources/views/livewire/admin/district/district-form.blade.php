<div>
    <form wire:submit.prevent="save">
    <div wire:ignore.self class="modal fade" id="modal-form">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div wire:loading.class="overlay" wire:loading.flex wire:target="save">
              <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
              <h4 class="modal-title">ข้อมูลอำเภอ</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="province_id">จังหวัด</label>
                    <select
                        id="province_id"
                        name="province_id"
                        placeholder="กรอก ชื่ออำเภอ"
                        class="form-control @error('province_id') is-invalid @enderror" 
                        wire:model="province_id">
                        <option value="">-- กรุณาเลือกจังหวัด --</option>
                        @foreach ($provinces as $prov)
                        <option value="{{ $prov->id }}">{{ $prov->prov_name }}</option>
                        @endforeach
                    </select>
                    @error('province_id')
                    <div class="error invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dist_name">ชื่ออำเภอ</label>
                    <input 
                        type="text" 
                        id="dist_name"
                        name="dist_name"
                        placeholder="กรอก ชื่ออำเภอ"
                        class="form-control @error('dist_name') is-invalid @enderror" 
                        wire:model="dist_name"/>
                    @error('dist_name')
                    <div class="error invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dist_desc">รายละเอียด</label>
                    <textarea 
                        id="dist_desc"
                        name="dist_desc"
                        placeholder="กรอก รายละเอียด"
                        class="form-control" 
                        wire:model="dist_desc"></textarea>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    </form>
    </div>