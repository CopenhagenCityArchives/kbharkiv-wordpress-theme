<time class="updated mr-3" datetime="{{ get_post_time('c', true) }}">{{ get_the_date(pll__( 'j. M Y' )) }}</time>

@php
  $wordCount = str_word_count(strip_tags($post->post_content));
  $wordsPerMinute = 200;
  $readingTimeInMinutes = ceil($wordCount / $wordsPerMinute);
@endphp

<span class="light">{{$readingTimeInMinutes == 1 ? pll__( 'Et minut' ) : $readingTimeInMinutes . ' ' . pll__( 'minutter' )}}</span>
