<section class="module module-newsletter theme-{{ get_sub_field('modules_newsletter_theme') }}">
  <div class="container-fluid">

    @include('partials.modules-header')

    <div class="row">
      @if(get_sub_field('modules_newsletter_type') == 'true')
        <div class="col-12">
          <h4>{{ pll__('Tilmeld') }}</h4>
        </div>
        <div class="col-lg-6 col-xl-5">
          @php echo get_sub_field('modules_newsletter_copy') @endphp
        </div>
        <div class="col-lg-6 col-xl-4 offset-xl-1">
          <form action="https://link-lives.uxmail.io/handlers/post/" target="_blank" method="post">

            <input type="hidden" name="action" value="subscribe" />
            <input type="hidden" name="lists" value="59269" />

            <div class="form-group">
              <label for="email_address_id">{{ pll__('Email') }}</label>
              <input type="email" class="form-control" name="email_address" id="email_address_id" placeholder="{{ pll__('Skriv din email') }}" required>
            </div>

            <div class="form-group">
              <label for="data_Navn_id">{{ pll__('Navn') }}</label>
              <input type="text" class="form-control" name="data_Navn" id="data_Navn_id" placeholder="{{ pll__('Skriv dit navn') }}" required>
            </div>

            <input class="btn btn-primary mt-2" type="submit" value="{{ pll__('Tilmeld') }}" />

          </form>
        </div>
      @else
        <div class="col-12">
          <h4>{{ pll__('Afmeld') }}</h4>
        </div>
        <div class="col-lg-6 col-xl-5">
          @php echo get_sub_field('modules_newsletter_copy') @endphp
        </div>
        <div class="col-lg-6 col-xl-4 offset-xl-1">

          <form action="https://link-lives.uxmail.io/handlers/post/" target="_blank" method="post">
            <input type="hidden" name="action" value="unsubscribe" />
            <input type="hidden" name="lists" value="59269" />

            <div class="form-group">
              <label for="email_address_unsubscribe_id">{{ pll__('Email') }}</label>
              <input type="email" class="form-control" name="email_address" id="email_address_unsubscribe_id" placeholder="{{ pll__('Skriv din email') }}" required>
            </div>

            <input class="btn btn-primary mt-2" type="submit" value="{{ pll__('Frameld') }}" />

          </form>
        </div>

      @endif
    </div>
  </div>
</section>
