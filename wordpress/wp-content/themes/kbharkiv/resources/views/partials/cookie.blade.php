@if (get_field('cookie_copy', 'options') && get_field('cookie_btn', 'options'))
  <section class="module full-width cookie d-none">
    <div class="container-fluid">
      <div class="d-flex flex-column flex-lg-row align-items-center">
        <div class="icon-wrapper">
          @include('components.icon', ['icon' => 'check-circle', 'class' => ''])
        </div>
        <div>
          @php the_field('cookie_copy_' . pll_current_language('slug'), 'options') @endphp
        </div>
        <button id="accept" class="btn btn-primary ml-auto flex-grow-0">{{ get_field('cookie_btn_' . pll_current_language('slug'), 'options') }}</button>
      </div>
    </div>
  </section>
@endif
