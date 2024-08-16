<div class="modal fade" id="topicModal" tabindex="-1" role="dialog" aria-labelledby="topicModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topicModalLabel">Topic Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="modalTopicId"></span></p>
                <p><strong>Title:</strong> <span id="modalTopicTitle"></span></p>
                <p><strong>Description:</strong> <span id="modalTopicDescription"></span></p>
                <p><strong>Division:</strong> <span id="modalTopicDivision"></span></p>
                <p><strong>Image:</strong></p>
                @if ($topic->image)
                    <img id="modalTopicImage" src="{{ Storage::url($topic->image) }}" alt="Topic Image"
                        style="max-width: 100%; height: auto;" />
                @else
                    No Image
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var topicModal = document.getElementById('topicModal')
        topicModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-id')
            var title = button.getAttribute('data-title')
            var description = button.getAttribute('data-description')
            var division = button.getAttribute('data-division')
            var image = button.getAttribute('data-image')

            var modalBody = topicModal.querySelector('.modal-body')
            modalBody.querySelector('#modalTopicId').textContent = id
            modalBody.querySelector('#modalTopicTitle').textContent = title
            modalBody.querySelector('#modalTopicDescription').textContent = description
            modalBody.querySelector('#modalTopicDivision').textContent = division
            modalBody.querySelector('#modalTopicImage').src = image
        })
    })
</script>
