@if( have_rows('modules_shortcuts_repeater') )
  <section class="module module-shortcuts">
    <div class="container-fluid">
      <div class="row">

        @while ( have_rows('modules_shortcuts_repeater') )
          @php
            the_row();
            $link = get_sub_field('modules_shortcuts_repeater_url');
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
          @endphp

          <a href="{{ esc_url( $link_url ) }}" target="{{ esc_attr( $link_target ) }}" class="col-sm-6 col-lg-4">
            @if( get_sub_field('modules_shortcuts_repeater_icon') )
              @php echo wp_get_attachment_image( get_sub_field('modules_shortcuts_repeater_icon'), 'thumbnail' ) @endphp
            @endif
            <h4>{{ esc_html( $link_title ) }}</h4>
            {{ get_sub_field('modules_shortcuts_repeater_copy') }}
          </a>
        @endwhile
      </div>
    </div>
  </section>
@else
  Ingen rækker fundet
@endif
