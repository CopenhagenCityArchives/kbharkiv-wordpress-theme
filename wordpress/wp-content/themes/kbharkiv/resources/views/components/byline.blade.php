@php
  $headline = isset($headline) ? $headline : 'h6';
  $id = isset($id) ? $id : get_the_ID();
@endphp

<div class="byline align-items-top {{isset($flex) ? $flex : 'd-flex'}}">

  @include('components.profile-image', ['id' => $id, 'class' => 'mr-3'])

  <div class="d-flex flex-column">
    <div class="light">
      {{ get_field('members_title', $id) ? get_field('members_title', $id) : pll__('Medlem') }}
    </div>

    <{{$headline}}>{{ get_the_title( $id ) }}</{{$headline}}>
  </div>

</div>
