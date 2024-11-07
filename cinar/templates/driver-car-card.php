<div class="driver-cars__cards__item car-card col-lg-3 col-md-4 margin-bottom-40">
    <div class="car-card__content content border-radius-20">
        <div class="content__img">
            <?php $ar_img = get_sub_field( 'image' ) ?>
            <img class="w-100 h-100 object-fit-cover border-radius-20"
                 src="<?= $ar_img['url'] ?>"
                 alt="<?= $ar_img['alt'] ?>"
                 loading="lazy">
        </div>

        <h3 class="content__title d-flex flex-column gap-10 font-size-18 line-height-24 font-weight-700 padding-top-24 padding-left-24 padding-right-24">
		    <?= get_sub_field( 'title' ) ?>
        </h3>

	    <?php $ar_price_var_names = [ 'rent_price', 'business_price', 'transfer_price', 'wedding_price' ] ?>
        <div class="content__price-vars price-vars margin-top-20">
	        <?php foreach ( $ar_price_var_names as $name ): ?>
                <div class="price-vars__item price-var d-flex flex-row justify-content-between padding-left-24 padding-right-24">
                    <p class="price-var__label color-silver font-size-15">
		                <?= get_sub_field_object( $name )['label'] ?>
                    </p>
                    <p class="price-var__value color-silver font-size-15">
		                <?= get_sub_field( $name ) ?>
                    </p>
                </div>
	        <?php endforeach; ?>
        </div>

        <div class="content__min-price price-var d-flex flex-row justify-content-between padding-top-24 padding-left-24 padding-right-24 padding-bottom-24">
            <p class="price-var__label color-silver font-size-16">
		        <?= get_sub_field_object('min_price')['label'] ?>
            </p>
            <p class="price-var__icon d-flex gap-6 color-red font-size-16 font-weight-700">
                <img src="<?= roots_get_icon_uri('clock.svg') ?>" alt="Иконка">
                2+1
            </p>
            <p class="price-var__value font-size-16 font-weight-700">
		        <?= get_sub_field('min_price') ?>
            </p>
        </div>
    </div>

    <button data-bs-toggle="modal"
            data-bs-target="#driverCarRequestModal"
            class="car-card__btn w-100 margin-top-24 padding-20 background-color-red border-radius-100 color-white text-center font-weight-700 font-size-16 line-height-24">
        Заказать транспорт
    </button>
</div>