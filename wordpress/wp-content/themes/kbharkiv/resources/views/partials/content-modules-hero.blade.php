@php
  $images = get_sub_field('modules_hero_images');
  $image = $images[rand(0, count($images)-1)];
@endphp

<section class="module module-hero theme-yellow full-width">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-5 offset-lg-1 offset-xl-2 order-lg-2">
        <figure class="keyvisual" style="background-image: url({{$image['sizes']['large']}})">
          <img class="date from-date" role="presentation" alt="{{-- left blank because the image doesn’t add information to the page --}}" src="@asset('images/keyvisual-from-date.svg')">
          <img class="date to-date" role="presentation" alt="{{-- left blank because the image doesn’t add information to the page --}}" src="@asset('images/keyvisual-to-date.svg')">
        </figure>
      </div>
      <div class="col-lg-6 col-xl-5 align-self-center">
        <h1 class="display-3">{{ get_sub_field('modules_hero_headline') }}</h1>
        <p class="lead">{{ get_sub_field('modules_hero_copy') }}</p>
        <a class="btn btn-warning btn-lg" href="{{ get_sub_field('modules_hero_link') }}">{{ get_sub_field('modules_hero_btn') }} @include('components.icon', ['icon' => 'arrow-right', 'class' => 'right'])</a>
      </div>
    </div>
  </div>
</section>
