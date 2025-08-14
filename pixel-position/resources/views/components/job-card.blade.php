@props(['job'])
<x-panel class="flex flex-col text-center ">
    <div class="self-start text-sm">{{$job->employer->name}}</div>

    <div class="py-8">
        <h3 class="font-bold group-hover:text-blue-600 transition-colors duration-200">{{$job->title}}</h3>
        <p class="text-sm mt-4">{{$job->salary}}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div class="flex items-center flex-row space-x-2 ">
            @foreach ( $job->tags as $tag )
                <x-tag :$tag size="small" />
            @endforeach
        </div>
        <x-employer-logo :width="10" />
    </div>
</x-panel>