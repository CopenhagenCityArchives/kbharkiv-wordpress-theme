@php $images = get_sub_field('modules_before_and_after_images') @endphp

@if( $images )
  <section class="module module-before-and-after {{ get_sub_field('modules_before_and_after_spacing') ? '' : 'small-margin' }}">
    <div class="container-fluid">
      <div class="row">
        <figure class="col-lg-8 offset-lg-2">
          <div id="slider" class="beer-slider" data-beer-label="{{ get_sub_field('modules_before_and_after_after') ? get_sub_field('modules_before_and_after_after') : 'Efter' }}">
            {!! wp_get_attachment_image( $images[0]['ID'], 'herox2' ) !!}
            <div class="beer-reveal" data-beer-label="{{ get_sub_field('modules_before_and_after_before') ? get_sub_field('modules_before_and_after_before') : 'Før' }}">
              {!! wp_get_attachment_image( $images[1]['ID'], 'herox2' ) !!}
            </div>
          </div>
          @if (get_sub_field('modules_before_and_after_text'))
            <figcaption class="figure-caption">
              {{ get_sub_field('modules_before_and_after_text') }}
            </figcaption>
          @endif
        </figure>
      </div>
    </div>
  </section>
@endif
