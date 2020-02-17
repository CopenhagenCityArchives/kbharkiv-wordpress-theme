@if ( has_post_thumbnail() )
  @php
    $type = get_post_mime_type( get_post_thumbnail_id() );
    $mime_type = explode('/', $type);
    $type = $mime_type['1'];
  @endphp

  @if($type == 'svg+xml')
    <div class="thumbnail">
      @php
        $svg_url = wp_get_attachment_image_src( get_post_thumbnail_id());
        $domain = get_site_url();
        $relative_url = str_replace( $domain . '/wp-content/uploads', '', $svg_url[0] );
        include(wp_upload_dir()['basedir'] . $relative_url);
      @endphp
    </div>
  @else
    @php echo wp_get_attachment_image(get_post_thumbnail_id(), isset($size) ? $size : 'post-image-x1', false, ['class' => 'thumbnail']) @endphp
    {{--<img class="thumbnail" width="100%" height="auto" title="{{get_post(get_post_thumbnail_id())->post_excerpt}}" src="{{the_post_thumbnail_url('thumbnail-image-x1')}}" srcset="{{the_post_thumbnail_url('thumbnail-image-x2')}} 2x"/>--}}
  @endif
@endif
