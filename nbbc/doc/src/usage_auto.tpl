<p>It can be useful to have NBBC detect URLs (web addresses) and e-mail addresses
    and turn them into links. For example, consider the following text:</p>

<div class='code_header'>User Input:</div>
<xmp class='code'>Go to www.google.com for all your searching needs!</xmp>

<div class='output_header'>Output:</div>
<div class='output'>Go to www.google.com for all your searching needs!</div>

<p>It would be nice if the "www.google.com" there was clickable, and NBBC includes
    a feature for making it just that. With URL autodetection enabled, anything that
    looks like part of a web address, a URL, or an e-mail address will be turned into
    a link, like this:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>$bbcode = new BBCode;
    $bbcode->SetDetectURLs(true);
    $output = $bbcode->Parse($input);
</xmp>

<div class='code_header'>User Input:</div>
<xmp class='code'>Go to www.google.com or example.com:8086 or http://www.google.com or my friend Larry,
    larry@example.com, for all your searching needs!
</xmp>

<div class='output_header'>Output:</div>
<div class='output'>Go to <a href="http://www.google.com/">www.google.com</a> or <a href="http://example.com:8086/">example.com:8086</a>
    or <a href="http://www.google.com/">http://www.google.com</a> or my friend Larry,
    <a href="mailto:larry@example.com">larry@example.com</a>, for all your searching needs!
</div>

<p>URL autodetection picks out domain names (like "www.google.com"), URLs that use the HTTP, HTTPS, or
    FTP protocols (like "http://www.google.com"), and e-mail addresses (like "larry@example.com") and
    turns them into links. It uses a template system just like <a href="usage_enh.html">BBCODE_MODE_ENHANCED</a>
    does to transform them, so you can even make any of the results below possible:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>$bbcode = new BBCode;
    $bbcode->SetDetectURLs(true);
    $bbcode->SetURLPattern('<a href="{$url/h}">{$text/h}</a>');
    $output = $bbcode->Parse($input);
</xmp>

<div class='output_header'>Output:</div>
<div class='output'>Go to <a href="http://www.google.com/">www.google.com</a> for all your searching needs!</div>

<div class='code_header'>Code:</div>
<xmp class='code'>$bbcode = new BBCode;
    $bbcode->SetDetectURLs(true);
    $bbcode->SetURLPattern('{$text/h} <a href="{$url/h}">[link]</a>');
    $output = $bbcode->Parse($input);
</xmp>

<div class='output_header'>Output:</div>
<div class='output'>Go to www.google.com <a href="http://www.google.com/">[link]</a> for all your searching needs!</div>

<div class='code_header'>Code:</div>
<xmp class='code'>$bbcode = new BBCode;
    $bbcode->SetDetectURLs(true);
    $bbcode->SetURLPattern('<a href="{$url/h}">{$text/h} <img src="external.gif"
                                                              width="11" height="11" alt="External Link"/></a>');
    $output = $bbcode->Parse($input);
</xmp>

<div class='output_header'>Output:</div>
<div class='output'>Go to <a href="http://www.google.com/">www.google.com <img src="external.gif" width="11" height="11"
                                                                               alt="External Link" border="0"/></a> for
    all your searching needs!
</div>

<p>For additional documentation on templating, see the <a
            href="api_misc.html#ref_parser_FillTemplate">FillTemplate()</a>
    function, which is shared by all of the template code in NBBC and can be used in your own programs as
    well; and also see the list of <a href="app_enhflags.html">template flags</a>.</p>
