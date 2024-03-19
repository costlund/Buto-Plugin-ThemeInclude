# Buto-Plugin-ThemeInclude

<p>This plugin include other plugins matching Bootstrap 4 usage. It will keep your theme settings file smaller.</p>

<a name="key_0"></a>

## Settings

<p>Add meta data from page settings description, keywords, author.</p>
<pre><code>settings:
  description: 'My description.'
  keywords: 'word, word'
  author: Buto</code></pre>
<p>theme/heartbeat. To activate this plugin one has to put page settings according below.</p>
<pre><code>plugin_modules:
  heartbeat:
    plugin: theme/heartbeat</code></pre>

<a name="key_1"></a>

## Usage



<a name="key_2"></a>

## Pages



<a name="key_3"></a>

## Widgets



<a name="key_3_0"></a>

### widget_include

<p>Include.
Include widget in html head section.</p>
<pre><code>type: widget
data:
  plugin: 'theme/include'
  method: include
  data:</code></pre>
<p>Bootstrap.
Default version of Bootstrap is version 4. On could change to version 5.</p>
<pre><code>    bootstrap:
      version: 5</code></pre>
<p>Bootswatch.
Check out plugin bootstrap/bootswatch_v431 for availible theme settings. Param data/bootswatch/theme has to be set to one of www.bootswatch.com themes for version 4.3.1. If not set theme Cerulean is used.</p>
<pre><code>    bootswatch:
      theme: Cerulean</code></pre>
<p>This plugin is in usage when Bootstrap 5.</p>
<p>Icon.
Path to icon can be changed. Default value below.</p>
<pre><code>    icon: '/theme/[theme]/icon/link_icon.png'</code></pre>
<p>Noindex.
Set enable to true to stop search engins for indexing pages.</p>
<pre><code>    noindex:
      enabled: true</code></pre>
<p>Icons.
We are using Bootstrap icons 1.8.1.
For a while we also using Octicons. To include them this settings has to be set.</p>
<pre><code>    icons:
      octicons: true</code></pre>
<p>Methods.
To modify data one could call a method.</p>
<pre><code>    methods:
      -
        plugin: memb_inc/vote_public
        method: set_icon</code></pre>
<p>Plugin. Included plugin settings are supported below. Check each plugin readme.</p>
<pre><code>    plugin:
      wf:
        ajax:
      theme:
        heartbeat:</code></pre>

<a name="key_4"></a>

## Event



<a name="key_5"></a>

## Construct



<a name="key_6"></a>

## Methods



