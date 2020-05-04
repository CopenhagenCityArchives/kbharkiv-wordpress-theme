<div data-sdk-app>
  <h2>{{ get_sub_field('modules_sdkkildetaster_headline_1') }}</h2>
  <task-status task-id="{{ get_sub_field('modules_sdkkildetaster_id') }}"></task-status>
  <task-progress-plot task-id="{{ get_sub_field('modules_sdkkildetaster_id') }}" legend="true" year-pattern="_s(_d_d_d_d)"></task-progress-plot>
  <h2>{{ get_sub_field('modules_sdkkildetaster_headline_2') }}</h2>
  <taskunits-list task-id="{{ get_sub_field('modules_sdkkildetaster_id') }}"></taskunits-list>
</div>
