<section class="module module-newsletter">
  <div class="container-fluid">
    {{ get_sub_field('modules_newsletter_headline') }}

    @php echo get_sub_field('modules_newsletter_copy') @endphp

    @if( get_sub_field('modules_newsletter_type') == 'true' )
      Tilmeld
    @else
      Afmeld
    @endif
  </div>
</section>
