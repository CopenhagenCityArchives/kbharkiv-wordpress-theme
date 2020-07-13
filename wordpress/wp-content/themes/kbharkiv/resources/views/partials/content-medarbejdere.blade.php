<div class="col-sm-6 col-md-4 col-lg-6">
  <article @php post_class() @endphp aria-label="{{ get_the_title() }}">
    <div class="row">
      <div class="col-4 col-sm-12 col-lg-4">
        @if ( has_post_thumbnail())
          @php the_post_thumbnail( 'profilex2', ['class' => 'profile-image'] ); @endphp
        @else
          Billede kommer snart
        @endif
      </div>
      <div class="col-8 col-sm-12 col-lg-8">
        @if (get_field('employee_title'))
          <h6>{{get_field('employee_title')}}</h6>
        @endif
        <header>
          <h3 class="entry-title">{!! get_the_title() !!}</h3>
        </header>
        <div class="entry-summary small">
          @php the_excerpt() @endphp
        </div>

        <dl class="row small">
          @if( get_field('employee_email') )
            <dt class="col-3 col-lg-2">Email</dt>
            <dd class="col-9"><a class="text-break" aria-label="Email {!! get_the_title() !!}" href="mailto:{{get_field('employee_email')}}" target="_blank">{{get_field('employee_email')}}</a></dd>
          @endif
          @if( get_field('employee_phone') )
            <dt class="col-3 col-lg-2">Mobil</dt>
            <dd class="col-9"><a class="text-break" aria-label="Ring til {!! get_the_title() !!}" href="tel:{{get_field('employee_phone')}}" target="_blank">{{get_field('employee_phone')}}</a></dd>
          @endif
        </dl>
      </div>
    </div>
  </article>
</div>
