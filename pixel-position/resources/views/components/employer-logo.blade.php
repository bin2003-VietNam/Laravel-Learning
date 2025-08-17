@props(['width' => '20', 'employer'])

<img src="{{ asset('storage/' . $employer->logo) }}" alt="Employer Logo" 
     alt="" 
     style="width: {{ $width }}px; height: {{ $width }}px;" 
     class="rounded-full object-cover" />
