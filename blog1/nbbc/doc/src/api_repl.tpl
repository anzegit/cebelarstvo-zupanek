<a name="ref_parser_SetRuleHTML"></a>
<div class='api'>
    <div class='api_head'>void <b>BBCode::SetRuleHTML</b> ( string $<tt>html</tt> )</div>
    <div class='api_descr'>This function determines how the Standard BBCode Library
        generates a horizontal rule. By default, it outputs "<tt>&lt;hr&nbsp;/&gt;</tt>,"
        but you can use this function to change that output into any HTML you want.
        Many sites prefer to use images or &lt;div&gt; elements to produce horizontal
        rules for stylistic reasons, and this function lets you easily swap those in
        without changing any CSS.
    </div>
    <div class='api_info'><b>Parameters:</b>
        <ul class='api_params'>
            <li><tt><i>html</i></tt>: The HTML to generate when NBBC encounters a [rule] tag.</li>
        </ul>
    </div>
</div>

<a name="ref_parser_GetRuleHTML"></a>
<div class='api'>
    <div class='api_head'>string <b>BBCode::GetRuleHTML</b> ( )</div>
    <div class='api_descr'>This function returns the current HTML rule output.
        See <a href="api_repl.html#ref_parser_SetRuleHTML">SetRuleHTML()</a> for more details.
    </div>
    <div class='api_info'><b>Return values:</b> Returns a string containing HTML, the
        same HTML most-recently given to <a href="api_repl.html#ref_parser_SetRuleHTML">SetRuleHTML()</a>,
        or "<tt>&lt;hr&nbsp;/&gt;</tt>" if SetRuleHTML() has never been called.
    </div>
</div>

<a name="ref_parser_GetDefaultRuleHTML"></a>
<div class='api'>
    <div class='api_head'>string <b>BBCode::GetDefaultRuleHTML</b> ( )</div>
    <div class='api_descr'>This function returns the default HTML rule output provided by
        the Standard BBCode Library.
    </div>
    <div class='api_info'><b>Return values:</b> Always returns "<tt>&lt;hr&nbsp;/&gt;</tt>".</div>
</div>

<a name="ref_parser_SetLocalImgDir"></a>
<div class='api'>
    <div class='api_head'>void <b>BBCode::SetLocalImgDir</b> ( string $<tt>fullpath</tt> )</div>
    <div class='api_descr'>This function tells NBBC where local images are found,
        as a pathname relative to the root of the host's filesystem (an absolute pathname).
        You should usually use a full absolute pathname for this, like "<tt>/home/larry/web/myimages</tt>",
        and you should <i>not</i> include a trailing slash on the path, as one will be appended
        automatically. Using relative pathnames can work, but may produce problems on some
        web servers.
    </div>
    <div class='api_info'><b>Parameters:</b>
        <ul class='api_params'>
            <li><tt><i>fullpath</i></tt>: The filesystem path to your local image directory.</li>
        </ul>
    </div>
</div>

<a name="ref_parser_GetLocalImgDir"></a>
<div class='api'>
    <div class='api_head'>string <b>BBCode::GetLocalImgDir</b> ( )</div>
    <div class='api_descr'>This function returns the current local image directory.
        See <a href="api_repl.html#ref_parser_SetLocalImgDir">SetLocalImgDir()</a> for more details.
    </div>
    <div class='api_info'><b>Return values:</b> Returns the current local image directory.
        If no local image directory has been set, this returns simply "img".
    </div>
</div>

<a name="ref_parser_GetDefaultLocalImgDir"></a>
<div class='api'>
    <div class='api_head'>string <b>BBCode::GetDefaultLocalImgDir</b> ( )</div>
    <div class='api_descr'>This function returns the default local image directory.</div>
    <div class='api_info'><b>Return values:</b> Always returns "img".</div>
</div>

<a name="ref_parser_SetLocalImgURL"></a>
<div class='api'>
    <div class='api_head'>void <b>BBCode::SetLocalImgURL</b> ( string $<tt>url</tt> )</div>
    <div class='api_descr'>This function tells the browser where local images are found,
        as an absolute URL. You should usually use a full absolute URL for this, like
        "<tt>http://larry.example.com/myimages</tt>", and you should <i>not</i> include a
        trailing slash on the path, as one will be appended automatically. Using relative
        (short) URLs can work, but may produce problems with some web browsers if not
        used carefully.
    </div>
    <div class='api_info'><b>Parameters:</b>
        <ul class='api_params'>
            <li><tt><i>url</i></tt>: The full URL to your local image directory.</li>
        </ul>
    </div>
