<div>
    <form wire:submit.prevent="save">
    <div wire:ignore.self class="modal fade" id="modal-form">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div wire:loading.class="overlay" wire:loading.flex wire:target="save">
              <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
              <h4 class="modal-title">ข้อมูลแผนก</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="parent_id">แผนกหลัก</label>
                    <select 
                        id="parent_id"
                        name="parent_id"
                        class="form-control @error('parent_id') is-invalid @enderror" 
                        wire:model="parent_id">
                        <option value=""> -- แผนกหลัก --</option>
                        @foreach ($parents as $depa)
                        <option value="{{ $depa->id }}">{{ $depa->depa_name }}</option>
                        @endforeach
                    </select>
                    @error('parent_id')
                    <div class="error invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="depa_name">ชื่อแผนก</label>
                    <input 
                        type="text" 
                        id="depa_name"
                        name="depa_name"
                        placeholder="กรอก ชื่อแผนก"
                        class="form-control @error('depa_name') is-invalid @enderror" 
                        wire:model="depa_name"/>
                    @error('depa_name')
                    <div class="error invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="depa_num">เลขแผนก</label>
                    <input 
                        type="text" 
                        id="depa_num"
                        name="depa_num"
                        placeholder="กรอก เลขแผนก"
                        class="form-control @error('depa_num') is-invalid @enderror" 
                        wire:model="depa_num"/>
                    @error('depa_num')
                    <div class="error invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="depa_desc">รายละเอียด</label>
                    <textarea 
                        id="depa_desc"
                        name="depa_desc"
                        placeholder="กรอก รายละเอียด"
                        class="form-control" 
                        wire:model="depa_desc"></textarea>
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