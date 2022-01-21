<?php

function wporg_add_custom_box()
{
    $screens = ['post', 'wporg_cpt'];
    foreach ($screens as $screen) {
        add_meta_box(
            'wporg_box_id',
            'Add product',
            'wporg_custom_box_html',
            $screen
        );
    }
}
add_action('add_meta_boxes', 'wporg_add_custom_box');


function add_post()
{
    $my_post = array(
        'post_title'    => $_POST['title'],
        'post_content'  => $_POST['description'],
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'products',
    );
    $post_id =  wp_insert_post($my_post);

    update_field('shipping', $_POST['sipping'], $post_id);
    update_field('location', $_POST['cantry'], $post_id);
    update_field('price', $_POST['price'], $post_id);
    update_field('button_text', $_POST['btnText'], $post_id);
    update_field('button_link', $_POST['btnLink'], $post_id);
    update_field('image', $_POST['img'], $post_id);
}
add_action('wp_ajax_addpost', 'add_post');
add_action('wp_ajax_nopriv_addpost', 'add_post');



function wporg_custom_box_html($post)
{
?>
    <div class="m-row-1">
        <input type="text" placeholder="title" class="m-title-post">
    </div>
    <div class="m-row-1">
        <textarea placeholder="description" class="m-description-post"></textarea>
    </div>

    <div class="m-row-3">
        <select class="m-cantry-post">
            <option selected value="Free Shipping">Free Shipping</option>
            <option value="Paid shipping">Paid shipping</option>
        </select>
        <select class="m-sipping-post">
            <option selected value="Free Shipping">Free Shipping</option>
            <option value="Paid shipping">Paid shipping</option>
        </select>
        <input type="text" placeholder="Price" class="m-price-post">
    </div>

    <div class="m-row-3">
        <input type="text" placeholder="Image url" class="m-img-post">
        <input type="text" placeholder="Button link" class="m-btnlink-post">
        <input type="text" placeholder="Button text" class="m-btntext-post">
    </div>


    <button class="m-btn-post"> Add new product</button>

    <script>
        setInterval(() => {
            if (document.querySelector('.button.button-small.copy-attachment-url')) {
                const copyBtn = document.querySelector('.button.button-small.copy-attachment-url')
                copyBtn.addEventListener('click', () => {
                    const copyField = document.querySelector('.attachment-details-copy-link')
                    const imgUrl = document.querySelector('.m-img-post')
                    imgUrl.value = copyField.value
                })
            }
        }, 100)

        jQuery(function($) {
            $('.m-btn-post').on('click', function() {
                const title = document.querySelector('.m-title-post')
                const description = document.querySelector('.m-description-post')
                const sipping = document.querySelector('.m-sipping-post')
                const cantry = document.querySelector('.m-cantry-post')
                const price = document.querySelector('.m-price-post')
                const btnText = document.querySelector('.m-btntext-post')
                const btnLink = document.querySelector('.m-btnlink-post')
                const img = document.querySelector('.m-img-post')
                let data = {
                    'action': 'addpost',
                    'title': title.value,
                    'description': description.value,
                    'sipping': sipping.value,
                    'cantry': cantry.value,
                    'price': price.value,
                    'btnText': btnText.value,
                    'btnLink': btnLink.value,
                    'img': img.value,
                }

                $.ajax({
                    url: '/new/wp-admin/admin-ajax.php',
                    data: data,
                    type: 'POST',
                    success: function(data) {
                        if (data) {
                            title.value = ''
                            description.value = ''
                            price.value = ''
                            btnText.value = ''
                            btnLink.value = ''
                            img.value = ''
                        }
                    }
                });
            });

        });
    </script>

<?php
}
