@if (has_tag() && is_page())
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-3">
        <div class="tags mb-4">
          <h6>Emner</h6>
          @php the_tags('<h4><span class="sr-only">Se andet indhold om </span>', ', ', '</h4>') @endphp
        </div>
      </div>
    </div>
  </div>
@elseif(has_tag())
  <div class="tags mb-4">
    <h6>Emner</h6>
    @php the_tags('<h4><span class="sr-only">Se andet indhold om </span>', ', ', '</h4>') @endphp
  </div>
@endif
