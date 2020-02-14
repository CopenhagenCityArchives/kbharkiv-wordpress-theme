<article @php post_class('col-md-6 col-lg-4 col-xl-3 text-white post-type') @endphp aria-label="{{ get_post_type_object(get_post_type())->labels->singular_name . ' – ' . get_the_title() }}">

  <a href="{{ get_permalink() }}">
    @include('components.byline', ['headline' => 'h5'])
  </a>

  <div class="entry-summary mt-4">
    @php the_excerpt() @endphp
  </div>

  @if( have_rows('members_links') )
    @while ( have_rows('members_links') )
      @php the_row() @endphp
      <a target="_blank" class="link text-white mr-3" aria-label="{{ get_sub_field('members_links_title') . ' – ' . get_the_title() }}" href="{{the_sub_field('members_links_url')}}">{{the_sub_field('members_links_title')}}</a>
    @endwhile
  @endif

  @if (get_field('members_email'))
    <a class="link text-white mr-3" aria-label="{{ pll__('Email') . ' – ' . get_the_title() }}" href="mailto:{{ get_field('members_email') }}" target="_blank">{{ pll__( 'Email' ) }}</a>
  @endif

  @if (get_field('members_phone'))
    <a class="link text-white mr-3" aria-label="{{ pll__('Ring') . ' – ' . get_the_title() }}" href="tel:{{ get_field('members_phone') }}" target="_blank">{{ get_field('members_phone') }}</a>
  @endif

</article>
