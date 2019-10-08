# update-wp-post-featured-image
This code snippet describes how we can Add Featured Image to any Post by custom code,  
Just call function add_Featured_Image() with Image URL, and post ID. 
This will update featured image to post.

You can add this code to your custom plugin file 
or just add in functions.php located in wp-content/themes/your-theme.


// some image URL
// some Post ID
add_Featured_Image('https://www.gstatic.com/webp/gallery3/1.sm.png', '1');

#Enjoy-Coding
