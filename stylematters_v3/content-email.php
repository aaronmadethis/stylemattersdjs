<?php
   //$From_name = 'From: Aaron Pedersen <aaron@c2ak.com>';
   add_filter( 'wp_mail_from', 'aaron@c2ak.com' );
   wp_mail('aaron@aaronmadethis.com', 'subject', 'this should have aaron@c2ak.com as the from field');

   //wp_mail('aaron@aaronmadethis.com', 'subject', 'this should have aaron@c2ak.com as the from field', $headers);
   //mail ('aaron@aaronmadethis.com', 'php mail function', 'this should have aaron@c2ak.com as the from field', $from)
?>

Email sent throught wordpress.