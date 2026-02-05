<x-app-layout>
<div class="container py-5">

    <h2 class="fw-bold mb-4">
        {{ $course->title }}
    </h2>

    <div class="row">
        {{-- LEFT: Course Content --}}
        <div class="col-md-4">

            <div class="accordion" id="courseContent">
                @foreach($course->modules as $module)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#module{{ $module->id }}">
                                {{ $module->title }}
                            </button>
                        </h2>

                        <div id="module{{ $module->id }}"
                             class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <ul class="list-group">
                                    @foreach($module->lessons as $lesson)
                                        <li class="list-group-item lesson-item"
                                            data-video="{{ $lesson->video_url }}">
                                            ▶ {{ $lesson->title }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        {{-- RIGHT: Video Player --}}
        <div class="col-md-8">
            <div class="ratio ratio-16x9 shadow">
                <iframe id="videoPlayer"
                        src=""
                        allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>

</div>

<script>
document.querySelectorAll('.lesson-item').forEach(item => {
    item.addEventListener('click', function () {
        let url = this.dataset.video;
        
        // Convert YouTube URL to embed format
        let embedUrl = url;
        if (url.includes('youtube.com/watch?v=')) {
            const videoId = url.split('v=')[1].split('&')[0];
            embedUrl = `https://www.youtube.com/embed/${videoId}`;
        } else if (url.includes('youtu.be/')) {
            const videoId = url.split('youtu.be/')[1].split('?')[0];
            embedUrl = `https://www.youtube.com/embed/${videoId}`;
        }
        
        document.getElementById('videoPlayer').src = embedUrl;
    });
});
</script>
</x-app-layout>
