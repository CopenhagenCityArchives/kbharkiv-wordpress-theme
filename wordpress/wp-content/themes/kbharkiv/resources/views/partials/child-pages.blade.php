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
    <section class="child-pages">
      <div class="container-fluid">
        <div class="row">
          {{ wp_list_pages($args) }}
        </div>
      </div>
    </section>
  @endif
@endif
