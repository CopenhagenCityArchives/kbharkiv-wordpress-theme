@php $images = get_sub_field('modules_gallery_images') @endphp

@if( $images )

  <section class="module module-gallery">
    <div class="container-fluid">
      <div class="module-inner">
        <div class="row">
          <div class="col-lg-7 offset-lg-2">
            <div id="gallery-{{get_row_index()}}" class="carousel slide">
              <ol class="carousel-indicators">
                @for($i = 0; $i < sizeof($images); $i++)
                  <li data-target="#gallery-{{get_row_index()}}" data-slide-to="{{$i}}" class="{{$i == 0 ? 'active' : ''}}"></li>
                @endfor
              </ol>
              <div class="carousel-inner">
                @for($i = 0; $i < sizeof($images); $i++)
                  <a class="carousel-item{{$i == 0 ? ' active' : ''}}" role="button" data-description="#gallery-{{get_row_index()}}-image-{{$i}}" data-toggle="modal" data-target="#gallery-modal-{{get_row_index()}}">
                    {!! wp_get_attachment_image( $images[$i]['ID'], 'medium' ) !!}
                  </a>
                @endfor
              </div>
            </div>
          </div>

          <div class="col-lg-2">
            <div class="p-4 p-lg-0">
              <div class="my-5">
                <a class="btn-icon btn btn-outline-white mr-2" href="#gallery-{{get_row_index()}}" role="button" data-slide="prev">
                  @include('partials.icon', ['icon' => 'arrow-left'])
                  <span class="sr-only">Forrige</span>
                </a>
                <a class="btn-icon btn btn-outline-white mr-2" href="#gallery-{{get_row_index()}}" role="button" data-slide="next">
                  @include('partials.icon', ['icon' => 'arrow-right'])
                  <span class="sr-only">Næste</span>
                </a>
                <button class="btn-icon btn btn-outline-white float-right" type="button" data-toggle="modal" data-target="#gallery-modal-{{get_row_index()}}">
                  @include('partials.icon', ['icon' => 'maximize-2'])
                  <span class="sr-only">Åbn forstørret galleri</span>
                </button>
              </div>
              <div class="gallery-description" aria-hidden="true">
                @for($i = 0; $i < sizeof($images); $i++)
                  <div id="gallery-{{get_row_index()}}-image-{{$i}}" class="gallery-description-item{{$i == 0 ? ' active' : ''}}">
                    @if(!empty($images[$i]['alt']))
                      <h6>Billedetekst</h6>
                      <p class="small">{{ $images[$i]['alt'] }}</p>
                    @endif
                    @if(!empty($images[$i]['description']))
                      <h6>Foto</h6>
                      <p class="small">{{ $images[$i]['description'] }}</p>
                    @endif
                  </div>
                @endfor
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="modal fade gallery-modal" id="gallery-modal-{{get_row_index()}}" tabindex="-1" role="dialog" aria-label="Forstørret galleri-visning" aria-hidden="true">
      <div class="modal-dialog container-fluid" role="document">
        <div class="modal-content">
          <div class="row">
            <div class="col-lg-9">
              <div id="gallery-modal-gallery-{{get_row_index()}}" class="carousel slide">
                <ol class="carousel-indicators">
                  @for($i = 0; $i < sizeof($images); $i++)
                    <li data-target="#gallery-modal-gallery-{{get_row_index()}}" data-slide-to="{{$i}}" class="{{$i == 0 ? 'active' : ''}}"></li>
                  @endfor
                </ol>
                <div class="carousel-inner">
                  @for($i = 0; $i < sizeof($images); $i++)
                    <div class="carousel-item{{$i == 0 ? ' active' : ''}}" data-description="#gallery-modal-{{get_row_index()}}-image-{{$i}}">
                      {!! wp_get_attachment_image( $images[$i]['ID'], 'full' ) !!}
                    </div>
                  @endfor
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="my-5">
                <a class="btn-icon btn btn-outline-white mr-2" href="#gallery-modal-gallery-{{get_row_index()}}" role="button" data-slide="prev">
                  @include('partials.icon', ['icon' => 'arrow-left'])
                  <span class="sr-only">Forrige</span>
                </a>
                <a class="btn-icon btn btn-outline-white mr-2" href="#gallery-modal-gallery-{{get_row_index()}}" role="button" data-slide="next">
                  @include('partials.icon', ['icon' => 'arrow-right'])
                  <span class="sr-only">Næste</span>
                </a>
                <button class="btn-icon btn btn-outline-white float-right" type="button" data-dismiss="modal" aria-label="Luk">
                  @include('partials.icon', ['icon' => 'x'])
                  <span class="sr-only">Luk forstørret galleri</span>
                </button>
              </div>
              <div class="gallery-description" aria-hidden="true">
                @for($i = 0; $i < sizeof($images); $i++)
                  <div id="gallery-modal-{{get_row_index()}}-image-{{$i}}" class="gallery-description-item{{$i == 0 ? ' active' : ''}}">
                    @if(!empty($images[$i]['alt']))
                      <h6>Billedetekst</h6>
                      <p class="small">{{ $images[$i]['alt'] }}</p>
                    @endif
                    @if(!empty($images[$i]['description']))
                      <h6>Foto</h6>
                      <p class="small">{{ $images[$i]['description'] }}</p>
                    @endif
                  </div>
                @endfor
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
