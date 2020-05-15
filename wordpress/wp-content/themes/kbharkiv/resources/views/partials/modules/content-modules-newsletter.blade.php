<section class="module module-newsletter">
  <div class="container-fluid">
    {{ get_sub_field('modules_newsletter_headline') }}

    @php echo get_sub_field('modules_newsletter_copy') @endphp

    @if( get_sub_field('modules_newsletter_type') == 'true' )
      <form action="https://kbenhavns-kommune.clients.ubivox.com/handlers/post/" method="post">

        <input type="hidden" name="action" value="subscribe" />
        <input type="hidden" name="lists" value="69400" />

        <p>
          <label for="email_address_id">E-mail-adresse</label>
          <input type="text" name="email_address" id="email_address_id" />
        </p>

        <p>
          <label for="data_E-mail_id">E-mail</label>
          <input type="text" name="data_E-mail" id="data_E-mail_id" />
        </p>

        <p>
          <label for="data_Fulde Navn_id">Navn</label>
          <input type="text" name="data_Fulde Navn" id="data_Fulde Navn_id" />
        </p>

        <p>
          <input type="submit" value="Tilmeld" />
        </p>

      </form>
    @else
      <form action="https://kbenhavns-kommune.clients.ubivox.com/handlers/post/" method="post">
        <input type="hidden" name="action" value="unsubscribe" />
        <input type="hidden" name="lists" value="69400" />

        <p>
          <label for="email_address_id">E-mail-adresse</label>
          <input type="text" name="email_address" id="email_address_id" />
        </p>

        <p>
          <input type="submit" value="Frameld" />
        </p>

      </form>
    @endif
  </div>
</section>
