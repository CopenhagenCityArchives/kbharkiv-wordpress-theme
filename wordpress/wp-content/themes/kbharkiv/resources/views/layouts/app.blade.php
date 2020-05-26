<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp

    @include('partials.header')
    <div class="wrap{{is_page_template('views/template-searchsdk.blade.php') ? '' : '' }}" role="document">
      <div id="content">
        <main class="main">
          @yield('content')
        </main>
        {{-- @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif --}}
      </div>
    </div>

    <button class="btn btn-primary chat-btn" type="button" name="button">
      <span class="sr-only">Chat</span>
      @include('partials.icon', ['icon' => 'message-square'])
    </button>

    {{-- @if (isset($_POST['submit']))
      @php
      $navn = $_POST['navn'];
      $spm = $_POST['spm'];
      $spm = preg_replace("/\r|\n/", "", $spm);
      header("Location:https://kbharkiv.kk.dk/api/start_session?issue_menu=1&codeName=stadsarkiv&c2cjs=1&customer.name='.$navn.'&customer.details='$spm'");
      @endphp
    @endif

    <form target="_blank" action="{{the_permalink()}}" method="post" id="chat">
      <input type="text" name="navn" value="Indtast navn" maxlength="100"><br>
      <textarea name="spm" maxlength="1024">Indtast spørgsmål

      </textarea>
      <br>
      <input id="chatsubmit" type="submit" value="Chat" name="submit"><br>
    </form> --}}

    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
