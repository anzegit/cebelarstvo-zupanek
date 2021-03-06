<p>The BBCode <tt>[img]</tt> tag has been used since BBCode's inception to support
    insertion of images into a document, and NBBC supports this as well. Typically,
    these images are located on another server, though, and a full URL is used with the
    <tt>[img]</tt> tag: For example, it's not unusual to see something like this in BBCode:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>[img]http://img.photobucket.com/albums/v63/phantom-inker/other/forum-mod.png[/img]</xmp>
<div class='output_header'>Output:</div>
<div class='output'><img src="http://img.photobucket.com/albums/v63/phantom-inker/other/forum-mod.png" width='91'
                         height='100' alt="forum-mod.png"/></div>

<p>Many of the pictures that get included, however, all come from the same web site, be it
    a remote image host like Photobucket, or the local host on which NBBC itself is to be running.
    Because of this, NBBC offers a special syntax that makes inclusion of images from the same
    location much easier. This can be used to simplify URLs, or it is more frequently used to
    offer a local group of images that your users can easily link to.</p>

<p>Let's look at this with an example. Let's say that you have a server named
    <tt>http://www.example.com</tt>, and you are using NBBC here:
    <tt>http://www.example.com/foo/bar/nbbc.php</tt>. You have also installed a simple
    image-gallery package, so that people can upload their images to your server, and
    it will store its images in <tt>http://www.example.com/foo/images</tt>. Now if a
    user wants to include an image named "<tt>bill.jpg</tt>" that he's just uploaded,
    normally, he'd have to type this:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>[img]http://www.example.com/foo/images/bill.jpg[/img]</xmp>

<p>That's pretty excessive, though, especially since most of the images that he and
    other users of this site will be located in that same <tt>images/</tt> directory. So
    NBBC provides its <i>local images</i> system to simplify exactly this common case.
    In your PHP code, you might first write this:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>$bbcode = new BBCode;
    $bbcode->SetLocalImgURL("http://www.example.com/foo/images/");
    $bbcode->SetLocalImgDir("/home/example.com/foo/images/");
</xmp>

<p>(Note that the local image directory passed to <a
            href="api_repl.html#ref_parser_SetLocalImgDir"><tt>SetLocalImgDir()</tt></a>
    <i>must</i> be the full server path to the local image directory; and the address given to <a
            href="api_repl.html#ref_parser_SetLocalImgURL"><tt>SetLocalImgURL()</tt></a>
    should match that location, only as a global URL.)</p>

<p>Once you've set this up, that user can now much more easily include any file in
    that directory:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>[img]bill.jpg[/img]</xmp>

<p>So any path given to the <tt>[img]</tt> tag that does not include a protocol (such as <tt>http:</tt>,
    <tt>ftp:</tt>, or <tt>https:</tt>), and that does not start with a <tt>\</tt> or a <tt>/</tt> will be
    treated as a path to a <i>local image</i>, an image somewhere under the current local image directory.
    NBBC will sensibly only include images that are actual images, and for security reasons, it will also
    disallow the use of <tt>..</tt> in a filename.</p>
