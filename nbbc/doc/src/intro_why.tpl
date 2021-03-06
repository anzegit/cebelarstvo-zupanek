<p>You may be asking yourself: Why does my web application need BBCode? What does
    BBCode do for me that HTML doesn't do? If you're asking these kinds of questions, this
    is the section for you. BBCode is a document formatting language, just like HTML, but
    in many ways it's better than HTML for your user-generated content:</p>

<ul>
    <li><b>BBCode is simpler.</b> HTML is a big, hoary, complex language with tons of
        caveats, side effects, and security issues. HTML can take weeks or months to
        learn well, whereas most of the BBCode features people will ever use can be learned
        fully in an afternoon. Newlines behave as newlines, smileys behave as smileys,
        and generally the language is user-friendly and newbie-friendly right out of the box.
    </li>
    <li><b>BBCode is safer.</b> HTML has plenty of security holes, from <tt>&lt;script&gt;</tt>
        tags to <tt>javascript:</tt> URLs to XSS attacks and more. BBCode, on the other
        hand, is a simple language that does <i>most</i> the tasks that <i>most</i> people
        need, without all the security troubles: BBCode actively prohibits tags and
        constructs that can get you into trouble, and even repairs bad code on the fly.
    </li>
    <li><b>BBCode is flexible.</b> HTML knows how to do what it does, and that's it; if you
        want a new element in HTML, say, a <tt>&lt;quote&gt;</tt> element or a <tt>&lt;multicol&gt;</tt>
        element, you have to wait and <i>hope</i> that all the major browsers implement what you need
        --- if they don't implement it, you don't have it. With BBCode, you can define simple
        tags that produce big, complex HTML on the backend, so that a tag like <tt>[calendar=2008-07]</tt>
        really can produce a working calendar, even if no browsers have a built-in <tt>&lt;calendar&gt;</tt>
        element.
    </li>
    <li><b>BBCode is portable.</b> Again, with HTML, you're limited to what the browsers
        support. But since BBCode is translated to a very simple subset of HTML, even really
        complicated BBCode constructs can work on just about any browser. Not so with the
        full power of HTML, where a lot of stuff just plain doesn't work if you switch from
        Firefox to Internet Explorer and back.
    </li>
    <li><b>BBCode follows its users mental models.</b> With HTML, there's a longstanding
        argument over visual styles vs. logical styles, whether your document should be
        formatted for machine use with elements like <tt>&lt;strong&gt;</tt> or formatted for
        visuals with elements like <tt>&lt;b&gt;</tt>. BBCode doesn't care: It implements
        whatever tags you want it to implement, whatever make the most sense for your needs.
        Need a <tt>[flash]</tt> tag, or a <tt>[video]</tt> tag, or a <tt>[webcomic=]...[/webcomic]</tt>
        link? Add it so that the language does what you want it to do, and not the other way around.
    </li>
    <li><b>BBCode is automatically and easily styled.</b> Since all BBCode gets compiled to a simple
        subset of HTML, changing the look-and-feel of BBCode content can be done by
        changing just a very small handful of CSS styles. Not so with HTML, where there are
        often hundreds of classes in even a relatively short document.
    </li>
</ul>

<p>In fairness, BBCode isn't perfect. Let's look at what it can't do too, compared to HTML:</p>

<ul>
    <li><b>HTML is faster.</b> BBCode needs to be compiled, and that takes time on your server.
        But NBBC is designed to be a very fast compiler, and even long BBCode documents can
        be formatted rapidly with it.
    </li>
    <li><b>HTML supports lots of extras.</b> Scripts, forms, embedded objects, video... if
        the web can do it, HTML can do it. BBCode intentionally leaves out this flexibility
        in exchange for safety, but with NBBC, you can always add these kinds of elements
        back in if you really need them.
    </li>
    <li><b>HTML more flexible about its look and feel.</b> BBCode intentionally restricts
        its content to all look the same, to share the same styles, while HTML can have any
        look anywhere.
    </li>
    <li><b>HTML can and will grow.</b> BBCode only can do what your BBCode library (NBBC) can
        do, whereas HTML will get new features over time as people upgrade their browsers.
    </li>
    <li><b>HTML has WYSIWYG editors,</b> which are great for newbies. But this advantage
        will erode: Even now, some rudimentary BBCode WYSIWYG editors have started
        to appear, and they'll only get better with time.
    </li>
</ul>

<p>Still, even with the advantages HTML has, in a security- and safety-conscious age,
    BBCode is the clear winner for user-generated content. If you're letting your users
    add any kind of text-based content to your site, your site <i>needs</i> BBCode, and
    NBBC is the best and easiest way to get it.</p>
