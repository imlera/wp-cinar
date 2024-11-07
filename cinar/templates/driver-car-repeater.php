<?php
$field_name = 'cars_with_drivers';
if ( ! $field_cnt = count( get_field( $field_name, false, false ) ) ) return;
?>

<div class="driver-card-repeater driver-cars container d-flex flex-column">
    <h2 class="driver-cars__header text-uppercase font-family-next-art font-size-36 line-height-48 font-weight-900">
        <span class="color-red">Цены на аренду</span>
        авто с водителем
    </h2>

    <div class="row driver-cars__cards">
        <?php
        $per_cnt = 8;
        $card_cnt = 0;
        while ( have_rows( 'cars_with_drivers' ) && $card_cnt < $per_cnt ):
	        the_row();
	        get_template_part( 'templates/driver', 'car-card' );

	        $card_cnt++;
        endwhile;
        ?>
    </div>

    <?php if ( $card_cnt === $per_cnt && $field_cnt > $per_cnt ): ?>
        <button data-action="load_more_driver_cars"
                data-page-id="<?= get_the_ID() ?>"
                data-limit="<?= $field_cnt ?>"
                data-offset="<?= $per_cnt ?>"
                data-per-cnt="<?= $per_cnt ?>"
                data-calm-state-text="Загрузить еще"
                data-loading-state-text="Загружаем..."
                class="driver-cars__btn text-center align-self-center margin-top-8 padding-top-20 padding-bottom-20 padding-left-48 padding-right-48 border-1 border-solid border-red border-radius-100">
            Загрузить еще
        </button>
    <?php endif; ?>
</div>

<?php
get_template_part( 'templates/driver', 'car-modal' );