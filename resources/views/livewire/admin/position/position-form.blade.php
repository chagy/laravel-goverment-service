<div>
<form wire:submit.prevent="save">
<div class="modal fade" id="modal-form" wire:ignore.selt>
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">ข้อมูลตำแหน่ง</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="posi_name">ชื่อตำแหน่ง</label>
                <input 
                    type="text" 
                    id="posi_name"
                    name="posi_name"
                    placeholder="กรอก ชื่อตำแหน่ง"
                    class="form-control" 
                    wire:model="posi_name"/>
            </div>
            <div class="form-group">
                <label for="posi_desc">รายละเอียด</label>
                <textarea 
                    id="posi_desc"
                    name="posi_desc"
                    placeholder="กรอก รายละเอียด"
                    class="form-control" 
                    wire:model="posi_desc"></textarea>
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