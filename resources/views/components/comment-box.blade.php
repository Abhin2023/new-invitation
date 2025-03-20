<section class="m-0 px-0 pb-0 pt-3" id="ucapan">
    <div class="container">
        <div class="card-body border rounded-4 shadow p-3">
            <h1 class="font-esthetic text-center mb-3" style="font-size: 3rem;">Greetings & Prayers</h1>

            <div id="success-message-{{ $page_id }}" class="alert alert-success d-none">
                Comment submitted successfully!
            </div>

            <div class="mb-3">
                <label for="form-name-{{ $page_id }}" class="form-label">Nama</label>
                <input type="text" class="form-control shadow-sm" id="form-name-{{ $page_id }}" placeholder="Isikan Nama Anda">
            </div>

            <div class="mb-3">
                <label for="form-comment-{{ $page_id }}" class="form-label">Ucapan & Doa</label>
                <textarea class="form-control shadow-sm" id="form-comment-{{ $page_id }}" rows="4" placeholder="Tulis Ucapan dan Doa"></textarea>
            </div>

            <div class="d-grid">
                <button class="btn btn-primary btn-sm rounded-3 shadow m-1" onclick="comment.send('{{ $page_id }}')">
                    <i class="fa-solid fa-paper-plane me-1"></i> Send
                </button>
            </div>
        </div>

        <div class="my-3 pt-3" id="comments-{{ $page_id }}">
            @foreach ($comments as $comment)
                <div class="d-flex align-items-start border p-3 mb-2 rounded">
                    <!-- Avatar -->
                    <img src="{{ asset('assets/images/pngegg.png') }}" alt="Avatar" class="rounded-circle me-3" width="40" height="40">

                    <!-- Comment Content -->
                    <div>
                        <strong>{{ $comment->name }}</strong>
                        <p class="mb-0">{{ $comment->comment }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<script>
    const comment = {
        send: function (pageId) {
            let name = document.getElementById("form-name-" + pageId).value;
            let message = document.getElementById("form-comment-" + pageId).value;
            let successMessage = document.getElementById("success-message-" + pageId);
            let commentsContainer = document.getElementById("comments-" + pageId);

            if (!name || !message) {
                alert("Please fill in all fields.");
                return;
            }

            fetch("{{ route('comment.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ name: name, message: message, page_id: pageId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    successMessage.classList.remove("d-none");

                    document.getElementById("form-name-" + pageId).value = "";
                    document.getElementById("form-comment-" + pageId).value = "";

                    let newComment = document.createElement("div");
                    newComment.classList.add("comment-item", "border", "p-2", "mb-2", "rounded");
                    newComment.innerHTML = `<strong>${name}</strong>: ${message}`;
                    commentsContainer.prepend(newComment);
                }
            })
            .catch(error => console.error("Error:", error));
        }
    };
</script>
