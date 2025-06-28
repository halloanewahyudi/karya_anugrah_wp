<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package karya_anugrah
 */

 // get opion fields

$alamat     = get_option('kat_alamat');
$telepon    = get_option('kat_telepon');
$email      = get_option('kat_email');
$instagram  = get_option('kat_instagram');
$linkedin   = get_option('kat_linkedin');
$tokopedia  = get_option('kat_tokopedia');
?>


<footer id="colophon">

	<div id="footer" class="bg-gradient-to-b from-brand to-brand-900 text-brand-100 pt-16 pb-0 text-sm">
    <div class="container">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-6 lg:gap-10 ">
        <img src="/logo.png" alt="" class="w-20 lg:col-span-1">

        <div class="flex flex-col gap-4 lg:col-span-6">
          <h4 class="text-lg text-brand-100">Karya Anugrah Teknologi</h4>
          <div class="flex flex-col gap-2" v-if="settings">
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
              <div><a :href="mailto:<?php echo $email ?>"><?php echo $email ?></a></div>
            </span>
          </div>
        </div>

        <div class="flex flex-col gap-4 lg:col-span-3" >
          <h4 class="text-lg text-brand-100">Marketplace</h4>
          <ul class="flex flex-col gap-2">
            <li>
              <a href="<?php echo $tokopedia ?>" class="flex items-center gap-2">
               <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48"><!-- Icon from Arcticons by Donnnno - https://creativecommons.org/licenses/by-sa/4.0/ --><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M27.043 12.942c-3.43-2.897-16.85-2.247-16.85-2.247l-.473 32.65s17.855.134 23.353 0s9.341-4.508 9.4-7.878s0-24.18 0-24.18c-6.858-.829-11.942-.178-15.43 1.655"/><circle cx="19.531" cy="24.172" r="6.976" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M32.043 29.33a6.272 6.272 0 1 0-2.3-1.786m-19.55-16.849l-4.494 3.252L5.5 39.369l4.22 3.977m23.975-32.251a7.796 7.796 0 0 0-15.318-.299"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M34.396 19.662a2.36 2.36 0 0 1-3.878 2.59a4.194 4.194 0 1 0 3.878-2.59m-13.872.345a2.424 2.424 0 0 1-4.251 2.211a4.31 4.31 0 1 0 4.25-2.21m3.838 11.41c0-2.817 2.031-3.962 4.721-3.962c2.395 0 3.755 3.252 3.755 3.252a18.2 18.2 0 0 1-7.45 1.449a9.9 9.9 0 0 0 5.321 2.542s-.827.62-3.665.62c-2.306.001-2.682-2.453-2.682-3.902"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M30.317 31.569a10.4 10.4 0 0 1-.258 3.008"/></svg> Tokopedia
              </a>
            </li>
          </ul>
        </div>

        <div class="flex flex-col gap-4 lg:col-span-2" v-if="settings?.instagram || settings?.linkedin">
          <h4 class="text-lg text-brand-100">Social Media</h4>
          <ul class="flex flex-col gap-2">
            <li v-if="settings?.instagram">
              <a href="<?php echo $instagram ?>" class="flex items-center gap-2">
                <i class="bi bi-instagram"></i> Instagram
              </a>
            </li>
            <li v-if="settings?.linkedin">
              <a href="<?php  echo $linkedin ?>" class="flex items-center gap-2">
                <i class="bi bi-linkedin"></i> Linkedin
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="border-t border-dark3/30 py-5 text-xs mt-16 px-10 text-center">
      Copyright © 2025 | PT. Karya Anugrah Teknologi | All Rights Reserved . Powered by proweb
    </div>
  </div>

</footer><!-- #colophon -->
