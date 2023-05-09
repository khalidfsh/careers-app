@php
    $fileExtension = pathinfo($path, PATHINFO_EXTENSION);
    $filePreviewPath = 'documents/' . $path;
@endphp

@if ($path !== null)
    @if ($fileExtension === 'pdf')
        <iframe src="{{ route('file.show', ['userId' => auth()->id(), 'path' => $filePreviewPath]) }}"
            class="w-auto h-auto rounded-lg shadow-md object-cover" frameborder="0"></iframe>
    @else
        <img src="{{ route('file.show', ['userId' => auth()->id(), 'path' => $filePreviewPath]) }}" alt="File preview"
            class="w-auto h-auto rounded-lg shadow-md object-cover">
    @endif
@endif
