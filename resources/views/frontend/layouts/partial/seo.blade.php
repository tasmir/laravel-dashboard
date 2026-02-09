@if(isset($title) && !empty($title))
    <title>{{$title}}</title>
@endif
@if(isset($description) && !empty($description))
    <meta name="description" content="{{$description}}">
@endif

<!-- Open Graph / Facebook / LinkedIn -->
@if(isset($title) && !empty($title))
    <meta property="og:title" content="{{ $title }}">
@endif
@if(isset($description) && !empty($description))
    <meta property="og:description" content="{{ $description }}">
@endif
<meta property="og:type" content="website">
@if(isset($url) && !empty($url))
    <meta name="og:url" content="{{$url}}">
@else
    <meta name="og:url" content="{{url()->current()}}">
@endif
@if(isset($image) && !empty($image))
    <meta name="og:image" content="{{$image}}">
@else
    <meta name="og:image" content="{{asset('img/social.webp')}}">
@endif
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
@if(isset($title) && !empty($title))
    <meta property="og:image:alt" content="{{ $title }}">
@endif
<meta property="og:site_name" content="Tutor BD">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
@if(isset($title) && !empty($title))
    <meta name="twitter:title" content="{{ $title }}">
@endif
@if(isset($description) && !empty($description))
    <meta name="twitter:description" content="{{ $description }}">
@endif
<meta name="twitter:image" content="{{ $image ?? asset('img/social.webp') }}">
<meta name="twitter:site" content="@TutorBD">

<!-- Optional: Author -->
<meta name="author" content="Tutor BD">
