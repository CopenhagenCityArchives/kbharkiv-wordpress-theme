<footer>
  <div class="container-fluid">
    <div class="row">
      @php dynamic_sidebar('sidebar-footer') @endphp

      <section class="ml-auto">
        @if(get_field('footer_address', 'option'))
          <address>
            <h4>{{get_bloginfo()}}</h4>
            {{ the_field('footer_address', 'option') }}
          </address>
        @endif

        <dl class="row small">
          @if( get_field('footer_email', 'option') )
            <dt class="col-3 col-lg-2 no-hyphens">Email</dt>
            <dd class="col-9"><a class="text-break" aria-label="Email {!! get_bloginfo() !!}" href="mailto:{{get_field('footer_email', 'option')}}" target="_blank">{{get_field('footer_email', 'option')}}</a></dd>
          @endif
          @if( get_field('footer_phone', 'option') )
            <dt class="col-3 col-lg-2 no-hyphens">Telefon</dt>
            <dd class="col-9"><a class="text-break" aria-label="Ring til {!! get_bloginfo() !!}" href="tel:{{get_field('footer_phone', 'option')}}" target="_blank">{{get_field('footer_phone', 'option')}}</a></dd>
          @endif
        </dl>

        <h4>Åbningstider</h4>
        {{ the_field('footer_hours', 'option') }}

        <img class="kk-logo" src="@asset('images/kk-logo.svg')" role="presentation" alt="København Kommune" />

      </section>
    </div>

  </div>
</footer>
