<p>NBBC has a feature that allows your users to easily link to content on a
    specific web site of your choice. This feature is called <i>wiki-links</i>,
    because it uses a syntax very similar to that of many wikis (like <a href="http://en.wikipedia.org">Wikipedia</a>),
    and because it often links to content on a wiki. In this section, we're going
    to look at how to set up wiki-links on your site in three different ways: First,
    we're going to look at the simple case of pointing them to a wiki you've installed;
    then we're going to look at how to point them at unique custom content, such as
    a webcomic or a content-management system (CMS) like Drupal; and finally, we'll
    look at how to set them up so that they can point to several different kinds
    of content at the same time.</p>

<a name="usage_wiki_wiki"></a><h4>Linking to a Wiki</h4>

<p>Let's say that you want to make it very easy for your users to link to content
    on Wikipedia. For example, you'd like this to happen:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>[[Ronald Reagan]] was the 40th [[President of the United States]],
    following [[Jimmy Carter]] and [[Gerald Ford]], and preceding
    [[George H. W. Bush]] and [[Bill Clinton]].
</xmp>
<div class='output_header'>Output:</div>
<div class='output'><a href="http://en.wikipedia.org/wiki/Ronald_Reagan">Ronald Reagan</a> was the 40th
    <a href="http://en.wikipedia.org/wiki/President_of_the_United_States">President of the United States</a>, following
    <a href="http://en.wikipedia.org/wiki/Jimmy_Carter">Jimmy Carter</a> and
    <a href="http://en.wikipedia.org/wiki/Gerald_Ford">Gerald Ford</a>, and preceding
    <a href="http://en.wikipedia.org/wiki/George_H._W._Bush">George H. W. Bush</a> and
    <a href="http://en.wikipedia.org/wiki/Bill_Clinton">Bill Clinton</a>.
</div>

