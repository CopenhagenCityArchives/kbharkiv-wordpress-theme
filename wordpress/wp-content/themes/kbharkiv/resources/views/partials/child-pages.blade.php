@if( get_field('childpages') == true )
  @php
    $args = [
      'child_of' => $post->ID,
      'depth' => 2,
      'title_li' => '',
      'walker' => new Kbharkiv_Walker_Nav_Children
    ];
    $child_pages = get_pages( $args )
  @endphp

  @if(!empty($child_pages))
    <section class="module module-child-pages">
      <div class="container-fluid">
        <span class="sr-only">Undersider</span>
        <div class="row">
          {{ wp_list_pages($args) }}
        </div>
      </div>
    </section>
  @endif
@endif
