<?php
$section_two = get_field('section_two');
if ($section_two):
?>
    <section class="mb-20 text-center">
        <div class="max-w-screen-lg mx-auto px-6">
            <h2 class="text-center mb-5  text-4xl font-bold "> <?php echo $section_two['title']; ?> </h2>
            <div><?php echo $section_two['description']; ?> </div>
        </div>
    </section>
<?php endif; ?>