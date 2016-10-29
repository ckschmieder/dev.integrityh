<div class="social-mob">
                        <?php
                        $is_email       = strpos($integrity_house['contact_email'], '@');
                        $contact_href   = $is_email ? 'mailto:' : '';
                        $contact_href  .= $integrity_house['contact_email'];
                        ?>
                        <p class="contact-link email">
                            <a href="<?php echo $contact_href; ?>">Send us an email</a>
                        </p>
                        <p class="contact-link facebook">
                            <a href="<?php echo $integrity_house['facebook']; ?>">Facebook</a>
                        </p>
                        <p class="contact-link twitter">
                            <a href="<?php echo $integrity_house['twitter']; ?>">Twitter</a>
                        </p>
                        
                    </div>