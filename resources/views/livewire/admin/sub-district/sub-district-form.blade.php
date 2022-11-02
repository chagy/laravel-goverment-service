<div>
    <form wire:submit.prevent="save">
    <div wire:ignore.self class="modal fade" id="modal-form">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div wire:loading.class="overlay" wire:loading.flex wire:target="save">
              <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
              <h4 class="modal-title">ข้อมูลตำบล</h4>
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
                    <label for="district_id">อำเภอ</label>
                    <select
                        id="district_id"
                        name="district_id"
                        class="form-control @error('district_id') is-invalid @enderror" 
                        wire:model="district_id">
                        <option value="">-- กรุณาเลือกอำเภอ --</option>
                        @foreach ($districts as $dist)
                        <option value="{{ $dist->id }}">{{ $dist->dist_name }}</option>
                        @endforeach
                    </select>
                    @error('district_id')
                    <div class="error invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subd_name">ชื่อตำบล</label>
                    <input 
                        type="text" 
                        id="subd_name"
                        name="subd_name"
                        placeholder="กรอก ชื่อตำบล"
                        class="form-control @error('subd_name') is-invalid @enderror" 
                        wire:model="subd_name"/>
                    @error('subd_name')
                    <div class="error invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subd_zipcode">รหัสไปรษณีย์</label>
                    <input 
                        type="text" 
                        id="subd_zipcode"
                        name="subd_zipcode"
                        placeholder="กรอก รหัสไปรษณีย์"
                        class="form-control @error('subd_zipcode') is-invalid @enderror" 
                        wire:model="subd_zipcode"/>
                    @error('subd_zipcode')
                    <div class="error invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subd_desc">รายละเอียด</label>
                    <textarea 
                        id="subd_desc"
                        name="subd_desc"
                        placeholder="กรอก รายละเอียด"
                        class="form-control" 
                        wire:model="subd_desc"></textarea>
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