<p>Normally, doing this would require a <i>lot</i> of <tt>[url]</tt> tags. But if your
    users commonly link to Wikipedia, why not make it easier for them? That's where wiki-links
    come in: It's a lot easier to type <tt>[[Ronald&nbsp;Reagan]]</tt> than it is to type
    <tt>[url=http://en.wikipedia.org/wiki/Ronald_Reagan]Ronald&nbsp;Reagan[/url]</tt> no matter
    how fast a typist you are.</p>

<p>NBBC has built-in support for detecting special tags that are surrounded by
    <tt>[[</tt>double&nbsp;brackets</tt>]]</tt>: Any time it sees such a thing, it
    invisibly converts the tag from <tt>[[abc]]</tt> to <tt>[wiki="abc"&nbsp;title="abc"]</tt>,
    thus saving your users the time of having to type out such a tag themselves.</p>

<p>(Like many wikis do, NBBC detects a vertical bar in the tag as a separator, so
    if you type <tt>[[abc|def]]</tt> you'll get <tt>[wiki="abc"&nbsp;title="def"]</tt>
    as your output. Within a wiki-link tag, NBBC allows all characters to be part of the
    name and title except for <tt>[</tt> and <tt>]</tt> and <tt>|</tt>.)</p>

<p>How, then, does NBBC process a <tt>[wiki]</tt> tag when it encounters one?
    The default behavior of the Standard BBCode Library is very simple: Convert the
    <tt>[wiki]</tt> tag into an <tt>&lt;a href="..."&gt;...&lt;/a&gt;</tt> element,
    with the main URL provided by the <a href="api_wiki.html#ref_parser_SetWikiURL"><tt>SetWikiURL()</tt></a>
    function, and a cleaned-up version of the <tt>name</tt> parameter appeneded to the
    end of the URL.</p>

<p>Let's look at a simple example: We'll process "<tt>[[Ronald&nbsp;Reagan]]</tt>"
    to be a link to his page at Wikipedia. First, before any BBCode parsing gets done, we
    need to tell the parser where our wiki is:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>$bbcode = new BBCode;
    $bbcode->SetWikiURL("http://en.wikipedia.org/wiki/");
</xmp>

<p>Next, we call the <tt>$bbcode->Parse()</tt> function to convert our input
    BBCode to HTML. This is what happens when <tt>Parse()</tt> sees the wiki link:</p>

<ol>
    <li>The <tt>[[Ronald&nbsp;Reagan]]</tt> wiki-link is converted to a <tt>[wiki="Ronald&nbsp;Reagan"&nbsp;title="Ronald&nbsp;Reagan"]</tt>
        tag.
    </li>
    <li>The parser looks for a rule for the new <tt>[wiki]</tt> tag. A rule is provided by the Standard BBCode Library,
        and unless you override it (with <a href="api_rule.html#ref_parser_AddRule">AddRule()</a>, as in another example
        below),
        that rule will process the tag.
    </li>
    <li>The standard wiki-link rule uses the <a href="api_wiki.html#ref_parser_Wikify">Wikify()</a> function
        to convert the <tt>name</tt> parameter from <tt>Ronald&nbsp;Reagan</tt> to <tt>Ronald_Reagan</tt>,
        which can be safely passed through a URL (and which is understood by most wikis as equivalent
        to the version with a space character in it).
    <li>The standard wiki-link rule then converts the rest of the BBCode tag to HTML like this:<br/>
        <tt>[wiki="abc"&bsp;title="def"]</tt><br/>
        To this:<br/>
        <tt>&lt;a&nbsp;href="{wikiurl}{abc}"&gt;{def}&lt;/a&gt;</tt><br/>
        <br/>
        So in the case where our wiki URL is <tt>http://en.wikipedia.org/wiki/</tt> and our "wikified" name is <tt>Ronald_Reagan</tt>
        and our title is <tt>Ronald&nbsp;Reagan</tt>, the output would be:
        <tt>&lt;a&nbsp;href="http://en.wikipedia.org/wiki/Ronald_Reagan"&gt;Ronald&nbsp;Reagan&lt;/a&gt;</tt></li>
</ol>

<p>So, then, to complete our first example, here is the code and its output, in full:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>$bbcode = new BBCode;
    $bbcode->SetWikiURL("http://en.wikipedia.org/wiki/");
    $input = "[[Ronald Reagan]]";
    $output = $bbcode->Parse($input);
    print $output;
</xmp>
<div class='output_header'>Output:</div>
<div class='output'><a href="http://en.wikipedia.org/wiki/Ronald_Reagan">Ronald Reagan</a></div>

<p>As we said before, users can use a vertical bar to separate names from titles, so this also works:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>$bbcode = new BBCode;
    $bbcode->SetWikiURL("http://en.wikipedia.org/wiki/");
    $input = "[[Ronald Reagan|Mister President Dude]]";
    $output = $bbcode->Parse($input);
    print $output;
</xmp>
<div class='output_header'>Output:</div>
<div class='output'><a href="http://en.wikipedia.org/wiki/Ronald_Reagan">Mister President Dude</a></div>

<a name="usage_wiki_other"></a><h4>Linking to Other Things</h4>

<p>What if you don't have a wiki? What if you don't want to link to a wiki? The <tt>[[...]]</tt>
    tag can really be used for any purpose you want: It simply links to related content on a single
    site of your choice, be that wiki pages, news articles, webcomic pages, blog postings, or
    anything else you deem useful. Some possible examples follow.</p>

<p style='margin-top:2em;'><b>Example 1.</b> Let's say you want your users to be able to link to pages in your webcomic
    easily, and that your webcomic pages are organized by date. You might use the wiki-link tag
    like this:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>$bbcode = new BBCode;
    $bbcode->SetWikiURL("http://www.thewotch.com/?epDate=");
</xmp>
<div class='code_header'>User input:</div>
<xmp class='code'>This is the [[2002-11-21|first Wotch comic]]</xmp>
<div class='output_header'>Output:</div>
<div class='output'>This is the <a href="http://www.thewotch.com/?epDate=2002-11-21">first Wotch comic</a></div>

<p style='margin-top:2em;'><b>Example 2.</b> Maybe you run a news site, and you'd like your users to be able to
    easily link to news postings.</p>

<div class='code_header'>Code:</div>
<xmp class='code'>$bbcode = new BBCode;
    $bbcode->SetWikiURL("http://mercurynews.com/ci_");
</xmp>
<div class='code_header'>User input:</div>
<xmp class='code'>[[9921286|"Mamma Mia" is cheesy fun]]</xmp>
<div class='output_header'>Output:</div>
<div class='output'><a href="http://www.mercurynews.com/ci_9921286">&quot;Mamma Mia&quot; is cheesy fun</a></div>

<a name="usage_wiki_advanced"></a><h4>Advanced linking</h4>

<p>It's entirely possible that the simple technique of "clean up the name and add it to the URL" isn't
    going to be good enough for some needs. So here, we look at ways you can perform more sophisticated
    wiki-linking by using your own <tt>[wiki]</tt>-tag processing function.</p>

<p>Let's say that you want to link to articles in <a href="http://www.arstechnica.com">Ars Technica</a>,
    a technology news blog. Articles in Ars are generally linked by a date and by a name,
    not just a name. We'd like to be able to write this:</p>

<div class='code_header'>User input:</div>
<xmp class='code'>[[As expected, EU widens antitrust probe of Intel]]</xmp>

<p>But we can't do that, because Ars articles include a date in their URL as well. So we need a
    more sophisticated parsing function that can convert just enough information into the kind of
    URL that the Ars website wants to see. First, we'll alter our requirements a little; the information
    given by the user needs to include a date:</p>

<div class='code_header'>User input:</div>
<xmp class='code'>[[20080717:As expected, EU widens antitrust probe of Intel]]</xmp>

<p>Now we need to tell NBBC that we're going to use our own custom <tt>[wiki]</tt> tag callback
    function to process this kind of content:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>$bbcode = new BBCode;
    $bbcode->AddRule("wiki", Array(
    'mode' => BBCODE_MODE_CALLBACK,
    'method' => "DoArsTag",
    'class' => 'link',
    'allow_in' => Array('listitem', 'block', 'columns', 'inline'),
    'end_tag' => BBCODE_PROHIBIT,
    'content' => BBCODE_PROHIBIT,
    ));
</xmp>

<p>And finally, we need to add our special function that can convert names to the
    format Ars requires:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>function DoArsTag($bbcode, $action, $name, $default, $params, $content) {

    // Break the name into the part before the colon (the date) and
    // the part after (the actual name)
    $pieces = explode(":", $default);

    // Convert everything in the name that isn't alphanumeric to a hyphen.
    $date = trim($pieces[0]);
    $name = str_replace(" ", "-", trim(preg_replace("/[^a-z0-9]+/",
    " ", $pieces[1])));

    // Tell NBBC whether this name is legal.
    if ($action == BBCODE_CHECK)
    return strlen($name) > 0 && preg_match("/^[0-9]+$/", $date);

    // Decide on a suitable title.
    $title = trim(@$params['title']);
    if (strlen($title) <= 0) $title = trim($pieces[1]);

    // And format the result as HTML.
    return "<a href=\"http://arstechnica.com/news.ars/post/{$date}-"
               . "{$name}.html\">" . htmlspecialchars($title) . "</a>";
    }
</xmp>

<p>This new function will yield this output:</p>

<div class='code_header'>User input:</div>
<xmp class='code'>[[20080717:As expected, EU widens antitrust probe of Intel]]</xmp>
<div class='output_header'>Output:</div>
<div class='output'><a
            href="http://arstechnica.com/news.ars/post/20080717-as-expected-eu-widens-antitrust-probe-of-intel.html">As
        expected, EU widens antitrust probe of Intel</a></div>

<a name="usage_wiki_multi"></a><h4>Linking to Multiple Things</h4>

<p>What if just one <tt>[[...]]</tt> tag isn't enough? What if you want to be able
    to easily link to several different things all at once? For example, you might run
    a webcomic site, and want to be able to easily link to comics, story arcs, your own
    comic's wiki, and even Wikipedia! You can use the same <tt>[[...]]</tt> tag to handle
    all of these at once, with a little cleverness.</p>

<p>First, you need to establish some rules: What kind of content links to which site?
    Your comics have dates attached to them, so if a user specifies just a date, they probably
    want a link to a comic; your story arcs are numbered, so if a user specifies just a
    number, they probably want a link to a story arc; everything else can probably safely
    be a link into your wiki, but if the user adds "<tt>WP:</tt>" to the start of the tag,
    they probably want a link into Wikipedia. So you might want something like this:</p>

<div class='code_header'>User input:</div>
<xmp class='code'>[[2002-11-21|The first Wotch comic]]
    [[3|"Enter the Wotch"]]
    About [[The Wotch]]
    [[WP:The Wotch]] at Wikipedia
</xmp>
<div class='output_header'>Output:</div>
<div class='output'><a href="http://www.thewotch.com/?epDate=2002-11-21">The first Wotch comic</a><br/>
    <a href="http://www.thewotch.com/archives/?arc=3">Enter the Wotch</a><br/>
    About <a href="http://wiki.thewotch.com/The_Wotch">The Wotch</a><br/>
    <a href="http://en.wikipedia.org/wiki/The_Wotch">The Wotch</a> at Wikipedia<br/></div>

<p>Clearly, simple text-replacement can't handle all of these, but allowing "smart"
    linking like this is much easier than it looks. First, we'll need to tell NBBC that
    we're doing something unusual with the <tt>[wiki]</tt> tag, just like with the
    advanced-linking example above:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>$bbcode = new BBCode;
    $bbcode->AddRule("wiki", Array(
    'mode' => BBCODE_MODE_CALLBACK,
    'method' => "DoWotchLinkTag",
    'class' => 'link',
    'allow_in' => Array('listitem', 'block', 'columns', 'inline'),
    'end_tag' => BBCODE_PROHIBIT,
    'content' => BBCODE_PROHIBIT,
    ));
</xmp>

<p>Now, all we need is a function that can analyze the name and link to the
    appropriate web site, which is conceptually not that much different from the advanced
    linking example above: We first test to see what kind of name the user provided,
    and then create a link to the correct site based on that. Here's our resulting function:</p>

<div class='code_header'>Code:</div>
<xmp class='code'>function DoWotchLinkTag($bbcode, $action, $name, $default, $params, $content) {

    // Tell NBBC this tag is legal no matter what it contains.
    if ($action == BBCODE_CHECK) return true;

    // Remove any surrounding whitespace on the name.
    $default = trim($default);

    if (preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $default)) {
    // If we have a comic date, return a link to the comic on our site.
    $title = trim(@$params['title']);
    if (strlen($title) <= 0) $title = "Comic for $default";
    return "<a href=\"http://www.thewotch.com/?epDate=$default\">"
        . htmlspecialchars($title) . "</a>";
    }
    if (preg_match("/^[0-9]+$/", $default)) {
    // If we have a number, return a link to a story arc on our site.
    $title = trim(@$params['title']);
    if (strlen($title) <= 0) $title = "Arc #$default";
    return "<a href=\"http://www.thewotch.com/archives/?arc=$default\">"
        . htmlspecialchars($title) . "</a>";
    }
    else if (preg_match("/^WP\\:/", $default) {
    // If we have something that starts with "WP:", link to Wikipedia.
    $default = substr($default, 3); // Remove the "WP:" from the name.
    $title = trim(@$params['title']);
    if (strlen($title) <= 0) $title = $default;
    $name = $bbcode->Wikify($default);
    return "<a href=\"http://en.wikipedia.org/wiki/$name\">"
        . htmlspecialchars($title) . "</a>";
    }
    else {
    // Otherwise, link to our "Wotchipedia".
    $title = trim(@$params['title']);
    if (strlen($title) <= 0) $title = $default;
    $name = $bbcode->Wikify($default);
    return "<a href=\"http://wiki.thewotch.com/$name\">"
        . htmlspecialchars($title) . "</a>";
    }
    }
</xmp>
