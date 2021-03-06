For years I've used [Alex Gorbatchev's SyntaxHighlighter](http://alexgorbatchev.com/SyntaxHighlighter/). It has served me well over the years. When I moved to WordPress I tried various plugins based on the library, such [SyntaxHighlighter Evolved](http://wordpress.org/extend/plugins/syntaxhighlighter/).

I've decided to start blogging using [Markdown](http://daringfireball.net/projects/markdown/). Making this move I needed to find a way to highlight various bits of source code in an easy way. There are many nice libraries that make this a snap, such as [google-code-prettify](http://code.google.com/p/google-code-prettify/) or [highlight.js](http://softwaremaniacs.org/soft/highlight/en/). In the end I decided to go with highlight.js, for the simple reason that it is automatic, working flawlessly with Markdown's code syntax output.

Great, but my existing source code examples use SyntaxHighlighter's style for code blocks (using `<pre class="brush: ruby;" />`, for example). I could have converted things in a few ways:

* Change the database
* Write a JS script to convert the `<pre />` structure to `<pre><code /></pre>`
* Write a JS script to call highlight.js' `highlightBlock` method
* Write a WP plugin and reformat things easily **Ding Ding Ding**

So there you have it. This WordPress plugin will go through and process your SyntaxHighlighter style blocks into ones that highlight.js works with out-of-the-box. It will also add the language that you have specified with the `brush` class and add it as a class on the `<code />` element ([following the HTML5 recommendation](http://www.w3.org/html/wg/drafts/html/master/text-level-semantics.html#the-code-element)). Nothing is changed in the DB, so if you decide to go back to SyntaxHighlighter, you can without any issues.

## GeSHi
This plugin now supports conversion of [GeSHi](http://qbnz.com/highlighter/) style code blocks! Now you can move from plugins such as [WP-Syntax](http://wordpress.org/extend/plugins/wp-syntax/) and [WP-GeSHi-Highlight](http://wordpress.org/extend/plugins/wp-geshi-highlight) to highlight.js.

GeSHi uses the syntax that is *close* to SyntaxHighlighter, except instead of putting the language in the `class` attribute, it uses the `lang` attribute. Similar to the SyntaxHighligher conversion, it will go through and process your GeSHi style blocks into ones that highlight.js works with out-of-the-box. It will also add the language that you have specified with the `lang` attribute and add it as a `class` on the `<code />` element.