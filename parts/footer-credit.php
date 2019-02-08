<?php
/**
 * Template part for displaying theme credit.
 *
 * @package iWrite
 */

 
// do_action('footer_credit', 'iwrite_credit');
?>

<p>
    &copy; <a href="<?php echo site_url();?>"><?php echo get_bloginfo('name');?></a>
    powered by <a href="https://git.iotech.co.th/iotech/iwrite"><?php do_action( 'footer_credit_name' );?></a>
</p>