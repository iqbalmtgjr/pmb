<div class="modal fade" id="skck" tabindex="-1" role="dialog" aria-labelledby="skckLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="skckLabel">Upload File SKCK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('postSkck') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="skck">
                    <p class="text-warning">(Format file : .jpg|pdf, Besar file maksimal 5MB)</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
