<x-app-layout>
    <div class="max-w-5xl mx-auto py-6 px-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPostModal">
            Add New Post
        </button>

        <ul class="divide-y">
            @foreach($posts as $post)
                <li class="py-4 px-2">
                    <a href="{{ route('posts.show', $post) }}" class="text-xl font-semibold block">{{ $post->title }}</a>
                    <span class="text-sm text-gray-600">
                        {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}
                    </span>
                </li>
            @endforeach
        </ul>

        <div class="mt-2">
            {{ $posts->links() }}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPostModalLabel">New Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="postTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="postDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="postDescription" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
