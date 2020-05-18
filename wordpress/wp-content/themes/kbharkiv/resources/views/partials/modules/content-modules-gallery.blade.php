@php $images = get_sub_field('modules_gallery_images') @endphp

@if( $images )

  <section class="module module-gallery">
    <div class="container-fluid">
      <div class="module-inner">
        <div class="row">
          <div class="col-lg-7 offset-lg-1">
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
            <a href="#gallery-{{get_row_index()}}" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Forrige</span>
            </a>
            <a href="#gallery-{{get_row_index()}}" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Næste</span>
            </a>
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
              <button type="button" class="close" data-dismiss="modal" aria-label="Luk">
                <span aria-hidden="true">&times;</span>
              </button>
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
              <a href="#gallery-modal-gallery-{{get_row_index()}}" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Forrige</span>
              </a>
              <a href="#gallery-modal-gallery-{{get_row_index()}}" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Næste</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
