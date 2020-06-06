<section class="module module-content">
  <div class="container-fluid">
    <div class="row">
      <div class="{{ get_sub_field('modules_content_fullwidth') ? 'col' : 'col-lg-8 col-xl-6 offset-lg-1 offset-xl-3' }}">
        @php the_sub_field('modules_content_wysiwyg') @endphp
      </div>
    </div>
  </div>
</section>
