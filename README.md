# tinymd

The tiny databaseless Markdown blog engine written in PHP.


## Installation

To install **tinymd** on your server just do the usual `git clone git://github.com/nathanpc/tinymd.git` so you can get updates just by doing a `git format-patch <commit>` on the repo and then applying the patch to your blog using `git apply`. (I'm going to create a tutorial about how to update **tinymd** as soon as possible)

After everything is in place edit the `config/details.php` file with the name of your blog, subtitle, and other things that you might like to change.

If you want (and you probably want) to change the text that will appear on the header of your blog just go to `templates/header.html` and edit that. You can do the same thing for the footer, which is located at `templates/footer.html`, please let the *"Powered by tinymd message"* to support my work.

When you want to start posting just delete the test post and start adding Markdown files to the `posts` directory.

## License

**tinymd** is licensed under the GPLv3 license. A copy of the license can be found inside the `LICENSE` file on this repository.