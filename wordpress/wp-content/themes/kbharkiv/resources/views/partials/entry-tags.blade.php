@php $posttags = get_the_tags()@endphp
@if ($posttags)
  <div class="tags">
    <div class="light">Tags</div>
    <ul class="list-unstyled">
      @foreach($posttags as $tag)
        <li><a href="{{get_tag_link($tag->term_id)}}">{{$tag->name}}</a></li>
      @endforeach
    </ul>
  </div>
@endif
