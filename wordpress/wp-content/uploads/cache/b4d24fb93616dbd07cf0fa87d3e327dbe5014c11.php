<?php $images = get_sub_field('modules_gallery_images') ?>

<?php if( $images ): ?>

  <section class="module module-gallery" aria-label="Galleri">
    <div class="container-fluid">
      <div class="module-inner">
        <div class="row">
          <div class="col-lg-7 offset-lg-2">
            <div id="gallery-<?php echo e(get_row_index()); ?>" class="carousel slide">
              <ol class="carousel-indicators">
                <?php for($i = 0; $i < sizeof($images); $i++): ?>
                  <li data-target="#gallery-<?php echo e(get_row_index()); ?>" data-slide-to="<?php echo e($i); ?>" class="<?php echo e($i == 0 ? 'active' : ''); ?>"></li>
                <?php endfor; ?>
              </ol>
              <div class="carousel-inner">
                <?php for($i = 0; $i < sizeof($images); $i++): ?>
                  <a class="carousel-item<?php echo e($i == 0 ? ' active' : ''); ?>" role="button" data-description="#gallery-<?php echo e(get_row_index()); ?>-image-<?php echo e($i); ?>" data-toggle="modal" data-target="#gallery-modal-<?php echo e(get_row_index()); ?>">
                    <span class="sr-only">Åbn forstørret galleri</span>
                    <?php echo wp_get_attachment_image( $images[$i]['ID'], 'medium' ); ?>

                  </a>
                <?php endfor; ?>
              </div>
            </div>
          </div>

          <div class="col-lg-2">
            <div class="p-4 p-lg-0">
              <div class="my-5">
                <a class="btn-icon btn btn-outline-white mr-2" href="#gallery-<?php echo e(get_row_index()); ?>" role="button" data-slide="prev">
                  <?php echo $__env->make('partials.icon', ['icon' => 'arrow-left'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <span class="sr-only">Forrige</span>
                </a>
                <a class="btn-icon btn btn-outline-white mr-2" href="#gallery-<?php echo e(get_row_index()); ?>" role="button" data-slide="next">
                  <?php echo $__env->make('partials.icon', ['icon' => 'arrow-right'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <span class="sr-only">Næste</span>
                </a>
                <button class="btn-icon btn btn-outline-white float-right" type="button" data-toggle="modal" data-target="#gallery-modal-<?php echo e(get_row_index()); ?>">
                  <?php echo $__env->make('partials.icon', ['icon' => 'maximize-2'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <span class="sr-only">Åbn forstørret galleri</span>
                </button>
              </div>
              <div class="gallery-description" aria-hidden="true">
                <?php for($i = 0; $i < sizeof($images); $i++): ?>
                  <div id="gallery-<?php echo e(get_row_index()); ?>-image-<?php echo e($i); ?>" class="gallery-description-item<?php echo e($i == 0 ? ' active' : ''); ?>">
                    <?php if(!empty($images[$i]['caption'])): ?>
                      <h6>Billedetekst</h6>
                      <p class="small"><?php echo e($images[$i]['caption']); ?></p>
                    <?php endif; ?>
                  </div>
                <?php endfor; ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="modal fade gallery-modal" id="gallery-modal-<?php echo e(get_row_index()); ?>" tabindex="-1" role="dialog" aria-label="Forstørret galleri-visning" aria-hidden="true">
      <div class="modal-dialog container-fluid" role="document">
        <div class="modal-content">
          <div class="row">
            <div class="col-lg-9">
              <div id="gallery-modal-gallery-<?php echo e(get_row_index()); ?>" class="carousel slide">
                <ol class="carousel-indicators">
                  <?php for($i = 0; $i < sizeof($images); $i++): ?>
                    <li data-target="#gallery-modal-gallery-<?php echo e(get_row_index()); ?>" data-slide-to="<?php echo e($i); ?>" class="<?php echo e($i == 0 ? 'active' : ''); ?>"></li>
                  <?php endfor; ?>
                </ol>
                <div class="carousel-inner">
                  <?php for($i = 0; $i < sizeof($images); $i++): ?>
                    <div class="carousel-item<?php echo e($i == 0 ? ' active' : ''); ?>" data-description="#gallery-modal-<?php echo e(get_row_index()); ?>-image-<?php echo e($i); ?>">
                      <?php echo wp_get_attachment_image( $images[$i]['ID'], 'full' ); ?>

                    </div>
                  <?php endfor; ?>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="my-5">
                <a class="btn-icon btn btn-outline-white mr-2" href="#gallery-modal-gallery-<?php echo e(get_row_index()); ?>" role="button" data-slide="prev">
                  <?php echo $__env->make('partials.icon', ['icon' => 'arrow-left'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <span class="sr-only">Forrige</span>
                </a>
                <a class="btn-icon btn btn-outline-white mr-2" href="#gallery-modal-gallery-<?php echo e(get_row_index()); ?>" role="button" data-slide="next">
                  <?php echo $__env->make('partials.icon', ['icon' => 'arrow-right'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <span class="sr-only">Næste</span>
                </a>
                <button class="btn-icon btn btn-outline-white float-right" type="button" data-dismiss="modal" aria-label="Luk">
                  <?php echo $__env->make('partials.icon', ['icon' => 'x'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <span class="sr-only">Luk forstørret galleri</span>
                </button>
              </div>
              <div class="gallery-description" aria-hidden="true">
                <?php for($i = 0; $i < sizeof($images); $i++): ?>
                  <div id="gallery-modal-<?php echo e(get_row_index()); ?>-image-<?php echo e($i); ?>" class="gallery-description-item<?php echo e($i == 0 ? ' active' : ''); ?>">
                    <?php if(!empty($images[$i]['caption'])): ?>
                      <h6>Billedetekst</h6>
                      <p class="small"><?php echo e($images[$i]['caption']); ?></p>
                    <?php endif; ?>
                  </div>
                <?php endfor; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
