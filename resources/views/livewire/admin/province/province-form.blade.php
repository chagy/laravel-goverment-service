<div>
    <form wire:submit.prevent="save">
    <div wire:ignore.self class="modal fade" id="modal-form">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div wire:loading.class="overlay" wire:loading.flex wire:target="save">
              <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
              <h4 class="modal-title">ข้อมูลจังหวัด</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="prov_name">ชื่อจังหวัด</label>
                    <input 
                        type="text" 
                        id="prov_name"
                        name="prov_name"
                        placeholder="กรอก ชื่อจังหวัด"
                        class="form-control @error('prov_name') is-invalid @enderror" 
                        wire:model="prov_name"/>
                    @error('prov_name')
                    <div class="error invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="prov_desc">รายละเอียด</label>
                    <textarea 
                        id="prov_desc"
                        name="prov_desc"
                        placeholder="กรอก รายละเอียด"
                        class="form-control" 
                        wire:model="prov_desc"></textarea>
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