<article @php post_class('module') @endphp>
  <div class="container-fluid">
    @if( !is_singular('medlem') && has_post_thumbnail() )
      <div class="row mb-5">
        <div class="col-sm-10 offset-sm-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
          <div class="img-wrap">
            @include('components.thumbnail')
          </div>
        </div>
        <div class="col-sm-10 offset-sm-1 offset-lg-0 col-lg-2 d-flex align-items-end">
          <div class="light thumbnail-title">
            {{get_post(get_post_thumbnail_id())->post_excerpt}}
          </div>
        </div>
      </div>
    @endif
    <div class="row align-items-center mb-4">
      <div class="offset-sm-1 col-lg-2 offset-lg-0 col-xl-3">
        @includeWhen(is_singular('medlem'), 'components.profile-image', ['id' => get_the_ID(), 'class' => 'd-inline mr-4', 'width' => '96', 'height' => '96'])
      </div>
      <div class="col-sm-10 offset-sm-1 col-lg-8 offset-lg-0 col-xl-6">
        <header>

          @php $parent = App::parentPage() @endphp

          @if ( $parent )
            <div class="breadcrumbs">
              <a class="link" href="{{ $parent['url'] }}">{{ $parent['title'] }}</a>

              <h1 class="entry-title current display-4">{{ App::title() }}</h1>

              @if(is_tag())
                <a class="btn btn-icon btn-outline-secondary" href="{{ $parent['url'] }}">@include('components.icon', ['icon' => 'x'])</a>
              @endif
            </div>
          @else
            <h1 class="entry-title display-4">{{ App::title() }}</h1>
          @endif

        </header>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-10 offset-sm-1 col-lg-8 offset-lg-0 col-xl-6 order-lg-2">
        <div class="entry-content mb-5">
          @php the_content() @endphp
        </div>
      </div>
      <div class="offset-sm-1 col-lg-2 offset-lg-0 col-xl-3 order-lg-1">
        @include('partials/entry-author')
        @include('partials/entry-tags')

        @php $photographer = get_field('photographer', get_post_thumbnail_id(get_the_ID())) @endphp

        @if( $photographer )
          <div class="mb-4">
            <div class="light">{{pll__('Profilbillede-fotograf')}}</div>
            <p>{{ $photographer }}</p>
          </div>
        @endif

        @if( have_rows('members_links') )
          <div class="mb-4">
            <div class="light">{{pll__('Links')}}</div>
            @while ( have_rows('members_links') )
              @php the_row() @endphp
              <a target="_blank" class="d-block text-break" aria-label="{{ get_sub_field('members_links_title') . ' – ' . get_the_title() }}" href="{{the_sub_field('members_links_url')}}">{{the_sub_field('members_links_title')}}</a>
            @endwhile
          </div>
        @endif

        @if (get_field('members_phone') || get_field('members_email'))
          <div class="light">{{pll__('Kontaktoplysninger')}}</div>
        @endif

        @if (get_field('members_email'))
          <a class="d-block text-break" aria-label="{{ pll__('Email') . ' – ' . get_the_title() }}" href="mailto:{{ get_field('members_email') }}" target="_blank">{{ get_field('members_email') }}</a>
        @endif

        @if (get_field('members_phone'))
          <a class="d-block text-break" aria-label="{{ pll__('Ring') . ' – ' . get_the_title() }}" href="tel:{{ get_field('members_phone') }}" target="_blank">{{ get_field('members_phone') }}</a>
        @endif

        @if (get_field('website'))
          <div class="mb-4">
            <div class="light">{{pll__('Hjemmeside')}}</div>
            <a class="d-block text-break" target="_blank" href="{{the_field('website')}}">{{the_field('website')}}</a>
          </div>
        @endif
      </div>
    </div>
  </div>
</article>
