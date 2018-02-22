<?php
add_action('admin_menu', 'theme_menu');

function theme_menu() {
    add_menu_page('Verimuchme Options', 'Theme Options', 'administrator', 'options_page', 'theme_options_page');
}
function theme_options_page() {
    if (isset($_REQUEST['submit'])) {
        update_option('facebook', $_REQUEST['facebook']);
        update_option('twitter', $_REQUEST['twitter']);
        update_option('instagram', $_REQUEST['instagram']);
        update_option('linked_in', $_REQUEST['linked_in']);
        update_option('contact_us_email', $_REQUEST['contact_us_email']);
        update_option('default_image', $_REQUEST['default_image']);
        update_option('banner_image', $_REQUEST['banner_image']);
        update_option('header_page_logo', $_REQUEST['header_page_logo']);
        update_option('subpage_header_logo', $_REQUEST['subpage_header_logo']);
        update_option('contact_description', $_REQUEST['contact_description']);
        $updated = 1;
    } ?>
<?php if ($updated == 1) { ?>
        <div class="updated" style="margin-top: 10px;"><p>Details Updated Successfully</p></div>
<?php } ?>
    <div id="usual2" class="usual">
        <form name="options" id="options" action="" method="post">
            <h1>Verimuchme Theme Options</h1>
               <div class="contaniner">
                    <div class="label">Facebook</div>
                    <div class="field"><input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Twitter</div>
                    <div class="field"><input type="text" name="twitter" id="twitter" value="<?php echo get_option('twitter'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Linkedin</div>
                    <div class="field"><input type="text" name="linked_in" id="linked_in" value="<?php echo get_option('linked_in'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Instagram</div>
                    <div class="field"><input type="text" name="instagram" id="instagram" value="<?php echo get_option('instagram'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Contact us email</div>
                    <div class="field"><input type="text" name="contact_us_email" id="contact_us_email" value="<?php echo get_option('contact_us_email'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Default Image</div>
                    <div class="field"><input type="text" name="default_image" id="default_image" value="<?php echo get_option('default_image'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Banner Image</div>
                    <div class="field"><input type="text" name="banner_image" id="banner_image" value="<?php echo get_option('banner_image'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Header Page Logo</div>
                    <div class="field"><input type="text" name="header_page_logo" id="header_page_logo" value="<?php echo get_option('header_page_logo'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Subpage Header Logo</div>
                    <div class="field"><input type="text" name="subpage_header_logo" id="subpage_header_logo" value="<?php echo get_option('subpage_header_logo'); ?>"  />
                    </div><br />
                </div>
                 <div class="contaniner">
                    <div class="label">Contact description</div>
                    <div class="field">
                        <input type="text" name="contact_description" id="contact_description" value="<?php echo get_option('contact_description'); ?>"  />
                    </div><br />
                </div>
                <br style="clear:both;" />
            <input type="submit" class="btn" name="submit" value="Save Options" style="margin-top:20px;" />
        </form>
    </div>
<?php } ?>