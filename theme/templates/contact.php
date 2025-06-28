<?php
/* Template Name: Contact */
get_header();

$contact_content = get_field('contact_content');
$form_description = get_field('form_description');

$alamat     = get_option('kat_alamat');
$telepon    = get_option('kat_telepon');
$email      = get_option('kat_email');
$instagram  = get_option('kat_instagram');
$linkedin   = get_option('kat_linkedin');
$tokopedia  = get_option('kat_tokopedia');
?>
<div class="grid grid-cols-1 md:grid-cols-2 bg-brand-50 min-h-screen ">
    <!-- Left Side -->
    <div class="flex flex-col justify-center">
        <div class="p-6 lg:p-10 flex flex-col justify-center items-center">
            <div class="max-w-[400px] w-full mx-auto">
                <div class="mb-6">
                    <h2 class="  text-4xl font-bold "> <?php the_title(); ?> </h2>
                    <div><?php echo $contact_content; ?></div>
                </div>
                <div class="flex flex-col gap-4 lg:col-span-6 ">
                    <h4 class="text-lg">Karya Anugrah Teknologi</h4>
                    <div class="flex flex-col gap-2">
                        <span class="flex gap-2">
                            <i class="bi bi-geo-alt-fill"></i>
                            <div>
                                <?php // wp html echo
                                echo $alamat ?>
                            </div>
                        </span>
                        <span class="flex items-center gap-2" v-if="settings?.telepon">
                           <i class="bi bi-telephone-fill"></i>
                            <div><?php echo $telepon ?></div>
                        </span>
                        <span class="flex items-center gap-2" v-if="settings?.email">
                           <i class="bi bi-envelope"></i>
                            <div><a :href="`mailto:${settings.email}`"><?php echo $email ?></a></div>
                        </span>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Right Side (Form) -->
    <div
        class="min-h-screen p-6 lg:p-10 flex flex-col justify-center items-center  bg-no-repeat bg-cover bg-center" style="background:url('<?php the_post_thumbnail_url('full'); ?>')">
        <div class="max-w-[460px] w-full mx-auto bg-white/90 rounded-lg border border-brand-100 p-6 lg:p-10">
            <h4><?php echo $form_description['title']; ?></h4>
            <p><?php echo $form_description['description']; ?></p>
            <div class="mt-5">
                <?php echo do_shortcode('[contact-form-7 id="e370b33" title="Contact form 1"]'); ?>
            </div>
        </div>
    </div>
</div>
</div>

<?php get_footer(); ?>