@php
  $contact_options = get_sub_field('modules_contact_options');
  $col_count = 12/count($contact_options);
@endphp

<section class="module module-contact theme-blue">
  <div class="container-fluid">

    @include('partials.modules-header')

    @if( have_rows('modules_contact_options') )

      <div class="row row-eq-height">
        @while ( have_rows('modules_contact_options') )
          @php the_row() @endphp
          <div class="col-lg-{{$col_count}}">
            <div class="contact-option">
              <h4>{{ get_sub_field('modules_contact_options_headline') }}</h4>
              <p>{{ get_sub_field('modules_contact_options_body') }}</p>
            </div>
            <a class="btn" href="{{ get_sub_field('modules_contact_options_link_type') == 'external' ? get_sub_field('modules_contact_options_url') : get_sub_field('modules_contact_options_internal_link') }}" target="{{ get_sub_field('modules_contact_options_link_type') == 'external' ? '_blank' : '_self' }}">{{ get_sub_field('modules_contact_options_btn') }} @include('components.icon', ['icon' => 'arrow-right', 'class' => 'right'])</a>
          </div>
        @endwhile
      </div>

    @endif
  </div>
</section>