</div>

<a name="ref_parser_GetLocalImgURL"></a>
<div class='api'>
    <div class='api_head'>string <b>BBCode::GetLocalImgURL</b> ( )</div>
    <div class='api_descr'>This function returns the current local image URL.
        See <a href="api_repl.html#ref_parser_SetLocalImgURL">SetLocalImgURL()</a> for more details.
    </div>
    <div class='api_info'><b>Return values:</b> Returns the current local image URL.
        If no local image URL has been set, this returns simply "img".
    </div>
</div>

<a name="ref_parser_GetDefaultLocalImgURL"></a>
<div class='api'>
    <div class='api_head'>string <b>BBCode::GetDefaultLocalImgURL</b> ( )</div>
    <div class='api_descr'>This function returns the default local image URL.</div>
    <div class='api_info'><b>Return values:</b> Always returns "img".</div>
</div>

<a name="ref_parser_GetURLTargetable"></a>
<div class='api'>
    <div class='api_head'>mixed <b>BBCode::GetURLTargetable</b> ( )</div>
    <div class='api_descr'>This function returns the current setting for the URL-targetable security flag.
        See <a href="api_repl.html#ref_parser_SetURLTargetable">SetURLTargetable()</a> for more details.
    </div>
    <div class='api_info'><b>Return values:</b> The current state of the URL-targetable security flag.</div>
</div>

<a name="ref_parser_SetURLTargetable"></a>
<div class='api'>
    <div class='api_head'>void <b>BBCode::SetURLTargetable</b> ( mixed $<tt>enabled</tt> )</div>
    <div class='api_descr'>This function changes the URL-targetable security flag.</div>
    <div class='api_info'><b>Parameters:</b>
        <ul class='api_params'>
            <li><tt><i>enabled</i></tt>: If true, the <tt>[url]</tt> tag will allow URL targeting.
                If false, the <tt>[url]</tt> tag will not allow user-targeting. If set to
                <tt>'override'</tt>, any user-supplied target will override the default
                URL target.
            </li>
        </ul>
    </div>
    <div class='api_info_block'>The URL-targetable flag controls whether the <tt>[url]</tt> tag allows
        an additional <tt>target=""</tt> parameter that controls which window or frame the
        link will appear in. It mirrors the <tt>target=""</tt> parameter that <tt>&lt;a&gt;</tt>
        elements have, and supports all the same values. By default, this parameter is disabled
        for security reasons: In certain (rare) circumstances where a visitor has the ability to write
        BBCode on your site, it can be possible to use the <tt>target=""</tt> parameter to bypass
        enough security restrictions to perform CSRF or XSS attacks. However, if the only people
        who will be writing BBCode on your site are trusted people, then this parameter can be
        safely enabled.
    </div>
</div>

<a name="ref_parser_GetURLTarget"></a>
<div class='api'>
    <div class='api_head'>mixed <b>BBCode::GetURLTarget</b> ( )</div>
    <div class='api_descr'>This function returns the current setting for the URL target. This will either
        be <i>false</i> or a target string.
        See <a href="api_repl.html#ref_parser_SetURLTarget">SetURLTarget()</a> for more details.
    </div>
    <div class='api_info'><b>Return values:</b> The current state of the URL target.</div>
</div>

<a name="ref_parser_SetURLTarget"></a>
<div class='api'>
    <div class='api_head'>void <b>BBCode::SetURLTarget</b> ( mixed $<tt>setting</tt> )</div>
    <div class='api_descr'>This function changes the URL target.</div>
    <div class='api_info'><b>Parameters:</b>
        <ul class='api_params'>
            <li><tt><i>setting</i></tt>: If false, the <tt>[url]</tt> tag will either allow
                URL targeting (if URL targeting is enabled), or it will have no target. If
                <i>setting</i> is a string, that string will be used for the link target,
                and any user-supplied target will be ignored.
            </li>
        </ul>
    </div>
    <div class='api_info_block'>The URL target setting controls whether the <tt>[url]</tt> tag will
        produce links that have an additional <tt>target=""</tt> parameter that controls which
        window or frame the link will appear in. By default, this is disabled (<i>false</i>),
        allowing links to either open in the current window, or in a user-chosen window (if the
        URL-targetable flag is set). By setting this, however, you can force all links to open in
        the window of your choice, be it "_blank" or some specific custom window.
    </div>
</div>
