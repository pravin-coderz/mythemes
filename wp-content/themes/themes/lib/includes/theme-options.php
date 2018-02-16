<?php
add_action('admin_menu', 'theme_menu');

function theme_menu() {
    add_menu_page('Givazon Options', 'Theme Options', 'administrator', 'options_page', 'theme_options_page');
}
function theme_options_page() {
     if (isset($_REQUEST['submit'])) {
        update_option('googleapp', $_REQUEST['googleapp']);
        update_option('appstore', $_REQUEST['appstore']);
        update_option('twitter', $_REQUEST['twitter']);
        update_option('facebook', $_REQUEST['facebook']);
        update_option('Instagram', $_REQUEST['Instagram']);
        update_option('Blog', $_REQUEST['Blog']);
        $updated = 1;
   
    } 
?>
<?php if ($updated == 1) { ?>
        <div class="updated" style="margin-top: 10px;"><p>Details Updated Successfully</p></div>
<?php } ?>
    <div id="usual2" class="usual">
        <form name="options" id="options" action="" method="post">
            <h1>Givazon Options</h1>
            <div id="tabs1" class="tab">
                <div class="contaniner">
                    <div class="label">Google App</div>
                    <div class="field"><input type="text" name="googleapp" id="googleapp" value="<?php echo get_option('googleapp'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">App Store</div>
                    <div class="field"><input type="text" name="appstore" id="appstore" value="<?php echo get_option('appstore'); ?>"  />
                    </div><br />
                </div>
                 <div class="contaniner">
                    <div class="label">Twitter</div>
                    <div class="field"><input type="text" name="twitter" id="twitter" value="<?php echo get_option('twitter'); ?>"  />
                    </div><br />
                </div>
                 <div class="contaniner">
                    <div class="label">Facebook</div>
                    <div class="field"><input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>"  />
                    </div><br />
                </div>
                 <div class="contaniner">
                    <div class="label">Instagram</div>
                    <div class="field"><input type="text" name="Instagram" id="Instagram" value="<?php echo get_option('Instagram'); ?>"  />
                    </div><br />
                </div>
                 <div class="contaniner">
                    <div class="label">Blog</div>
                    <div class="field"><input type="text" name="Blog" id="Blog" value="<?php echo get_option('Blog'); ?>"  />
                    </div><br />
                </div>
                <br style="clear:both;" />
                <input type="submit" class="btn" name="submit" value="Save Options" style="margin-top:20px;" />
            </div>
        </form>
    </div>
<?php } ?>