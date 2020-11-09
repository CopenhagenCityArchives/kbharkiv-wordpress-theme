<section class="module module-newsletter" aria-label="{{ get_sub_field('modules_newsletter_type') == 'true' ? 'Tilmeld nyhedsbrev' : 'Afmeld nyhedsbrev'}}">
  <div class="container-fluid">
    <div class="module-inner darken-on-scroll" style="background-color: {{ get_theme_color() }}">

      <div class="row">
        <div class="col-lg-6 col-xl-5">
          <h3>{{ get_sub_field('modules_newsletter_headline') }}</h3>

          {!! get_sub_field('modules_newsletter_copy') !!}
        </div>

        @if( get_sub_field('modules_newsletter_type') == 'true' )
          <div class="col-lg-6 col-xl-4 offset-xl-1">

            <form action="https://kbenhavns-kommune.clients.ubivox.com/handlers/post/" method="post">
              <input type="hidden" name="action" value="subscribe" />
              <input type="hidden" name="lists" value="69400" />

              <div class="form-group">
                <label for="subscribe_email">E-mail</label>
                <input type="email" autocomplete="email" class="form-control" name="email_address" id="subscribe_email" placeholder="Indtast e-mail">
              </div>
              <div class="form-group">
                <label for="subscribe_name">Navn</label>
                <input type="text" autocomplete="name" class="form-control" name="data_Fulde Navn" id="subscribe_name" placeholder="Indtast navn">
              </div>
              <button type="submit" class="btn btn-primary">Tilmeld</button>
            </form>
          </div>

        @else

          <div class="col-lg-6 col-xl-4 offset-xl-1">

            <form action="https://kbenhavns-kommune.clients.ubivox.com/handlers/post/" method="post">
              <input type="hidden" name="action" value="unsubscribe" />
              <input type="hidden" name="lists" value="69400" />

              <div class="form-group">
                <label for="unsubscribe_email">E-mail</label>
                <input type="email" autocomplete="email" class="form-control" name="email_address" id="unsubscribe_email" placeholder="Indtast e-mail">
              </div>
              <button type="submit" class="btn btn-primary">Afmeld</button>
            </form>
          </div>
        @endif
      </div>
    </div>
  </div>
</section>
