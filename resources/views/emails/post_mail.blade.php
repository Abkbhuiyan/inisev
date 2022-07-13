<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->post_title }}</title>
</head>
<body>

<p>Hi, Sir</p>
<p>A new post Have been Created!</p>
<p>Title: {{ $post->post_title }}</p>
<p>Description {{  Str::limit($post->description, 100,'...')}}</p>
<p>website: {{ $post->website->website_title }}</p>
<strong>Thank you Sir. :)</strong>

</body>
</html>
