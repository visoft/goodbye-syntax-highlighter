For years I've used [Alex Gorbatchev's SyntaxHighlighter](http://alexgorbatchev.com/SyntaxHighlighter/). It has served me well over the years. When I moved to WordPress I tried various plugins based on the library, such [SyntaxHighlighter Evolved](http://wordpress.org/extend/plugins/syntaxhighlighter/).

I've decided to start blogging using [Markdown](http://daringfireball.net/projects/markdown/). Making this move I needed to find a way to highlight various bits of sourcecode in an easy way. There are many nice libraries that make this a snap, such as [google-code-prettify](http://code.google.com/p/google-code-prettify/) or [highlight.js](http://softwaremaniacs.org/soft/highlight/en/). In the end I decided to go with highlight.js, for the simple reason that it is automatic, working flawlessly with Markdown's code syntax output.

Great, but my existing source code examples use SyntaxHighlighter's style for code blocks (using `<pre class="brush: ruby;" />`, for example). I could have converted things in a few ways:

* Change the database
* Write a JS script to convert the `<pre />` structure to `<pre><code /></pre>`
* Write a JS script to call highlight.js' `highlightBlock` method
* Write a WP plugin and reformat things easily **Ding Ding Ding**

So there you have it. This WordPress plugin will go through and process your SyntaxHighlighter style blocks into ones that highlight.js works with out-of-the-box. Nothing is changed in the DB, so if you decide to go back to SyntaxHighlighter, you can without any issues.