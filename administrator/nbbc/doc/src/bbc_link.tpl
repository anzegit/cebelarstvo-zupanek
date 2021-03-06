<a name="ref_lib_links_url"></a>
<p class='bblib' style='margin-bottom:0;'><b><tt>[url]address[/url]</tt></b></p>
<p class='bblib' style='margin-bottom:0;margin-top:0;'><b><tt>[url=address]title[/url]</tt></b></p>
<p class='bblib' style='margin-bottom:0;margin-top:0;'><b><tt>[url target=target]address[/url]</tt></b></p>
<p class='bblib' style='margin-top:0;'><b><tt>[url=address target=target]title[/url]</tt></b><br/>
    The <tt>[url]</tt> tag, which is available in two different forms, allows you to insert links to
    external documents. In the first form, it simply marks the URL as a link:<br/>
    <br/>
    &nbsp; &nbsp; &nbsp; &nbsp; <tt>[url]http://www.google.com[/url]</tt> &nbsp; --&gt; &nbsp; <a
            href="http://www.google.com">http://www.google.com</a><br/>
    <br/>
    In the second form, you can specify the text to appear within the link:<br/>
    <br/>
    &nbsp; &nbsp; &nbsp; &nbsp; <tt>[url=http://www.google.com]Google![/url]</tt> &nbsp; --&gt; &nbsp; <a
            href="http://www.google.com">Google!</a><br/>
    <br/>
    Note that for safety's sake, the <tt>[url]</tt> tag will only accept local (relative) URLs,
    and URLs that use the <tt>http:</tt>, <tt>https:</tt>, <tt>ftp:</tt>, or <tt>mailto:</tt> protocols.
    In particular, it will <i>not</i> accept any URL that uses the <tt>javascript:</tt> protocol;
    this limitation is for security reasons, and can prevent code injection on your site. NBBC
    also performs static checks on the given URL to ensure that it is legal: For example, it knows
    that <tt>http://foo</tt> is not a legal URL and will not allow it.<br/>
    <br/>
    The <tt>target=</tt> parameter mirrors that of the HTML <tt>&lt;a&gt;</tt> element, and allows
    the link to open in a different window or frame. It accepts all of the standard window names
    that the <tt>&lt;a&gt;</tt> element's <tt>target=</tt> parameter accepts, including "<tt>_blank</tt>",
    "<tt>_self</tt>", "<tt>_parent</tt>", and "<tt>_top</tt>", as well as specifically-named windows
    and frames.<br/>
    <br/>
    <i>(Note: for security reasons, the <tt>target=</tt> parameter is disabled by default, and must
        be manually enabled using the <a href="api_repl.tpl#ref_parser_SetURLTargetable">BBCode::SetURLTargetable()</a>
        function for this parameter to be usable in your BBCode. See <a href="api_repl.tpl#ref_parser_SetURLTargetable">BBCode::SetURLTargetable()</a>
        for more details.)</i></p>

<a name="ref_lib_links_email"></a>
<p class='bblib' style='margin-bottom:0;'><b><tt>[email]address[/email]</tt></b></p>
<p class='bblib' style='margin-top:0;'><b><tt>[email=address]title[/email]</tt></b><br/>
    The <tt>[email]</tt> tag lets you easily insert someone's e-mail address. Like the
    <tt>[url]</tt> tag, it is available in two forms. In the first form, it simply marks the e-mail address as a
    link:<br/>
    <br/>
    &nbsp; &nbsp; &nbsp; &nbsp; <tt>[email]billg@microsoft.com[/email]</tt> &nbsp; --&gt; &nbsp; <a
            href="mailto:billg@microsoft.com">billg@microsoft.com</a><br/>
    <br/>
    In the second form, you can specify the text to appear within the link:<br/>
    <br/>
    &nbsp; &nbsp; &nbsp; &nbsp; <tt>[email=billg@microsoft.com]Bill G.[/email]</tt> &nbsp; --&gt; &nbsp; <a
            href="mailto:billg@microsoft.com">Bill G.</a><br/>
    <br/>
    For safety's sake, NBBC performs static checks on the given e-mail address to ensure that it is legal:
    For example, it knows that <tt>john@foo</tt> is not a legal e-mail address and will not allow it.</p>

<a name="ref_lib_links_wiki"></a>
<p class='bblib' style='margin-bottom:0;'><b><tt>[wiki="name"]</tt></b></p>
<p class='bblib' style='margin-top:0;'><b><tt>[wiki="name" title="title"]</tt></b><br/>
    The <tt>[wiki]</tt> tag is used internally by NBBC when it encounters a <tt>[[wiki]]</tt> tag (see
    the section on <a href="usage_wiki.html">wiki tags</a> for more details): The <tt>[[wiki]]</tt> tag
    is converted into a <tt>[wiki]</tt> tag, which is then converted into a URL based on the
    address of the installed wiki. Like the <tt>[url]</tt> tag, it is available in two forms.
    In the first form, it simply marks the wiki name as a link:<br/>
    <br/>
    &nbsp; &nbsp; &nbsp; &nbsp; <tt>[[The White House]]</tt> &nbsp; --&gt; &nbsp; <a
            href="http://en.wikipedia.org/wiki/The_White_House">The White House</a><br/>
    &nbsp; &nbsp; &nbsp; &nbsp; <tt>[wiki="The White House"]</tt> &nbsp; --&gt; &nbsp; <a
            href="http://en.wikipedia.org/wiki/The_White_House">The White House</a><br/>
    <br/>
    In the second form, you can specify the text to appear within the link:<br/>
    <br/>
    &nbsp; &nbsp; &nbsp; &nbsp; <tt>[[The White House|1600 Pennsylvania Avenue]]</tt> &nbsp; --&gt; &nbsp; <a
            href="http://en.wikipedia.org/wiki/The_White_House">1600 Pennsylvania Avenue</a><br/>
    &nbsp; &nbsp; &nbsp; &nbsp; <tt>[wiki="The White House" title="1600 Pennsylvania Avenue"]</tt> &nbsp; --&gt; &nbsp;
    <a href="http://en.wikipedia.org/wiki/The_White_House">1600 Pennsylvania Avenue</a><br/>
    <br/>
    Both of these are considerably shorter and easier to use than the <tt>[url]</tt>-based version, which is why
    wiki-links exist:<br/>
    <br/>
    &nbsp; &nbsp; &nbsp; &nbsp; <tt>[[The White House]]</tt> &nbsp; --&gt; &nbsp; <a
            href="http://en.wikipedia.org/wiki/The_White_House">The White House</a><br/><br/>
    &nbsp; &nbsp; &nbsp; &nbsp; <tt>[url=http://en.wikipedia.org/wiki/The_White_House]The White House[/url]</tt><br/>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; --&gt; &nbsp; <a
            href="http://en.wikipedia.org/wiki/The_White_House">The White House</a><br/>
    <br/>
    The <tt>[wiki]</tt> tag does not have an end tag.</p>
