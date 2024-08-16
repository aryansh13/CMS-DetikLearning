<!-- Modal Edit -->
<div class="modal fade" id="editTopicModal" tabindex="-1" aria-labelledby="editTopicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editTopicForm" method="POST" action="{{ route('admin.update', $topic->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editTopicModalLabel">Edit Topic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Topic Title</label>
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editDescription" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editDivision" class="form-label">Division</label>
                        <select class="form-select" id="editDivision" name="id_division" required>
                            @foreach($allDivisions as $name_division)
                                <option value="{{ $name_division->id }}">{{ $name_division->name_division }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editImage" class="form-label">Image</label>
                        <div id="currentImage" class="mt-1 mb-2">
                            <img src="" alt="Current Image" style="max-width: 100%; max-height: 200px; display: none;">
                        </div>
                        <div id="newImagePreview" class="mt-1 mb-2">
                            <img src="" alt="New Image Preview" style="max-width: 100%; max-height: 200px; display: none;">
                        </div>
                        <input class="form-control" type="file" id="editImage" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Topic</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editTopicModal = document.getElementById('editTopicModal');
        var modal = new bootstrap.Modal(editTopicModal);
        editTopicModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var topicId = button.getAttribute('data-id');
            var topicTitle = button.getAttribute('data-title');
            var topicDescription = button.getAttribute('data-description');
            var topicDivisionId = button.getAttribute('data-division');
            var topicImage = button.getAttribute('data-image');

            var formAction = "{{url('adminPage/update')}}/" + topicId;
            var editForm = document.getElementById('editTopicForm');
            editForm.action = formAction;

            document.getElementById('editTitle').value = topicTitle;
            document.getElementById('editDescription').value = topicDescription;
            document.getElementById('editDivision').value = topicDivisionId;

            var currentImage = document.getElementById('currentImage').querySelector('img');
            currentImage.src = topicImage;
            currentImage.style.display = 'block';

            var newImagePreview = document.getElementById('newImagePreview').querySelector('img');
            newImagePreview.src = '';
            newImagePreview.style.display = 'none';
        });

        var editImageInput = document.getElementById('editImage');
        editImageInput.addEventListener('change', function (event) {
            var newImagePreview = document.getElementById('newImagePreview').querySelector('img');
            var currentImage = document.getElementById('currentImage').querySelector('img');
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    currentImage.style.display = 'none';
                    newImagePreview.src = e.target.result;
                    newImagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                newImagePreview.src = '';
                newImagePreview.style.display = 'none';
            }
        });

        // Handle form submission
        document.getElementById('editTopicForm').addEventListener('submit', function (event) {
            event.preventDefault();
            modal.hide();

            var formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/adminPage/dashboardAdmin';
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Error updating topic: ' + data.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while updating the topic',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        });
    });
</script>




