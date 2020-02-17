@if ( has_post_thumbnail($id))
  @php
    $attachment_id = get_post_thumbnail_id($id);
    $photographer = get_field('photographer', $attachment_id);
    $tooltip = $photographer ? pll__('Fotograf') . ' ' . $photographer : '';
  @endphp

  @php echo wp_get_attachment_image($attachment_id, [isset($width) ? $width : '48', isset($height) ? $height : '48'], false, ['class' => 'rounded-circle ' . $class, 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $tooltip]) @endphp

@else
  @include('components.icon', ['icon' => 'user', 'class' => $class . ' profile-img'])
@endif
