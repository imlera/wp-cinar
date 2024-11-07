(function ($) {
    $(document).ready(function () {
        $("button[data-action='load_more_driver_cars']").on('click', function () {
            let elem = $(this),
                offset = elem.data('offset');

            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    offset: offset,
                    action: elem.data('action'),
                    per_cnt: elem.data('per-cnt'),
                    page_id: elem.data('page-id'),
                },
                beforeSend: function () {
                    elem.text( elem.data('loading-state-text') );
                },
                success: function (msg) {
                    if ( msg )
                        elem.prev('.driver-cars__cards')
                            .find('.car-card:last-child')
                            .after(msg);

                    offset += elem.data('per-cnt');
                    if ( offset >= elem.data('limit') ) {
                        elem.remove();
                        return;
                    }

                    elem.data('offset', offset);
                    elem.text( elem.data('calm-state-text') );
                }
            });
        });
    });
}(jQuery));