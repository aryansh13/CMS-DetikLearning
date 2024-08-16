<!-- Modal untuk Add New Topic -->
<div class="modal fade" id="addTopicModal" tabindex="-1" aria-labelledby="addTopicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTopicModalLabel">Add New Topic</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addTopicForm" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="division" class="form-label">Division</label>
                        <select class="form-select" id="division" name="id_division" required>
                            @foreach ($allDivisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name_division }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <div id="imagePreview" class="mt-2" style="display: none;">
                            <img id="preview" src="#" alt="Image Preview"
                                style="max-width: 100%; max-height: 200px;">
                        </div>
                        <input type="file" class="form-control mt-2" id="image" name="image" required
                            accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Topic</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var addTopicForm = document.getElementById('addTopicForm');
        // Tutup modal sebelum menampilkan SweetAlert
        var addTopicModal = new bootstrap.Modal(document.getElementById(
            'addTopicModal'));

        addTopicForm.addEventListener('submit', function(event) {
            event.preventDefault();
            addTopicModal.hide();
            var formData = new FormData(addTopicForm);

            fetch(addTopicForm.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href =
                                    '/adminPage/dashboardAdmin'; // Ganti dengan URL halaman tabel Anda
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Error adding topic: ' + data.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while adding the topic',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
        });

        // Image preview
        var imageInput = document.getElementById('image');
        var imagePreview = document.getElementById('imagePreview');
        var preview = document.getElementById('preview');

        imageInput.addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
            }
        });
    });
</script>
