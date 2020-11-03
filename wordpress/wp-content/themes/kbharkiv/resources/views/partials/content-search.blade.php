@php
  $employee = get_post_type() === 'medarbejdere';
  $class_wrapper = 'col-sm-6 col-md-4 col-lg-3';
  $class_col1 = 'col-4 col-sm-12';
  $class_col2 = 'col-8 col-sm-12';
@endphp

@if ($employee)
  @include('partials.content-medarbejdere', ['wrapper' => $class_wrapper, 'col1' => $class_col1, 'col2' => $class_col2])
@else
<a href="{{ get_permalink() }}" class="article-link d-sm-flex align-self-stretch {{ $class_wrapper }}">
  <article @php post_class('content-search') @endphp>

    @if ( has_post_thumbnail())
      @php the_post_thumbnail( 'herox2' ) @endphp
    @endif

    <header>
      @include('partials/entry-meta')
      <h3 class="entry-title">{!! get_the_title() !!}</h3>
    </header>
    <div class="entry-summary">
      {{ get_the_lead(get_the_id()) }}

      @if ($employee)
        hej
      @endif

    </div>

  </article>
</a>
@endif

<div class="d-none d-lg-block col-lg-1"></div>
