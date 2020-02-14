@php
  $tags = get_tags(array(
    'orderby' => 'count',
    'order' => 'DESC'
  ))
@endphp

@if ($tags)
  <div class="tags-filter">
    <div class="container-fluid">

      <button id="tags-filter-close" class="btn btn-outline-secondary float-right" tabindex="-1" aria-label="{{ pll__('Luk emner') }}" aria-haspopup="true" aria-expanded="false">{{ pll__('Luk') }} @include('components.icon', ['icon' => 'x'])</button>

      <div class="d-md-flex">
        <div class="breadcrumbs">
          <div class="link">{{ pll__('Nyheder') }}</div>
          <ul id="tags" class="current list-unstyled" role="menu" aria-labelledby="tags-filter-open">
            @foreach($tags as $tag)
              <li role="none">
                <a class="d-flex align-items-center" role="menuitem" tabindex="-1" href="{{get_tag_link($tag->term_id)}}">
                  <div class="h1 display-4">{{$tag->name}}</div>
                  <p>{{$tag->count == 1 ? $tag->count . ' ' . pll__('nyhed') : $tag->count . ' ' . pll__('nyheder') }}</p>
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>

    </div>
  </div>
@endif
