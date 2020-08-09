@php $image_col = (has_post_thumbnail() && !get_field('page_hide_image')) ? 'offset-xl-3' : 'offset-xl-2' @endphp

<section class="module module-links {{ get_sub_field('modules_sdkkildeviser_spacing') ? '' : 'small-margin' }}" aria-label="Links">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-xl-6 offset-lg-1 {{ $image_col }}">
        @if( have_rows('modules_links_links') )
          <ul class="block-links">
          @while ( have_rows('modules_links_links') )
            @php the_row() @endphp
            <li>
              @if( get_sub_field('modules_links_links_type') == 'link' )
                @php $link = get_sub_field('modules_links_links_type_link') @endphp
                <a href="{{ $link['url'] }}" target="{{ $link['target'] ? $link['target'] : '_self' }}">@include('partials.icon', ['icon' => 'arrow-right-circle']) {{$link['title']}}</a>
              @elseif( get_sub_field('modules_links_links_type') == 'download')
                <a href="{{ get_sub_field('modules_links_links_type_download')['url'] }}" download>@include('partials.icon', ['icon' => 'download']) {{ get_sub_field('modules_links_links_type_title') }}</a>
              @endif
            </li>
          @endwhile
          </ul>
        @endif
      </div>
    </div>
  </div>
</section>
