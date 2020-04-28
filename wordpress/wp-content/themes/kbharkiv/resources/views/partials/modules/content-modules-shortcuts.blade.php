@if( have_rows('modules_shortcuts_repeater') )
  <div class="row">

  @while ( have_rows('modules_shortcuts_repeater') )
    @php the_row() @endphp

    <a href="{{ get_sub_field('modules_shortcuts_repeater_url') }}" class="col-sm-6 col-lg-4">
      @if( get_sub_field('modules_shortcuts_repeater_icon') )
        @php echo wp_get_attachment_image( get_sub_field('modules_shortcuts_repeater_icon'), 'thumbnail' ) @endphp
      @endif

      <h4>{{ get_sub_field('modules_shortcuts_repeater_headline') }}</h4>
      {{ get_sub_field('modules_shortcuts_repeater_copy') }}
    </a>
  @endwhile
  </div>

@else
  Ingen rækker fundet
@endif
