@php
  $posts = get_sub_field('modules_grid_content');
  global $post;
@endphp

<section class="module module-grid theme-{{ get_sub_field('modules_grid_theme') }}">
  <div class="container-fluid">

    @if( $posts )

      <div class="row row-eq-height justify-content-center">
        <div class="col-12">
          <header class="d-flex justify-content-center mb-5">
            <h2 class="handwritten mr-3">{{ get_sub_field('modules_grid_handwriting') ?: get_sub_field('modules_grid_handwriting')}}</h2>
            <h2>{{ get_sub_field('modules_grid_headline') ?: get_sub_field('modules_grid_headline') }}</h2>
          </header>
        </div>

    	  @foreach( $posts as $post )
          @php setup_postdata($post) @endphp
          <a {{ post_class('col-md-6 col-xl-3 mb-5 mb-xl-0 post-type') }} href="{{ get_permalink() }}">
            <article aria-label="{{ get_post_type_object(get_post_type())->labels->singular_name . ' – ' . get_the_title() }}">

              @include('components.thumbnail')

              <header>
                <h5>{{ get_the_title() }}</h5>
              </header>

            </article>
          </a>
    	  @endforeach

        @php wp_reset_postdata() @endphp

      </div>
    @endif
  </div>
</section>
