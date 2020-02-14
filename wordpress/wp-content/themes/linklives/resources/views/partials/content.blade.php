<article @php post_class('col-md-6 col-lg-4 col-xl-3') @endphp  id="{{ get_post_field( 'post_name' ) }}">
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    @include('partials/entry-meta')
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article>
