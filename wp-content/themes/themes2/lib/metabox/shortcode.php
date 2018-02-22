<?php

add_action('admin_menu', 'short_code');

function short_code() {
    $types = array( 'page', 'banners', 'careers', 'blog', 'clients', 'news', 'partner', 'product','service','team');
    foreach ($types as $type){
        add_meta_box('shortCodes', 'Add Short Codes', 'short_codes', $type,'normal', 'high');
    }
}

function short_codes($post_id) {
    global $post;
    ?>
    <table class="shtCode" style="width:100%">
        <tr>
            <th style="text-align: left"><label for="image_left_aside">Short Codes</label></th>
            <th style="text-align: left"><p>Description</p></th>
        </tr>
        <tr>
            <td class="left heading">[span]</td>
            <td  class="right description" ><p>Span tag.</p></td>
        </tr>
        <tr>
            <td class="left heading">[break_tag]</td>
            <td  class="right description" ><p>Break tag</p></td>
        </tr>
        <tr>
            <td class="left heading">[intro_content]</td>
            <td  class="right description" ><p>Intro Content section</p></td>
        </tr>
        <tr>
            <td class="left heading">[inner_generic]</td>
            <td  class="right description" ><p>Inner content generic</p></td>
        </tr>
         <tr>
            <td class="left heading">[with_sidebar]</td>
            <td  class="right description" ><p>With sidebar content</p></td>
        </tr>
        <tr>
            <td class="left heading">[without_sidebar]</td>
            <td  class="right description" ><p>Without sidebar content</p></td>
        </tr>
        <tr>
            <td class="left heading">[accordion_section]</td>
            <td  class="right description" ><p>Group of accordion section</p></td>
        </tr>
        <tr>
            <td class="left heading">[single_accordion]</td>
            <td  class="right description" ><p>Single accordion section</p></td>
        </tr>
        <tr>
            <td class="left heading">[full_image]</td>
            <td  class="right description" ><p>Full image content</p></td>
        </tr>
        <tr>
            <td class="left heading">[row_section]</td>
            <td  class="right description" ><p>Row of the content</p></td>
        </tr>
        <tr>
            <td class="left heading">[two_column]</td>
            <td  class="right description" ><p>Two accordion column</p></td>
        </tr>
        <tr>
            <td class="left heading">[sidebar]</td>
            <td  class="right description" ><p>Sidebar navigation</p></td>
        </tr>
        <tr>
            <td class="left heading">[testimonial]</td>
            <td  class="right description" ><p>Content of testimonial</p></td>
        </tr>
        <tr>
            <td class="left heading">[solutions_row]</td>
            <td  class="right description" ><p>Group of accordion for solution content</p></td>
        </tr>
        <tr>
            <td class="left heading">[solutions_row_left]</td>
            <td  class="right description" ><p>Left side accordion for solution</p></td>
        </tr>

    </table>
    <?php
}
?>