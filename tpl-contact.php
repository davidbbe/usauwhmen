<?php
/*
Template Name: Contact Page
*/
?>
<?php get_header(); ?>
<?php get_template_part( '/templates/page/page-header' ); ?>

  <div class="page-content padding-small" id="page-container">
    <div class="container">
      <div class="row">



        <div class="col-xs-12 col-sm-6 col-md-8">

          <?php 
          $contact_form_email_address = get_field( "contact_form_email_address" );

          if( $contact_form_email_address ) { ?>

            <h3>Contact Us</h3>

            <div class="contact-page-form">

            <?php

            //response generation function
            $response = "";

            //function to generate response
            function my_contact_form_generate_response($type, $message){

              global $response;

              if($type == "success") $response = "<div class='success'>{$message}</div>";
              else $response = "<div class='error'>{$message}</div>";

            }

            //response messages
            $not_human       = "Human verification incorrect.";
            $missing_content = "Please supply all information.";
            $email_invalid   = "Email Address Invalid.";
            $message_unsent  = "Message was not sent. Try Again.";
            $message_sent    = "Thanks! Your message has been sent.";

            //user posted variables
            $name = $_POST['message_name'];
            $email = $_POST['message_email'];
            $message = $_POST['message_text'];
            $human = $_POST['message_human'];

            //php mailer variables
            //$to = $contact_form_email_address;
            $subject = "Someone sent a message from ".get_bloginfo('name');
            $headers = 'From: '. $email . "\r\n" .
              'Reply-To: ' . $email . "\r\n";

            if(!$human == 0){
              if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
              else {

                //validate email
                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                  my_contact_form_generate_response("error", $email_invalid);
                else //email is valid
                {
                  //validate presence of name and message
                  if(empty($name) || empty($message)){
                    my_contact_form_generate_response("error", $missing_content);
                  }
                  else //ready to go!
                  {
                    $sent = wp_mail($contact_form_email_address, $subject, strip_tags($message), $headers);
                    if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
                    else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
                  }
                }
              }
            }
            else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content); ?>

            <div id="respond">
              <?php echo $response; ?>
              <form action="<?php the_permalink(); ?>" method="post">
                <div class="form-group">
                  <label for="name">Name <span>*</span></label>
                  <input type="text" class="form-control" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>">
                </div>
                <div class="form-group">
                  <label for="message_email">Email <span>*</span></label>
                  <input type="text" class="form-control" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>">
                </div>
                <div class="form-group">
                  <label for="message_text">Message <span>*</span></label>
                  <textarea type="text" class="form-control" rows="3" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
                </div>
                <div class="form-group">
                  <label for="message_human">Human Verification <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label>
                </div>
                <input type="hidden" name="submitted" value="1">
                <p><input class="btn btn-primary" type="submit"></p>
              </form>
            </div>

          </div>
          
          <?php } ?>
        </div>

        <div class="md-column col-side col-xs-12 col-sm-6 col-md-4 col-md-right col-sm-right">
          <?php dynamic_sidebar('sidebar-page'); ?>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>