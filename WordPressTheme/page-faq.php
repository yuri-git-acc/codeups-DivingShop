<?php get_header() ?>
<?php get_template_part('template-parts/fv'); ?>

<main>
    <!-- faq --------------------------------- -->
    <div class="faq layout-faq sub-page-fish">
        <div class="faq__inner inner">
            <?php
            $faqs = SCF::get('faq-set');
            if (!empty($faqs)) :
            ?>
                <ul class="faq__accordion-list accordion-list">
                    <?php foreach ($faqs as $index => $faq) :
                        $question = $faq['faq-question'];
                        $answer = $faq['faq-answer'];
                        $id = 'accordion' . ($index + 1);
                    ?>
                        <li class="accordion-list__item accordion">
                            <h2 class="accordion__title">
                                <button class="accordion__header js-accordion-title" aria-expanded="false"
                                    aria-controls="<?php echo esc_attr($id); ?>" type="button">
                                    <?php echo esc_html(trim($question)); ?>
                                </button>
                            </h2>
                            <div class="accordion__content js-accordion-content" aria-hidden="true" id="<?php echo esc_attr($id); ?>">
                                <p class="accordion__text">
                                    <?php echo nl2br(esc_html($answer)); ?>
                                </p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>