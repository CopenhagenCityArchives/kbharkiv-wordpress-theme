<section class="module module-newsletter">
  <div class="container-fluid">
    {{ get_sub_field('modules_newsletter_headline') }}

    @php echo get_sub_field('modules_newsletter_copy') @endphp

    @if( get_sub_field('modules_newsletter_type') == 'true' )
      <form action="https://kbenhavns-kommune.clients.ubivox.com/handlers/post/" method="post">

        <input type="hidden" name="action" value="subscribe" />
        <input type="hidden" name="lists" value="69400" />

        <label for="email_address_id">E-mail-adresse</label>
        <input type="text" name="email_address" id="email_address_id" />

        <label for="data_Fulde Navn_id">Navn</label>
        <input type="text" name="data_Fulde Navn" id="data_Fulde Navn_id" />

        <input type="submit" value="Tilmeld" />

      </form>
    @else
      <form action="https://kbenhavns-kommune.clients.ubivox.com/handlers/post/" method="post">
        <input type="hidden" name="action" value="unsubscribe" />
        <input type="hidden" name="lists" value="69400" />

        <label for="email_address_id">E-mail-adresse</label>
        <input type="text" name="email_address" id="email_address_id" />

        <input type="submit" value="Frameld" />
      </form>
    @endif
  </div>
</section>
