<?php get_header() ?>
<?php get_template_part('template-parts/fv'); ?>

<main>
    <!-- price --------------------------------- -->
    <div class="price layout-price sub-page-fish">
        <div class="price__inner inner">
            <div class="price__list price-list">
                <?php
                $price_title = SCF::get('price-title01');
                $price_set = SCF::get('price-set01');

                if ($price_title) :
                ?>
                    <div class="price-list__item price-item" id="license">
                        <h2 class="price-item__title"><?php echo esc_html($price_title); ?></h2>
                        <table class="price-item__list" aria-label="<?php echo esc_attr($price_title); ?>の料金表">
                            <?php if (!empty($price_set)) : ?>
                                <?php foreach ($price_set as $set) : ?>
                                    <tr class="price-item__row">
                                        <th class="price-item__head">
                                            <?php echo nl2br(esc_html($set['price-name01'])); ?>
                                        </th>
                                        <td class="price-item__date">
                                            ¥<?php echo number_format($set['price-main01']); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                <?php endif; ?>

                <?php
                $price_title = SCF::get('price-title02');
                $price_set = SCF::get('price-set02');

                if ($price_title) :
                ?>
                    <div class="price-list__item price-item" id="experience">
                        <h2 class="price-item__title"><?php echo esc_html($price_title); ?></h2>
                        <table class="price-item__list" aria-label="<?php echo esc_attr($price_title); ?>の料金表">
                            <?php if (!empty($price_set)) : ?>
                                <?php foreach ($price_set as $set) : ?>
                                    <tr class="price-item__row">
                                        <th class="price-item__head">
                                            <?php echo nl2br(esc_html($set['price-name02'])); ?>
                                        </th>
                                        <td class="price-item__date">
                                            ¥<?php echo number_format($set['price-main02']); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                <?php endif; ?>

                <?php
                $price_title = SCF::get('price-title03');
                $price_set = SCF::get('price-set03');

                if ($price_title) :
                ?>
                    <div class="price-list__item price-item" id="fundiving">
                        <h2 class="price-item__title"><?php echo esc_html($price_title); ?></h2>
                        <table class="price-item__list" aria-label="<?php echo esc_attr($price_title); ?>の料金表">
                            <?php if (!empty($price_set)) : ?>
                                <?php foreach ($price_set as $set) : ?>
                                    <tr class="price-item__row">
                                        <th class="price-item__head">
                                            <?php echo nl2br(esc_html($set['price-name03'])); ?>
                                        </th>
                                        <td class="price-item__date">
                                            ¥<?php echo number_format($set['price-main03']); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                <?php endif; ?>

                <?php
                $price_title = SCF::get('price-title04');
                $price_set = SCF::get('price-set04');

                if ($price_title) :
                ?>
                    <div class="price-list__item price-item">
                        <h2 class="price-item__title"><?php echo esc_html($price_title); ?></h2>
                        <table class="price-item__list" aria-label="<?php echo esc_attr($price_title); ?>の料金表">
                            <?php if (!empty($price_set)) : ?>
                                <?php foreach ($price_set as $set) : ?>
                                    <tr class="price-item__row">
                                        <th class="price-item__head">
                                            <?php echo nl2br(esc_html($set['price-name04'])); ?>
                                        </th>
                                        <td class="price-item__date">
                                            ¥<?php echo number_format($set['price-main04']); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>