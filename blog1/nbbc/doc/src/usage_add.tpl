<p>Let's say you want to add a BBCode tag that doesn't exist, say, how about, a <tt>[mono]</tt>
    for displaying things as monospace text? Let's look at how you'd go about adding a
    simple additional tag.</p>

<p>To add a tag, which NBBC calls a "rule," since it's really a rule for describing how
    a given chunk of input is processed, you simply call the <a href="api_rule.html#ref_parser_AddRule"><tt>AddRule</tt></a>
    method of the <tt>$bbcode</tt> object and pass to it an array describing how the new
    rule will convert its input to HTML. Here's an example for our <tt>[mono]</tt> tag:</p>

<div class='code_header'>Code:</div>
<xmp class='code'><?php
    require_once("nbbc.php");

    $bbcode = new BBCode;

    ...

    $new_rule = Array(
        'simple_start' => '<tt>',
        'simple_end' => '</tt>',
    'class' => 'inline',
    'allow_in' => Array('listitem', 'block', 'columns', 'inline', 'link'),
    );
    $bbcode->AddRule('mono', $new_rule);

    ...

    $input = "This text is [mono]monospaced![/mono]";
    $output = $bbcode->Parse($input);
    print $output;
    ?>
</xmp>

<div class='output_header'>Output:</div>
<div class='output'>
    This text is <tt>monospaced!</tt>
</div>

<p>Each new rule is described by an array of parameters. There are a large number of
    different parameters you can use, but for now, let's look at just the four parameters
    shown in this example. (You can learn about the rest of the parameters in the appendix
    on <a href="app_rule.html">BBCode rule parameters</a>.)</p>  The four parameters
given here are:</p>

<ul>
    <li><tt>simple_start</tt>: This describes some HTML to be added in place of the
        starting <tt>[mono]</tt> tag. In this case, we're going to replace it with
        the <tt>&lt;tt&gt;</tt> HTML element.<br/><br/></li>
    <li><tt>simple_end</tt>: This describes some HTML to be added in place of the
        ending <tt>[/mono]</tt> tag. In this case, we're going to replace it with
        the <tt>&lt;/tt&gt;</tt> HTML element terminator.<br/><br/></li>
    <li><tt>class</tt>: This assigns this new rule and its contents to be of a certain
        "class" of data within the document. Classes control which tags are allowed to
        go inside which other tags, and ensure that the resulting HTML is legal and
        valid. The standard classes are: <tt>block</tt>, <tt>inline</tt>, <tt>list</tt>,
        <tt>listitem</tt>, <tt>link</tt>, <tt>columns</tt>, <tt>nextcol</tt>, <tt>code</tt>,
        and <tt>image</tt>. (See the appendix on <a href="app_class.html">content
            classes</a> for more details.) In this case, our new tag will be of class
        <tt>inline</tt>; <tt>inline</tt> is used to describe a chunk of text in a
        paragraph. Most tags that change the appearance of text, like <tt>[b]</tt>
        and <tt>[i]</tt> and <tt>[font]</tt>, are of class <tt>inline</tt> also.<br/><br/></li>
    <li><tt>allow_in</tt>: This is a list of which tag classes this new tag may
        be used inside. It can be safely used inside list items, like <tt>[*]</tt>,
        inside block items like <tt>[center]</tt>, and inside other inline items,
        like <tt>[b]</tt>. For a complete list of the tag classes and how they relate
        to each other, see the appendix on <a href="app_class.html">content classes</a>.
    </li>
</ul>

<p>Adding the new rule is very straightforward once the rule is defined; you just call
    <tt>BBCode::AddRule</tt> and pass it the name of the new rule and the array containing
    its parameters. Advanced users may prefer to write it like this instead, though, because
    it's actually a little faster and doesn't pollute the namespace with an unnecessary
    <tt>$new_rule</tt> variable that you'll never use again:</p>

<div class='code_header'>Code:</div>
<xmp class='code'> $bbcode->AddRule('mono', Array(
    'simple_start' => '<tt>',
        'simple_end' => '</tt>',
    'class' => 'inline',
    'allow_in' => Array('listitem', 'block', 'columns', 'inline', 'link'),
    ));
</xmp>
