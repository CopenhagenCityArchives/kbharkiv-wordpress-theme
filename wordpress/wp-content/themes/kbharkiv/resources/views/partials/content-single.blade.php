<article @php post_class() @endphp>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-3">

        <header>
          <h1 class="entry-title">{!! get_the_title() !!}</h1>
          @includeWhen(is_single() && 'post' == get_post_type(), 'partials/entry-meta')
        </header>
        <div class="entry-content">
          @php the_content() @endphp
        </div>

        {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
        {{-- @php comments_template('/partials/comments.blade.php') @endphp --}}
      </div>
    </div>
  </div>

</article>
