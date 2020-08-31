@if( get_field('childpages') == true )
  @php
    $args = [
      'child_of' => $post->ID,
      'depth' => 2,
      'title_li' => '',
      'walker' => new Kbharkiv_Walker_Nav_Children
    ];
    $child_pages = get_pages( $args )
  @endphp

  @if(!empty($child_pages))
    <section class="module module-child-pages">
      <div class="container-fluid">
        <span class="sr-only">Undersider</span>
        <div class="row">
          {{ wp_list_pages($args) }}

          @if( have_rows('childpages_append') )
            @while( have_rows('childpages_append') )
              @php
                the_row();
                $image = get_sub_field('childpages_append_image');
                $link = get_sub_field('childpages_append_link');
                $text = get_sub_field('childpages_append_text');
              @endphp

              <div class="page-item col-sm-6 col-md-5 col-lg-4 col-xl-3 mb-5">
                <a class="article-link" href="{{ $link['url'] }}" target="{{ $link['target'] ? $link['target'] : '_self' }}">
                  @if($image)
                    {!! wp_get_attachment_image($image, 'herox1', false, ['class' => 'mb-4']) !!}
                  @endif
                  <h3 class="mb-2">
                    <span class="mr-2">{{$link['title']}}</span>
                    @include('partials.icon', ['icon' => 'arrow-right-circle', 'label' => 'Pil til højre ikon'])
                  </h3>
                  <div>{{ $text ? $text : '' }}</div>
                </a>
              </div>
              <div class="d-none d-md-block col-md-1 d-lg-none col-xl-1 d-xl-block"></div>
            @endwhile

          @endif
        </div>
      </div>
    </section>
  @endif
@endif
