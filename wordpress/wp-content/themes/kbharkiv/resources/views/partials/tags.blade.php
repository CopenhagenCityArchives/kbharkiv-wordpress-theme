@if (has_tag())
  @if(isset($container))
    <section class="module module-tags {{ isset($class) ? $class : '' }}">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-3">
            <h6>Emner</h6>
            @php the_tags('<h4><span class="sr-only">Se mere indhold om </span>', ', ', '</h4>') @endphp
          </div>
        </div>
      </div>
    </section>
  @else
    <h6>Emner</h6>
    @php the_tags('<h4><span class="sr-only">Se mere indhold om </span>', ', ', '</h4>') @endphp
  @endif
@endif
